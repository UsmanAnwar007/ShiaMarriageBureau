<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Twilio\Rest\Client;
use Authy\AuthyApi;
use Response;
class AccountController extends Controller
{
    protected $authy;
    protected $sid;
    protected $authToken;
    protected $twilioFrom;
 
    public function __construct() {
        // Initialize the Authy API and the Twilio Client
        $this->authy = new AuthyApi(config('app.twilio')['AUTHY_API_KEY']);
        // Twilio credentials
        $this->sid = config('app.twilio')['TWILIO_ACCOUNT_SID'];
        $this->authToken = config('app.twilio')['TWILIO_AUTH_TOKEN'];
        $this->twilioFrom = config('app.twilio')['TWILIO_PHONE'];
    }
 
    public function signup(Request $request){
        $phonechk=User::where('phonenumber',$request->phonenumber)->first();
        if($phonechk){
            return Response::json(['success' => '0','validation'=>'0','message' => 'Phonenumber already exist']);
        }else{
            $user=new User();
        $user->country=$request->country;
        $user->country_code=$request->country_code;
        $user->phonenumber=$request->phonenumber;
        if($user->save()){
            $response = $this->authy->phoneVerificationStart($request->phonenumber, $request->country_code,"sms");
      
            if($response->ok()) {
                return Response::json(['success'=>'1','message'=>$response->message()]);
            } else  {
                return Response::json(['success'=>'0','message'=>$response->message()]);
            }
        }
        }
        
        
    }

    public function verifyCode(Request $request) {
        // Call the method responsible for checking the verification code sent.
        $response = $this->authy->phoneVerificationCheck($request->phonenumber, $request->country_code, $request->code);
        if($response->ok()) {
            $user=User::where('phonenumber',$request->phonenumber)->first();
            if($user->status=="0"){
                $user->status=1;
                $user->save();
            }
            return Response::json(['success'=>'1','message'=>$response->message()]);
        } else  {
            return Response::json(['success'=>'0','message'=>$response->message()]);
        }
 }

}

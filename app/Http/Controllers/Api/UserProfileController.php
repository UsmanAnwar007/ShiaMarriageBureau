<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\UserProfile;
use Response;
use App\User;
use App\ParentDetail;
use Illuminate\Support\Facades\Hash;
class UserProfileController extends Controller
{   
    public function useraccount(Request $request){
        $user=User::find($request->id);
        $user->name=$request->name;
        $user->email=$request->emial;
        $user->password=Hash::make($request->password);
        $user->nationality=$request->nationality;
        $user->city=$request->city;
        $user->ethnicity=$request->ethnicity;
        $user->gender=$request->gender;
        $user->dob=$request->dob;
        if($user->save()){
            return Response::json(['success'=>'1','message'=>'Account Detail Saved']);
        }else{
            return Response::json(['success'=>'0','message'=>'Something is wrong!']);

        }
    }

    public function userprofile(Request $request){
        $profile=new UserProfile();
        $profile->user_id=$request->user_id;
        $profile->height=$request->height;
        $profile->maritalstatus=$request->maritalstatus;
        $profile->language1=$request->language1;
        $profile->language2=$request->language2;
        $profile->occupation=$request->occupation;
        $profile->education=$request->education;
        $profile->smokingstatus=$request->smokingstatus;
        $profile->relocatestatus=$request->relocatestatus;
        $profile->caststatus=$request->caststatus;
        if($profile->save()){
            return Response::json(['success'=>'1','message'=>'Profile Saved']);
        }else{
            return Response::json(['success'=>'0','message'=>'Something is wrong!']);

        }
    }
    
    public function parentdetails(Request $request){
        $obj=new ParentDetail();
        $obj->user_id=$request->user_id;
        $obj->father_origin=$request->father_origin;
        $obj->mother_origin=$request->mother_origin;
        $obj->father_occupation=$request->father_occupation;
        $obj->father_education=$request->father_education;
        $obj->converted_to_islam=$request->converted_to_islam;
        if($obj->save()){
            return Response::json(['success'=>'1','message'=>'Profile Saved']);
        }else{
            return Response::json(['success'=>'0','message'=>'Something is wrong!']);

        }
    }
    
    
}

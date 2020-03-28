<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use Redirect;
use Response;
class AdminController extends Controller
{
    public function showAdminLoginForm(){
        return view('admin.login');
    }

    public function dashboard(){
        $user=User::count();
        return view('admin.dashboard',compact('user'));
    }

    protected function guard()
    {
        return Auth::guard('web');
    }
    public function adminlogout(Request $request){
    	$name = $this->guard()->getName();
        
        // Logout current user by guard
        $this->guard()->logout();

        // Delete single session key (just for this user)
        $request->session()->forget($name);

        // After logout, redirect to login screen again
        return Redirect::to('/admin');
    }
    public function adminLogin(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);

        if (Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {

            return redirect()->intended('/admin/dashboard');
        }else{
            return back()->with('login_feedback','Please input valid credentails');
        }
        return back()->with('login_feedback','Please input valid credentails');

        // return back()->withInput($request->only('email', 'remember'));
    }

    public function manageretailers(){
        $users = Retailer::latest('created_at')->get();
        return view('admin.manageretailers', compact('users'));
    }

    public function manageusers(){
        $users = User::where('type','!=','admin')->latest('created_at')->get();
        return view('admin.manageusers', compact('users'));
    }

    public function shopperstatus($id){
        $user=Shopper::find($id);
        if($user){
            if($user->status == 0){
                $user->status=1;
            }else if($user->status==1){
                $user->status=0;
            }
            $user->save();
            return Response::json(['success'=>'1','message'=>'Shopper status has been changed']);
        }
    }
    public function retailerstatus($id){
        $user=Retailer::find($id);
        if($user){
            if($user->status == 0){
                $user->status=1;
            }else if($user->status==1){
                $user->status=0;
            }
            $user->save();
            return Response::json(['success'=>'1','message'=>'Retailer status has been changed']);
        }
    }

    public function deleteshopper($id){
    	$del=Shopper::find($id);
    	if($del->delete()){
    		// unlink(public_path().'/assets/subcategory/'.$del->image);
    		// unlink(public_path().'/assets/subcategory/thumb/'.$del->image);
    		return Response::json(['success' => '1','message' => 'Shopper deleted successfully']);
    	}else{
    		return Response::json(['success' => '1','message' => 'Shopper not deleted']);
    	}
    }

    public function deleteretailer($id){
    	$del=Retailer::find($id);
    	if($del->delete()){
    		// unlink(public_path().'/assets/subcategory/'.$del->image);
    		// unlink(public_path().'/assets/subcategory/thumb/'.$del->image);
    		return Response::json(['success' => '1','message' => 'Retailer deleted successfully']);
    	}else{
    		return Response::json(['success' => '1','message' => 'Retailer not deleted']);
    	}
    }

}

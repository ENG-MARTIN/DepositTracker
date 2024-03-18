<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\CustomUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class CustomAuthController extends Controller
{
    public function login(){
        return view("auth.login");
    }

    public function registration(){
        return view("auth.registration");
    }
    public function registerUser(Request $request){
        $request->validate([
            'customerNumber'=>'required',
            'fullname'=>'required',
            'email'=>'required|email|unique:custom_users',
            'password'=> 'required|min:5|max:12'
        ]);
        $user= new CustomUsers();
        $user->customerNumber=$request->customerNumber;
        $user->fullname=$request->fullname;
        $user->email=$request->email;
        $user->password=Hash::make($request->password);
        $res=$user->save();
        if($res){
            return back()->with('success','You are successfully registered');
        }
        else{
            return back()->with('failed','Something went wrong');
        }
    }

    // ==============================Login form============================
    public function loginuser(Request $request){
        $request->validate([
            'email'=>'required|email:custom_users',
            'password'=> 'required'
        ]);
        $user=CustomUsers::where('email','=',$request->email)->first();
        if($user){
            if(Hash::check($request->password, $user->password)){
               $request->session()->put('loginId',$user->id); 
               return redirect('dashboard');
            }
            else{
                return back()->with('success','The password is not matching');
            }
            return back()->with('success','You are successfully registered');
    }
    else{
            return back()->with('failed','There is no account attached to this email');
        }
    }
    
    public function dashboard(){
        $data=array();
        if(Session::has('loginId')){
            $data=CustomUsers::where('id','=', Session::get('loginId'))->first();
        }
        return view('dashboard', compact('data'));
    }

    public function logout(){
        if(Session::has('loginId')){
            Session::pull('loginId');
            return redirect('login');
        }
    }
}
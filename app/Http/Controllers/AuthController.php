<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Auth;
use App\Models\User;
use App\Mail\ForgetPasswordMail;
use Mail;
use Str;

class AuthController extends Controller
{
    //
    public function login(){
        if(!empty(Auth::check())){
            if(Auth::user()->user_type == 1){
                return redirect('admin/dashboard');
            
            }
            else if(Auth::user()->user_type == 2){
                return redirect('teacher/dashboard');
            
            }
            else if(Auth::user()->user_type == 3){
                return redirect('student/dashboard');
            
            }
            else if(Auth::user()->user_type == 4){
                return redirect('parent/dashboard');
            
            }
        }
        return view('auth.login');
        

        // dd(Hash::make(123456));
    }
    public function loginAuth(Request $request ){

        // dd($request->all());

       

        $remember = !empty($request->remember)? true : false ;
        if(Auth::attempt(['email'=> $request->email, 'password'=> $request->password], true)){
            
            if(Auth::user()->user_type == 1){
                return redirect('admin/dashboard');
            
            }
            else if(Auth::user()->user_type == 2){
                return redirect('teacher/dashboard');
            
            }
            else if(Auth::user()->user_type == 3){
                return redirect('student/dashboard');
            
            }
            else if(Auth::user()->user_type == 4){
                return redirect('parent/dashboard');
            
            }
        }
        else{
            return redirect()->back()->with('error', 'Please enter correct email and password');
        }
    }

    public function logout(){
        Auth::logout();
        return redirect(url(''));
    }
    public function forgotpassword(){
        return view('auth.forgot');
    }

    public function postforgotpassword(Request $request){
        // dd($request->all());

        $checkEmail = User::getEmailSingle($request->email);
        // $checkEmail = User::where('email', '=', $request->email)->first();

        // dd($checkEmail);



        
        if(!empty($checkEmail)){
            // dd($checkEmail->email);
            $checkEmail->remember_token = Str::random(30);
            // dd($checkEmail);
            
             $checkEmail->save();
                Mail::to($checkEmail->email)->send(new ForgetPasswordMail($checkEmail));

            return redirect()->back()->with('success', "Please check your email and reset your password");
           
            
            
        }
        else{
            return redirect()->back()->with('error', "Email not Found in system");
        }
        // return view('auth.forgot');
    }

    public function reset($remember_token){
        $user = User::getTokenSingle($remember_token);
        // dd($remember_token);

        // dd($user);
        if(!empty($user))
         {
        // dd($user);

            $data['user'] = $user;
            return view('auth.reset', $data);
        }
        else{
            echo "Error";
        }

    }

    public function postreset($token,Request $request)
    {
        // dd($token);
    // dd($request);
    
    if($request->password == $request->cpassword)
    {
        // dd($request->password);
        
        $user = User::where('remember_token', '=', $token)->first();
        $user->password = Hash::make($request->password);
        // dd($user);
        $user->save();
        return redirect(url(''))->with('success', "password successfuly reset");

        }
        else{
            return redirect()->back()->with('error', "password and confirm Password does not match");
        }
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\Admin\AdminPasswordReset;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public function logOut()
    {
        Auth::logout();
        return redirect()->route('home');
    }
    public function login()
    {
        return view('admin.auth.login');
    }
    public function doLogin(Request $request)
    {

        // Creating Rules for Email and Password
        $validatedData = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        // create our user data for the authentication
        $userdata = array(
            'email' => $request->input('email'),
            'password' => $request->input('password'),
            'userType' => 1,
            'status'=>true
        );
        // attempt to do the login

        if (Auth::attempt($userdata)) {
            //Redirect to dashboard
            return redirect()->route('admin.dashboard');
        } else {
            // validation not successful, send back to form
            return back()->withInput()->with('error', 'Wrong Credentials');
        }
    }
    //Password reset
    public function resetPassword()
    {
        return view('admin.auth.passwordReset');
    }
    //Password reset action
    public function resetAction(Request $request)
    {
        // Creating Rules for Email and Password
        $validatedData = $request->validate([
            'email' => 'required|email'
        ]);

        $verify = User::where('email',$request->input('email'))->first();
        if (!isset($verify))
        {
            return back()->withInput()->with('error','Email is not registered to an account.');
        }



        $newToken = bin2hex(openssl_random_pseudo_bytes(30));

        $updateUser =User::where('email',$request->input('email'))->update([
            'remember_token'=>$newToken
        ]);
        if (!$updateUser)
        {
            return back()->withInput()->with('error','An unexpected error occurred.Please try again.');
        }

        $user = User::where('email',$request->input('email'))->first();

        Mail::to($verify)->send(new AdminPasswordReset($user));

        return redirect()->back()->withInput()->with('success','A password reset email has been sent to your account.');

    }
    //New password view
    public function newPassword($token)
    {
        $verifyToken = User::where('remember_token',$token)->first();

        if (!isset($verifyToken))
        {
            return redirect()->route('admin.password.reset')->with('error','Your reset token has expired.');
        }
        return view('admin.auth.password',[
            'details'=>$verifyToken
        ]);
    }
    //Submitting the new password
    public function submitPassword(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|email',
            'token' => 'required',
            'password' => ['required', 'string', 'min:8', 'confirmed']
        ]);

        $newToken = bin2hex(openssl_random_pseudo_bytes(30));

        $updatePassword = User::where('email',$request->input('email'))->where('remember_token',$request->input('token'));
        if (!$updatePassword)
        {
            return redirect()->route('admin.password.new',$request->input('token'))->with('success','Your reset token has expired.');
        }

        $update = User::where('email',$request->input('email'))->update([
            'password'=>Hash::make($request->input('password')),
            'remember_token'=>$newToken
        ]);

        if (!$update)
        {
            return redirect()->route('admin.password.reset')->with('error','Your reset token has expired.');
        }

        return redirect()->route('admin.login')->with('success','Password reset successfully.');

    }
    //Set password for new user
    public function activate($token)
    {
        $verify = User::where('remember_token',$token)->first();
        if (!isset($verify))
        {
            return redirect('admin.login')->with('error','Your refresh token has expired.Contact Admin');
        }

        return view('admin.auth.password',[
            'user'=>$verify
        ]);
    }
}

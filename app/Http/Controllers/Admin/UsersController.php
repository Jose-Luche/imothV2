<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use App\Http\Controllers\Controller;
use App\Mail\Admin\RegisterAdmin;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class UsersController extends Controller
{
    public function users()
    {
        $users = Admin::paginate(20);
        return view('admin.users.users',[
            'users'=>$users
        ]);
    }
    //New User
    public function newUser()
    {
        $roles = Role::all();
        return view('admin.users.create',[
            'roles'=>$roles
        ]);
    }
    //Register user
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'email'=>'required|unique:admins',
            'phone'=>'required|unique:admins',
            'role' => 'required'
        ]);

        $token = bin2hex(openssl_random_pseudo_bytes(30));
        $register = Admin::create([
            'firstName'=>$request->input('firstName'),
            'midName'=>$request->input('midName'),
            'lastName'=>$request->input('lastName'),
            'email'=>$request->input('email'),
            'phone'=>$request->input('phone'),
        ]);

        $addUser = User::create([
            'role'=>$request->input('role'),
            'email'=>$request->input('email'),
            'password'=>'x',
            'remember_token'=>$token,
            'userType'=>1,
            'refId'=>$register->id
        ]);

        if (!$addUser)
        {
            return back()->with('error','An unexpected error occurred.')->withInput();
        }
        Mail::to($addUser)->send(new RegisterAdmin($addUser));

        return redirect()->route('admin.users')->with('success','New user added successfully.');

    }
    //Activate account
    public function activate($token)
    {
        $user = User::where('remember_token',$token)->first();
        if (!isset($user))
        {
            return redirect()->route('admin.login')->with('error','Your token has expired.Contact Admin.');

        }
        return view('admin.auth.activate',[
            'details'=>$user
        ]);



    }
    //Activate Account
    public function activateAccount(Request $request)
    {
        $validatedData = $request->validate([
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $checkUser = User::where('email',$request->input('email'))->where('remember_token',$request->input('token'))->first();
        if (isset($checkUser))
        {
            $token = bin2hex(openssl_random_pseudo_bytes(30));
            $update = User::where('email',$request->input('email'))->update([
                'password' => Hash::make($request->input('password')),
                'remember_token'=>$token,
                'verification'=>1,
                'status'=>1
            ]);

            if (!$update)
            {
                return back()->withInput()->with('error','An unexpected error occurred.Please try again.');
            }

            return redirect()->route('admin.login')->with('error','Account activated.');
        }

        return redirect()->route('admin.login')->with('error','Account Token has expired.Contact IT.');
    }
    //User details
    public function details($id)
    {
        $userDetails = Admin::find($id);
        $roles = Role::all();

        return view('admin.users.details',[
            'details'=>$userDetails,
            'roles'=>$roles
        ]);
    }
    //Update user details
    public function update(Request $request,$id)
    {
        $validatedData = $request->validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'email'=>'required',
            'phone'=>'required',
            'role' => 'required'
        ]);
        $update = User::where('refId',$id)->update([
            'role'=>$request->input('role'),
            'email'=>$request->input('email'),
            'userType'=>$request->input('role'),
        ]);
        $updateAdmin = Admin::where('id',$id)->update([
            'firstName'=>$request->input('firstName'),
            'midName'=>$request->input('midName'),
            'lastName'=>$request->input('lastName'),
            'email'=>$request->input('email'),
            'phone'=>$request->input('phone'),
        ]);

        if (!$updateAdmin)
        {
            return back()->with('error','An unexpected error occurred.')->withInput();
        }

        return back()->with('success','User Details Updated successfully.');

    }
    //Delete User
    public function delete($id)
    {
        $userDetails = User::find($id);
        $userDetails->delete();

        return redirect()->route('admin.users')->with('success','User Deleted successfully.');

    }
    //Suspend User
    public function suspend($id)
    {
        $user = User::where('id',$id)->update([
            'status'=>false
        ]);

        return back()->with('success','User Suspended successfully.');

    }
    //Activate User
    public function activateUser($id)
    {
        $user = User::where('id',$id)->update([
            'status'=>true
        ]);

        return back()->with('success','User Activated successfully.');

    }
}

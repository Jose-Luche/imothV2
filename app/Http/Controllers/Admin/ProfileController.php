<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Validator;

class ProfileController extends Controller
{
    public  function profile()
    {
        $details = Admin::where('id',Auth::user()->refId)->first();

        return view('admin.profile.profile',[
            'details'=>$details
        ]);
    }
    //Update details
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'firstName' => 'required',
            'lastName' => 'required',
            'email' => 'required',
            'phone' => 'required|numeric',
            'gender' => 'required'
        ]);

        $update = Admin::where('id',Auth::user()->refId)->update([
            'firstName'=>$request->input('firstName'),
            'midName'=>$request->input('midName'),
            'lastName'=>$request->input('lastName'),
            'email'=>$request->input('email'),
            'phone'=>$request->input('phone'),
            'gender'=>$request->input('gender')
        ]);
        if (!$update)
        {
            return back()->with('error','An unexpected error occurred.Please try again.');
        }
        $updateAuth = User::where('id',Auth::user()->id)->update([
            'email'=>$request->input('email'),
        ]);

        if (!$update)
        {
            return back()->with('error','An unexpected error occurred.PLease try again.');
        }
        return back()->with('success','Profile details updated successfully.');
    }
    //Update avatar
    public function updateAvatar(Request $request)
    {
        $validate = $request->validate([
            'image' => 'required | mimes:jpeg,jpg,png,bmb,gif,svg',
        ]);
        $filenamewithextension = $request->file('image')->getClientOriginalName();

        //get filename without extension
        $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

        //get file extension
        $extension = $request->file('image')->getClientOriginalExtension();

        //filename to store
        $filenametostore = 'avatar/'.time().'.'.$extension;

        //Upload File to s3
        $storeImage = Storage::disk('public')->put($filenametostore, fopen($request->file('image'), 'r+'), 'public');

        $fileUrl = $filenametostore;
        if ($storeImage)
        {
            $storePath = Admin::where('id',Auth::user()->refId)
                ->update([
                    'avatar'=>$fileUrl,
                ]);
            return back()->with('success','Avatar Updated successfully.');
        }

        return back()->withInput()->with('error','Error uploading Image.Please reload the page and try again.');
    }
    //Update password
    public function updatePassword(Request $request)
    {
        $validatedData = $request->validate([
            'oldPassword' => 'required',
            'newPassword' => 'required|string|min:6',
            'confirmPassword' => 'required|same:newPassword',
        ]);

        if (!(Hash::check($request->get('oldPassword'), Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error","Your current password does not match with the password you provided. Please try again.");
        }

        if(strcmp($request->get('oldPassword'), $request->get('newPassword')) == 0){
            //Current password and new password are same
            return redirect()->back()->with("error","New Password cannot be same as your current password. Please choose a different password.");
        }
        if(strcmp($request->get('newPassword'), $request->get('confirmPassword')) != 0){
            //Current password and new password are same
            return redirect()->back()->with("error","Your new Passwords don't match.");
        }



        $newPassword = bcrypt($request->input('newPassword'));
        //Change Password
        $updatePassword = User::where('id',Auth::user()->id)
            ->update([
                'password'=>$newPassword,
            ]);
        if (!$updatePassword) {
            return redirect()->back()->with("error","ERROR!! An unexpected error occurred.Please reload and try again!");
        }

        return redirect()->back()->with("success","Password changed successfully !");
    }
}

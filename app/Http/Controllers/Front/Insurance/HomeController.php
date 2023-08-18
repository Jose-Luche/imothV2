<?php

namespace App\Http\Controllers\Front\Insurance;

use Illuminate\Http\Request;
use App\Models\HomeApplication;
use App\Mail\Admin\AdminHomeEmail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    public function index()
    {
        return view('front.home.index');
    }

    public function submitBio(Request $request){
        $validatedData = $request->validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'email' => 'required',
            'mobile' => 'required',
        ]);
        
        $application = new HomeApplication;
        $application->firstName = $request->firstName;
        $application->lastName = $request->lastName;
        $application->email = $request->email;
        $application->mobile = $request->mobile;

        $application->save();

        Mail::to(env('ADMIN_NOTIF_MAIL'))->send(new AdminHomeEmail($application));

        return redirect()->route('products')->with('success','Request placed successfully.We will get back to you shortly.');
    }
}

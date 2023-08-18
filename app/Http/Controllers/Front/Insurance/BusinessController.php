<?php

namespace App\Http\Controllers\Front\Insurance;

use Illuminate\Http\Request;
use App\Models\BusinessApplication;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Mail\Admin\AdminBusinessEmail;

class BusinessController extends Controller
{
    public function index()
    {
        return view('front.business.index');
    }

    public function submitBio(Request $request){
        $validatedData = $request->validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'email' => 'required',
            'mobile' => 'required',
        ]);
        
        $application = new BusinessApplication;
        $application->firstName = $request->firstName;
        $application->lastName = $request->lastName;
        $application->email = $request->email;
        $application->mobile = $request->mobile;

        $application->save();

        Mail::to(env('ADMIN_NOTIF_MAIL'))->send(new AdminBusinessEmail($application));

        return redirect()->route('products')->with('success','Request placed successfully.We will get back to you shortly.');
    }
}

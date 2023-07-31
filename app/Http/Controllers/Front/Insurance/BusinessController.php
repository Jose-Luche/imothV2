<?php

namespace App\Http\Controllers\Front\Insurance;

use Illuminate\Http\Request;
use App\Models\BusinessApplication;
use App\Http\Controllers\Controller;

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

        return redirect()->route('home')->with('success','Request placed successfully.We will get back to you shortly.');
    }
}

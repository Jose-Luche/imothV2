<?php

namespace App\Http\Controllers\Front\Insurance;

use Illuminate\Http\Request;
use App\Models\LifeApplication;
use App\Http\Controllers\Controller;

class LifeController extends Controller
{
    public function index()
    {
        return view('front.life.index');
    }

    public function submitBio(Request $request){
        $validatedData = $request->validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'email' => 'required',
            'mobile' => 'required',
        ]);
        
        $application = new LifeApplication;
        $application->firstName = $request->firstName;
        $application->lastName = $request->lastName;
        $application->email = $request->email;
        $application->mobile = $request->mobile;

        $application->save();

        return redirect()->route('home')->with('success','Request placed successfully.We will get back to you shortly.');
    }
}

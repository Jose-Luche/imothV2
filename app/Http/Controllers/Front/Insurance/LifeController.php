<?php

namespace App\Http\Controllers\Front\Insurance;

use Illuminate\Http\Request;
use App\Models\LifeApplication;
use App\Mail\Admin\AdminLifeEmail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

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
        
        Mail::to(env('ADMIN_NOTIF_MAIL'))->send(new AdminLifeEmail($application));

        return redirect()->route('products')->with('success','Request placed successfully.We will get back to you shortly.');
    }
}

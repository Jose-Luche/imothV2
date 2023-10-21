<?php

namespace App\Http\Controllers\Front;

use App\Models\ContactUs;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    public function index()
    {
        return view('front.pages.contact');
    }

    public function viewEnquiries()
    {
        $enquiries = ContactUs::all();
        return view('admin.contact.viewEnq', compact('enquiries'));
    }

    public function show(string $id)
    {
        $details = ContactUs::find($id);
        return view('admin.contact.details', compact('details'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|digits:10',
            'subject' => 'required',
            'message' => 'required',
        ]);

        if ($validator->fails()) {
            $notification = array(
                'message' => 'Please enter required fields.',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        } else {
            $data = $request->except(['_token']);
            ContactUs::create($data);

            return redirect()->back()->with('success', 'Enquiry sent successfully.We will get back to you shortly.');
        }
    }
}

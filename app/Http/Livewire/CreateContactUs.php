<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\ContactUs;

class CreateContactUs extends Component
{
    public $name;
    public $email;
    public $phone;
    public $subject;
    public $message;
    
    
    public function submit()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|digits:10',
            'subject' => 'required',
            'message' => 'required',
        ]);

        $data = ([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'subject' => $this->subject,
            'message' => $this->message,

        ]);

        ContactUs::create($data);

        
        
        return redirect()->route('contact.index')->with('success','Request placed successfully.We will get back to you shortly.');

        
    }
    public function render()
    {
        return view('livewire.create-contact-us');
    }
}

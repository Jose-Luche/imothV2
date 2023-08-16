<?php

namespace App\Mail\Admin;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AdminThirdParty extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;
    public $details;
    public $type;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($details,$type)
    {
        $this->details = $details;
        $this->type = $type;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Third Party Insurance Application .')->to('immaculateinsurance@gmail.com')
            ->view('emails.applications.admin.thirdParty');
    }
}

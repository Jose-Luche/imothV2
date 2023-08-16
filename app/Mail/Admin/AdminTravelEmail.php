<?php

namespace App\Mail\Admin;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AdminTravelEmail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;
    public $create;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($create)
    {
        $this->create = $create;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Travel Insurance Application.')->to('immaculateinsurance@gmail.com')
            ->view('emails.applications.admin.travel');
    }
}

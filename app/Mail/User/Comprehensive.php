<?php

namespace App\Mail\User;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Comprehensive extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;
    public $details;
    public $attachment;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($details,$attachment)
    {
        $this->details = $details;
        $this->attachment = $attachment;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Comprehensive Insurance Application .')
            ->view('emails.applications.user.comprehensive')
            ->attach($this->attachment);
    }
}

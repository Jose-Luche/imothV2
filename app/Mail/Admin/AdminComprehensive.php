<?php

namespace App\Mail\Admin;

use App\Mail\User\ThirdParty;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AdminComprehensive extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;
    public $details;
    public $type = 'submission';

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
        return $this->subject('Comprehensive Insurance Application .')
            ->view('emails.applications.admin.comprehensive');
    }
}

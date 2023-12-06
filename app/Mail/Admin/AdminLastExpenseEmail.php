<?php

namespace App\Mail\Admin;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AdminLastExpenseEmail extends Mailable
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

    public function build()
    {
        return $this->subject('Last Expense Insurance Application.')->to('imothinsurance@gmail.com')
            ->view('emails.applications.admin.last_expense');
    }
}

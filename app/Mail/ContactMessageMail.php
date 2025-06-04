<?php

namespace App\Mail;

use App\Models\ContactMessage;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactMessageMail extends Mailable
{
    use Queueable, SerializesModels;
    public $contact;

    /**
     * Create a new message instance.
     */
    public function __construct(ContactMessage $contact)
    {
        $this->contact = $contact;

    }

    
    public function build()
    {
        return $this->subject('New Contact Message Received')
                    ->markdown('emails.contact_message')
                    ->with(['contact' => $this->contact]);
    }


}

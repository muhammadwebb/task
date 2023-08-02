<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SendApplication extends Mailable
{
    use Queueable, SerializesModels;

    public array $application = [];
    public function __construct($application)
    {
        $this->application = $application;
    }


    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Send Application',
        );
    }


    public function content(): Content
    {
        return new Content(
            view: 'send-application',
            with: $this->application,
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}

<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SendAnswer extends Mailable
{
    use Queueable, SerializesModels;

    public array $answer = [];
    public function __construct($answer)
    {
        $this->answer = $answer;
    }


    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Send Answer',
        );
    }


    public function content(): Content
    {
        return new Content(
            view: 'send-answer',
            with: $this->answer
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

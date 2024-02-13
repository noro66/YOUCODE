<?php

namespace App\Mail;

use App\Models\Profile;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Attachment;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ProfileMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct(private readonly Profile $profile)
    {
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Profile Confirmaiton',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        $date = $this->profile->created_at;
        $id = $this->profile->id;
        $href = public_path() . 'verify_email'/ base64_decode($date . '///'. $id);
        return new Content(
            view: 'emails.inscription',
            with: [
                'name' => $this->profile->name,
                'email' => $this->profile->email
            ]
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

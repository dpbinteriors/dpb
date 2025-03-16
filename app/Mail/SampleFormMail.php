<?php

namespace App\Mail;

use App\Http\Requests\SampleFormPostRequest;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SampleFormMail extends Mailable
{
    use Queueable, SerializesModels;

    public mixed $form;
    public SampleFormPostRequest $request;

    /**
     * Create a new message instance.
     */
    public function __construct($form, $request)
    {
        $this->form = $form;
        $this->request = $request;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Sample Form Mail',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        $content = new Content(
            markdown: 'emails.samples.form',
        );

        return $content;
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        $file = $this->request->file;
        return [
            Attachment::fromData(fn() => $file->get(), $file->getClientOriginalName())
        ];
    }
}

<?php
namespace App\Mail;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Queue\SerializesModels;

class ContactFormMail extends Mailable
{
    use Queueable, SerializesModels;
    public array $data;
    public function __construct(array $data) { $this->data = $data; }
    public function envelope(): Envelope { 
        return new Envelope(
            from: new Address('no-reply@kosudgama.com', 'Website Koperasi'),
            replyTo: [new Address($this->data['email'], $this->data['nama'])],
            subject: 'Pesan Baru dari Website: ' . $this->data['subjek']
        ); 
    }
    public function content(): Content { return new Content(view: 'emails.contact'); }
    public function attachments(): array { return []; }
}

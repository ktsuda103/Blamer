<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactSendmail extends Mailable
{
    use Queueable, SerializesModels;

    private $email;
    private $category;
    private $content;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($contact)
    {
        $this->email = $contact['email'];
        $this->category = $contact['category'];
        $this->content = $contact['content'];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
        ->from($this->email)
        ->subject('自動送信メール')
        ->view('contact/mail')
        ->with([
            'email' => $this->email,
            'category' => $this->category,
            'contact' => $this->content,
        ]);
    }
}

<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Message;

class NewQuoteRequest extends Mailable
{
    use Queueable, SerializesModels;

    private $message;
    public function __construct(Message $messaggio)
    {
        $this->message = $messaggio;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('info@mycompany.com')->view('mails.new_request')->with(['messaggio' => $this->message]);
    }
}

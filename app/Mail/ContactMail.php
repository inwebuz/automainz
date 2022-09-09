<?php

namespace App\Mail;

use App\Models\Car;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\Contact;
use App\Models\Product;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $contact;
    protected $car;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Contact $contact, Car $car = null)
    {
        $this->contact = $contact;
        if ($car) {
            $this->car = $car;
        }
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.contact', ['contact' => $this->contact, 'car' => $this->car]);
    }
}


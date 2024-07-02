<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SignupVerification extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $verification_token, $firstname;
    public function __construct($verification_token, $firstname)
    {
        $this->firstname = $firstname;
        $this->verification_token = $verification_token;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        return $this->markdown('emails.signup.verification')->with([
            'firstname' => $this->firstname,
            'verification_token' => $this->verification_token,
        ]);
    }
}

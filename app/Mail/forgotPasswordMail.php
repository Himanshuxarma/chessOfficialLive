<?php

namespace App\Mail;
use App\Models\User;	

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class forgotPasswordMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        // dd($user);
        // dd($contacts);
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
 
    {
        // dd($this->contacts['subject']);
        return $this->subject('ChessOfficial : Reset Your Password')->view('email.forgetPassword');
    }
}

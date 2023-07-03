<?php

namespace App\Mail;
use App\Models\User;	

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class newCustomerMail extends Mailable
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
        return $this->subject('Welcome Email')->view('email.newCustomerMail'); die;
        // return $this->subject('Contact Message')->view('email.contactmail');
    }
}

<?php

namespace App\Mail;
use App\Models\User;
use App\Models\Demo;	

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class demoBookingMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $demo;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user, Demo $demo)
    {
        // dd("singh");
        // dd($user);
        $this->user = $user;
        $this->demo = $demo;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(){
        // dd($this->contacts['subject']);
        return $this->subject('Received a Demo Booking')->view('email.demoBookingMail');
        // return $this->subject('Contact Message')->view('email.contactmail');
    }
}

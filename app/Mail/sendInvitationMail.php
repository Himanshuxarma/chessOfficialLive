<?php

namespace App\Mail;
use App\Models\User;
use App\Models\Demo;	
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class sendInvitationMail extends Mailable
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
        return $this->subject('Demo Invitation Link')->view('email.demoInvitationMail');
        // return $this->subject('Contact Message')->view('email.contactmail');
    }
}

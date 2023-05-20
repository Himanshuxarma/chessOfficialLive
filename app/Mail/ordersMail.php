<?php

namespace App\Mail;
use App\Models\User;
use App\Models\Order;	

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ordersMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $order;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user, Order $order)
    {
        // dd("singh");
        // dd($user);
        $this->user = $user;
        $this->order = $order;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
 
    {
        // dd($this->contacts['subject']);
        return $this->subject('Received a Order')->view('email.ordersMail');
        // return $this->subject('Contact Message')->view('email.contactmail');
    }
}

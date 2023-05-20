<?php

namespace App\Mail;
use App\Models\User;
use App\Models\Order;	
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class sendOrderInvitationMail extends Mailable
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
        $this->user = $user;
        $this->order = $order;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(){
        // dd($this->contacts['subject']);
        return $this->subject('Order Invitation Link')->view('email.orderInvitationMail');
        // return $this->subject('Contact Message')->view('email.contactmail');
    }
}

<?php

namespace App\Mail;
use App\Models\Enquiry;	

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    public $contacts;



    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Enquiry $contacts)
    {
        // dd("singh");
        // dd($contacts);
        $this->contacts = $contacts;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
 
    {
        // dd($this->contacts['subject']);
        return $this->subject('Contact US - '. $this->contacts['subject'])->view('email.contactmail');
        // return $this->subject('Contact Message')->view('email.contactmail');
    }
}

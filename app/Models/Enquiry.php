<?php

namespace App\Models;
use Mail;

use App\Mail\ContactMail;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enquiry extends Model
{
    use HasFactory;
    public $fillable = ['name', 'email', 'phone', 'subject', 'message'];

  

    /**

     * Write code on Method

     *

     * @return response()

     */

    public static function boot() {

  

        parent::boot();

  

        static::created(function ($contacts) {
            // dd($contacts);

                

            $adminEmail = "admin@w3esolutions.com";

            Mail::to($adminEmail)->send(new ContactMail($contacts));

        });

    }
}

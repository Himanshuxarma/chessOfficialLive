<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    use HasFactory;
    protected $table = 'testimonials';

    public function CountryID(){
        return $this->hasOne('App\Models\Country', 'id', 'country_id');
    }
}

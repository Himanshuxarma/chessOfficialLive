<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';

    public function course(){
        return $this->belongsTo('App\Models\Course', 'course_id', 'id');
    }
    public function users(){
        return $this->belongsTo('App\Models\User', 'customer_id', 'id');
    }
    public function CountryID(){
        return $this->hasOne('App\Models\Country', 'id', 'country_id');
    }
    public function TimeZone(){
        return $this->hasOne('App\Models\CountryTimezone', 'id', 'timezone_id');
    }
}

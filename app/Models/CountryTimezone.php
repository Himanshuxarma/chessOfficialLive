<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CountryTimezone extends Model
{
    use HasFactory;
    protected $table = 'country_timezones';

    public function CountryID(){
        return $this->hasOne('App\Models\Country', 'id', 'country_id');
    }
}

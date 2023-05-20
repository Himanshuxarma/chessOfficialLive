<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoursePrice extends Model
{
    use HasFactory;

    protected $table = 'course_prices';

    public function courseprice(){
        return $this->hasOne('App\Models\Course', 'id', 'course_id');
    }
    public function CountryID(){
        return $this->hasOne('App\Models\Countries', 'id', 'country_id');
    }
}

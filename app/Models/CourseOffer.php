<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Offer;
use App\Models\Course;
use App\Models\Country;

class CourseOffer extends Model
{   
    use HasFactory;
    protected $table = 'course_offers';

    public function course(){
        return $this->belongsTo(Course::class, 'course_id');
    }
    public function offer(){
        return $this->belongsTo(Offer::class, 'offer_id');
    }
    public function CountryID(){
        return $this->belongsTo(Country::class, 'country_id');
    }
}


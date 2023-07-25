<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CoursePrice;
use Session;

class Course extends Model
{
    use HasFactory;
 
    protected $table = 'courses';

    public function prices(){
        return $this->hasMany(CoursePrice::class, 'course_id');
    }
    public function coursePrice($courseId=null){
        $setCountryId = Session::get('SiteCountry');
        // dd($setCountryId);
        $coursePrice = CoursePrice::where('course_id', $courseId)->where('country_id', $setCountryId)->select('currency', 'first_price', 'second_price')->first();
        return $coursePrice;
    } 
}

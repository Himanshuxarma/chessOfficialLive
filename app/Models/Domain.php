<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Domain extends Model
{
    use HasFactory;
    protected $table = 'domains';

    public function techstack(){
        return $this->hasOne('App\Models\Techstack', 'id', 'technology');
    }
    public function projects(){
        return $this->hasOne('App\Models\Project', 'id', 'title');
    }
    
}

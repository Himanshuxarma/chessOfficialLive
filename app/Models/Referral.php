<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Referral extends Model
{
    use HasFactory;
    protected $table = 'referrals';

    public function users(){
        return $this->belongsTo('App\Models\User', 'new_user_id', 'id');
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'sent_by',
        'sent_to_email',
        'new_user_id',
        'referrer_offer_percentage',
        'referee_offer_percentage',
        'is_referrer_used',
        'is_referee_used',
        'status'
    ];
}

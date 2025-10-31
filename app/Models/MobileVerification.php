<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MobileVerification extends Model
{
    //
    protected $fillable = ['mobile','otp','expires_at','used'];
    protected $casts = [
        'expires_at' => 'datetime',
        'used' => 'boolean',
    ];
}

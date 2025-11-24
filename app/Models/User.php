<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
  
    use Notifiable;

    protected $fillable = [
        'first_name','last_name','mobile','date_of_birth','gender','id_type',
        'id_number','country_of_issue','email','employer','street','suburb',
        'city','postal_code','province','is_verified','work_permit_issue_date', 'work_permit_expiry_date'
    ];

    public function documents()
    {
        return $this->hasMany(Document::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    //
    protected $fillable = ['user_id','document_type_id','type','path'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function DocumentType()
    {
        return $this->belongsTo(DocumentType::class);
    }
}

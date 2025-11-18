<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DocumentType extends Model
{
    //
    protected $fillable = ['name'];
    
    public function Document()
    {
        return $this -> hasMany(Document::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class books extends Model
{
    public function authors()
    {
        return $this->belongsTo(authors::class);
    }

   
}

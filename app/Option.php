<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    public function question()
    {
        return $this->belongsTo(Question::class);
    }
}

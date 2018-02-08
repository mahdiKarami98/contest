<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    public function bank(){
        return $this->hasOne(Bank::class);
    }

    public function exams(){
        return $this->hasMany(Exam::class);
    }

    public function options(){
        return $this->hasMany(Option::class);
    }

    public function users()
    {
        return $this->hasManyThrough(User::class, Exam::class);
    }
}

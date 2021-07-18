<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{
    protected $guarded = [];
    protected $with = ['course'];

    public function course(){
        return $this->hasOne(Course::class);
    }
}

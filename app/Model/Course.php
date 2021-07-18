<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $guarded = [];

//    protected $with = ['lastEvaluation'];


    protected $hidden = ['search_text', 'created_at', 'updated_at'];

    public function teacher(){
        return $this->hasOne(User::class , 'teacher_id', 'id');
    }

    public function lastEvaluation(){
        return $this->belongsTo(Evaluation::class , 'evaluation_id', 'id');
    }

    public function lesions(){
        return $this->hasMany(Course::class , 'parent_id', 'id')
            ->with('lastEvaluation');
    }
}

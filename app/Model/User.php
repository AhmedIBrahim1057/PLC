<?php

namespace App\Model;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens , HasRoles ,  Notifiable;

    const STUDENT = 0;
    const TEACHER = 1;


    protected $with = ['skills'];
    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'search_text', 'created_at', 'updated_at',
    ];


    public function skills(){
        return $this->belongsToMany(Skill::class , 'teachers_skills', 'teacher_id','skill_id','id','id');
    }

    public function teachers(){
        return $this->belongsToMany(User::class , 'students_teachers','student_id','teacher_id' ,'id','id')
            ->withPivot('status');
    }

    public function courses(){
        return $this->belongsToMany(Course::class , 'student_course','student_id','course_id' ,'id','id')
            ->withPivot('status');
    }

    public function coursesAsTeacher(){
        return $this->hasMany(Course::class , 'teacher_id', 'id');
    }

    public function tasks(){
        return $this->hasMany(Evaluation::class , 'teacher_id' , 'id');
    }

    public function students(){
        return $this->belongsToMany(User::class , 'students_teachers','teacher_id','student_id' ,'id','id')
            ->withPivot('status');
    }
}

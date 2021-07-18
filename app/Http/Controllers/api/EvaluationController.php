<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Model\Course;
use App\Model\Evaluation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EvaluationController extends Controller
{

    public function save(Request $request , Evaluation $evaluation = null){

        if (!$evaluation){
            $evaluation = new  Evaluation();
        }
        $course = Course::find($request->course_id);

        $evaluation->fill($request->except('file'));
        $evaluation->title = $course->title;
        $evaluation->student_id =Auth::user()->id;
        $evaluation->save();
        $course->evaluation_id = $evaluation->id;
        $course->save();

        if ($request->has('file')) {
            saveRequestFile($request->file('file'), "$evaluation->id", 'tasks');
        }
        return response(['course' => $evaluation], 201);
    }

    public function content(Request $request, Evaluation $evaluation)
    {
        $paths = findFiles('tasks', "$evaluation->id");
        return responseFile($paths[0], "$evaluation->id");
    }
}

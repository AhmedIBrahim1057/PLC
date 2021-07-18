<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Model\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class CourseController extends Controller
{


    public function index(Request $request)
    {

        $offset = ($request->offset) ? $request->offset : 0;
        $limit = ($request->limit) ? $request->limit : 10;

        $query = Course::select('*');

        if ($request->search_text) {
            $textSearch = mb_ereg_replace(" ", "%", getFTS($request->search_text));
            $query->where(\DB::raw("COALESCE(search_text,'')"), "like", "%$textSearch%");
        }

        $query->where('removed', ($request->removed !== null) ? $request->removed : 0);


        if ($limit > 0) {
            $query->offset($offset);
            $query->limit($limit + 1);
        }

        $direction = ($request->order_direction) ? $request->order_direction : 'ASC';

        if ($request->order_by == null || $request->order_by == "id") {
            $query->orderBy('id', $direction);
        } else {
            $query->orderBy($request->order_by, $direction);
            $query->orderBy('id');
        }

        $courses = $query->get()->toArray();

        return response()->json(['courses' => $courses], 200);
    }

    public function show(Request $request, Course $course)
    {
        $course->lesions;
        $teachers = Auth::user()->teachers()->select('id', 'name')->get();
        return response(['course' => $course , 'teachers' => $teachers], 200);
    }

    public function save(Request $request, Course $course = null)
    {

        $validations = [
            'title' => 'required|max:55',
            'description' => 'required',
        ];
        $validator = Validator::make($request->all(), $validations);

        if ($validator->fails())
            return response()->json(['error' => implode(" - ", $validator->errors()->all())], 500);

        if (!$course) {
            $course = new Course();
        }
        $course->fill($request->except('file'));
        $course->save();

        if ($request->has('file')) {
//            $paths = findFiles('Courses_file', "$course->title($course->id)");
//            deleteFile($paths[0]);
            saveRequestFile($request->file('file'), "$course->title($course->id)", 'Courses_file');
        }

        return response(['course' => $course], 201);
    }

    public function add(Course $course, int $status)
    {
        auth()->user()->courses()->syncWithoutDetaching([$course->id => ['status' => $status]]);
        return response(['status' => true], 200);
    }

    public function delete(Request $request, Course $course)
    {
        $course->lesions()->delete();
        $course->delete();
        return response(['status' => true], 204);
    }


    public function content(Request $request, Course $course)
    {
        $paths = findFiles('Courses_file', "$course->title($course->id)");
        return responseFile($paths[0], "$course->title($course->id)");
    }
}

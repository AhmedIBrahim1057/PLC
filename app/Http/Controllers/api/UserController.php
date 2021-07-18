<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Model\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class UserController extends Controller
{

    public function index(Request $request)
    {


        $offset = ($request->offset) ? $request->offset : 0;
        $limit = ($request->limit) ? $request->limit : 10;

        $query = User::select('*');

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

        $users = $query->get()->toArray();

        return response()->json(['users' => $users], 200);
    }

    //not worked well
    public function show(Request $request, User $user)
    {
        $courses = $user->courses()->get();
        $teachers = $user->teachers()->get();
        $tasks = Auth::user()->tasks()->get();
        return response(['user' => $user , 'tasks' => $tasks , 'courses' => $courses , 'teachers' => $teachers], 200);
    }

    public function teachers(Request $request)
    {

        $offset = ($request->offset) ? $request->offset : 0;
        $limit = ($request->limit) ? $request->limit : 10;

        $query = User::select('*')->whereType(User::TEACHER);

        if ($request->search_text) {
            $textSearch = mb_ereg_replace(" ", "%", getFTS($request->search_text));
            $query->where(\DB::raw("COALESCE(search_text,'')"), "like", "%$textSearch%");
        }
        if ($limit > 0) {
            $query->offset($offset)->limit($limit + 1);
        }

        $teachers = $query->get()->toArray();

        $more = ($limit > 0 && count($teachers) > $limit);
        if ($more) array_pop($teachers);

        return response()->json(['teachers' => $teachers, 'more' => $more], 200);

    }

    public function save(Request $request, User $user = null)
    {

        $validations = [
            'name' => 'required|max:55',
            'email' => "email|required|unique:users".(($user)?",id,$user->id":"")
        ];
        if (!$user) {
            $validations['password'] = 'required|confirm';
        }
        $validator = Validator::make($request->all(), $validations);


        if ($validator->fails())
            return response()->json(['error' => implode(" - ", $validator->errors()->all())], 500);

        $data = $request->except('confirm_password', 'skills');
        if ($request->has('password')) {
            $data['password'] = Hash::make($request->password);
        }

        if (!$user) {
            $user = new User();
        }

        $user->fill($data);
        $user->save();

        return response(['user' => $user], 201);
    }

    public function delete(Request $request, User $user)
    {
        $user->removed = 1;
        $user->save();
        return response(['status' => true], 200);
    }

    public function register(Request $request)
    {

        $validations = [
            'name' => 'required|max:55',
            'email' => 'email|required|unique:users',
            'password' => 'required',
            'confirm_password' => 'required|same:password'
        ];


        $validator = Validator::make($request->all(), $validations);

        if ($validator->fails())
            return response()->json(['error' => implode(" - ", $validator->errors()->all())], 500);

        $data = $request->except('confirm_password');
        $data['password'] = Hash::make($request->password);

        $user = User::create($data);

        $accessToken = $user->createToken('authToken')->plainTextToken;

        return response(['user' => $user, 'access_token' => $accessToken], 201); //
    }

    public function login(Request $request)
    {

        $validations = [
            'email' => 'email|required',
            'password' => 'required'
        ];

        $validator = Validator::make($request->all(), $validations);

        if ($validator->fails())
            return response()->json(['error' => implode(" - ", $validator->errors()->all())], 500);

        if (!auth()->attempt($request->all())) {
            return response(['message' => 'This User does not exist, check your details'], 400);
        }

        $accessToken = auth()->user()->createToken('authToken')->plainTextToken;

        return response(['user' => auth()->user(), 'access_token' => $accessToken]); //, 'access_token' => $accessToken
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response()->json(['success' => true], 200);
    }

    public function add(User $user, int $status)
    {
        auth()->user()->teachers()->syncWithoutDetaching([$user->id => ['status' => $status]]);
        return response(['status' => true], 200);
    }
}

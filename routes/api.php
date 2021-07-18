<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\UserController;
use App\Http\Controllers\api\RolesController;
use App\Http\Controllers\api\LogsController;
use App\Http\Controllers\api\CourseController;
use App\Http\Controllers\api\StoryController;
use App\Http\Controllers\api\EvaluationController;



/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware(['auth:api', 'cors'])->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('courses/content/{course}', [CourseController::class, 'content']);
Route::get('evaluation/content/{evaluation}', [EvaluationController::class, 'content']);
Route::post('stories', [StoryController::class, 'index']);
Route::post('stories/save', [StoryController::class, 'save']);

Route::group(['middleware' => 'cors'], function () {

    Route::post('register', [UserController::class, 'register']);
    Route::post('login', [UserController::class, 'login']);
});

Route::group(['middleware' => 'auth:sanctum'], function () {


    Route::post('users', [UserController::class, 'index']);
    Route::post('teachers', [UserController::class, 'teachers']);
    Route::get('users/show/{user}', [UserController::class, 'show']);
    Route::put('users/save/{user?}', [UserController::class, 'save']);
    Route::delete('users/delete/{user}', [UserController::class, 'delete']);
    Route::post('users/add/{user}/{status}', [UserController::class, 'add']);
    Route::post('logout', [UserController::class, 'logout']);


    Route::post('courses', [CourseController::class, 'index']);
    Route::get('courses/show/{course}', [CourseController::class, 'show']);
    Route::post('courses/save/{course?}', [CourseController::class, 'save']);
    Route::delete('courses/delete/{course}', [CourseController::class, 'delete']);
    Route::post('courses/add/{course}/{status}', [CourseController::class, 'add']);

    Route::post('evaluation/save/{evaluation?}', [EvaluationController::class, 'save']);

    Route::get('roles', [RolesController::class, 'index']);
    Route::get('roles/{role?}', [RolesController::class, 'get']);
    Route::put('roles/{role?}', [RolesController::class, 'put']);
    Route::delete('roles/{role}', [RolesController::class, 'delete']);
    Route::put('user/roles/{user}', [RolesController::class, 'sync']);
    Route::get('user/roles/{user}', [RolesController::class, 'user']);


    Route::post('logs', [LogsController::class, 'index']);
    Route::get('logs/{log}', [LogsController::class, 'get']);

});


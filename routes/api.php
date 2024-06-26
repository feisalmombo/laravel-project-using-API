<?php

use Illuminate\Http\Request;
use App\Http\Controllers\Api\StudentController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('v1/students', [StudentController::class, 'apiindex']);


Route::post('/register', [RegisterController::class, 'store']);

Route::post('/login', [LoginController::class, 'check']);

Route::get('students', [StudentController::class, 'index']);

Route::post('students', [StudentController::class, 'store']);

Route::get('students/{id}', [StudentController::class, 'show']);

Route::get('students/{id}/edit', [StudentController::class, 'edit']);

Route::put('students/{id}/edit', [StudentController::class, 'update']);

Route::delete('students/{id}/delete', [StudentController::class, 'destroy']);


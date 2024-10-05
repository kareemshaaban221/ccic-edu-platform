<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CourseController;
use App\Http\Controllers\Api\LocationController;
use App\Http\Controllers\Api\StudentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// guest routes
Route::post('/auth/login', [AuthController::class, 'login']);
Route::post('/auth/register', [AuthController::class, 'register']);

Route::middleware('auth:sanctum')->group(function () {
    // students
    Route::get('/students', [StudentController::class, 'index']);
    Route::get('/students/{id}', [StudentController::class, 'show']);
    Route::delete('/students/{id}', [StudentController::class, 'destroy']);

    // * HTTP VERBS
    // GET, POST, PUT, PATCH, DELETE, OPTIONS
    // GET => retrieve resource
    // POST => Store resource
    // PUT => Update entire resource
    // PATCH => Update partial data of resource
    // DELETE => Delete resource

    // locations
    Route::get('/students/locations', [LocationController::class, 'index']);

    // courses
    Route::get('/courses', [CourseController::class, 'index']);

    // logout
    Route::get('/auth/logout', [AuthController::class, 'logout']);
});

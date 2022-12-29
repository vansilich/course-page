<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MailRefferalController;
use App\Http\Controllers\UserSignUpController;
use App\Http\Controllers\CourseRegisterController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('course.kompas_3d.valve_modeling');
})->name('home');

Route::get('/courses/compas-3d/valve-modeling', function () {
    return view('pages.courses.kompas_3d.valve_modeling');
})->name('course.kompas_3d.valve_modeling');

Route::get('/courses/compas-3d/for-beginners', function () {
    return view('pages.courses.kompas_3d.for_beginners');
})->name('course.kompas_3d.for_beginners');

Route::post('/sign-up/course/{course_slug}', [CourseRegisterController::class, 'register']);

Route::get('/refferal', MailRefferalController::class);

Route::post('/sign-up/future/compas-3D', [UserSignUpController::class, 'futureSignUp']);
// @deprecated
Route::post('/send/request', [UserSignUpController::class, 'getRequest']);

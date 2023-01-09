<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MailRefferalController;
use App\Http\Controllers\UserSignUpController;
use App\Http\Controllers\CourseRegisterController;
use App\Http\Controllers\CourseFutureRegisterController;
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
    return redirect()->route('course.kompas_3d.valve_modeling')->with('hash', '123123');
})->name('home');

Route::prefix('courses')->group(function () {

    Route::get('/compas-3d/valve', function () {
        return view('pages.courses.kompas_3d.valve_modeling');
    })->name('course.kompas_3d.valve_modeling');
    // ======
    Route::get('/compas-3d/for-beginners', function () {
        return view('pages.courses.kompas_3d.for_beginners');
    })->name('course.kompas_3d.for_beginners');
});

Route::post('/sign-up/course/{course_slug}', [CourseRegisterController::class, 'register'])
    ->name('course.sign-up');
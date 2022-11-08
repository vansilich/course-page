<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MailRefferalController;
use App\Http\Controllers\UserSignUpController;
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
    return view('index');
})->name('home');

Route::get('/refferal', MailRefferalController::class);

Route::post('/sign-up/future/compas-3D', [UserSignUpController::class, 'futureSignUp']);
Route::post('/send/request', [UserSignUpController::class, 'getRequest']);

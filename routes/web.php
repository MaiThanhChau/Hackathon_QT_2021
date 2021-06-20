<?php
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
use Illuminate\Http\Request;
use App\Http\Controllers\admin\questionController;
use App\Http\Controllers\admin\answerController;

Route::get('/', [ App\Http\Controllers\Website\HomeController::class,'index' ])->middleware('auth')->name('Home');
Route::post('input', [ App\Http\Controllers\Website\HomeController::class,'input' ])->name('Input');
Route::get('login', [ App\Http\Controllers\Website\UserController::class,'login' ])->name('login');
Route::post('login', [ App\Http\Controllers\Website\UserController::class,'checklogin' ])->name('postLogin');
Route::get('signup', [ App\Http\Controllers\Website\UserController::class,'signup' ])->name('Signup');
Route::post('signup', [ App\Http\Controllers\Website\UserController::class,'createuser' ])->name('postSignup');

Route::group(['prefix' => 'admin'], function ()
{
   Route::resource('question', questionController::class);
   Route::resource('answer', answerController::class);

});
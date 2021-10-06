<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\PostController;
use App\Models\Customer;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class,'index'])
    ->name('home')
    ->middleware('auth');

Route::get('customer/login',[CustomerController::class,'loginform']);

Route::post('customer/login',[CustomerController::class,'login']);

Route::resource('post',PostController::class);
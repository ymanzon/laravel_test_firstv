<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LogController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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
/*
Route::get('/', function () {
    return view('welcome');
});*/

Route::resource('users', UserController::class);
Route::resource('products', ProductController::class);
Route::resource('events', LogController::class);
Route::resource('/', HomeController::class);

Route::post('/users/{user}/toggle-active', [UserController::class, 'toggleActive'])->name('users.toggleActive');
Route::post('/products/{product}/toggle-active', [ProductController::class, 'toggleActive'])->name('products.toggleActive');

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
Route::get('user', [AuthController::class, 'getAuthenticatedUser']);

Route::group(['middleware' => ['jwt.auth']], function() {
    Route::get('user', [AuthController::class, 'getAuthenticatedUser']);
});
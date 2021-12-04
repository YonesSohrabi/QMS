<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CourseController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::resource('/users',UserController::class)
    ->except('destroy','show');
Route::put('users/{user}/statusUpdate/{status}',[UserController::class, 'setStatus'])
    ->name('users.status');

Route::resource('/courses',CourseController::class)
    ->except('show');

require __DIR__.'/auth.php';

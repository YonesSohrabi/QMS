<?php

use App\Http\Controllers\ExamController;
use Carbon\Carbon;
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

Route::middleware('auth')->group(function (){
    Route::resource('users',UserController::class)
        ->except('destroy','show');
    Route::put('/users/{user}/statusUpdate/{status}',[UserController::class, 'setStatus'])
        ->name('users.status');
});

Route::middleware('auth')->group(function (){
    Route::resource('courses',CourseController::class);
    Route::get('courses/{course}/students',[CourseController::class,'studentList'])
        ->name('courses.studentList');
    Route::post('courses/{course}/students',[CourseController::class,'addUserToCourse'])
        ->name('courses.addUser');
    Route::put('courses/{id}/students/{user_id}',[CourseController::class,'deleteUserFromCourse'])
        ->name('courses.deleteUser');
    Route::get('courses/{course}/exams',[ExamController::class,'examsList'])
        ->name('courses.exams');
    Route::get('courses/{course}/exams/create',[ExamController::class,'create'])
        ->name('courses.createExam');
    Route::post('courses/{course}/exams/create',[ExamController::class,'store'])
        ->name('courses.storeExam');
    Route::delete('courses/{course}/exams/{exam}',[ExamController::class,'destroy'])
        ->name('courses.deleteExam');
});

Route::middleware('auth')->group(function (){
    Route::get('exams',[ExamController::class,'index']);
    Route::get('exams/{exam}/edit',[ExamController::class,'edit'])
        ->name('exams.edit');
    Route::put('exams/{exam}',[ExamController::class,'update'])
        ->name('exams.update');
    Route::post('exams/{exam}/edit',[ExamController::class, 'addNewQuiz'])
        ->name('exams.addNewQuiz');
    Route::post('exams/{exam}/edit',[ExamController::class, 'addQuizFromBank'])
        ->name('exams.addQuizFromBank');
});


require __DIR__.'/auth.php';

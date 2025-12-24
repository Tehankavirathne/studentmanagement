<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\BatchController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\PaymetController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\AuthController;


Route::get('/', function () {
    return redirect()->route('students.index');
});

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');

Route::resource('students', StudentController::class);
Route::resource('teachers', TeacherController::class);
Route::resource('courses', CourseController::class);
Route::resource('batches', BatchController::class);
Route::resource('enrollments', EnrollmentController::class);
Route::resource('payments', PaymetController::class);
Route::get('/report/report1/{pid}', [ReportController::class, 'report1']);



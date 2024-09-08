<?php

use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Roles\RoleController;
use Illuminate\Support\Facades\Route;




// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [AuthenticatedSessionController::class, 'create'])
->name('login');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::group(['middleware' => ['auth', 'verified']], function () {
    // Admin Routes
    Route::group(['prefix' => 'admin', 'middleware' => ['role:admin'], 'as' => 'admin.'], function () {
        Route::get('/dashboard',[RoleController::class, 'index'])->name('dashboard');
        // add student
        Route::get('student',[StudentController::class, 'student'])->name('student');
        Route::post('add/student',[StudentController::class, 'addStudent'])->name('add.student');
    });
    // Student Routes
    Route::group(['prefix' => 'student', 'middleware' => ['role:student'], 'as' => 'student.'], function () {
        Route::get('/dashboard',[RoleController::class, 'index'])->name('dashboard');
    });
    // Teacher Routes
    Route::group(['prefix' => 'teacher', 'middleware' => ['role:teacher'], 'as' => 'teacher.'], function () {
        Route::get('/dashboard',[RoleController::class, 'index'])->name('dashboard');
    });
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Dean\DeanController;
use App\Http\Controllers\Dean\ProgramController;
use App\Http\Controllers\Dean\SemesterController;
use App\Http\Controllers\Dean\SubjectController;
use App\Http\Controllers\Dean\YearLevelController;
use App\Http\Controllers\Department\DepartmentController;
use App\Http\Controllers\ProfileController;
// use App\Http\Controllers\Registrar\ProgramController;
use App\Http\Controllers\Registrar\RegistrarProgramController;
use App\Http\Controllers\Roles\RoleController;
use App\Http\Controllers\Student\EnrollmentController;
use Illuminate\Contracts\Routing\Registrar;
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

        // add teacher
        Route::get('teacher',[AdminController::class, 'teacher'])->name('teacher');
        Route::post('add/teacher',[AdminController::class, 'addTeacher'])->name('add.teacher');
        
        // add student
        Route::get('student',[StudentController::class, 'student'])->name('student');
        Route::post('add/student',[StudentController::class, 'addStudent'])->name('add.student');

        // add department
        Route::get('department',[DepartmentController::class, 'department'])->name('department');
        Route::post('add/department',[DepartmentController::class, 'addDepartment'])->name('add.department');
    });

    // Dean Routes
    Route::group(['prefix' => 'dean', 'middleware' => ['role:dean'], 'as' => 'dean.'], function () {
        Route::get('/dashboard',[RoleController::class, 'index'])->name('dashboard');
         // add teacher
         Route::get('teacher',[DeanController::class, 'teacher'])->name('teacher');
         Route::post('add/teacher',[DeanController::class, 'addTeacher'])->name('add.teacher');
        //  manage program
        Route::get('academic',[DeanController::class, 'academic'])->name('academic');
        Route::post('semester',[DeanController::class, 'semester'])->name('semester');
        // Semester Controller
        Route::get('semester/manage/{abbrev}/{semester}',[SemesterController::class, 'manageAcademicYear'])->name('semester.manage');
        Route::post('semester/manage/update',[SemesterController::class, 'updateAcademicYear'])->name('semester.manage.update');
        Route::get('semester/manage/delete/{id}',[SemesterController::class, 'delete'])->name('semester.manage.delete');
        
        // subjects
        Route::get('subjects',[SubjectController::class, 'subject'])->name('subjects');
        Route::post('subjects/store',[SubjectController::class, 'store'])->name('subjects.store');
        Route::post('subjects/update',[SubjectController::class, 'update'])->name('subjects.update');
        
        //year level store
        Route::post('year-level/store',[YearLevelController::class, 'store'])->name('level.store');
        Route::post('year-level/update',[YearLevelController::class, 'update'])->name('level.update');
        Route::get('subjects/destroy/{id}',[YearLevelController::class, 'destroy'])->name('subjects.destroy');

        Route::get('program',[ProgramController::class, 'program'])->name('program');
        Route::post('program/add',[ProgramController::class, 'addProgram'])->name('program.add');
    });

    // Registrar Routes
    Route::group(['prefix' => 'registrar', 'middleware' => ['role:registrar'], 'as' => 'registrar.'], function () {
        Route::get('/dashboard',[RoleController::class, 'index'])->name('dashboard');
        Route::get('/program',[RegistrarProgramController::class, 'program'])->name('program');

        // open program with created year level and subjects inside
        Route::get('/program/enroll/{id}',[RegistrarProgramController::class, 'enroll'])->name('enroll');
    });

    // Student Routes
    Route::group(['prefix' => 'student', 'middleware' => ['role:student'], 'as' => 'student.'], function () {
        Route::get('/dashboard',[RoleController::class, 'index'])->name('dashboard');
        Route::get('/dashboard/form',[EnrollmentController::class, 'enrollment'])->name('dashboard.enrollment');
        
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

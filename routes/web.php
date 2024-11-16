<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Cashier\CashierController;
use App\Http\Controllers\ClassScheduleController;
use App\Http\Controllers\Dean\DeanController;
use App\Http\Controllers\Dean\EvaluationController;
use App\Http\Controllers\Dean\ProgramController;
use App\Http\Controllers\Dean\SemesterController;
use App\Http\Controllers\Dean\SubjectController;
use App\Http\Controllers\Dean\YearLevelController;
use App\Http\Controllers\Department\DepartmentController;
use App\Http\Controllers\LiabilitiesController;
use App\Http\Controllers\Notification\NotificationController;
// use App\Http\Controllers\Registrar\ProgramController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Registrar\RegistrarController;
use App\Http\Controllers\Registrar\RegistrarProgramController;
use App\Http\Controllers\Roles\RoleController;
use App\Http\Controllers\Student\EnrollmentController;
use App\Http\Controllers\StudentRecord\StudentRecordController;
use App\Http\Controllers\Teacher\TeacherController;
use App\Models\Liabilities;
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
    Route::get('/liabilities',[LiabilitiesController::class, 'liabilities'])->name('liabilities');
    Route::post('/liabilities/create',[LiabilitiesController::class, 'create'])->name('liabilities.create');
    Route::post('/liabilities/update',[LiabilitiesController::class, 'update'])->name('liabilities.update');
    Route::get('/student/records', [StudentRecordController::class, 'studentRecord'])->name('student.records');

    // schedule public
    Route::get('/schedule',[ClassScheduleController::class,'schedule'])->name('schedule');
    Route::post('/schedule/upload',[ClassScheduleController::class,'uploadSchedule'])->name('schedule.upload');
    // Admin Routes
    Route::group(['prefix' => 'admin', 'middleware' => ['role:admin'], 'as' => 'admin.'], function () {
        Route::get('/dashboard',[RoleController::class, 'index'])->name('dashboard');

        // add teacher
        Route::get('teacher',[AdminController::class, 'teacher'])->name('teacher');
        Route::get('teacher/list', [AdminController::class, 'teacherList'])->name('teacher.list');
        Route::post('add/teacher',[AdminController::class, 'addTeacher'])->name('add.teacher');
        Route::post('teacher/list/edit/{id}', [AdminController::class, 'updateTeacherInfo'])->name('edit.teacher');
        Route::get('teacher/list/edit/{id}', [AdminController::class, 'teacherEdit'])->name('teacher.edit.page');

        // add student
        Route::get('student',[StudentController::class, 'student'])->name('student');
        Route::get('student/list', [StudentController::class, 'studentList'])->name('student.list');
        Route::post('add/student',[StudentController::class, 'addStudent'])->name('add.student');
        Route::post('student/list/edit/{id}', [StudentController::class, 'updateStudentInfo'])->name('edit.student');
        Route::get('student/list/edit/{id}', [StudentController::class, 'studentEdit'])->name('student.edit.page');

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
         Route::post('update/teacher',[DeanController::class, 'updateTeacher'])->name('update.teacher');
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
        Route::post('program/update',[ProgramController::class, 'updateProgram'])->name('program.update');

        //evaluatiom

        Route::get('evaluation',[EvaluationController::class, 'create'])->name('evaluation');
        Route::post('evaluation/store',[EvaluationController::class, 'store'])->name('evaluation.store');
        Route::post('evaluation/update',[EvaluationController::class, 'updateEvaluation'])->name('evaluation.update');
        Route::get('evaluation/delete/{id}',[EvaluationController::class, 'deleteEvaluation'])->name('evaluation.delete');
        Route::get('evaluation/results',[EvaluationController::class, 'evaluationResults'])->name('evaluation.result');
    });

    // Registrar Routes
    Route::group(['prefix' => 'registrar', 'middleware' => ['role:registrar'], 'as' => 'registrar.'], function () {
        Route::get('/dashboard',[RoleController::class, 'index'])->name('dashboard');
        Route::get('/program',[RegistrarProgramController::class, 'program'])->name('program');

        // open program with created year level and subjects inside
        Route::get('/program/enroll/{id}',[RegistrarProgramController::class, 'enroll'])->name('enroll');
        Route::get('/proceed/{id}', [RegistrarProgramController::class, 'proceed'])->name('proceed');
        Route::get('/untag/{liability_id}/user/{user_id}', [RegistrarProgramController::class, 'untag'])->name('untag');

        Route::post('/notify/student',[RegistrarProgramController::class, 'notify'])->name('notify');
    });

    // Student Routes
    Route::group(['prefix' => 'student', 'middleware' => ['role:student'], 'as' => 'student.'], function () {
        Route::get('/dashboard',[RoleController::class, 'index'])->name('dashboard');
        Route::get('/dashboard/form',[EnrollmentController::class, 'enrollment'])->name('dashboard.enrollment');
        Route::post('/dashboard/form/insert',[EnrollmentController::class, 'insert'])->name('dashboard.enrollment.insert');
        
        Route::get('/notification', [NotificationController::class, 'index'])->name('notification');

        Route::get('/evaluationForm', [EvaluationController::class, 'form'])->name('form');
        Route::post('/evaluationForm/save', [EvaluationController::class, 'submitRatings'])->name('form.save');
    });

    // Teacher Routes
    Route::group(['prefix' => 'teacher', 'middleware' => ['role:teacher'], 'as' => 'teacher.'], function () {
        Route::get('/dashboard',[RoleController::class, 'index'])->name('dashboard');
        Route::get('/subjects',[TeacherController::class, 'subjects'])->name('subject');
        Route::get('/my-subjects',[TeacherController::class, 'mySubjects'])->name('my.subject');
        Route::get('/my-student/{id}',[TeacherController::class, 'myStudents'])->name('my.student');
        Route::post('/save-selected-subjects',[TeacherController::class, 'addSubjects'])->name('save.subject');
        Route::post('/delete-subjects',[TeacherController::class, 'deleteSubject'])->name('delete.subject');
        Route::post('/enrolled-student',[TeacherController::class, 'enrolledStudent'])->name('enrolled.student');
    });
    
    // Cashier Routes
    Route::group(['prefix' => 'cashier', 'middleware' => ['role:cashier'], 'as' => 'cashier.'], function () {
        Route::get('/dashboard',[RoleController::class, 'index'])->name('dashboard');
        Route::get('/enroll/{id}',[CashierController::class, 'enroll'])->name('enroll');
    });
    

});


Route::middleware('auth')->group(function () {
    
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

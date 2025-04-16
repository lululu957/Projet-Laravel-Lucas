<?php

use App\Http\Controllers\CohortController;
use App\Http\Controllers\CommonLifeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RetroController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\KnowledgeController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

// Redirect the root path to /dashboard
Route::redirect('/', 'dashboard');

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::middleware('verified')->group(function () {
        // Dashboard
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        // Cohorts
        Route::get('/cohorts', [CohortController::class, 'index'])->name('cohort.index');
        Route::get('/cohort/{cohort}', [CohortController::class, 'show'])->name('cohort.show');
        Route::post('/cohort', [CohortController::class, 'store'])->name('cohort.store');
        Route::put('/cohorts/{cohort}', [CohortController::class, 'update'])->name('cohort.update'); //Update
        Route::post('/cohorts/{cohort}/add-student', [CohortController::class, 'addStudent'])->name('cohorts.add-student');


        // Teachers
        Route::get('/teachers', [TeacherController::class, 'index'])->name('teacher.index');
        Route::post('/teachers', [TeacherController::class, 'store'])->name('teacher.store');

        // Students
        Route::get('students', [StudentController::class, 'index'])->name('student.index'); //Index
        Route::post('students', [StudentController::class, 'store'])->name('student.store'); //Store

        // Show Students
        Route::get('showStudents', [StudentController::class, 'showStudents'])->name('students.showStudents');

        // Knowledge
        Route::get('knowledge', [KnowledgeController::class, 'index'])->name('knowledge.index');

        // Groups
        Route::get('groups', [GroupController::class, 'index'])->name('group.index');

        // Retro
        route::get('retros', [RetroController::class, 'index'])->name('retro.index');

        // Common life
        Route::get('common-life', [CommonLifeController::class, 'index'])->name('common-life.index');

        // Form
        Route::view('form', 'index.blade');

        // User
        Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update'); //Update
        Route::delete('/user/{user}', [UserController::class, 'destroy'])->name('user.destroy'); //Destroy

    });

});

require __DIR__.'/auth.php';

<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GradebookController;
use App\Http\Controllers\GradingComponentController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;



// Route to display the list of students
Route::get('/data', [StudentController::class, 'index'])->name('data.index');

// Route to store a new student
Route::post('/data/store', [StudentController::class, 'store'])->name('data.store');


// students-list.blade.php

Route::view('/students-list', 'grade-book.student-list')->name('students-list');

// Route to display the Grading Components

Route::get('/grading-components', [GradingComponentController::class, 'index'])->name('grading-components.index');
Route::post('/grading-components', [GradingComponentController::class, 'store'])->name('grading-components.store');
Route::put('/grading-components/update-class-standing', [GradingComponentController::class, 'updateClassStanding'])->name('grading-components.updateClassStanding');



// Sample

// Route::get('/', function() { return view('welcome');});

// Route::view('/', 'post.index')->name('home');
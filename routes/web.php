<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\LeadController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ModalityController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SemesterController;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\TypeController;
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

Route::get('/', function () {
    return Redirect::route('users.index');
});

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login.authenticate');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/usuarios', [UserController::class, 'index'])->name('users.index');
    Route::post('/usuarios', [UserController::class, 'store'])->name('user.store');
    Route::delete('/usuario/{id}', [UserController::class, 'destroy'])->name('user.destroy');
    Route::put('/usuarios', [UserController::class, 'update'])->name('user.update');

    Route::get('/leads', [LeadController::class, 'index'])->name('leads.index');
    Route::post('/leads', [LeadController::class, 'store'])->name('lead.store');
    Route::delete('/lead/{id}', [LeadController::class, 'destroy'])->name('lead.destroy');
    Route::put('/leads', [LeadController::class, 'update'])->name('lead.update');
    Route::put('/lead/update-user', [LeadController::class, 'updateUser'])->name('lead.update-user');

    Route::get('/categorias', [CategoryController::class, 'index'])->name('categories.index');
    Route::post('/categorias', [CategoryController::class, 'store'])->name('category.store');
    Route::delete('/categoria/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');
    Route::put('/categoria', [CategoryController::class, 'update'])->name('category.update');

    Route::get('/tipos', [TypeController::class, 'index'])->name('types.index');
    Route::post('/tipos', [TypeController::class, 'store'])->name('type.store');
    Route::delete('/tipo/{id}', [TypeController::class, 'destroy'])->name('type.destroy');
    Route::put('/tipo', [TypeController::class, 'update'])->name('type.update');

    Route::get('/modalidades', [ModalityController::class, 'index'])->name('modalities.index');
    Route::post('/modalidades', [ModalityController::class, 'store'])->name('modality.store');
    Route::delete('/modalidade/{id}', [ModalityController::class, 'destroy'])->name('modality.destroy');
    Route::put('/modalidade', [ModalityController::class, 'update'])->name('modality.update');

    Route::get('/cursos', [CourseController::class, 'index'])->name('courses.index');
    Route::post('/cursos', [CourseController::class, 'store'])->name('course.store');
    Route::delete('/curso/{id}', [CourseController::class, 'destroy'])->name('course.destroy');
    Route::put('/curso', [CourseController::class, 'update'])->name('course.update');

    Route::get('/semestres', [SemesterController::class, 'index'])->name('semesters.index');
    Route::post('/semestre', [SemesterController::class, 'store'])->name('semester.store');
    Route::delete('/semestre/{id}', [SemesterController::class, 'destroy'])->name('semester.destroy');
    Route::put('/semestre', [SemesterController::class, 'update'])->name('semester.update');


    Route::get('/grupos', [GroupController::class, 'index'])->name('groups.index');
    Route::post('/grupo', [GroupController::class, 'store'])->name('group.store');
    Route::delete('/grupo/{id}', [GroupController::class, 'destroy'])->name('group.destroy');
    Route::put('/grupo', [GroupController::class, 'update'])->name('group.update');


    Route::get('/matriculas', [RegisterController::class, 'index'])->name('registers.index');
    Route::post('/matricula', [RegisterController::class, 'store'])->name('register.store');
    Route::delete('/matricula/{id}', [RegisterController::class, 'destroy'])->name('register.destroy');
    Route::put('/matricula', [RegisterController::class, 'update'])->name('register.update');


    Route::get('/alumnos', [StudentsController::class, 'index'])->name('students.index');
    Route::post('/alumno', [StudentsController::class, 'store'])->name('student.store');
    Route::delete('/alumno/{id}', [StudentsController::class, 'destroy'])->name('student.destroy');
    Route::put('/alumno', [StudentsController::class, 'update'])->name('student.update');


    Route::get('/profesores', [TeacherController::class , 'index'])->name('teachers.index');
    Route::post('/profesor', [TeacherController::class, 'store'])->name('teacher.store');
    Route::delete('/profesor/{id}', [TeacherController::class, 'destroy'])->name('teacher.destroy');
    Route::put('/profesor', [TeacherController::class, 'update'])->name('teacher.update');
});

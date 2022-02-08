<?php

use App\Http\Controllers\Marks as ControllersMarks;
use App\Http\Controllers\Student;
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
    return view('home');
});
Route::get('addstudent', [Student::class, 'addStudent']);
Route::post('addstudent', [Student::class, 'add']);
Route::get('liststudent', [Student::class, 'listStudent']);
Route::get('editstudent/{studentId}', [Student::class, 'editStudent']);
Route::post('student/edit}', [Student::class, 'edit'])->name('student.edit');
Route::post('deleteStudent', [Student::class, 'delete'])->name('deleteStudent.post');

Route::get('addmark', [ControllersMarks::class, 'addStudentMark']);
Route::post('addmark', [ControllersMarks::class, 'add']);
Route::get('listmarks', [ControllersMarks::class, 'displayMarks']);
Route::get('editmark/{markListId}', [ControllersMarks::class, 'editMarkView']);
Route::post('mark/edit}', [ControllersMarks::class, 'editMark'])->name('mark.edit');
Route::post('deleteMark', [ControllersMarks::class, 'deleteMark'])->name('deleteMark.post');





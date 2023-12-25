<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/add', function () {
    return view('addstudent');
});



Route::get('/',[StudentController::class,'showUser']);
Route::get('/singlestudent/{id}', [StudentController::class, 'singlestudent'])->name('singlestudent');
Route::post('/addstudent', [StudentController::class, 'addstudent'])->name('addstudent');
// Route::get('/addstudent', [StudentController::class, 'addstudent'])->name('addstudent');
Route::get('/deletestudent/{id}', [StudentController::class, 'deletestudent'])->name('deletestudent');
Route::get('/editstudent/{id}', [StudentController::class, 'editstudent'])->name('editstudent');

// Route::get('/updatestudent', [StudentController::class, 'updatestudent'])->name('updatestudent');
Route::get('/update/{id}', [StudentController::class, 'updatepage'])->name('updatepage');
Route::post('/updatestudent/{id}', [StudentController::class, 'updatestudent'])->name('updatestudent');

Route::get('/join',[StudentController::class,'jointable'])->name('join_table');
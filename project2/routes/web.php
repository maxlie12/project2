<?php

use App\Http\Controllers\AuthenticateController;
use App\Http\Controllers\BillController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\detailBillController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Middleware\checklogin;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\listBookController;
use App\Http\Controllers\StudentNotGotBookController;
use App\Http\Controllers\StudentUnregisteredController;

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

Route::middleware([checklogin::class])->group(function () {
    Route::get('/', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::post('/grade/store', [GradeController::class, 'store'])->name('store');
    Route::get('/grade/create', [GradeController::class, 'create']);
    Route::resource("grade", GradeController::class);
    Route::get('/logout', [AuthenticateController::class, 'logout'])->name('logout');
    Route::resource("book", BookController::class);
    Route::resource("subject", SubjectController::class);
    Route::resource("bill", BillController::class);
    Route::resource("detailBill", detailBillController::class);
    Route::resource("course", CourseController::class);
    Route::resource("grade", GradeController::class);
    Route::resource("student", StudentController::class);
    // Route::get("list", [listBookController::class, 'show'])->name('listBook');
    Route::resource('list', listBookController::class);
    Route::resource('listStudentNotGot', StudentNotGotBookController::class);
    Route::resource('listStudentUnregistered', StudentUnregisteredController::class);
});

Route::get('/login', [AuthenticateController::class, 'login'])->name('login');
Route::post('login-process', [AuthenticateController::class, 'loginProcess'])->name('login-process');

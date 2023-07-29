<?php

use Illuminate\Support\Facades\Route;

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



//Auth::routes();

Route::middleware(['guest'])->group(function (){
    Route::get('/', [\App\Http\Controllers\SesiController::class, 'index'])->name('login');
    Route::post('/', [\App\Http\Controllers\SesiController::class, 'login']);
});

Route::get('/home', function (){
    return redirect('/team');
});

Route::middleware(['auth'])->group(function (){
    Route::get('/admin', [\App\Http\Controllers\AdminController::class, 'admin'])->middleware('userAcces');
    Route::get('/team', [\App\Http\Controllers\AdminController::class, 'team'])->middleware('adminAcces');
    Route::get('/team', [\App\Http\Controllers\TaskController::class, 'index'])->middleware('adminAcces');
    Route::get('/detailtask', [\App\Http\Controllers\TaskController::class, 'detail'])->middleware('adminAcces');
    Route::get('/addtask', [\App\Http\Controllers\TaskController::class, 'create'])->middleware('adminAcces');
    Route::get('/addtask/addsubtask', [\App\Http\Controllers\SubTaskController::class, 'create'])->middleware('adminAcces');
    Route::get('/addtask/addsubtask', [\App\Http\Controllers\UserController::class, 'index'])->middleware('adminAcces');
    Route::get('/addtask', [\App\Http\Controllers\SubTaskController::class, 'index'])->middleware('adminAcces');
    Route::get('/logout', [\App\Http\Controllers\SesiController::class, 'logout']);
});

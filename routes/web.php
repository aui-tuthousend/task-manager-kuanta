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
    Route::get('/team', [\App\Http\Controllers\SubTaskController::class, 'viewAll'])->middleware('adminAcces');
    Route::get('/admin',[\App\Http\Controllers\TaskController::class,'indexadmin'])->middleware('userAcces');

    Route::get('/addtask', [\App\Http\Controllers\TaskController::class, 'create']);
    route::post('/addtask', [\App\Http\Controllers\TaskController::class, 'store'])->name('addtask');
    Route::delete('/addtask/previewtask/{id}', [\App\Http\Controllers\SubTaskController::class, 'delete'])->name('delete');
    Route::get('/addtask/previewtask/{id}', [\App\Http\Controllers\SubTaskController::class, 'preview'])->name('preview');

    Route::get('/addtask/previewtask/{id}/addsubtask', [\App\Http\Controllers\SubTaskController::class, 'create']);
    Route::post('/addtask/previewtask/{id}/addsubtask', [\App\Http\Controllers\SubTaskController::class, 'store'])->name('addsubtask');
    Route::get('/addtask/previewtask/{id}/addsubtask', [\App\Http\Controllers\UserController::class, 'index']);
//    Route::get('/addtask', [\App\Http\Controllers\SubTaskController::class, 'index']);
    Route::get('/detailtask/{idtask}', [\App\Http\Controllers\TaskController::class, 'show'])->name('detail');
    Route::get('/logout', [\App\Http\Controllers\SesiController::class, 'logout']);
    Route::get('/detailadmtask/{idtask}',[\App\Http\Controllers\TaskController::class, 'showadmin'])->name('detailadmin');
});

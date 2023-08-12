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
    if(\Illuminate\Support\Facades\Auth::user()->role == 'admin')
         return redirect('/admin');
    else
        return redirect('/team');
});

Route::middleware(['auth'])->group(function (){
    Route::get('/admin', [\App\Http\Controllers\AdminController::class, 'admin'])->middleware('userAcces');
    Route::get('/team', [\App\Http\Controllers\AdminController::class, 'team'])->middleware('adminAcces');
    Route::get('/team', [\App\Http\Controllers\SubTaskController::class, 'viewAll'])->middleware('adminAcces');
    Route::get('/admin',[\App\Http\Controllers\TaskController::class,'indexadmin'])->middleware('userAcces');
    Route::post('/team/{id}/pick', [\App\Http\Controllers\SubTaskController::class, 'pick'])->name('pick');
    Route::post('/team/{id}/done', [\App\Http\Controllers\SubTaskController::class, 'done'])->name('done');

    Route::get('/team/finished', [\App\Http\Controllers\SubTaskController::class, 'viewDone'])->middleware('adminAcces')->name('finish');

    Route::get('/detailadmtask/{idtask}',[\App\Http\Controllers\TaskController::class, 'showadmin'])->name('detailadmin');
    Route::delete('/detailadmtask/{idtask}', [\App\Http\Controllers\TaskController::class, 'delete'])->name('deleteadm');
    Route::get('/register',[\App\Http\Controllers\UserController::class, 'create'])->middleware('userAcces')->name('reg');
    Route::post('/register',[\App\Http\Controllers\UserController::class, 'store'])->middleware('userAcces')->name('register');





    Route::get('/addtask', [\App\Http\Controllers\TaskController::class, 'create']);
    route::post('/addtask', [\App\Http\Controllers\TaskController::class, 'store'])->name('addtask');
    Route::delete('/addtask/previewtask/{id}', [\App\Http\Controllers\SubTaskController::class, 'delete'])->name('delete');
    Route::get('/addtask/previewtask/{id}', [\App\Http\Controllers\SubTaskController::class, 'preview'])->name('preview');
    Route::get('/updatetask/{id}', [\App\Http\Controllers\SubTaskController::class, 'update'])->name('update');
    Route::get('/updatetask/{id}/editsubtask', [\App\Http\Controllers\SubTaskController::class, 'edit'])->name('edit');
    Route::post('/updatetask/{id}/editsubtask', [\App\Http\Controllers\SubTaskController::class, 'editStore'])->name('editStore');
    Route::get('/updatetask/{id}/addsubtask', [\App\Http\Controllers\SubTaskController::class, 'create2'])->name('add');
    Route::post('/updatetask/{id}/addsubtask', [\App\Http\Controllers\SubTaskController::class, 'store2'])->name('adds');



    Route::get('/addtask/previewtask/{id}/addsubtask', [\App\Http\Controllers\SubTaskController::class, 'create']);
    Route::post('/addtask/previewtask/{id}/addsubtask', [\App\Http\Controllers\SubTaskController::class, 'store'])->name('addsubtask');

    Route::get('/addtask/previewtask/{id}/addsubtask', [\App\Http\Controllers\UserController::class, 'index']);

    Route::get('/detailtask/{idtask}', [\App\Http\Controllers\TaskController::class, 'show'])->name('detail');
    Route::get('/logout', [\App\Http\Controllers\SesiController::class, 'logout']);
});

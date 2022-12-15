<?php

use App\Http\Controllers\LiveSearchController;
use Illuminate\Support\Facades\Auth;
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
// ' middleware' => 'admin'

Route::get('/', [\App\Http\Controllers\HomeController::class,'index']);


Route::get('main',[\App\Http\Controllers\AdminController::class,'index'])->name('admin.panel');

Route::name('user.')->prefix('user')->middleware(['auth'])->group(function (){
    Route::get('all',[\App\Http\Controllers\UserController::class,'index'])->name('table');
    Route::get('create',[\App\Http\Controllers\UserController::class,'create'])->name('create');
    Route::post('store',[\App\Http\Controllers\UserController::class,'store'])->name('store');
    Route::get('{user}/edit',[\App\Http\Controllers\UserController::class,'edit'])->name('edit');
    Route::patch('{user}',[\App\Http\Controllers\UserController::class,'update'])->name('update');
    Route::delete('{user}',[\App\Http\Controllers\UserController::class,'destroy'])->name('delete');
});

Route::name('profession.')->prefix('profession')->middleware(['auth'])->group(function (){
    Route::get('all',[\App\Http\Controllers\ProfessionController::class,'index'])->name('table');
    Route::get('create',[\App\Http\Controllers\ProfessionController::class,'create'])->name('create');
    Route::post('store',[\App\Http\Controllers\ProfessionController::class,'store'])->name('store');
    Route::get('{profession}/edit',[\App\Http\Controllers\ProfessionController::class,'edit'])->name('edit');
    Route::patch('{profession}',[\App\Http\Controllers\ProfessionController::class,'update'])->name('update');
    Route::delete('{profession}',[\App\Http\Controllers\ProfessionController::class,'destroy'])->name('delete');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('user/create/search', [liveSearchController::class, 'search'])->name('search');
Route::get('user/search', [liveSearchController::class, 'searchUser'])->name('search.user');

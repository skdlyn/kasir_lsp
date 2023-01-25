<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\TransactionController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('category', CategoryController::class); 
Route::get('category/{id}/hapus', [CategoryController::class, 'hapus'])->name('category.hapus'); 
Route::resource('item', ItemController::class); 
Route::get('item/{id}/hapus', [ItemController::class, 'hapus'])->name('item.hapus'); 
Route::resource('transaction', TransactionController::class); 
Route::get('history', [TransactionController::class, 'history'])->name('history'); 
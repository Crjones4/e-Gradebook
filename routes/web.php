<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\SigninController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\GradesController;
use App\Http\Controllers\Dashboard;

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

Route::redirect('/', '/auth/signin')->middleware('guest');

Route::get('/auth/signin', [SigninController::class, 'index'])->name('signin')->middleware('guest');
Route::post('/auth/signin', [SigninController::class, 'login']);

Route::get('/admin', [UserController::class, 'index'])->middleware('admin')->name('admin-dashboard');
Route::get('/admin/{id}/edit', [UserController::class, 'edit_user'])->middleware('admin')->name('admin-useredit');
Route::post('/admin/{id}/edit', [UserController::class, 'edit_user_save'])->middleware('admin');
Route::delete('/admin/{id}/edit', [UserController::class, 'delete_user'])->middleware('admin');
Route::get('/admin/new', [UserController::class, 'serve_create'])->middleware('admin')->name('admin-usernew');
Route::post('/admin/new', [UserController::class, 'create_user'])->middleware('admin');

Route::post('/auth/logout', [LogoutController::class, 'execute'])->middleware('auth')->name('logout');

Route::get('/admin/{id}/grades', [GradesController::class, 'index'])->middleware('admin')->name('admin-usergrades');
Route::post('/admin/{id}/grades', [GradesController::class, 'post_grade'])->middleware('admin');
Route::delete('/admin/{id}/grades', [GradesController::class, 'delete_grade'])->middleware('admin');

Route::get('/', [Dashboard\HomeController::class, 'index'])->middleware('auth')->name('dashboard');
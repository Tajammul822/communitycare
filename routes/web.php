<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;

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

Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post');
Route::get('registration', [AuthController::class, 'registration'])->name('register');
Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('register.post');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');
Route::get('user', [UserController::class, 'users'])->name('user');
Route::get('/user/add', [App\Http\Controllers\UserController::class, 'add'])->name('/user/add');
Route::post('/user/store', [App\Http\Controllers\UserController::class, 'add_user'])->name('/user/store');
Route::get('user_edit/{id}', [App\Http\Controllers\UserController::class, 'user_ed'])->name('user_edit/{id}');
Route::post('/user/edit', [App\Http\Controllers\UserController::class, 'edit_user'])->name('/user/edit');
Route::get('/user/delete/{id}', [App\Http\Controllers\UserController::class, 'delete'])->name('/user/delete/{id}');
Route::get('dashboard', [AuthController::class, 'dashboard']);

//Admin Profile
Route::get('/user/profile/{id}', [App\Http\Controllers\UserController::class, 'profile'])->name('/user/profile/{id}');
Route::post('change-password', [AdminController::class, 'change_password'])->name('password.post');
Route::post('change-picture', [AdminController::class, 'change_picture'])->name('update-picture.post');
Route::post('update-details', [AdminController::class, 'update_details'])->name('update-details.post');
Route::post('additional-user-info', [AdminController::class, 'update_info'])->name('additional-info.post');

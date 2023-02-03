<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AnswerController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\FormController;

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

//auth 
Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post');
Route::get('registration', [AuthController::class, 'registration'])->name('register');
Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('register.post');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

//admin user crud
Route::get('dashboard', [AuthController::class, 'dashboard']);
Route::get('user', [UserController::class, 'users'])->name('user');
Route::post('/user/store', [App\Http\Controllers\UserController::class, 'new_user'])->name('user-add.post');
Route::get('users/edit/{id}', [App\Http\Controllers\UserController::class, 'change'])->name('users/edit/{id}');
Route::post('users/edit/store', [App\Http\Controllers\UserController::class, 'alter'])->name('users.update');
Route::get('admin/user-delete/{id}', [App\Http\Controllers\UserController::class, 'delete'])->name('admin/user-delete/{id}');


//Admin Profile
Route::get('/user/profile/{id}', [App\Http\Controllers\UserController::class, 'profile'])->name('/user/profile/{id}');
Route::post('change-password', [AdminController::class, 'change_password'])->name('password.post');
Route::post('change-picture', [AdminController::class, 'change_picture'])->name('update-picture.post');
Route::post('update-details', [AdminController::class, 'update_details'])->name('update-details.post');
Route::post('additional-user-info', [AdminController::class, 'update_info'])->name('additional-info.post');

//admin questions crud
Route::get('admin/questions', [QuestionController::class, 'index'])->name('admin/questions');
Route::post('admin/questions/add', [QuestionController::class, 'store'])->name('questions.add');
Route::get('admin/questions/edit/{id}', [QuestionController::class, 'edit'])->name('admin/questions/edit/{id}');
Route::post('admin/questions/edit/store', [QuestionController::class, 'update'])->name('question.update');
Route::get('admin/question-delete/{id}', [QuestionController::class, 'destroy'])->name('admin/question-delete/{id}');

//admin questions crud
Route::get('admin/answers', [AnswerController::class, 'index'])->name('admin/answers');
Route::post('admin/answers/add', [AnswerController::class, 'store'])->name('answers.add');
Route::get('admin/answers/edit/{id}', [AnswerController::class, 'edit'])->name('admin/answers/edit/{id}');
Route::post('admin/answers/edit/store', [AnswerController::class, 'update'])->name('answer.update');
Route::get('admin/answer-delete/{id}', [AnswerController::class, 'destroy'])->name('admin/answer-delete/{id}');

//admin forms
Route::get('admin/forms', [FormController::class, 'index'])->name('admin/forms');

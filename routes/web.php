<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AnswerController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\FormQuestionController;
use App\Http\Controllers\FormAnswerController;
use App\Http\Controllers\ChwController;
use App\Http\Controllers\FormSubmitController;
use App\Http\Controllers\PhaseController;

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
Route::get('/', [AuthController::class, 'index'])->name('login');
Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post');
Route::get('registration', [AuthController::class, 'registration'])->name('register');
Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('register.post');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::group(['middleware' => 'admin'], function () {
    //admin user crud
    Route::get('dashboard', [AuthController::class, 'dashboard']);
    Route::get('user', [UserController::class, 'users'])->name('user');
    Route::post('/user/store', [App\Http\Controllers\UserController::class, 'new_user'])->name('user-add.post');
    Route::get('users/edit/{id}', [App\Http\Controllers\UserController::class, 'change'])->name('users/edit/{id}');
    Route::post('users/edit/store', [App\Http\Controllers\UserController::class, 'alter'])->name('users.update');
    Route::get('admin/user-delete/{id}', [App\Http\Controllers\UserController::class, 'delete'])->name('admin/user-delete/{id}');
    Route::get('admin/assigned-forms/{id}', [App\Http\Controllers\Auth\AuthController::class, 'forms_assigned'])->name('admin/assigned-forms/{id}');



    //admin questions crud
    Route::get('admin/questions', [QuestionController::class, 'index'])->name('admin/questions');
    Route::post('admin/questions/add', [QuestionController::class, 'store'])->name('questions.add');
    Route::get('admin/questions/edit/{id}', [QuestionController::class, 'edit'])->name('admin/questions/edit/{id}');
    Route::post('admin/questions/edit/store', [QuestionController::class, 'update'])->name('question.update');
    Route::get('admin/question-delete/{id}', [QuestionController::class, 'destroy'])->name('admin/question-delete/{id}');

    //admin answers crud
    Route::get('admin/answers', [AnswerController::class, 'index'])->name('admin/answers');
    Route::post('admin/answers/add', [AnswerController::class, 'store'])->name('answers.add');
    Route::get('admin/answers/edit/{id}', [AnswerController::class, 'edit'])->name('admin/answers/edit/{id}');
    Route::post('admin/answers/edit/store', [AnswerController::class, 'update'])->name('answer.update');
    Route::get('admin/answer-delete/{id}', [AnswerController::class, 'destroy'])->name('admin/answer-delete/{id}');

    //admin forms
    Route::get('admin/forms', [FormController::class, 'index'])->name('admin/forms');
    Route::post('admin/forms/store', [FormController::class, 'save'])->name('forms.add');
    Route::get('admin/forms/edit/{id}', [FormController::class, 'edit'])->name('admin/forms/edit/{id}');
    Route::post('admin/forms/edit/store', [FormController::class, 'update'])->name('form.update');
    Route::get('admin/form-delete/{id}', [FormController::class, 'destroy'])->name('admin/form-delete/{id}');

    //form questions
    Route::get('admin/forms/questions/{id}', [FormQuestionController::class, 'index'])->name('admin/forms/questions/{id}');
    Route::post('admin/forms/questions/store', [FormQuestionController::class, 'save'])->name('forms.questions.add');
    Route::get('admin/forms/questions/edit/{id}', [FormQuestionController::class, 'edit'])->name('admin/forms/questions/edit/{id}');
    Route::post('admin/forms/questions/edit/store', [FormQuestionController::class, 'update'])->name('forms.questions.update');
    Route::get('admin/forms/questions/delete/{id}', [FormQuestionController::class, 'destroy'])->name('admin/forms/questions/delete/{id}');

    //form answers
    Route::get('admin/forms/answers/{id}/{form_id}', [FormAnswerController::class, 'index'])->name('admin/forms/answers/{id}/{form_id}');
    Route::post('admin/forms/answers/store', [FormAnswerController::class, 'save'])->name('forms.answers.add');
    Route::get('admin/forms/answer-edit/{id}', [FormAnswerController::class, 'edit']);
    Route::post('admin/forms/answer-store', [FormAnswerController::class, 'update'])->name('forms.answer.update');
    Route::get('admin/forms/answer-delete/{id}', [FormAnswerController::class, 'delete']);

    //admin chw
    Route::get('/admin/chw', [ChwController::class, 'index'])->name('/admin/chw');
    Route::post('/admin/chw-store', [ChwController::class, 'store'])->name('chw-add.post');
    Route::get('admin/chw-edit/{id}', [ChwController::class, 'change'])->name('admin/chw-edit/{id}');
    Route::post('admin/chw-edit-store', [ChwController::class, 'update'])->name('admin-chw.update');
    Route::get('admin/chw-delete/{id}', [ChwController::class, 'delete'])->name('admin/chw-delete/{id}');

    //admin submittted forms
    Route::get('admin/submitted-form', [FormSubmitController::class, 'index'])->name('admin/submitted-form');
    Route::get('admin/form-view/{id}', [FormSubmitController::class, 'show'])->name('admin/form-view/{id}');
    Route::post('/admin/chw-assign', [FormSubmitController::class, 'assign'])->name('assign.chw');
    Route::get('admin/export', [FormSubmitController::class, 'export_csv'])->name('admin/export');
    Route::get('admin/export-pdf', [FormSubmitController::class, 'export_pdf'])->name('admin/export-pdf');
});


//Admin Profile
Route::get('/user/profile/{id}', [App\Http\Controllers\UserController::class, 'profile'])->name('/user/profile/{id}');
Route::post('change-password', [AdminController::class, 'change_password'])->name('password.post');
Route::post('change-picture', [AdminController::class, 'change_picture'])->name('update-picture.post');
Route::post('update-details', [AdminController::class, 'update_details'])->name('update-details.post');
Route::post('additional-user-info', [AdminController::class, 'update_info'])->name('additional-info.post');

//display form on frontend
Route::get('form/{slug}', [FormController::class, 'display'])->name('forms/{slug}');
Route::post('form/store', [FormController::class, 'form_submit'])->name('form/store');
Route::post('form/share', [FormController::class, 'form_share'])->name('forms.share.add');

//
Route::get('chw/dashboard', [ChwController::class, 'dashboard'])->name('chw/dashboard');
Route::get('chw/submitted-form', [ChwController::class, 'assign_form'])->name('chw/submitted-form');
Route::get('chw/assign-details/{form_id}/{user_id}/{id}', [ChwController::class, 'assign_show'])->name('chw/assign-details/{form_id}/{user_id}/{id}');
Route::post('chw/add-task', [ChwController::class, 'add_task'])->name('chw.task.add');
Route::get('chw/export', [ChwController::class, 'export_csv'])->name('chw/export');
Route::get('chw/export-pdf', [ChwController::class, 'export_pdf'])->name('chw/export-pdf');
Route::post('chw/search', [ChwController::class, 'search'])->name('chw.searh');
Route::get('chw/view-tasks/{assign_id}/{user_id}', [ChwController::class, 'view_tasks'])->name('chw/assign-details/{assign_id}/{user_id}');

//phase routes
Route::get('chw/phases', [PhaseController::class, 'phase'])->name('chw/phases');
Route::get('chw/phase-show/{user_id}/{assign_id}', [PhaseController::class, 'show_phase_content'])->name('chw/phase-show/{user_id}/{assign_id}');
Route::post('chw/add-phase1', [PhaseController::class, 'add_phase_one'])->name('phase.one.post');
Route::post('chw/add-phase2', [PhaseController::class, 'add_phase_two'])->name('phase.two.post');

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\QuestionController;
use App\Http\Controllers\Admin\AnswerController;
use App\Http\Controllers\Admin\AccountController;
use App\Http\Controllers\Admin\ResultController;
use App\Http\Controllers\Student\TestController;
use App\Http\Controllers\Student\StdAuthController;

Route::get('/', [AuthController::class, 'showlogin']);
Route::post('/adminlogin', [AuthController::class,'login']);
Route::get('/adminlogout', [AuthController::class,'logout']);
// question
Route::get('/admin/dashboard',[DashboardController::class,'dashboard'])->name('admin.dashboard');
Route::get('/admin/questions',[QuestionController::class,'index'])->name('admin.questions.index');
Route::get('/admin/questions/create',[QuestionController::class,'create']);
Route::post('/admin/questions/store',[QuestionController::class,'store']);
Route::get('/admin/questions/{id}/edit',[QuestionController::class,'edit'])->name('admin.questions.edit');
Route::put('/admin/questions/{id}',[QuestionController::class,'update'])->name('admin.questions.update');
Route::delete('/admin/questions/{id}/delete',[QuestionController::class,'delete'])->name('admin.questions.delete');
// answer
Route::get('/admin/answers/',[AnswerController::class,'index'])->name('admin.answers.index');
Route::get('/admin/answers/create',[AnswerController::class,'create'])->name('admin.answers.create');
Route::post('/admin/answers/store',[AnswerController::class,'store']);
Route::get('/admin/answers/{id}/edit',[AnswerController::class,'edit'])->name('admin.answers.edit');
Route::put('/admin/answers/{id}',[AnswerController::class,'update'])->name('admin.answers.update');
Route::delete('/admin/answers/{id}',[AnswerController::class,'delete'])->name('admin.answers.delete');
// result
Route::get('/admin/results',[ResultController::class,'index'])->name('admin.result');
Route::delete('/admin/results/{id}',[ResultController::class,'delete'])->name('admin.result.delete');
// student Auth
Route::get('/students',[StdAuthController::class,'showlogin'])->name('student.login');
Route::post('/stdlogin', [StdAuthController::class,'login']);
Route::get('/stdlogout',[StdAuthController::class,'logout']);
Route::get('/student/dashboard',[stdAuthController::class,'dashboard'])->name('std.dashboard');
// accounts 
Route::get('/accounts',[AccountController::class,'index'])->name('students.accounts.index');
Route::get('/accounts/create',[AccountController::class,'create'])->name('students.accounts.create');
Route::post('/accounts/store',[AccountController::class,'store']);
Route::get('/accounts/{id}/edit',[AccountController::class,'edit'])->name('students.accounts.edit');
Route::put('/accounts/{id}',[AccountController::class,'update'])->name('students.accounts.update');
Route::delete('/accounts/{id}',[AccountController::class,'delete'])->name('students.accounts.delete');
// test 
Route::get('/test/start', [TestController::class, 'start']);
Route::get('/test/question/{no}', [TestController::class, 'show']);
Route::post('/test/save', [TestController::class, 'saveAnswer']);
Route::post('/test/submit', [TestController::class, 'submit']);
Route::get('/test/result/{account_id}',[ResultController::class,'show'])->name('test.result');
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StoryReportController;
use App\Http\Controllers\AuthSuperVisorController;
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
Route::get('story/{id}', StoryReportController::class)->name('story.pdf')->middleware('superviser');;
Route::get('story/report/{id}', StoryReportController::class)->name('story.report.pdf');

Route::get('supervisor/login', [AuthSuperVisorController::class,'showLoginForm'])->name('supervisor.showLogin');
Route::post('supervisor/login', [AuthSuperVisorController::class,'login'])->name('supervisor.login');
Route::get('supervisor/logout',[AuthSuperVisorController::class,'logout'] )->name('supervisor.logout');

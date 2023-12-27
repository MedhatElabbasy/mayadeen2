<?php

use App\Models\Story;
use Illuminate\Support\Facades\Route;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf ;
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
Route::get('story/{id}', function ($id) {
    $story = Story::find($id);
    $title = $story->title;
    $content = $story->content;
    $pdf = FacadePdf::loadView('story.pdf', ['title' => $title, 'content' => $content]);
    return $pdf->download($title . '.pdf');
})->name('story.pdf');
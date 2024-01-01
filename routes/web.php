<?php

use App\Models\Story;
use Illuminate\Support\Facades\Route;
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


Route::get('story/{id}', function ($id) {
    // Fetch the story by ID
    $story = Story::find($id);
    if (!$story) {
        abort(404);
    }

    $title = $story->title;
    $content = $story->content;
    $user = $story->user;
    $w1_name = $story->w1_name;
    $w1_email = $story->w1_email;
    $w1_number = $story->w1_number;
    $w2_name = $story->w2_name;
    $w2_email = $story->w2_email;
    $w2_number = $story->w2_number;
    $w3_name = $story->w3_name;
    $w3_email = $story->w3_email;
    $w3_number = $story->w3_number;

    // , compact('title', 'content')
    // Use the logic from the 'test' route to generate and download the PDF
    $html = view('story.pdfstyle',
    compact('title', 'content' , 'user' , 'w1_name' , 'w1_email' , 'w1_number' , 'w2_name' , 'w2_email' , 'w2_number' , 'w3_name' , 'w3_email' , 'w3_number')
        )->toArabicHTML();

    $pdf = app()->make('dompdf.wrapper');


    $pdf->loadHTML($html);

    $output = $pdf->output();

    $headers = array(
        "Content-type" => "application/pdf",
    );

    return response()->streamDownload(
        fn() => print($output), // add the content to the stream
        $story->title.time().".pdf", // the name of the file/stream
        $headers
    );
})->name('story.pdf')->middleware('superviser');

Route::get('supervisor/login', [AuthSuperVisorController::class,'showLoginForm'])->name('supervisor.showLogin');
Route::post('supervisor/login', [AuthSuperVisorController::class,'login'])->name('supervisor.login');

Route::get('supervisor/logout',[AuthSuperVisorController::class,'logout'] )->name('supervisor.logout');
<?php

use App\Models\Story;
use Illuminate\Support\Facades\Route;
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
// Route::get('story/{id}', function ($id) {
//     $story = Story::find($id);
//     $title = $story->title;
//     $content = $story->content;
//     $pdf = FacadePdf::loadView('story.pdf', ['title' => $title, 'content' => $content]);
//     return $pdf->download($title . '.pdf');
// })->name('story.pdf');

Route::get('story/{id}', function ($id) {
    // Fetch the story by ID
    $story = Story::find($id);
    if (!$story) {
        abort(404);
    }

    $title = $story->title;
    $content = $story->content;
    $user = $story->user;
    // , compact('title', 'content')
    // Use the logic from the 'test' route to generate and download the PDF
    $html = view('story.pdfstyle',
    compact('title', 'content' , 'user')
        )->toArabicHTML();

    $pdf = app()->make('dompdf.wrapper');


    $pdf->loadHTML($html);

// Output the PDF content
    $output = $pdf->output();

    $headers = array(
        "Content-type" => "application/pdf",
    );

// Create a stream response as a file download
    return response()->streamDownload(
        fn() => print($output), // add the content to the stream
        $story->title.".pdf", // the name of the file/stream
        $headers
    );
})->name('story.pdf');



// Route::get('test', function () {

// });

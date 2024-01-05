<?php

namespace App\Http\Controllers;

use App\Models\Story;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StoryReportController extends Controller
{    
    public function __invoke(Request $request, $id)
    {
        try {
            // Fetch the story by ID
            $story = Story::find($id);
            if (!$story) {
                abort(404);
            }

            $title = $story->title;
            $content = $story->content;
            $user = $story->user->name;
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
        } catch (\Throwable $th) {
            abort(404);
        }
    }
}
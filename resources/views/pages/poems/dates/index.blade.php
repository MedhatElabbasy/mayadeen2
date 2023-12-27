<?php

use function Livewire\Volt\{rules, state};
use App\Models\DatesOfPoem;
 state([
    'dates' => DatesOfPoem::get(),
    'owner' => null,
    'date' => null,
    'start_time' => null,
    'end_time' => null,
    'details' => null,
 
]);





rules([
    'owner'      => 'required|min:2',
    'date'    => 'required',
    'start_time' => 'required|date_format:H:i', 
    'end_time'   => 'required|date_format:H:i|after:start_time',
    'details'   => 'required',
 
]);

?>
@extends('layouts.app')
@push('head')
    <link rel="stylesheet" href="{{ asset('website/css/poll-quesition.css') }}" />
    <link rel="stylesheet" href="{{ asset('website/css/global-style.css') }}" />
    <link rel="stylesheet" href="{{ asset('website/css/story-title.css') }}" />

    <!-- css files-->
    <link rel="stylesheet" href="{{ asset('website/story/css/story-title.css') }}" />
    <link rel="stylesheet" href="{{ asset('website/story/css/write-story.css') }}" />
    <link rel="stylesheet" href="{{ asset('website/story/css/global-style.css') }}" />
    <link rel="stylesheet" href="{{ asset('website/story/css/writers.css') }}" />
    <!-- bootstrap link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
@endpush

@section('title', 'تاريخ القصائد')

@section('content')
    @volt
        <div>
            <div>
                <div id="app"class="text-center">
                    <div class="flex flex-col items-center justify-center h-screen">
                        <table class="table caption-top text-center">
                            <caption class="text-center">List of users</caption>
                            <thead>
                                <tr>
                                    <th scope="col" >الترقم</th>
                                    <th scope="col"  >الكاتب</th>
                                    <th scope="col">التاريخ</th>
                                    <th scope="col" >وقت البدء</th>
                                    <th scope="col">وقت الانتهاء</th>
                                    <th scope="col" >التفاصيل </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ( $this->dates as $item)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $item->owner }}</td>
                                    <td>{{  $item->date }}</td>
                                    <td>{{ $item->start_time }}</td>
                                    <td>{{ $item->end_time }}</td>
                                    <td>{{ $item->details }}</td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            
          

       
        </div>
    @endvolt


@endsection

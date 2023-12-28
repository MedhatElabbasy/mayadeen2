<?php

use function Livewire\Volt\{rules,state};
use App\Models\Writer;

state([
    'writers' => Writer::get(),
]);

?>

@extends('layouts.app')

@section('title', 'ادباء عبر التاريخ')

@section('content')
@volt
<div id="app">
    <!-- Banner -->
    <div class="hidden md:block w-full cursor-pointer">
        <a href="{{url('/')}}" wire:navigate>
            <div class="absolute top-0 left-8 -z-50">
                <img src="{{ asset('website/images/banner.svg') }}" class="h-36 md:h-64 w-full">
            </div>
        </a>
    </div>
    <!-- //Banner -->

    <div class="px-8 border-x-2 border-[#e34e34]">
        <div class="flex flex-col items-center justify-center my-8">
            <div class="z-10">
                <img src="{{ asset('website/images/navbar.svg') }}" class="w-full md:w-auto sm:w-6 mx-auto">
                <h1 class="text-center text-2xl md:text-4xl font-bold my-8 text-[#e34e34]">ادباء عبر التاريخ!</h1>
                    <div class="grid sm:grid-cols-1 md:grid-cols-2 mx-auto justify-center mt-12 gap-4">
                        @foreach ($writers as $writer)
                        <div class="beep text-center relative hover:scale-95">
                            <img class="h-16 md:h-24 w-full" src="{{ asset('website/images/button.svg') }}">
                            <a wire:navigate href="{{ url('/writers/'.$writer->id) }}" class="mt-2 absolute inset-0 flex items-center justify-center text-white text-1xl md:text-2xl font-semibold">{{$writer->name}}</a>
                        </div>
                        @endforeach
                    </div>
            </div>
        </div>
    </div>
</div>
@endvolt
@endsection

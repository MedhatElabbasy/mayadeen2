<?php

use function Livewire\Volt\{state};
use App\Models\Writer;

state([
    'writer' => Writer::with('works')->find(request('id')),
]);

?>

@extends('layouts.app')

@section('title', 'ادباء عبر التاريخ')
@section('bg', 'bg-[#eb6745]')

@section('content')
@volt
<div id="app">
    <div class="flex flex-col justify-center items-center p-8">
        <a href="{{ url('/') }}" wire:navigate>
            <img src="{{ asset('website/images/navbar-light.svg') }}" class="w-full md:w-auto sm:w-6 mx-auto">
        </a>

        <div class="bg-[#f2e7d1] mt-8 rounded-3xl p-8 text-center justify-center items-center w-12/12 md:w-8/12">
            <h1 class="font-semibold mt-4 mb-8 text-4xl">الأعمال</h1>

            @foreach ($writer->works as $work)
            <div class="w-full mb-4 mt-8 items-center">
                <div class="block md:flex gap-4">
                    <img src="{{ asset('storage/'.$work->image) }}" class="w-48 h-72 rounded-lg">
                    <div class="text-right mt-2">
                        <h1 class="font-semibold">{{ $work->title }}</h1>
                        <p class="m-2">{!! $work->description !!}</p>
                    </div>
                </div>
            </div>
            @endforeach

            <div class="flex justify-between mt-12">
                <div>
                    <a href="{{ url('/writers/'.$writer->id) }}" wire:navigate class="flex gap-2 justify-center items-start">
                        <img src="{{ asset('website/images/arrow-right.png') }}" class="w-6">
                        <p class="font-semibold">الأديب</p>
                    </a>
                </div>

                <div>
                    <a href="{{ url('/writers/'.$writer->id.'/quote') }}" wire:navigate class="flex gap-2 justify-center items-start">
                        <p class="font-semibold">الأعمال</p>
                        <img src="{{ asset('website/images/arrow-left.svg') }}" class="w-6">
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endvolt
@endsection

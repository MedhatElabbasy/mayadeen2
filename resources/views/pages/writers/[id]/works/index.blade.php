<?php

use function Livewire\Volt\{state};
use App\Models\Writer;

state([
    'writer' => Writer::with('works')->find(request('id')),
]);

?>

@extends('layouts.app')

@section('title', 'أدباء عبر التاريخ')

@section('bg', 'bg-[#eb6745]')

@section('content')
@volt
<div id="app" class="mb-4">
    <div class="flex flex-col justify-center items-center p-8">
        <a href="{{ url('/writers') }}" wire:navigate>
            <img src="{{ asset('website/images/navbar-light.svg') }}">
        </a>

        <div class="bg-[#f2e7d1] mt-8 rounded-3xl p-8 text-center justify-center items-center w-12/12 md:w-8/12">
            <h1 class="font-semibold mt-4 mb-8 text-4xl">الأعمال</h1>

            @foreach ($writer->works as $work)
            <div class="w-full mb-4 mt-8 items-center">
                <div class="block md:flex gap-4">
                    <img src="{{ asset('storage/'.$work->image) }}" class="w-48 h-72 rounded-lg">
                    <div class="text-right mt-2">
                        <h1 class="font-semibold" style="line-height:normal">{{ $work->title }}</h1>
                        <p class="m-2 text-justify" style="line-height:normal">{!! $work->description !!}</p>
                    </div>
                </div>
            </div>
            @endforeach

            <div class="flex flex-col justify-center items-center">
                <img src="{{ asset('website/images/palm-horizontal.svg') }}" class="h-36 w-36">
            </div>

            <div class="flex justify-between mt-2">
                <div>
                    <a href="{{ url('/writers/'.$writer->id) }}" wire:navigate class="flex gap-2 justify-center items-start">
                        <img src="{{ asset('website/images/arrow-right.png') }}" class="w-6">
                        <p class="font-semibold">الأديب</p>
                    </a>
                </div>

                <div>
                    <a href="{{ url('/writers/'.$writer->id.'/quote') }}" wire:navigate class="flex gap-2 justify-center items-start">
                        <p class="font-semibold">الإقتباسات</p>
                        <img src="{{ asset('website/images/arrow-left.svg') }}" class="w-6">
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endvolt
@endsection

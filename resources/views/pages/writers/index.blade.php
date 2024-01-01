<?php

use function Livewire\Volt\{rules,state};
use App\Models\Writer;

state([
    'writers' => Writer::get(),
]);

?>

@extends('layouts.app')

@section('title', 'أدباء عبر التاريخ')

@section('content')
@volt
<div id="app">
    <div class="px-8 border-x-2 border-[#e34e34]">
        <div class="flex flex-col items-center justify-center my-8">
            <div class="z-10">
                <img src="{{ asset('website/images/navbar.svg') }}" class="w-full md:w-auto sm:w-6 mx-auto">
                <h1 class="text-center text-2xl md:text-4xl font-bold my-8 text-[#e34e34]">أدباء عبر التاريخ!</h1>
                    <div class="grid sm:grid-cols-1 md:grid-cols-2 mx-auto justify-center mt-12 gap-4">
                        @foreach ($writers as $writer)

                        <a wire:navigate href="{{ url('/writers/'.$writer->id) }}" class="mt-2 items-center justify-center text-white text-1xl md:text-2xl font-semibold">
                            <div class="beep text-center rounded-lg hover:scale-95 px-4 py-5 bg-[#e34e34]">
                            {{$writer->name}}
                            </div>
                        </a>
                        @endforeach
                    </div>
            </div>
        </div>
    </div>
</div>
@endvolt
@endsection

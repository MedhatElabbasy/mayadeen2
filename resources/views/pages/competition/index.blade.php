@extends('layouts.app')

@section('title', 'المنافسة')

@section('content')
    @volt
        <div id="app" x-data="{ step: 1 }" class="mb-4">

            <!-- Banner -->
            <div class="h-36 md:h-64 w-full">
                <div class="relative">
                    <a href="{{ url('/') }}" wire:navigate>
                        <div class="absolute top-0 left-8 -z-50">
                            <img src="{{ asset('website/images/banner.svg') }}" alt="Banner" class="h-36 md:h-64 w-full">
                        </div>
                    </a>
                </div>
            </div>
        <!-- //Banner -->

        <div x-show="step == 1" class="px-8">
            <div class="flex flex-col items-center justify-center my-8">
                <div class="z-10">
                    <h1 class="text-center text-2xl md:text-5xl font-bold my-8 text-[#e34e34]">صوت لفريقك</h1>

                    <div class="grid sm:grid-cols-1 md:grid-cols-3 mx-auto justify-center mt-12 gap-4">

                        <div class="beep text-center relative hover:scale-95 cursor-pointer">
                            <a href="{{url('/competition/1')}}">
                                <img class="h-16 md:h-24 w-full" src="{{ asset('website/images/button.svg') }}">
                                <span class="mt-2 absolute inset-0 flex items-center justify-center text-white text-1xl md:text-2xl font-semibold">الجولة الأولى</span>
                            </a>
                        </div>

                        <div class="beep text-center relative hover:scale-95 cursor-pointer">
                            <a href="{{url('/competition/2')}}">
                                <img class="h-16 md:h-24 w-full" src="{{ asset('website/images/button.svg') }}">
                                <span class="mt-2 absolute inset-0 flex items-center justify-center text-white text-1xl md:text-2xl font-semibold">الجولة الثانية</span>
                            </a>
                        </div>

                        <div class="beep text-center relative hover:scale-95 cursor-pointer">
                            <a href="{{url('/competition/3')}}">
                                <img class="h-16 md:h-24 w-full" src="{{ asset('website/images/button.svg') }}">
                                <span class="mt-2 absolute inset-0 flex items-center justify-center text-white text-1xl md:text-2xl font-semibold">الجولة الثالثة</span>
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        </div>
    @endvolt
@endsection
@extends('layouts.app')

@section('title', 'مرحبا')

@section('content')
@volt
<div class="px-8 border-x-2 border-[#e34e34]">
    <div class="flex flex-col items-center justify-center h-screen">
        <div class="z-10">
            <img src="{{ asset('website/images/navbar.svg') }}" class="w-full md:w-auto sm:w-6 mx-auto">

                <div class="grid sm:grid-cols-1 md:grid-cols-2 mx-auto justify-center mt-12 gap-4">
                    <div class="beep text-center relative hover:scale-95">
                        <img class="mx-auto" src="{{ asset('website/images/button.svg') }}" alt="">
                        <a href="#" class="absolute inset-0 flex items-center justify-center text-white text-4xl">تحد نفسك</a>
                    </div>

                    <div class="beep text-center relative hover:scale-95">
                        <img class="mx-auto" src="{{ asset('website/images/button.svg') }}" alt="">
                        <a wire:navigate href="{{ url('/survey') }}" class="mt-2 absolute inset-0 flex items-center justify-center text-white text-4xl">إبداء رأيك</a>
                    </div>


                    <div class="beep text-center relative hover:scale-95">
                        <img class="mx-auto" src="{{ asset('website/images/button.svg') }}" alt="">
                        <a wire:navigate href="{{ url('/story') }}" class="mt-2 absolute inset-0 flex items-center justify-center text-white text-4xl"> الأقصوصة </a>
                    </div>

                </div>
        </div>
    </div>
</div>
@endvolt
@endsection

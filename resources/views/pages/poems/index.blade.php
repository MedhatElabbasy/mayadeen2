<?php

use function Livewire\Volt\{rules, state};
use App\Models\Poem;

state([
    'completed' => false,
    'type' => null,
    'name' => null,
    'content' => null,
    'author' => null,
    'phone' => null,
    'email' => null,
]);

rules([
    'type' => 'required|in:nabati,fosha',
    'name' => 'required|min:2',
    'content' => 'required|min:12',
    'author' => 'required|min:2',
    'phone' => 'required|min:9',
    'email' => 'required|email',
]);

$selectedType = function ($value) {
    $this->type = $value;
};

$submit = function () {
    $this->validate();

    Poem::create([
        'type' => $this->type,
        'name' => $this->name,
        'content' => $this->content,
        'author' => $this->author,
        'phone' => $this->phone,
        'email' => $this->email,
    ]);

    $this->completed = true;
};
?>

@extends('layouts.app')

@section('title', 'شارك قصيدتك')

@section('content')
    @volt
        <div id="app" x-data="{ step: 1 }" class="border-x-2 border-[#e34e34] mb-4">

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

            <div>
                <div x-show="step == 1" class="px-8 border-x-2 border-[#e34e34]">
                    <div class="flex flex-col items-center justify-center my-8">
                        <div class="z-10">
                            <h1 class="text-center text-2xl md:text-6xl font-bold my-8 text-[#e34e34]">اختر نوع القصيدة</h1>

                            <div class="grid sm:grid-cols-1 md:grid-cols-2 mx-auto justify-center mt-12 gap-4">

                                <div class="beep text-center relative hover:scale-95 cursor-pointer"
                                    wire:click="selectedType('fosha')" x-on:click="step++">
                                    <img class="h-16 md:h-24 w-full" src="{{ asset('website/images/button.svg') }}">
                                    <span
                                        class="mt-2 absolute inset-0 flex items-center justify-center text-white text-1xl md:text-2xl font-semibold">فصحى</span>
                                </div>


                                <div class="beep text-center relative hover:scale-95 cursor-pointer"
                                    wire:click="selectedType('nabati')" x-on:click="step++">
                                    <img class="h-16 md:h-24 w-full" src="{{ asset('website/images/button.svg') }}">
                                    <span
                                        class="mt-2 absolute inset-0 flex items-center justify-center text-white text-1xl md:text-2xl font-semibold">نبطي</span>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="text-center p-4 my-4" style="line-height:normal">
                        <h1 class="text-center text-2xl font-bold mt-4 mb-2 text-[#e34e34]">شروط المشاركة بالقصائد:</h1>
                        {!! setting("shareYourPoemTerms") !!}
                    </div>
                </div>

                <div x-show="step==2"
                    class="flex flex-col items-center justify-center my-2 md:my-4 animate__animated animate__backInDown">
                    <h1 class="block mb-2 font-semibold text-[#e34e34] text-center text-3xl">شارك قصيدتك</h1>

                    <div class="z-10 p-2" x-data="{ name: '' }">
                        <div class="bg-[#e34e34] py-4 px-4 rounded-lg flex flex-col gap-2">
                            <div class="w-full">
                                <label for="name" class="block mb-2 font-medium text-[#f1e1c6]">إسم القصيدة</label>
                                <input required min="2" type="text" class="w-full bg-[#f1e1c6] p-4 text-black rounded-lg"
                                    x-model="name" wire:model="name" placeholder="أدخل إسم القصيدة">
                                <div x-show="name.length < 2" class="text-white mt-2">يجب أن يحتوي الإسم على حرفين على الأقل*
                                </div>
                            </div>
                        </div>

                        <div class="beep text-center relative hover:scale-95 mt-4 rounded-lg"
                            x-on:click="if(name.length >= 2) step++">
                            <img class="h-16 md:h-24 w-full" src="{{ asset('website/images/button.svg') }}" alt="">
                            <button type="button"
                                class="mt-2 absolute inset-0 flex items-center justify-center text-white text-1xl md:text-2xl font-semibold">إرسال</button>
                        </div>
                    </div>
                </div>

                <div x-show="step==3"
                    class="flex flex-col items-center justify-center my-2 md:my-4 animate__animated animate__backInDown">
                    <h1 class="block mb-2 font-semibold text-[#e34e34] text-center text-3xl">شارك قصيدتك</h1>

                    <div class="z-10 p-2" x-data="{ content: '' }">
                        <div class="bg-[#e34e34] py-4 px-4 rounded-lg flex flex-col gap-2">
                            <div class="w-full">
                                <label for="name" class="block mb-2 font-medium text-[#f1e1c6]">القصيدة</label>
                                <textarea rows="6" required min="12" type="name" class="bg-[#f1e1c6] p-4 text-black rounded-lg w-full"
                                    x-model="content" wire:model="content">أدخل القصيدة</textarea>
                                <div x-show="content.length < 12" class="text-white mt-2">يجب أن تحتوي القصيدة على 12 حرف على
                                    الأقل*</div>
                            </div>
                        </div>

                        <div class="beep text-center relative hover:scale-95 mt-4 rounded-lg"
                            x-on:click="if(content.length >= 12) step++">
                            <img class="h-16 md:h-24 w-full" src="{{ asset('website/images/button.svg') }}" alt="">
                            <button type="button"
                                class="mt-2 absolute inset-0 flex items-center justify-center text-white text-1xl md:text-2xl font-semibold">إرسال</button>
                        </div>
                    </div>
                </div>

                @if(!$this->completed)
                    <div x-show="step==4"
                        class="flex flex-col items-center justify-center my-2 md:my-4 animate__animated animate__backInDown">
                        <h1 class="block mb-2 font-semibold text-[#e34e34] text-center text-3xl">أدخل بياناتك الشخصية</h1>

                        <form wire:submit='submit'>
                            <div class="z-10 p-2">
                                <div class="bg-[#e34e34] py-4 px-4 rounded-lg flex flex-col gap-2">
                                    <div class="w-full">
                                        <label for="author" class="block mb-2 font-medium text-[#f1e1c6]">الإسم</label>
                                        <input required min="2" type="text"
                                            class="bg-[#f1e1c6] p-2.5 text-black rounded-lg w-full" wire:model="author"
                                            placeholder="أدخل الإسم">
                                        @error('author')
                                            <div class="text-white">أدخل الإسم*</div>
                                        @enderror
                                    </div>
                                    <div class="w-full">
                                        <label for="email" class="block mb-2 font-medium text-[#f1e1c6]">البريد
                                            الإلكتروني</label>
                                        <input required type="email" class="bg-[#f1e1c6] p-2.5 text-black rounded-lg w-full"
                                            wire:model="email" placeholder="أدخل البريد الإلكتروني">
                                        @error('email')
                                            <div class="text-white">أدخل البريد الإلكتروني*</div>
                                        @enderror
                                    </div>
                                    <div class="w-full" wire:ignore>
                                        <label for="phone" class="block mb-2 font-medium text-[#f1e1c6]">الهاتف</label>
                                        <input wire:ignore id="phone" required min="9" type="tel"
                                        class="bg-[#f1e1c6] w-80 p-2.5 rounded-lg text-black" wire:model="phone"
                                        placeholder="أدخل الهاتف">
                                        @error('phone')
                                            <div class="text-white">أدخل الهاتف*</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="beep text-center relative hover:scale-95 mt-4 rounded-lg" wire:click="submit">
                                    <img class="h-16 md:h-24 w-full" src="{{ asset('website/images/button.svg') }}"
                                        alt="">
                                    <button type="button"
                                        class="mt-2 absolute inset-0 flex items-center justify-center text-white text-1xl md:text-2xl font-semibold">إرسال</button>
                                </div>
                            </div>
                        </form>
                    </div>
                @endif

                @if($this->completed)
                    <div class="flex flex-col items-center my-8 md:my-4 justify-center animate__animated animate__backInDown">
                        <div class="container mx-auto px-4 justify">
                            <h1 class="text-center text-2xl md:text-6xl font-bold my-8 text-[#e34e34]">تم إرسال قصيدتك</h1>

                            <div class="z-10">
                                <div class="beep text-center relative hover:scale-95 mb-8">
                                    <a href="{{url('/poems')}}" wire:navigate>
                                        <img class="h-16 md:h-24 w-full" src="{{ asset('website/images/button.svg') }}"
                                            alt="">
                                        <span
                                            class="mt-2 absolute inset-0 flex items-center justify-center text-white text-1xl md:text-2xl font-semibold">الرئيسية</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>

        @assets
            <link href=" https://cdn.jsdelivr.net/npm/intl-tel-input@18.3.3/build/css/intlTelInput.min.css" rel="stylesheet">
            <script src="https://cdn.jsdelivr.net/npm/intl-tel-input@18.2.1/build/js/intlTelInput.min.js"></script>
        @endassets

        @script
            <script>
                const input = document.querySelector("#phone");
                window.intlTelInput(input, {
                    initialCountry: "auto",
                    geoIpLookup: callback => {
                        fetch("https://ipapi.co/json")
                            .then(res => res.json())
                            .then(data => callback(data.country_code))
                            .catch(() => callback("sa"));
                    },
                    utilsScript: "https://cdn.jsdelivr.net/npm/intl-tel-input@18.2.1/build/js/utils.js",
                });
            </script>
        @endscript
    @endvolt
@endsection

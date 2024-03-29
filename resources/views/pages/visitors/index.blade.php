<?php

use function Livewire\Volt\{rules, state, usesFileUploads};
use App\Models\Visitor;

usesFileUploads();

state([
    'name' => null,
    'email' => null,
    'phone' => null,
    'image' => null,
    'completed' => false,
]);

rules([
    'name' => 'required|min:2',
    'email' => 'required|email',
    'phone' => 'required|min:9',
    'image' => 'required|image',
]);

$submit = function () {
    $this->validate();

    $image_name = time() . '.' . $this->image->getFilename();
    $image = $this->image->storeAs('/public/', $image_name);

    Visitor::create([
        'name'  => $this->name,
        'email' => $this->email,
        'phone' => $this->phone,
        'image' => $image_name,
    ]);

    $this->completed = true;
};
?>

@extends('layouts.app')

@section('title', 'تسجيل الزوار')

@section('content')
    @volt
        <div id="app" class="mb-4">

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

            <!-- Step 1 : Form -->
            @if (!$this->completed)
                <div class="flex flex-col items-center justify-center animate__animated animate__backInDown">
                    <form wire:submit.prevent='submit' accept="file" enctype="multipart/form-data">
                        <div class="z-10 p-2">
                            <div class="bg-[#e34e34] py-4 px-4 rounded-lg flex flex-col gap-2">
                                <div class="w-full">
                                    <label for="name" class="block mb-2 font-medium text-[#f1e1c6]">الإسم</label>
                                    <input required min="2" type="name"
                                        class=" rounded-lg bg-[#f1e1c6] p-2.5 text-black w-full" wire:model="name"
                                        placeholder="أدخل الإسم">
                                    @error('name')
                                        <div class="text-white">أدخل الإسم*</div>
                                    @enderror
                                </div>
                                <div class="w-full">
                                    <label for="email" class="block mb-2 font-medium text-[#f1e1c6]">البريد
                                        الإلكتروني</label>
                                    <input required type="email" class="rounded-lg bg-[#f1e1c6] p-2.5 text-black w-full"
                                        wire:model="email" placeholder="أدخل البريد الإلكتروني">
                                    @error('email')
                                        <div class="text-white">أدخل البريد الإلكتروني*</div>
                                    @enderror
                                </div>

                                <div wire:ignore class="w-full">
                                    <label wire:ignore for="phone"
                                        class="block mb-2 font-medium text-[#f1e1c6] rounded-lg">الهاتف</label>
                                        <div class="flex bg-[#f1e1c6] rounded-lg p-2.5 items-center">
                                            <img src="{{ asset('website/images/sa-flag.webp') }}" alt="SA" class="bg-[#f1e1c6] w-6 h-4">
                                            <input dir="rtl" wire:ignore required min="9" type="tel" class="text-black w-full bg-[#f1e1c6] px-2 p-1" wire:model="phone" placeholder="أدخل الهاتف">
                                        </div>
                                    @error('phone')
                                        <div class="text-white">أدخل الهاتف*</div>
                                    @enderror
                                </div>

                                <div class="w-full">
                                    <label for="name" class="block mb-2 font-medium text-[#f1e1c6]">الصورة</label>

                                    <label for="uploadFile"
                                        class="bg-[#f1e1c6] text-black text-base rounded h-52 flex flex-col items-center justify-center cursor-pointer border-2 border-gray-300 border-dashed mx-auto font-[sans-serif]">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 mb-2 fill-black" viewBox="0 0 32 32">
                                            <path
                                                d="M23.75 11.044a7.99 7.99 0 0 0-15.5-.009A8 8 0 0 0 9 27h3a1 1 0 0 0 0-2H9a6 6 0 0 1-.035-12 1.038 1.038 0 0 0 1.1-.854 5.991 5.991 0 0 1 11.862 0A1.08 1.08 0 0 0 23 13a6 6 0 0 1 0 12h-3a1 1 0 0 0 0 2h3a8 8 0 0 0 .75-15.956z"
                                                data-original="#000000" />
                                            <path
                                                d="M20.293 19.707a1 1 0 0 0 1.414-1.414l-5-5a1 1 0 0 0-1.414 0l-5 5a1 1 0 0 0 1.414 1.414L15 16.414V29a1 1 0 0 0 2 0V16.414z"
                                                data-original="#000000" />
                                        </svg>
                                        <span class="font-sans">رفع الصورة</span>
                                        <input type="file" accept="image/*" id='uploadFile' class="hidden" wire:model="image" />
                                        <div wire:loading wire:target="image" class="text-sm text-gray-500 italic mt-4">يتم الرفع ...</div>
                                        @if($this->image) <div class="text-center text-sm text-gray-500 italic mt-4">تم اختيار الصورة</div> @endif
                                    </label>
                                    @error('image')
                                        <div class="text-white">اختر الصورة*</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="beep text-center relative hover:scale-95 mt-4 rounded-lg" wire:click="submit">
                                <img class="h-16 md:h-24 w-full" src="{{ asset('website/images/button.svg') }}" alt="">
                                <button type="button"
                                    class="mt-2 absolute inset-0 flex items-center justify-center text-white text-1xl md:text-2xl font-semibold">إرسال</button>
                            </div>
                        </div>
                    </form>
                </div>
            @endif
            <!-- //Step 1 -->

            <!-- Step 2 : Thank you -->
            @if ($this->completed)
                <div class="flex flex-col items-center my-8 md:my-4 justify-center animate__animated animate__backInDown">
                    <div class="container mx-auto px-4 justify">
                        <div class="z-10">
                            <h1 class="text-center text-2xl md:text-6xl font-bold mb-8 text-[#e34e34]">تم التسجيل!</h1>

                            <div class="beep text-center relative hover:scale-95 mb-8">
                                <a href="{{url('/visitors')}}" wire:navigate>
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
            <!-- //Step 2 -->

        </div>

        @assets
            <link href=" https://cdn.jsdelivr.net/npm/intl-tel-input@18.3.3/build/css/intlTelInput.min.css" rel="stylesheet">
            <script src="https://cdn.jsdelivr.net/npm/intl-tel-input@18.2.1/build/js/intlTelInput.min.js"></script>
        @endassets
    @endvolt
@endsection

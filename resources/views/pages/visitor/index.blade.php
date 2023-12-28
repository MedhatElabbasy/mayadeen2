<?php

use function Livewire\Volt\{rules,state, usesFileUploads};
use App\Models\Visitor;

usesFileUploads();

state([
    'name'      => null,
    'email'     => null,
    'phone'     => null,
    'image'     => null,
    'completed' => false,
]);

rules([
    'name'  => 'required|min:2',
    'email' => "required|email",
    'phone' => "required|min:9",
    'image' => "required|image",
]);

$submit = function () {
    $this->validate();

    $image_name = time().'.'.$this->image->getFilename();
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
<div id="app">
<!-- Step 1 : Form -->
@if(!$this->completed)
<div class="flex flex-col items-center justify-center min-h-screen animate__animated animate__backInDown">
    <form wire:submit='submit' accept="file" enctype="multipart/form-data">
        <div class="z-10 p-2">
            <div class="bg-[#e34e34] py-4 px-4 rounded-lg flex flex-col gap-2">
                <div class="max-w-sm mx-auto pt-2">
                    <label for="name" class="block mb-2 font-medium text-[#f1e1c6] rounded-lg">الإسم</label>
                    <input required min="2" type="name" class="bg-[#f1e1c6] p-2.5 text-black" wire:model="name" placeholder="أدخل الإسم">
                    @error ('name')<div class="text-white">ادخل الإسم*</div> @enderror
                    </div>
                <div class="max-w-sm mx-auto">
                    <label for="email" class="block mb-2 font-medium text-[#f1e1c6] rounded-lg">البريد الإلكتروني</label>
                    <input required type="email" class="bg-[#f1e1c6] p-2.5 text-black" wire:model="email" placeholder="أدخل البريد الإلكتروني">
                    @error ('email')<div class="text-white">ادخل البريد الإلكتروني*</div> @enderror
                </div>
                <div class="max-w-sm mx-auto">
                    <label for="phone" class="block mb-2 font-medium text-[#f1e1c6] rounded-lg">الهاتف</label>
                    <input required min="9" type="number" class="bg-[#f1e1c6] p-2.5 text-black" wire:model="phone" placeholder="أدخل الهاتف">
                    @error ('phone')<div class="text-white">ادخل الهاتف*</div> @enderror
                </div>

                <div class="max-w-sm mx-auto">
                    <label class="block mb-2 font-medium text-[#f1e1c6] rounded-lg" for="user_avatar">رفع صورة</label>
                    <input name="image" class="bg-[#f1e1c6] p-2.5 text-black" type="file" wire:model="image">
                    @error ('image')<div class="text-white">اختر الصورة*</div> @enderror
                </div>
            </div>

            <div class="beep text-center relative hover:scale-95 mt-4 rounded-lg" wire:click="submit">
                <img class="h-16 md:h-24 w-full" src="{{ asset('website/images/button.svg') }}" alt="">
                <button type="button" class="mt-2 absolute inset-0 flex items-center justify-center text-white text-1xl md:text-2xl font-semibold">إرسال</button>
            </div>
        </div>
    </form>
</div>
@endif
<!-- //Step 1 -->

  <!-- Step 2 : Thank you -->
  @if($this->completed)
  <div class="flex flex-col items-center justify-center min-h-screen animate__animated animate__backInDown">
    <div class="container mx-auto px-4 justify">
      <div class="z-10">
        <h1 class="text-center text-2xl md:text-6xl font-bold mb-8 text-[#e34e34]">تم التسجيل!</h1>

        <div class="beep text-center relative hover:scale-95 mb-8">
          <a href="/" wire:navigate>
            <img class="h-16 md:h-24 w-full" src="{{ asset('website/images/button.svg') }}" alt="">
            <span class="mt-2 absolute inset-0 flex items-center justify-center text-white text-1xl md:text-2xl font-semibold">الرئيسية</span>
          </a>
        </div>
      </div>
    </div>
  </div>
  @endif
  <!-- //Step 2 -->

<!-- Banner -->
<div class="absolute top-0 left-8 -z-50">
    <a href="/" wire:navigate>
        <img src="{{ asset('website/images/banner.svg') }}" class="h-36 md:h-64 w-full">
    </a>
</div>
<!-- //Banner -->

</div>
@endvolt
@endsection

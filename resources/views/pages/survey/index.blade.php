<?php

use function Livewire\Volt\{rules,state};
use App\Models\Survey;

state([
    'completed'    => false,
    'name'         => null,
    'email'        => null,
    'phone'        => null,
    'facilities'   => 'verySatisfied',
    'organization' => 'verySatisfied',
    'events'       => 'verySatisfied',
    'access'       => 'verySatisfied',
    'rating'       => 5,
    'opinion'      => null,
]);

$updateFacilities = function ($value) {
    $this->facilities = $value;
};

$updateOrganization = function ($value) {
    $this->organization = $value;
};

$updateEvents = function ($value) {
    $this->events = $value;
};

$updateAccess = function ($value) {
    $this->access = $value;
};

$updateRating = function ($value) {
    $this->rating = $value;
};

rules([
    'name'         => 'required|min:2',
    'email'        => "required|email",
    'phone'        => "required|min:9",
    'facilities'   => "required",
    'organization' => "required",
    'events'       => "required",
    'access'       => "required",
    'rating'       => "required",
    'opinion'      => 'required|min:2',
]);

$submit = function () {
    $this->validate();

    Survey::create([
        'name'         => $this->name,
        'email'        => $this->email,
        'phone'        => $this->phone,
        'facilities'   => $this->facilities,
        'organization' => $this->organization,
        'events'       => $this->events,
        'access'       => $this->access,
        'rating'       => $this->rating,
        'opinion'      => $this->opinion,
    ]);

    $this->completed = true;
};
?>

@extends('layouts.app')

@section('title', 'إبداء رأيك')

@section('content')
@volt
<div id="app" x-data="{ step: 1 }" class="border-x-2 border-[#e34e34]">

    <div x-show="step==1" class="flex flex-col items-center justify-center h-screen animate__animated animate__backInDown">
        <div class="z-10">
            <h1 class="text-center text-4xl mt-16">من خلال تجربتك شاركنا مامدي رضاك!</h1>

            <div class="beep text-center relative hover:scale-95 mt-16" x-on:click="step++">
                <img class="mx-auto" src="{{ asset('website/images/button.svg') }}" alt="">
                <span class="mt-2 absolute inset-0 flex items-center justify-center text-white text-4xl">إبدأ المشاركة</span>
            </div>
        </div>
    </div>

    <div x-show="step==2" class="flex flex-col items-center justify-center h-screen animate__animated animate__backInDown">
        <div class="z-10">
            <h1 class="text-center text-3xl mt-16">ما مدى رضاك عن مرافق المهرجان ؟</h1>

            <ul class="grid w-full grid-cols-5 text-center">
                <li class="beep hover:drop-shadow-lg hover:scale-125 hover:-mt-8">
                    <input type="radio" id="facilities_radio1" value="verySatisfied" selected class="hidden peer" required>
                    <label for="facilities_radio1" wire:click="updateFacilities('verySatisfied')" x-on:click="step++">
                        <div class="text-center relative mt-16">
                            <div class="flex flex-col gap-2 items-center justify-center">
                                <img src="{{ asset('website/images/rating/1.svg') }}" class="drop-shadow-sm">
                                <span class="text-white bg-[#3a8e35] rounded-lg py-1 px-2 text-sm">راضي جدا</span>
                            </div>
                        </div>
                    </label>
                </li>

                <li class="beep hover:drop-shadow-lg hover:scale-125 hover:-mt-8">
                    <input type="radio" id="facilities_radio2" value="satisfied" class="hidden peer" required>
                    <label for="facilities_radio2"  wire:click="updateFacilities('satisfied')" x-on:click="step++">
                        <div class="text-center relative mt-16">
                            <div class="flex flex-col gap-2 items-center justify-center">
                                <img src="{{ asset('website/images/rating/2.svg') }}" class="drop-shadow-sm">
                                <span class="text-white bg-[#95bf27] rounded-lg py-1 px-2 text-sm">راضي</span>
                            </div>
                        </div>
                    </label>
                </li>

                <li class="beep hover:drop-shadow-lg hover:scale-125 hover:-mt-8">
                    <input type="radio" id="facilities_radio3" value="neutral" class="hidden peer" required>
                    <label for="facilities_radio" wire:click="updateFacilities('neutral')" x-on:click="step++">
                        <div class="text-center relative mt-16">
                            <div class="flex flex-col gap-2 items-center justify-center">
                                <img src="{{ asset('website/images/rating/3.svg') }}" class="drop-shadow-sm">
                                <span class="text-white bg-[#ffae19] rounded-lg py-1 px-2 text-sm">محايد</span>
                            </div>
                        </div>
                    </label>
                </li>

                <li class="beep hover:drop-shadow-lg hover:scale-125 hover:-mt-8">
                    <input type="radio" id="facilities_radio4" value="upset" class="hidden peer" required>
                    <label for="facilities_radio" wire:click="updateFacilities('upset')" x-on:click="step++">
                        <div class="text-center relative mt-16">
                            <div class="flex flex-col gap-2 items-center justify-center">
                                <img src="{{ asset('website/images/rating/4.svg') }}" class="drop-shadow-sm">
                                <span class="text-white bg-[#f77c20] rounded-lg py-1 px-2 text-sm">مستاء</span>
                            </div>
                        </div>
                    </label>
                </li>

                <li class="beep hover:drop-shadow-lg hover:scale-125 hover:-mt-8">
                    <input type="radio" id="facilities_radio5" value="veryUpset" class="hidden peer" required>
                    <label for="facilities_radio4" wire:click="updateFacilities('veryUpset')" x-on:click="step++">
                        <div class="text-center relative mt-16">
                            <div class="flex flex-col gap-2 items-center justify-center">
                                <img src="{{ asset('website/images/rating/5.svg') }}" class="drop-shadow-sm">
                                <span class="text-white bg-[#e4001b] rounded-lg py-1 px-2 text-sm">مستاء جدا</span>
                            </div>
                        </div>
                    </label>
                </li>
            </ul>

            <h1 class="text-center text-1xl mt-16 text-gray-500">رقم السؤال: 1 من إجمالي 4 سؤال.</h1>

            <div class="text-center relative mt-16">
                <img class="mx-auto" src="{{ asset('website/images/button.svg') }}" alt="">
                <span class="mt-2 absolute inset-0 flex items-center justify-center text-white text-4xl">إختر تقييمك</span>
            </div>
        </div>
    </div>

    <div x-show="step==3" class="flex flex-col items-center justify-center h-screen animate__animated animate__backInDown">
        <div class="z-10">
            <h1 class="text-center text-3xl mt-16">ما مدى رضاك عن تنظيم الفعالية ؟</h1>

            <ul class="grid w-full grid-cols-5 text-center">
                <li class="beep hover:drop-shadow-lg hover:scale-125 hover:-mt-8">
                    <input type="radio" id="organization_radio1" value="verySatisfied" selected class="hidden peer" required>
                    <label for="organization_radio1" wire:click="updateOrganization('verySatisfied')" x-on:click="step++">
                        <div class="text-center relative mt-16">
                            <div class="flex flex-col gap-2 items-center justify-center">
                                <img src="{{ asset('website/images/rating/1.svg') }}" class="drop-shadow-sm">
                                <span class="text-white bg-[#3a8e35] rounded-lg py-1 px-2 text-sm">راضي جدا</span>
                            </div>
                        </div>
                    </label>
                </li>

                <li class="beep hover:drop-shadow-lg hover:scale-125 hover:-mt-8">
                    <input type="radio" id="organization_radio2" value="satisfied" class="hidden peer" required>
                    <label for="organization_radio2" wire:click="updateOrganization('satisfied')" x-on:click="step++">
                        <div class="text-center relative mt-16">
                            <div class="flex flex-col gap-2 items-center justify-center">
                                <img src="{{ asset('website/images/rating/2.svg') }}" class="drop-shadow-sm">
                                <span class="text-white bg-[#95bf27] rounded-lg py-1 px-2 text-sm">راضي</span>
                            </div>
                        </div>
                    </label>
                </li>

                <li class="beep hover:drop-shadow-lg hover:scale-125 hover:-mt-8">
                    <input type="radio" id="organization_radio3" value="neutral" class="hidden peer" required>
                    <label for="organization_radio" wire:click="updateOrganization('neutral')" x-on:click="step++">
                        <div class="text-center relative mt-16">
                            <div class="flex flex-col gap-2 items-center justify-center">
                                <img src="{{ asset('website/images/rating/3.svg') }}" class="drop-shadow-sm">
                                <span class="text-white bg-[#ffae19] rounded-lg py-1 px-2 text-sm">محايد</span>
                            </div>
                        </div>
                    </label>
                </li>

                <li class="beep hover:drop-shadow-lg hover:scale-125 hover:-mt-8">
                    <input type="radio" id="organization_radio4" value="upset" class="hidden peer" required>
                    <label for="organization_radio" wire:click="updateOrganization('upset')" x-on:click="step++">
                        <div class="text-center relative mt-16">
                            <div class="flex flex-col gap-2 items-center justify-center">
                                <img src="{{ asset('website/images/rating/4.svg') }}" class="drop-shadow-sm">
                                <span class="text-white bg-[#f77c20] rounded-lg py-1 px-2 text-sm">مستاء</span>
                            </div>
                        </div>
                    </label>
                </li>

                <li class="beep hover:drop-shadow-lg hover:scale-125 hover:-mt-8">
                    <input type="radio" id="organization_radio5" value="veryUpset" class="hidden peer" required>
                    <label for="organization_radio4" wire:click="updateOrganization('veryUpset')" x-on:click="step++">
                        <div class="text-center relative mt-16">
                            <div class="flex flex-col gap-2 items-center justify-center">
                                <img src="{{ asset('website/images/rating/5.svg') }}" class="drop-shadow-sm">
                                <span class="text-white bg-[#e4001b] rounded-lg py-1 px-2 text-sm">مستاء جدا</span>
                            </div>
                        </div>
                    </label>
                </li>
            </ul>

            <h1 class="text-center text-1xl mt-16 text-gray-500">رقم السؤال: 2 من إجمالي 4 سؤال.</h1>

            <div class="text-center relative mt-16">
                <img class="mx-auto" src="{{ asset('website/images/button.svg') }}" alt="">
                <span class="mt-2 absolute inset-0 flex items-center justify-center text-white text-4xl">إختر تقييمك</span>
            </div>
        </div>
    </div>

    <div x-show="step==4" class="flex flex-col items-center justify-center h-screen animate__animated animate__backInDown">
        <div class="z-10">
            <h1 class="text-center text-3xl mt-16">ما مدى رضاك عن الفعاليات المقامة ؟</h1>

            <ul class="grid w-full grid-cols-5 text-center">
                <li class="beep hover:drop-shadow-lg hover:scale-125 hover:-mt-8">
                    <input type="radio" id="events_radio1" value="verySatisfied" selected class="hidden peer" required>
                    <label for="events_radio1" wire:click="updateEvents('verySatisfied')" x-on:click="step++">
                        <div class="text-center relative mt-16">
                            <div class="flex flex-col gap-2 items-center justify-center">
                                <img src="{{ asset('website/images/rating/1.svg') }}" class="drop-shadow-sm">
                                <span class="text-white bg-[#3a8e35] rounded-lg py-1 px-2 text-sm">راضي جدا</span>
                            </div>
                        </div>
                    </label>
                </li>

                <li class="beep hover:drop-shadow-lg hover:scale-125 hover:-mt-8">
                    <input type="radio" id="events_radio2" value="satisfied" class="hidden peer" required>
                    <label for="events_radio2" wire:click="updateEvents('satisfied')" x-on:click="step++">
                        <div class="text-center relative mt-16">
                            <div class="flex flex-col gap-2 items-center justify-center">
                                <img src="{{ asset('website/images/rating/2.svg') }}" class="drop-shadow-sm">
                                <span class="text-white bg-[#95bf27] rounded-lg py-1 px-2 text-sm">راضي</span>
                            </div>
                        </div>
                    </label>
                </li>

                <li class="beep hover:drop-shadow-lg hover:scale-125 hover:-mt-8">
                    <input type="radio" id="events_radio3" value="neutral" class="hidden peer" required>
                    <label for="events_radio" wire:click="updateEvents('neutral')" x-on:click="step++">
                        <div class="text-center relative mt-16">
                            <div class="flex flex-col gap-2 items-center justify-center">
                                <img src="{{ asset('website/images/rating/3.svg') }}" class="drop-shadow-sm">
                                <span class="text-white bg-[#ffae19] rounded-lg py-1 px-2 text-sm">محايد</span>
                            </div>
                        </div>
                    </label>
                </li>

                <li class="beep hover:drop-shadow-lg hover:scale-125 hover:-mt-8">
                    <input type="radio" id="events_radio4" value="upset" class="hidden peer" required>
                    <label for="events_radio" wire:click="updateEvents('upset')" x-on:click="step++">
                        <div class="text-center relative mt-16">
                            <div class="flex flex-col gap-2 items-center justify-center">
                                <img src="{{ asset('website/images/rating/4.svg') }}" class="drop-shadow-sm">
                                <span class="text-white bg-[#f77c20] rounded-lg py-1 px-2 text-sm">مستاء</span>
                            </div>
                        </div>
                    </label>
                </li>

                <li class="beep hover:drop-shadow-lg hover:scale-125 hover:-mt-8">
                    <input type="radio" id="events_radio5" value="veryUpset" class="hidden peer" required>
                    <label for="events_radio4" wire:click="updateEvents('veryUpset')" x-on:click="step++">
                        <div class="text-center relative mt-16">
                            <div class="flex flex-col gap-2 items-center justify-center">
                                <img src="{{ asset('website/images/rating/5.svg') }}" class="drop-shadow-sm">
                                <span class="text-white bg-[#e4001b] rounded-lg py-1 px-2 text-sm">مستاء جدا</span>
                            </div>
                        </div>
                    </label>
                </li>
            </ul>

            <h1 class="text-center text-1xl mt-16 text-gray-500">رقم السؤال: 3 من إجمالي 4 سؤال.</h1>

            <div class="text-center relative mt-16">
                <img class="mx-auto" src="{{ asset('website/images/button.svg') }}" alt="">
                <span class="mt-2 absolute inset-0 flex items-center justify-center text-white text-4xl">إختر تقييمك</span>
            </div>
        </div>
    </div>

    <div x-show="step==5" class="flex flex-col items-center justify-center h-screen animate__animated animate__backInDown">
        <div class="z-10">
            <h1 class="text-center text-3xl mt-16">ما مدى رضاك عن سهولة الوصول للمهرجان ؟</h1>

            <ul class="grid w-full grid-cols-5 text-center">
                <li class="beep hover:drop-shadow-lg hover:scale-125 hover:-mt-8">
                    <input type="radio" id="access_radio1" value="verySatisfied" selected class="hidden peer" required>
                    <label for="access_radio1" wire:click="updateAccess('verySatisfied')" x-on:click="step++">
                        <div class="text-center relative mt-16">
                            <div class="flex flex-col gap-2 items-center justify-center">
                                <img src="{{ asset('website/images/rating/1.svg') }}" class="drop-shadow-sm">
                                <span class="text-white bg-[#3a8e35] rounded-lg py-1 px-2 text-sm">راضي جدا</span>
                            </div>
                        </div>
                    </label>
                </li>

                <li class="beep hover:drop-shadow-lg hover:scale-125 hover:-mt-8">
                    <input type="radio" id="access_radio2" value="satisfied" class="hidden peer" required>
                    <label for="access_radio2" wire:click="updateAccess('satisfied')" x-on:click="step++">
                        <div class="text-center relative mt-16">
                            <div class="flex flex-col gap-2 items-center justify-center">
                                <img src="{{ asset('website/images/rating/2.svg') }}" class="drop-shadow-sm">
                                <span class="text-white bg-[#95bf27] rounded-lg py-1 px-2 text-sm">راضي</span>
                            </div>
                        </div>
                    </label>
                </li>

                <li class="beep hover:drop-shadow-lg hover:scale-125 hover:-mt-8">
                    <input type="radio" id="access_radio3" value="neutral" class="hidden peer" required>
                    <label for="access_radio" wire:click="updateAccess('neutral')" x-on:click="step++">
                        <div class="text-center relative mt-16">
                            <div class="flex flex-col gap-2 items-center justify-center">
                                <img src="{{ asset('website/images/rating/3.svg') }}" class="drop-shadow-sm">
                                <span class="text-white bg-[#ffae19] rounded-lg py-1 px-2 text-sm">محايد</span>
                            </div>
                        </div>
                    </label>
                </li>

                <li class="beep hover:drop-shadow-lg hover:scale-125 hover:-mt-8">
                    <input type="radio" id="access_radio4" value="upset" class="hidden peer" required>
                    <label for="access_radio" wire:click="updateAccess('upset')" x-on:click="step++">
                        <div class="text-center relative mt-16">
                            <div class="flex flex-col gap-2 items-center justify-center">
                                <img src="{{ asset('website/images/rating/4.svg') }}" class="drop-shadow-sm">
                                <span class="text-white bg-[#f77c20] rounded-lg py-1 px-2 text-sm">مستاء</span>
                            </div>
                        </div>
                    </label>
                </li>

                <li class="beep hover:drop-shadow-lg hover:scale-125 hover:-mt-8">
                    <input type="radio" id="access_radio5" value="veryUpset" class="hidden peer" required>
                    <label for="access_radio4" wire:click="updateAccess('veryUpset')" x-on:click="step++">
                        <div class="text-center relative mt-16">
                            <div class="flex flex-col gap-2 items-center justify-center">
                                <img src="{{ asset('website/images/rating/5.svg') }}" class="drop-shadow-sm">
                                <span class="text-white bg-[#e4001b] rounded-lg py-1 px-2 text-sm">مستاء جدا</span>
                            </div>
                        </div>
                    </label>
                </li>
            </ul>

            <h1 class="text-center text-1xl mt-16 text-gray-500">رقم السؤال: 4 من إجمالي 4 سؤال.</h1>

            <div class="text-center relative mt-16">
                <img class="mx-auto" src="{{ asset('website/images/button.svg') }}" alt="">
                <span class="mt-2 absolute inset-0 flex items-center justify-center text-white text-4xl">إختر تقييمك</span>
            </div>
        </div>
    </div>

    @if(!$this->completed)
    <div x-show="step==6" class="flex flex-col items-center justify-center min-h-screen animate__animated animate__backInDown">
        <form wire:submit='submit'>
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

                  <div class="max-w-sm mx-auto w-full">
                    <label for="rating" class="block mb-2 font-medium text-[#f1e1c6] rounded-lg">رأيك</label>
                    <div class="flex items-center text-center">
                        @foreach ([1, 2, 3, 4, 5] as $rating)
                        <div class="contents" wire:click="updateRating({{$rating}})">
                            <svg @if($this->rating>=$rating) class="text-yellow-300 dark:text-yellow-500" @esle class="text-gray-300 dark:text-gray-500" @endif aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                            </svg>
                        </div>
                        @endforeach
                    </div>
                    @error ('opinion')<div class="text-white">اختار تقييمك*</div> @enderror
                  </div>

                  <div class="max-w-sm mx-auto">
                    <label for="phone" class="block mb-2 font-medium text-[#f1e1c6] rounded-lg">رأيك</label>
                    <textarea required min="2" class="bg-[#f1e1c6] p-2.5 text-black" wire:model="opinion" placeholder="أكتب لنا رأيك"></textarea>
                    @error ('opinion')<div class="text-white">ادخل رأيك*</div> @enderror
                  </div>
              </div>

              <div class="beep text-center relative hover:scale-95 mt-4 rounded-lg">
                  <img class="h-16 md:h-24 w-full" src="{{ asset('website/images/button.svg') }}" alt="">
                  <button type="submit" class="mt-2 absolute inset-0 flex items-center justify-center text-white text-1xl md:text-2xl font-semibold">إرسال</button>
              </div>
          </div>
        </form>
    </div>
    @endif

    @if($this->completed)
    <div class="flex flex-col items-center justify-center h-screen animate__animated animate__bounce">
        <div class="z-10">
            <h1 class="text-center text-4xl mt-16">تم ارسال البيانات!</h1>

            <div class="beep text-center relative hover:scale-95 mt-16">
                <img class="mx-auto" src="{{ asset('website/images/button.svg') }}" alt="">
                <a href="{{url('/')}}" wire:navigate class="mt-2 absolute inset-0 flex items-center justify-center text-white text-4xl">الرئيسية</a>
            </div>
        </div>
    </div>
    @endif

<!-- Banner -->
<div class="absolute top-0 left-8 z-0">
    <a href="/" wire:navigate>
      <img src="{{ asset('website/images/banner.svg') }}" class="w-20 md:w-64">
    </a>
</div>
<!-- //Banner -->
</div>
@endvolt
@endsection

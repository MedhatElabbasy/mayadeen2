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

rules([
    'name'         => 'required|min:2',
    'email'        => "required|email",
    'phone'        => "required|min:9",
    'facilities'   => "required",
    'organization' => "required",
    'events'       => "required",
    'access'       => "required",
]);


$submit = function () {
    $this->validate();

    Survey::create([
        'name'         => $this->name,
        'email'        => $this->phone,
        'phone'        => $this->email,
        'facilities'   => $this->facilities,
        'organization' => $this->organization,
        'events'       => $this->events,
        'access'       => $this->access,
    ]);

    $this->completed = true;
};
?>

@extends('layouts.app')

@section('title', 'تحدي نفسك')

@push('head')
<link rel="stylesheet" href="{{asset('website/css/poll-quesition.css')}}" />
<link rel="stylesheet" href="{{asset('website/css/global-style.css')}}" />
<link rel="stylesheet" href="{{asset('website/css/story-title.css')}}" />
@endpush

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

    <div x-show="step==2" class="flex flex-col items-center justify-center h-screen animate__animated animate__fadeInBottomRight">
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

    <div x-show="step==3" class="flex flex-col items-center justify-center h-screen animate__animated animate__fadeInBottomLeft">
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

    <div x-show="step==4" class="flex flex-col items-center justify-center h-screen animate__animated animate__fadeInTopRight">
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

    <div x-show="step==5" class="flex flex-col items-center justify-center h-screen animate__animated animate__fadeInTopLeft">
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
    <div x-show="step==6" class="flex flex-col items-center justify-center h-screen animate__animated animate__fadeInDown">
        <div class="z-10 p-8">
            <div class="bg-[#e34e34] py-8 px-2 rounded-lg flex flex-col gap-2" style="clip-path:polygon(100% 89%, 79% 90%, 80% 100%, 25% 100%, 23% 89%, 0% 89%, 0% 20%, 25% 20%, 23% 5%, 75% 6%, 75% 20%, 100% 20%)">
                <div class="max-w-sm mx-auto pt-16"> 
                    <label for="name" class="block mb-2 font-medium text-[#f1e1c6]">الإسم</label>
                    <input required min="2" type="name" class="bg-[#f1e1c6] p-2.5 text-black" wire:model="name" placeholder="أدخل الإسم">
                </div>
                <div class="max-w-sm mx-auto"> 
                    <label for="email" class="block mb-2 font-medium text-[#f1e1c6]">البريد الإلكتروني</label>
                    <input required type="email" class="bg-[#f1e1c6] p-2.5 text-black" wire:model="email" placeholder="أدخل البريد الإلكتروني">
                </div>
                <div class="max-w-sm mx-auto pb-10"> 
                    <label for="phone" class="block mb-2 font-medium text-[#f1e1c6]">الهاتف</label>
                    <input required min="9" type="number" class="bg-[#f1e1c6] p-2.5 text-black" wire:model="phone" placeholder="أدخل الهاتف">
                </div>
            </div>

            <div class="beep text-center relative hover:scale-95 mt-16" wire:click="submit">
                <img class="mx-auto" src="{{ asset('website/images/button.svg') }}" alt="">
                <button type="button" class="mt-2 absolute inset-0 flex items-center justify-center text-white text-4xl">إرسال</button>
            </div>

            @error('name')
            <div class="p-4 mt-4 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
                ادخل اسمك الحقيقي.
            </div>
            @enderror

            @error('email')
            <div class="p-4 mt-4 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
                ادخل بريد إلكتروني صالح.
            </div>
            @enderror

            @error('phone')
            <div class="p-4 mt-4 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
                ادخل رقم هاتف صحيح.
            </div>
            @enderror
        </div>
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

    <div class="absolute top-0 left-8 z-0">
        <img src="{{ asset('website/images/banner.svg') }}" class="w-20 md:w-64">
    </div>
</div>
@endvolt
@endsection

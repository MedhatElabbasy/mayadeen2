<?php

use function Livewire\Volt\{rules, state};
use App\Models\Survey;

state([
    'completed'           => false,
    'experience'          => 'verySatisfied',
    'guidelines'          => 'verySatisfied',
    'literaryEvents'      => 'verySatisfied',
    'entertainmentEvents' => 'verySatisfied',
    'restaurant'          => 'verySatisfied',
    'referral'            => 'socialmedia',
    'next'                => 'high',
    'suggestion'          => 'high',
    'opinion'             => null,
    'rating'              => [
        'ksayd_byn_altrk'       => 1,
        'msrh_alsharaa_almthrk' => 1,
        'mns_alfn'              => 1,
        'gathby_alfk'           => 1,
        'omyd_alabgdy'          => 1,
        'hkayat_alflk'          => 1,
        'msrh_alaarod_altrathy' => 1,
        'aaoalm_akhr'           => 1,
        'shab_adb'              => 1,
        'thd_nfsk'              => 1,
        'almtah'                => 1,
        'almghamron_alsghar'    => 1,
        'albrnamg_althkafy'     => 1,
        'dor_alnshr'            => 1,
        'msrhy_alloh_alakbr'    => 1,
        'alamasy_alghnayy'      => 1,
        'alamasy_alshaary'      => 1,
        'msrh_alsharaa_althabt' => 1,
        'byn_aladb'             => 1,
        'adbaaa_aabr_altarykh'  => 1,
        'alktb_almaalk'         => 1,
    ],
]);

$updateExperience = function ($value) {
    $this->experience = $value;
};

$updateguidelines = function ($value) {
    $this->guidelines = $value;
};

$updateLiteraryEvents = function ($value) {
    $this->literaryEvents = $value;
};

$updateEntertainmentEvents = function ($value) {
    $this->entertainmentEvents = $value;
};

$updateRestaurant = function ($value) {
    $this->restaurant = $value;
};

$updateReferral = function ($value) {
    $this->referral = $value;
};

$updateNext = function ($value) {
    $this->next = $value;
};

$updateSuggestion = function ($value) {
    $this->suggestion = $value;
};

$updateRating = function ($key, $value) {
    $this->rating[$key] = $value;
};

rules([
    'experience'          => 'required',
    'guidelines'          => 'required',
    'literaryEvents'      => 'required',
    'entertainmentEvents' => 'required',
    'restaurant'          => 'required',
    'referral'            => 'required',
    'next'                => 'required',
    'suggestion'          => 'required',
    'rating'              => 'required|array',
]);

$submit = function () {
    $this->validate();

    Survey::create([
        'experience'          => $this->experience,
        'guidelines'          => $this->guidelines,
        'literaryEvents'      => $this->literaryEvents,
        'entertainmentEvents' => $this->entertainmentEvents,
        'restaurant'          => $this->restaurant,
        'next'                => $this->next,
        'suggestion'          => $this->suggestion,
        'rating'              => $this->rating,
        'opinion'             => $this->opinion,
    ]);

    $this->completed = true;
};
?>

@extends('layouts.app')

@section('title', 'الإستبيان')

@section('content')
    @volt
        <div id="app" x-data="{ step: 1 }" class="mb-4">

            <!-- Banner -->
            <div class="h-36 md:h-64 w-full">
                <div class="block md:relative">
                    <a href="{{ url('/') }}" wire:navigate>
                        <div class="block md:absolute top-0 left-8 -z-50">
                            <img src="{{ asset('website/images/banner.svg') }}" alt="Banner" class="h-36 md:h-64 w-full">
                        </div>
                    </a>
                </div>
            </div>
            <!-- //Banner -->

        <div class="mb-24">
            <div x-show="step==1" class="flex flex-col items-center justify-center animate__animated animate__backInDown">
                <div class="z-10">
                    <h1 class="text-center text-2xl md:text-4xl font-bold my-8 p-2 text-[#e34e34]" style="line-height:normal">
                        من
                        خلال تجربتك <br> شاركنا ما مدى رضاك!</h1>

                    <div class="beep text-center relative hover:scale-95 mb-8 cursor-pointer" x-on:click="step++">
                        <img class="h-16 md:h-24 w-full" src="{{ asset('website/images/button.svg') }}" alt="">
                        <span
                            class="mt-2 absolute inset-0 flex items-center justify-center text-white text-1xl md:text-2xl font-semibold">إبدأ
                            المشاركة</span>
                    </div>

                </div>
            </div>

            <div x-show="step==2" class="flex flex-col items-center justify-center animate__animated animate__backInDown">
                <div class="z-10">
                    <h1 class="text-center text-2xl md:text-4xl font-bold my-8 px-2 text-[#e34e34]" style="line-height:normal">
                        كيف تقيم تجربتك بشكل عام في المهرجان ؟
                    </h1>

                    <ul class="grid w-full grid-cols-4 text-center">
                        <li class="beep hover:drop-shadow-lg hover:scale-125 hover:-mt-8">
                            <input type="radio" id="experience_radio1" value="verySatisfied" selected class="hidden peer"
                                required>
                            <label for="experience_radio1" wire:click="updateExperience('verySatisfied')" x-on:click="step++">
                                <div class="text-center relative mt-16">
                                    <div class="flex flex-col gap-2 items-center justify-center cursor-pointer">
                                        <img src="{{ asset('website/images/rating/1.svg') }}" class="drop-shadow-sm">
                                        <span class="text-white bg-[#3a8e35] rounded-lg py-1 px-2 text-sm">ممتاز</span>
                                    </div>
                                </div>
                            </label>
                        </li>

                        <li class="beep hover:drop-shadow-lg hover:scale-125 hover:-mt-8">
                            <input type="radio" id="experience_radio2" value="satisfied" class="hidden peer" required>
                            <label for="experience_radio2" wire:click="updateExperience('satisfied')" x-on:click="step++">
                                <div class="text-center relative mt-16">
                                    <div class="flex flex-col gap-2 items-center justify-center cursor-pointer">
                                        <img src="{{ asset('website/images/rating/2.svg') }}" class="drop-shadow-sm">
                                        <span class="text-white bg-[#95bf27] rounded-lg py-1 px-2 text-sm">جيد</span>
                                    </div>
                                </div>
                            </label>
                        </li>

                        <li class="beep hover:drop-shadow-lg hover:scale-125 hover:-mt-8">
                            <input type="radio" id="experience_radio3" value="neutral" class="hidden peer" required>
                            <label for="experience_radio" wire:click="updateExperience('neutral')" x-on:click="step++">
                                <div class="text-center relative mt-16">
                                    <div class="flex flex-col gap-2 items-center justify-center cursor-pointer">
                                        <img src="{{ asset('website/images/rating/3.svg') }}" class="drop-shadow-sm">
                                        <span class="text-white bg-[#ffae19] rounded-lg py-1 px-2 text-sm">مقبول</span>
                                    </div>
                                </div>
                            </label>
                        </li>

                        <li class="beep hover:drop-shadow-lg hover:scale-125 hover:-mt-8">
                            <input type="radio" id="experience_radio4" value="upset" class="hidden peer" required>
                            <label for="experience_radio" wire:click="updateExperience('upset')" x-on:click="step++">
                                <div class="text-center relative mt-16">
                                    <div class="flex flex-col gap-2 items-center justify-center cursor-pointer">
                                        <img src="{{ asset('website/images/rating/4.svg') }}" class="drop-shadow-sm">
                                        <span class="text-white bg-[#f77c20] rounded-lg py-1 px-2 text-sm">غير راضي</span>
                                    </div>
                                </div>
                            </label>
                        </li>
                    </ul>

                    <h1 class="text-center text-1xl mt-16 text-gray-500">رقم السؤال: 1 من إجمالي 5 أسئلة.</h1>
                </div>
            </div>

            <div x-show="step==3" class="flex flex-col items-center justify-center animate__animated animate__backInDown">
                <div class="z-10">
                    <h1 class="text-center text-2xl md:text-4xl font-bold my-8 px-2 text-[#e34e34]" style="line-height:normal">
                        الإرشادات المتوفرة كافية وتساعد حركة الزوار؟
                    </h1>

                    <ul class="grid w-full grid-cols-4 text-center">
                        <li class="beep hover:drop-shadow-lg hover:scale-125 hover:-mt-8">
                            <input type="radio" id="guidelines_radio1" value="verySatisfied" selected class="hidden peer"
                                required>
                            <label for="guidelines_radio1" wire:click="updateguidelines('verySatisfied')" x-on:click="step++">
                                <div class="text-center relative mt-16">
                                    <div class="flex flex-col gap-2 items-center justify-center cursor-pointer">
                                        <img src="{{ asset('website/images/rating/1.svg') }}" class="drop-shadow-sm">
                                        <span class="text-white bg-[#3a8e35] rounded-lg py-1 px-2 text-sm">ممتاز</span>
                                    </div>
                                </div>
                            </label>
                        </li>

                        <li class="beep hover:drop-shadow-lg hover:scale-125 hover:-mt-8">
                            <input type="radio" id="guidelines_radio2" value="satisfied" class="hidden peer" required>
                            <label for="guidelines_radio2" wire:click="updateguidelines('satisfied')" x-on:click="step++">
                                <div class="text-center relative mt-16">
                                    <div class="flex flex-col gap-2 items-center justify-center cursor-pointer">
                                        <img src="{{ asset('website/images/rating/2.svg') }}" class="drop-shadow-sm">
                                        <span class="text-white bg-[#95bf27] rounded-lg py-1 px-2 text-sm">جيد</span>
                                    </div>
                                </div>
                            </label>
                        </li>

                        <li class="beep hover:drop-shadow-lg hover:scale-125 hover:-mt-8">
                            <input type="radio" id="guidelines_radio3" value="neutral" class="hidden peer" required>
                            <label for="guidelines_radio" wire:click="updateguidelines('neutral')" x-on:click="step++">
                                <div class="text-center relative mt-16">
                                    <div class="flex flex-col gap-2 items-center justify-center cursor-pointer">
                                        <img src="{{ asset('website/images/rating/3.svg') }}" class="drop-shadow-sm">
                                        <span class="text-white bg-[#ffae19] rounded-lg py-1 px-2 text-sm">مقبول</span>
                                    </div>
                                </div>
                            </label>
                        </li>

                        <li class="beep hover:drop-shadow-lg hover:scale-125 hover:-mt-8">
                            <input type="radio" id="guidelines_radio4" value="upset" class="hidden peer" required>
                            <label for="guidelines_radio" wire:click="updateguidelines('upset')" x-on:click="step++">
                                <div class="text-center relative mt-16">
                                    <div class="flex flex-col gap-2 items-center justify-center cursor-pointer">
                                        <img src="{{ asset('website/images/rating/4.svg') }}" class="drop-shadow-sm">
                                        <span class="text-white bg-[#f77c20] rounded-lg py-1 px-2 text-sm">غير راضي</span>
                                    </div>
                                </div>
                            </label>
                        </li>
                    </ul>

                    <h1 class="text-center text-1xl mt-16 text-gray-500">رقم السؤال: 2 من إجمالي 5 أسئلة.</h1>

                </div>
            </div>

            <div x-show="step==4" class="flex flex-col items-center justify-center animate__animated animate__backInDown">
                <div class="z-10">
                    <h1 class="text-center text-2xl md:text-4xl font-bold my-8 px-2 text-[#e34e34]" style="line-height:normal">
                        كيف تقيم تنوع الفعاليات الأدبية في المهرجان؟
                    </h1>

                    <ul class="grid w-full grid-cols-4 text-center">
                        <li class="beep hover:drop-shadow-lg hover:scale-125 hover:-mt-8">
                            <input type="radio" id="literaryEvents_radio1" value="verySatisfied" selected
                                class="hidden peer" required>
                            <label for="literaryEvents_radio1" wire:click="updateLiteraryEvents('verySatisfied')"
                                x-on:click="step++">
                                <div class="text-center relative mt-16">
                                    <div class="flex flex-col gap-2 items-center justify-center cursor-pointer">
                                        <img src="{{ asset('website/images/rating/1.svg') }}" class="drop-shadow-sm">
                                        <span class="text-white bg-[#3a8e35] rounded-lg py-1 px-2 text-sm">ممتاز</span>
                                    </div>
                                </div>
                            </label>
                        </li>

                        <li class="beep hover:drop-shadow-lg hover:scale-125 hover:-mt-8">
                            <input type="radio" id="literaryEvents_radio2" value="satisfied" class="hidden peer" required>
                            <label for="literaryEvents_radio2" wire:click="updateLiteraryEvents('satisfied')"
                                x-on:click="step++">
                                <div class="text-center relative mt-16">
                                    <div class="flex flex-col gap-2 items-center justify-center cursor-pointer">
                                        <img src="{{ asset('website/images/rating/2.svg') }}" class="drop-shadow-sm">
                                        <span class="text-white bg-[#95bf27] rounded-lg py-1 px-2 text-sm">جيد</span>
                                    </div>
                                </div>
                            </label>
                        </li>

                        <li class="beep hover:drop-shadow-lg hover:scale-125 hover:-mt-8">
                            <input type="radio" id="literaryEvents_radio3" value="neutral" class="hidden peer" required>
                            <label for="literaryEvents_radio" wire:click="updateLiteraryEvents('neutral')"
                                x-on:click="step++">
                                <div class="text-center relative mt-16">
                                    <div class="flex flex-col gap-2 items-center justify-center cursor-pointer">
                                        <img src="{{ asset('website/images/rating/3.svg') }}" class="drop-shadow-sm">
                                        <span class="text-white bg-[#ffae19] rounded-lg py-1 px-2 text-sm">مقبول</span>
                                    </div>
                                </div>
                            </label>
                        </li>

                        <li class="beep hover:drop-shadow-lg hover:scale-125 hover:-mt-8">
                            <input type="radio" id="literaryEvents_radio4" value="upset" class="hidden peer" required>
                            <label for="literaryEvents_radio" wire:click="updateLiteraryEvents('upset')" x-on:click="step++">
                                <div class="text-center relative mt-16">
                                    <div class="flex flex-col gap-2 items-center justify-center cursor-pointer">
                                        <img src="{{ asset('website/images/rating/4.svg') }}" class="drop-shadow-sm">
                                        <span class="text-white bg-[#f77c20] rounded-lg py-1 px-2 text-sm">غير راضي</span>
                                    </div>
                                </div>
                            </label>
                        </li>
                    </ul>

                    <h1 class="text-center text-1xl mt-16 text-gray-500">رقم السؤال: 3 من إجمالي 5 أسئلة.</h1>

                </div>
            </div>

            <div x-show="step==5" class="flex flex-col items-center justify-center animate__animated animate__backInDown">
                <div class="z-10">
                    <h1 class="text-center text-2xl md:text-4xl font-bold my-8 px-2 text-[#e34e34]" style="line-height:normal">
                        ماهو تقييمك للفعاليات الترفيهية في المهرجان؟
                    </h1>

                    <ul class="grid w-full grid-cols-4 text-center">
                        <li class="beep hover:drop-shadow-lg hover:scale-125 hover:-mt-8">
                            <input type="radio" id="entertainmentEvents_radio1" value="verySatisfied" selected
                                class="hidden peer" required>
                            <label for="entertainmentEvents_radio1" wire:click="updateEntertainmentEvents('verySatisfied')"
                                x-on:click="step++">
                                <div class="text-center relative mt-16">
                                    <div class="flex flex-col gap-2 items-center justify-center cursor-pointer">
                                        <img src="{{ asset('website/images/rating/1.svg') }}" class="drop-shadow-sm">
                                        <span class="text-white bg-[#3a8e35] rounded-lg py-1 px-2 text-sm">ممتاز</span>
                                    </div>
                                </div>
                            </label>
                        </li>

                        <li class="beep hover:drop-shadow-lg hover:scale-125 hover:-mt-8">
                            <input type="radio" id="entertainmentEvents_radio2" value="satisfied" class="hidden peer"
                                required>
                            <label for="entertainmentEvents_radio2" wire:click="updateEntertainmentEvents('satisfied')"
                                x-on:click="step++">
                                <div class="text-center relative mt-16">
                                    <div class="flex flex-col gap-2 items-center justify-center cursor-pointer">
                                        <img src="{{ asset('website/images/rating/2.svg') }}" class="drop-shadow-sm">
                                        <span class="text-white bg-[#95bf27] rounded-lg py-1 px-2 text-sm">جيد</span>
                                    </div>
                                </div>
                            </label>
                        </li>

                        <li class="beep hover:drop-shadow-lg hover:scale-125 hover:-mt-8">
                            <input type="radio" id="entertainmentEvents_radio3" value="neutral" class="hidden peer"
                                required>
                            <label for="entertainmentEvents_radio" wire:click="updateEntertainmentEvents('neutral')"
                                x-on:click="step++">
                                <div class="text-center relative mt-16">
                                    <div class="flex flex-col gap-2 items-center justify-center cursor-pointer">
                                        <img src="{{ asset('website/images/rating/3.svg') }}" class="drop-shadow-sm">
                                        <span class="text-white bg-[#ffae19] rounded-lg py-1 px-2 text-sm">مقبول</span>
                                    </div>
                                </div>
                            </label>
                        </li>

                        <li class="beep hover:drop-shadow-lg hover:scale-125 hover:-mt-8">
                            <input type="radio" id="entertainmentEvents_radio4" value="upset" class="hidden peer"
                                required>
                            <label for="entertainmentEvents_radio" wire:click="updateEntertainmentEvents('upset')"
                                x-on:click="step++">
                                <div class="text-center relative mt-16">
                                    <div class="flex flex-col gap-2 items-center justify-center cursor-pointer">
                                        <img src="{{ asset('website/images/rating/4.svg') }}" class="drop-shadow-sm">
                                        <span class="text-white bg-[#f77c20] rounded-lg py-1 px-2 text-sm">غير راضي</span>
                                    </div>
                                </div>
                            </label>
                        </li>
                    </ul>

                    <h1 class="text-center text-1xl mt-16 text-gray-500">رقم السؤال: 4 من إجمالي 5 أسئلة.</h1>

                </div>
            </div>

            <div x-show="step==6" class="flex flex-col items-center justify-center animate__animated animate__backInDown">
                <div class="z-10">
                    <h1 class="text-center text-2xl md:text-4xl font-bold my-8 px-2 text-[#e34e34]" style="line-height:normal">
                        هل وجدت تنوعاً في المطاعم والمقاهي المتوفرة في المهرجان؟
                    </h1>

                    <ul class="grid w-full grid-cols-4 text-center">
                        <li class="beep hover:drop-shadow-lg hover:scale-125 hover:-mt-8">
                            <input type="radio" id="restaurant_radio1" value="verySatisfied" selected class="hidden peer"
                                required>
                            <label for="restaurant_radio1" wire:click="updateRestaurant('verySatisfied')"
                                x-on:click="step++">
                                <div class="text-center relative mt-16">
                                    <div class="flex flex-col gap-2 items-center justify-center cursor-pointer">
                                        <img src="{{ asset('website/images/rating/1.svg') }}" class="drop-shadow-sm">
                                        <span class="text-white bg-[#3a8e35] rounded-lg py-1 px-2 text-sm">ممتاز</span>
                                    </div>
                                </div>
                            </label>
                        </li>

                        <li class="beep hover:drop-shadow-lg hover:scale-125 hover:-mt-8">
                            <input type="radio" id="restaurant_radio2" value="satisfied" class="hidden peer" required>
                            <label for="restaurant_radio2" wire:click="updateRestaurant('satisfied')" x-on:click="step++">
                                <div class="text-center relative mt-16">
                                    <div class="flex flex-col gap-2 items-center justify-center cursor-pointer">
                                        <img src="{{ asset('website/images/rating/2.svg') }}" class="drop-shadow-sm">
                                        <span class="text-white bg-[#95bf27] rounded-lg py-1 px-2 text-sm">جيد</span>
                                    </div>
                                </div>
                            </label>
                        </li>

                        <li class="beep hover:drop-shadow-lg hover:scale-125 hover:-mt-8">
                            <input type="radio" id="restaurant_radio3" value="neutral" class="hidden peer" required>
                            <label for="restaurant_radio" wire:click="updateRestaurant('neutral')" x-on:click="step++">
                                <div class="text-center relative mt-16">
                                    <div class="flex flex-col gap-2 items-center justify-center cursor-pointer">
                                        <img src="{{ asset('website/images/rating/3.svg') }}" class="drop-shadow-sm">
                                        <span class="text-white bg-[#ffae19] rounded-lg py-1 px-2 text-sm">مقبول</span>
                                    </div>
                                </div>
                            </label>
                        </li>

                        <li class="beep hover:drop-shadow-lg hover:scale-125 hover:-mt-8">
                            <input type="radio" id="restaurant_radio4" value="upset" class="hidden peer" required>
                            <label for="restaurant_radio" wire:click="updateRestaurant('upset')" x-on:click="step++">
                                <div class="text-center relative mt-16">
                                    <div class="flex flex-col gap-2 items-center justify-center cursor-pointer">
                                        <img src="{{ asset('website/images/rating/4.svg') }}" class="drop-shadow-sm">
                                        <span class="text-white bg-[#f77c20] rounded-lg py-1 px-2 text-sm">غير راضي</span>
                                    </div>
                                </div>
                            </label>
                        </li>
                    </ul>

                    <h1 class="text-center text-1xl mt-16 text-gray-500">رقم السؤال: 5 من إجمالي 5 أسئلة.</h1>

                </div>
            </div>

            <div x-show="step==7" class="flex flex-col items-center justify-center animate__animated animate__backInDown">
                <div class="animate__animated animate__backInDown">
                    <div class="flex flex-col items-center justify-center mt-4">
                        <h1 class="text-center text-2xl md:text-4xl font-bold my-8 px-2 text-[#e34e34]" style="line-height:normal">
                            كيف سمعت عن المهرجان؟
                        </h1>

                        <div class="grid sm:grid-cols-1 md:grid-cols-2 mx-auto justify-center mt-4 gap-4">
                            <div wire:click="updateReferral('socialmedia')" x-on:click="step++"
                                class="rounded-lg bg-[#e34e34] text-white p-8 items-center text-center font-semibold cursor-pointer beep hover:scale-95">
                                <span>مواقع التواصل الإجتماعي</span>
                            </div>
                            <div wire:click="updateReferral('billboards')" x-on:click="step++"
                                class="rounded-lg bg-[#e34e34] text-white p-8 items-center text-center font-semibold cursor-pointer beep hover:scale-95">
                                <span>اللوحات الإعلانية</span>
                            </div>
                            <div wire:click="updateReferral('website')" x-on:click="step++"
                                class="rounded-lg bg-[#e34e34] text-white p-8 items-center text-center font-semibold cursor-pointer beep hover:scale-95">
                                <span>موقع المهرجان الإلكتروني</span>
                            </div>
                            <div wire:click="updateReferral('friends')" x-on:click="step++"
                                class="rounded-lg bg-[#e34e34] text-white p-8 items-center text-center font-semibold cursor-pointer beep hover:scale-95">
                                <span>الأصدقاء</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div x-show="step==8" class="flex flex-col items-center justify-center animate__animated animate__backInDown">
                <div class="animate__animated animate__backInDown">
                    <div class="flex flex-col items-center justify-center mt-4">
                        <h1 class="text-center text-2xl md:text-4xl font-bold my-8 px-2 text-[#e34e34]" style="line-height:normal">
                            ما إحتمالية حضورك للنسخ القادمة من المهرجان؟
                        </h1>

                        <div class="grid sm:grid-cols-1 md:grid-cols-3 mx-auto justify-center mt-4 gap-4">
                            <div wire:click="updateNext('high')" x-on:click="step++"
                                class="rounded-lg bg-[#e34e34] text-white p-8 items-center text-center font-semibold cursor-pointer beep hover:scale-95">
                                <span>عالية</span>
                            </div>
                            <div wire:click="updateNext('medium')" x-on:click="step++"
                                class="rounded-lg bg-[#e34e34] text-white p-8 items-center text-center font-semibold cursor-pointer beep hover:scale-95">
                                <span>متوسطة</span>
                            </div>
                            <div wire:click="updateNext('weak')" x-on:click="step++"
                                class="rounded-lg bg-[#e34e34] text-white p-8 items-center text-center font-semibold cursor-pointer beep hover:scale-95">
                                <span>ضعيفة</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div x-show="step==9" class="flex flex-col items-center justify-center animate__animated animate__backInDown">
                <div>
                    <div class="flex flex-col items-center justify-center mt-4">
                        <h1 class="text-center text-2xl md:text-4xl font-bold my-8 px-2 text-[#e34e34]" style="line-height:normal">
                            ما إحتمالية أن تنصح من حولك بحضور النسخ القادمة من المهرجان؟
                        </h1>

                        <div class="grid sm:grid-cols-1 md:grid-cols-3 mx-auto justify-center mt-4 gap-4">
                            <div wire:click="updateSuggestion('high')" x-on:click="step++"
                                class="rounded-lg bg-[#e34e34] text-white p-8 items-center text-center font-semibold cursor-pointer beep hover:scale-95">
                                <span>عالية</span>
                            </div>
                            <div wire:click="updateSuggestion('medium')" x-on:click="step++"
                                class="rounded-lg bg-[#e34e34] text-white p-8 items-center text-center font-semibold cursor-pointer beep hover:scale-95">
                                <span>متوسطة</span>
                            </div>
                            <div wire:click="updateSuggestion('weak')" x-on:click="step++"
                                class="rounded-lg bg-[#e34e34] text-white p-8 items-center text-center font-semibold cursor-pointer beep hover:scale-95">
                                <span>ضعيفة</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div x-show="step==10">
                @php
                    $rating_list = [
                        "screen1" => [
                            'قصائد بين الطرق',
                            'مسرح الشارع المتحرك',
                            'منصة الفن',
                            'جاذبية الفلك',
                        ],
                        "screen2" => [
                            'وميض الأبجدية',
                            'حكايات الفلك',
                            'مسرح العروض التراثية',
                            'عوالم أخرى',
                        ],
                        "screen3" => [
                            'سحابة أدب',
                            'تحدّ نفسك',
                            'المتاهة',
                            'المغامرون الصغار',
                        ],
                        "screen4" => [
                            'البرنامج الثقافي',
                            'دور النشر',
                            'مسرحية اللوح الأكبر',
                            'الأماسي الغنائية',
                        ],
                        "screen5" => [
                            'الأماسي الشعرية',
                            'مسرح الشارع الثابت',
                            'بين الأدب',
                            'أدباء عبر التاريخ',
                            'الكتب المعلقة',
                        ],
                    ];

                    $rating_screens = count($rating_list);

                    $rating_full_list = array_merge(
                        $rating_list['screen1'],
                        $rating_list['screen2'],
                        $rating_list['screen3'],
                        $rating_list['screen4'],
                        $rating_list['screen5'],
                    )
                @endphp
                <div x-data="{
                    @foreach ($rating_full_list as $rating)
                        {{ Str::slug($rating, '_').':3,' }}
                    @endforeach
                }"
                    class="flex flex-col items-center justify-center animate__animated animate__backInDown">
                    <h1 class="text-center text-2xl md:text-4xl font-bold my-8 px-2 text-[#e34e34]" style="line-height:normal">
                        كيف تقيم تجربتك لتفعيلات المهرجان؟
                    </h1>

                    <h2 class="text-center text-1xl mb-4">
                        (1) تعني غير راضٍ جداً.
                        <br>
                        (5) تعني راضٍ جداً.
                    </h2>

                    <div x-data="{rating_screen: 1}">
                        <div class="z-10 p-2">
                            <div class="bg-[#e34e34] py-4 px-4 rounded-lg flex flex-col gap-2">
                                @foreach($rating_list as $rating)
                                    <div x-show="rating_screen=={{$loop->index+1}}" class="animate__animated animate__backInDown">
                                        @foreach($rating_list["screen".$loop->index+1] as $rating)
                                            <div class="mb-4">
                                                <label for="rating" class="block font-medium text-[#f1e1c6] rounded-lg mb-4">{{$rating}}</label>
                                                <div class="flex w-full">
                                                    @foreach ([1, 2, 3, 4, 5] as $value)
                                                        <div class="contents cursor-pointer text-gray-300">
                                                            <div class="w-full md:w-full">
                                                                <svg
                                                                    wire:click="updateRating('{{Str::slug($rating, '_')."',".$value}})"
                                                                    x-on:click="{{Str::slug($rating, '_')}}={{$value}}"
                                                                    :class="{ 'text-yellow-300': {{Str::slug($rating, '_')}} >= {{$value}} }"
                                                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                                    viewBox="0 0 22 20">
                                                                    <path
                                                                        d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                                                </svg>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                @endforeach
                            </div>

                             <div class="beep text-center relative hover:scale-95 mt-4 rounded-lg">
                                <img class="h-16 md:h-24 w-full" src="{{ asset('website/images/button.svg') }}"
                                    alt="">
                                <button
                                    x-on:click="rating_screen < {{$rating_screens}} ? rating_screen++ : step++"
                                    type="button"
                                    class="mt-2 absolute inset-0 flex items-center justify-center text-white text-1xl md:text-2xl font-semibold">التالي</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @if (!$this->completed)
            <div x-show="step==11">
                <div class="flex flex-col items-center justify-center animate__animated animate__backInDown">
                    <h1 class="text-center text-2xl md:text-4xl font-bold my-8 px-2 text-[#e34e34]" style="line-height:normal">
                        ماهو رأيك من خلال تجربتك للمهرجان؟
                    </h1>

                    <form wire:submit="submit">
                        <div class="z-10 p-2" x-data="{ ratingStep: 1 }">
                            <div class="bg-[#e34e34] py-4 px-4 rounded-lg flex flex-col gap-2">
                                <div class="w-full">
                                    <label for="opinion" class="block mb-2 font-medium text-[#f1e1c6]">رأيك</label>
                                    <textarea rows="5" class="w-full bg-[#f1e1c6] p-4 text-black rounded-lg" wire:model="opinion"
                                        placeholder="أكتب لنا رأيك"></textarea>
                                </div>
                            </div>

                            <div class="beep text-center relative hover:scale-95 mt-4 rounded-lg">
                                <img class="h-16 md:h-24 w-full" src="{{ asset('website/images/button.svg') }}"
                                    alt="">
                                <button type="submit"
                                    class="mt-2 absolute inset-0 flex items-center justify-center text-white text-1xl md:text-2xl font-semibold">إرسال</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            @endif

            @if ($this->completed)
                <div class="flex flex-col items-center justify-center animate__animated animate__backInDown">
                    <div class="z-10">
                        <h1 class="text-center text-2xl md:text-6xl font-bold mb-8 mt-8 text-[#e34e34]">تم إرسال البيانات</h1>

                        <div class="beep text-center relative hover:scale-95 mb-8">
                            <a href="{{ url('/surveys') }}" wire:navigate>
                                <img class="h-16 md:h-24 w-full" src="{{ asset('website/images/button.svg') }}"
                                    alt="">
                                <span
                                    class="mt-2 absolute inset-0 flex items-center justify-center text-white text-1xl md:text-2xl font-semibold">الرئيسية</span>
                            </a>
                        </div>
                    </div>
                </div>
            @endif
        </div>

        </div>
    @endvolt
@endsection

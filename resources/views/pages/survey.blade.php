<?php

use function Livewire\Volt\{rules,state};
use App\Models\Survey;

state([
    'name'         => null,
    'email'        => null,
    'phone'        => null,
    'facilities'   => null,
    'organization' => null,
    'events'       => null,
    'access'       => null,
]);

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
    <div id="app">

    <img class="story-img" src="{{asset('/website/imges/')}}/story-img.svg" alt="" />

    <form id="regForm" wire:submit="submit">
    <div class="tab" :key="tab 1">
        <div class="poll-quesition-container">
        <img class="img-box" src="{{asset('/website/imges/')}}/Path 115.svg" alt="" />

        <div class="end-container">
            <div class="img-end-btn-container">
            <img
                class="red-small-end-btn"
                src="{{asset('/website/imges/')}}/end-red-btn.svg"
                alt=""
            />

            <h2 style="left: 35%">شاركنا تجربتك</h2>
            </div>
        </div>
        </div>
    </div>
    <!-- ====================== -->
    <div class="tab" :key="tab 2">
        <div class="poll-quesition-container">
        <img class="img-box" src="{{asset('/website/imges/')}}/Path 115.svg" alt="" />

        <div class="title-container">
            <div class="img-btn-container">
            <img
                class="red-small-btn"
                src="{{asset('/website/imges/')}}/red-small-btn.svg"
                alt=""
            />

            <h2>شاركنا تجربتك</h2>
            </div>
        </div>

        <div class="questions-container">
            <ul>
            <li>

                <span>ما مدى رضاك عن مرافق المهرجان ؟</span>
                <div class="imgs-container">
                <div class="img-container">
                    <img src="{{asset('/website/imges/')}}/rating/very_suf.svg" alt="" />
                    <span class="very_suf">راضي جدا</span>
                    <input name="facilities" wire:model="facilities" value="verySatisfied" type="radio" />
                </div>
                <div class="img-container">
                    <img src="{{asset('/website/imges/')}}/rating/suf.svg" alt="" />
                    <span class="suf">راضي </span>
                    <input name="facilities" wire:model="facilities" value="satisfied" type="radio" />
                </div>
                <div class="img-container">
                    <img src="{{asset('/website/imges/')}}/rating/mid.svg" alt="" />
                    <span class="mid">محايد </span>
                    <input name="facilities" wire:model="facilities" value="neutral" type="radio" />
                </div>
                <div class="img-container">
                    <img src="{{asset('/website/imges/')}}/rating/sad.svg" alt="" />
                    <span class="sad"> مستاء</span>
                    <input name="facilities" wire:model="facilities" value="upset" type="radio" />
                </div>
                <div class="img-container">
                    <img src="{{asset('/website/imges/')}}/rating/very_sad.svg" alt="" />
                    <span class="very_sad"> مستاء جدا</span>
                    <input name="facilities" wire:model="facilities" value="veryUpset" type="radio" />
                </div>
                </div>
            </li>

            <li>
                <span>ما مدى رضاك عن تنظيم الفعالية ؟ </span>
                <div class="imgs-container">
                <div class="img-container">
                    <img src="{{asset('/website/imges/')}}/rating/very_suf.svg" alt="" />
                    <span class="very_suf">راضي جدا</span>
                    <input name="organization" wire:model="organization" value="verySatisfied" type="radio" />
                </div>
                <div class="img-container">
                    <img src="{{asset('/website/imges/')}}/rating/suf.svg" alt="" />
                    <span class="suf">راضي </span>
                    <input name="organization" wire:model="organization" value="satisfied" type="radio" />
                </div>
                <div class="img-container">
                    <img src="{{asset('/website/imges/')}}/rating/mid.svg" alt="" />
                    <span class="mid">محايد </span>
                    <input name="organization" wire:model="organization" value="neutral" type="radio" />
                </div>
                <div class="img-container">
                    <img src="{{asset('/website/imges/')}}/rating/sad.svg" alt="" />
                    <span class="sad"> مستاء</span>
                    <input name="organization" wire:model="organization" value="upset" type="radio" />
                </div>
                <div class="img-container">
                    <img src="{{asset('/website/imges/')}}/rating/very_sad.svg" alt="" />
                    <span class="very_sad"> مستاء جدا</span>
                    <input name="organization" wire:model="organization" value="veryUpset" type="radio" />
                </div>
                </div>
            </li>

            <li>
                <span>ما مدى رضاك عن الفعاليات المقامة ؟ </span>
                <div class="imgs-container">
                <div class="img-container">
                    <img src="{{asset('/website/imges/')}}/rating/very_suf.svg" alt="" />
                    <span class="very_suf">راضي جدا</span>
                    <input name="events" wire:model="events" value="verySatisfied" type="radio" />
                </div>
                <div class="img-container">
                    <img src="{{asset('/website/imges/')}}/rating/suf.svg" alt="" />
                    <span class="suf">راضي </span>
                    <input name="events" wire:model="events" value="satisfied" type="radio" />
                </div>
                <div class="img-container">
                    <img src="{{asset('/website/imges/')}}/rating/mid.svg" alt="" />
                    <span class="mid">محايد </span>
                    <input name="events" wire:model="events" value="neutral" type="radio" />
                </div>
                <div class="img-container">
                    <img src="{{asset('/website/imges/')}}/rating/sad.svg" alt="" />
                    <span class="sad"> مستاء</span>
                    <input name="events" wire:model="events" value="upset" type="radio" />
                </div>
                <div class="img-container">
                    <img src="{{asset('/website/imges/')}}/rating/very_sad.svg" alt="" />
                    <span class="very_sad"> مستاء جدا</span>
                    <input name="events" wire:model="events" value="veryUpset" type="radio" />
                </div>
                </div>
            </li>

            <li>
                <span>ما مدى رضاك عن سهولة الوصول للمهرجان ؟</span>
                <div class="imgs-container">
                <div class="img-container">
                    <img src="{{asset('/website/imges/')}}/rating/very_suf.svg" alt="" />
                    <span class="very_suf">راضي جدا</span>
                    <input name="access" wire:model="access" value="verySatisfied" type="radio" />
                </div>
                <div class="img-container">
                    <img src="{{asset('/website/imges/')}}/rating/suf.svg" alt="" />
                    <span class="suf">راضي </span>
                    <input name="access" wire:model="access" value="satisfied" type="radio" />
                </div>
                <div class="img-container">
                    <img src="{{asset('/website/imges/')}}/rating/mid.svg" alt="" />
                    <span class="mid">محايد </span>
                    <input name="access" wire:model="access" value="neutral" type="radio" />
                </div>
                <div class="img-container">
                    <img src="{{asset('/website/imges/')}}/rating/sad.svg" alt="" />
                    <span class="sad"> مستاء</span>
                    <input name="access" wire:model="access" value="upset" type="radio" />
                </div>
                <div class="img-container">
                    <img src="{{asset('/website/imges/')}}/rating/very_sad.svg" alt="" />
                    <span class="very_sad"> مستاء جدا</span>
                    <input name="access" wire:model="access" value="veryUpset" type="radio" />
                </div>
                </div>
            </li>
            </ul>
        </div>
        </div>
    </div>

    <!-- ===================================================== -->

    <div class="tab" :key="tab 3">
        <div class="personal-info-container">
        <img
            class="personal-info-img"
            src="{{asset('/website/imges/')}}/personal-info.svg"
            alt=""
        />
        <input name="name" wire:model="name" type="text" />
        <input name="phone" wire:model="phone" type="tel" />
        <input name="email" wire:model="email" type="email" />
        </div>
    </div>
    <!-- ========================== -->
    <div class="tab successTab" :key="tab 4">
        <div class="poll-quesition-container">
        <img class="img-box" src="{{asset('/website/imges/')}}/Path 115.svg" alt="" />

        <div class="end-container">
            <div class="img-end-btn-container">
            <img
                class="red-small-end-btn"
                src="{{asset('/website/imges/')}}/end-red-btn.svg"
                alt=""
            />

            <h2>تم ارسال البيانات</h2>
            </div>
        </div>
        </div>
    </div>

    <!-- ========================== -->

    <div class="rating-footer">
        <div class="d-flex justify-content-evenly" id="btnsContainer">
        <div class="img-btn mt-3"
        id="nextBtnContainer"
        >
            <img src="{{asset('/website/imges/')}}/start-btn.svg" alt="" />
            <button
            type="button"
            onclick="nextPrev(1)"
            id="nextBtn"
            class="button-form"
            >
            التالي
            </button>
        </div>
        <div class="img-btn mt-3" id="prevBtn">
            <img src="{{asset('/website/imges/')}}/start-btn.svg" alt="" />
            <button type="button" onclick="nextPrev(-1)" class="button-form">
            السابق
        </button>
        </div>
        </div>
        <div style="text-align: center; margin-top: 40px">
        <span class="step"></span>
        <span class="step"></span>
        <span class="step"></span>
        </div>
    </div>

    </form>

    <!-- footer -->
    <div class="styling-footer">
    <img class="right-footer" src="{{asset('/website/imges/')}}/Group 33.svg" alt="" />
    <img class="left-footer" src="{{asset('/website/imges/')}}/Group 33.svg" alt="" />
    </div>
</div>

<script src="{{asset('website/js/survey.js')}}"></script>
@endvolt
@endsection

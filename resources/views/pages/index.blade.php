<?php

use function Livewire\Volt\{rules,state};
use App\Models\Question;

state([
    'questionsTotal' => Question::inRandomOrder()->limit(setting('questionsCount'))->count(),
]);

?>

@extends('layouts.app')

@section('title', 'مرحبا')

@section('content')
@volt
<div class="px-8 mb-4">
    <div class="flex flex-col items-center justify-center my-8">
        <div class="z-10">
            <img src="{{ asset('website/images/navbar.svg') }}" class="mt-4 w-[100%] h-[70px] md:h-[100px] mx-auto">

                <div class="grid sm:grid-cols-1 md:grid-cols-2 mx-auto justify-center mt-12 gap-4">

                    @foreach ([
                        [
                            "title" => "تحد نفسك",
                            "link" => "/challenges"
                        ],
                        [
                            "title" => "إستبيان",
                            "link" => "/surveys"
                        ],
                        [
                            "title" => "الأقصوصة",
                            "link" => "/story"
                        ],
                        [
                            "title" => "أدب الرحلات",
                            "link" => "/adab-alrihlat"
                        ],
                        [
                            "title" => "أدباء عبر التاريخ",
                            "link" => "/writers"
                        ],
                        [
                            "title" => "شارك قصيدتك",
                            "link" => "/poems"
                        ],
                        [
                            "title" => "جدول القصائد النبطي",
                            "link" => "/poems/table/nabati"
                        ],
                        [
                            "title" => "جدول القصائد الفصحى",
                            "link" => "/poems/table/fosha"
                        ],
                        [
                            "title" => "تسجيل الزوار",
                            "link" => "/visitors"
                        ],
                        [
                            "title" => "تسجيل كبار الزوار",
                            "link" => "/visitors/vip"
                        ],
                    ] as $link)

                    <div class="beep text-center relative hover:scale-95">
                        <img class="h-16 md:h-24 w-full" src="{{ asset('website/images/button.svg') }}">
                        <a wire:navigate href="{{ url($link['link']) }}" class="mt-2 absolute inset-0 flex items-center justify-center text-white text-1xl md:text-2xl font-semibold">{{$link['title']}}</a>
                    </div>
                    @endforeach
                </div>
        </div>
    </div>
</div>
@endvolt
@endsection

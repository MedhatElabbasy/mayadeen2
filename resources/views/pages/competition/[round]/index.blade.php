<?php

use function Livewire\Volt\{rules, state, computed};

use App\Models\Competition;
use App\Models\CompetitionVote;

$competition = Competition::get();

state([
    'votes'        => CompetitionVote::where('round', request('round'))->get(),
    'votes_team_1' => CompetitionVote::where('round', request('round'))->where('team', 1)->count(),
    'votes_team_2' => CompetitionVote::where('round', request('round'))->where('team', 2)->count(),
    'round'        => request('round'),
    'round_title'  => match(request('round')) {
            "1"     => "الأولى",
            "2"     => "الثانية",
            "3"     => "الثالثة",
            default => "الأولى",
        },
    'day'        => $competition->where('key', 'day')->first()->value,
    'start_time' => $competition->where('key', 'round_'.request('round').'_start_time')->first()?->value,
    'end_time'   => $competition->where('key', 'round_'.request('round').'_end_time')->first()?->value,
]);

$vote = function ($team, $round) {
    CompetitionVote::create([
        'team'  => $team,
        'round' => $round,
    ]);
};
?>

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

        @if(
            $this->day == now('Asia/Riyadh')->format('Y-m-d') 
            && now('Asia/Riyadh')->between($this->start_time, $this->end_time)
        )
        <div x-show="step == 1" class="px-8">
            <div class="flex flex-col items-center justify-center my-8">
                <div class="z-10">
                    <h1 class="text-center text-2xl md:text-5xl font-bold my-8 text-[#e34e34]">الجولة {{ $this->round_title }}</h1>
                    <h2 class="text-center text-1xl md:text-4xl font-bold my-8 text-[#e34e34]">صوت لفريقك</h2>

                    <div class="grid sm:grid-cols-1 md:grid-cols-2 mx-auto justify-center mt-12 gap-4">

                        <div class="beep text-center relative hover:scale-95 cursor-pointer"
                            wire:click="vote(1,{{$this->round}})" x-on:click="step++">
                            <img class="h-16 md:h-24 w-full" src="{{ asset('website/images/button.svg') }}">
                            <span class="mt-2 absolute inset-0 flex items-center justify-center text-white text-1xl md:text-2xl font-semibold">الفريق المعارض ( الأدب )</span>
                        </div>

                        <div class="beep text-center relative hover:scale-95 cursor-pointer"
                            wire:click="vote(2,{{$this->round}})" x-on:click="step++">
                            <img class="h-16 md:h-24 w-full" src="{{ asset('website/images/button.svg') }}">
                            <span class="mt-2 absolute inset-0 flex items-center justify-center text-white text-1xl md:text-2xl font-semibold">الفريق المؤيد ( السينما )</span>
                        </div>

                        <h3 class="text-center text-1xl md:text-2xl font-bold my-8 text-black">
                            الفريق المعارض ( الأدب ) : {{ $this->votes_team_1 }}
                        </h3>
    
                        <h3 class="text-center text-1xl md:text-2xl font-bold my-8 text-black">
                            الفريق المؤيد ( السينما ) : {{ $this->votes_team_2 }}
                        </h3>

                    </div>
                </div>
            </div>
        </div>

        <div x-show="step == 2" class="px-8">
            <div class="flex flex-col items-center my-8 md:my-4 justify-center animate__animated animate__backInDown">
                <div class="container mx-auto px-4 justify">
                    <h1 class="text-center text-2xl md:text-5xl font-bold my-8 text-[#e34e34]">تم إرسال تصويتك </h1>
                   
                </div>
            </div>
        </div>
        @else
        <div x-show="step == 1" class="px-8">
            <div class="flex flex-col items-center justify-center my-8">
                <div class="z-10">
                    @if(
                        $this->day == now('Asia/Riyadh')->format('Y-m-d') 
                        && now('Asia/Riyadh')->gt($this->end_time)
                    )
                        <h1 class="text-center text-2xl md:text-5xl font-bold my-8 text-[#e34e34]"> الفائز فى الجولة {{ $this->round_title }}</h1>
                    
                        @if($this->votes->count()!=0 && $this->votes_team_1 > $this->votes_team_2)
                            <h2 class="text-center text-1xl md:text-4xl font-bold my-8 text-black">الفريق المعارض ( الأدب ) </h2>
                        @endif
                    
                        @if($this->votes->count()!=0 && $this->votes_team_1 < $this->votes_team_2)
                            <h2 class="text-center text-1xl md:text-4xl font-bold my-8 text-black">الفريق المؤيد ( السينما ) </h2>
                        @endif

                        @if($this->votes->count()!=0 && $this->votes_team_1 == $this->votes_team_2)
                            <h2 class="text-center text-1xl md:text-4xl font-bold my-8 text-black">تعادل </h2>
                        @endif
                    
                        @if($this->votes->count() == 0)
                            <h2 class="text-center text-1xl md:text-4xl font-bold my-8 text-black">تعادل</h2>
                        @endif

                        <h2 class="text-center text-1xl md:text-4xl font-bold my-8 text-[#e34e34] mt-12">إجمالي الأصوات</h2>

                        <h3 class="text-center text-1xl md:text-4xl font-bold my-8 text-black">
                            الفريق المعارض ( الأدب ) : {{ $this->votes_team_1 }}
                        </h3>

                        <h3 class="text-center text-1xl md:text-4xl font-bold my-8 text-black">
                            الفريق المؤيد ( السينما ) : {{ $this->votes_team_2 }}
                        </h3>
                    @else   
                        <h1 class="text-center text-2xl md:text-5xl font-bold my-8 text-[#e34e34]">الجولة {{ $this->round_title }}</h1>
                        <h1 class="text-center text-1xl md:text-4xl font-bold my-8 text-[#e34e34]">لم يبدأ التصويت بعد</h1>
                    @endif
                </div>
            </div>
        </div>
        @endif

        </div>
    @endvolt
@endsection
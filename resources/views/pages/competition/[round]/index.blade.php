<?php

use function Livewire\Volt\{rules, state, computed};

use App\Models\Competition;
use App\Models\CompetitionVote;

$competition = Competition::get();
$votes = CompetitionVote::where('round', request('round'));

state([
    'votes'        => $votes->get(),
    'votes_team_1' => $votes->where('team', 1)->count(),
    'votes_team_2' => $votes->where('team', 2)->count(),
    'round'        => request('round'),
    'day'          => $competition->where('key', 'day')->first()->value,
    'start_time'   => $competition->where('key', 'round_'.request('round').'_start_time')->first()?->value,
    'end_time'     => $competition->where('key', 'round_'.request('round').'_end_time')->first()?->value,
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
                    <h1 class="text-center text-2xl md:text-5xl font-bold my-8 text-[#e34e34]">الجولة {{request('round')}}💪</h1>
                    <h2 class="text-center text-1xl md:text-4xl font-bold my-8 text-[#e34e34]">صوت لفريقك🤝</h2>

                    <div class="grid sm:grid-cols-1 md:grid-cols-2 mx-auto justify-center mt-12 gap-4">

                        <div class="beep text-center relative hover:scale-95 cursor-pointer"
                            wire:click="vote(1,{{$this->round}})" x-on:click="step++">
                            <img class="h-16 md:h-24 w-full" src="{{ asset('website/images/button.svg') }}">
                            <span class="mt-2 absolute inset-0 flex items-center justify-center text-white text-1xl md:text-2xl font-semibold">الفريق الأول</span>
                        </div>

                        <div class="beep text-center relative hover:scale-95 cursor-pointer"
                            wire:click="vote(2,{{$this->round}})" x-on:click="step++">
                            <img class="h-16 md:h-24 w-full" src="{{ asset('website/images/button.svg') }}">
                            <span class="mt-2 absolute inset-0 flex items-center justify-center text-white text-1xl md:text-2xl font-semibold">الفريق الثاني</span>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div x-show="step == 2" class="px-8">
            <div class="flex flex-col items-center my-8 md:my-4 justify-center animate__animated animate__backInDown">
                <div class="container mx-auto px-4 justify">
                    <h1 class="text-center text-2xl md:text-5xl font-bold my-8 text-[#e34e34]">تم إرسال تصويتك ✍️</h1>

                    <div class="z-10">
                        <div class="beep text-center relative hover:scale-95 mb-8">
                            <a href="{{url('/competition')}}" wire:navigate>
                                <img class="h-16 md:h-24 w-full" src="{{ asset('website/images/button.svg') }}"
                                    alt="">
                                <span
                                    class="mt-2 absolute inset-0 flex items-center justify-center text-white text-1xl md:text-2xl font-semibold">الرئيسية</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @else
        <div x-show="step == 1" class="px-8">
            <div class="flex flex-col items-center justify-center my-8">
                <div class="z-10">
                    @if($this->votes->count()!=0)
                        <h1 class="text-center text-2xl md:text-5xl font-bold my-8 text-[#e34e34]">الفائز💪</h1>
                    @endif
                
                    @if($this->votes->count()!=0 && $this->votes_team_1 > $this->votes_team_2)
                        <h1 class="text-center text-1xl md:text-4xl font-bold my-8 text-[#e34e34]">الفريق الأول 🤚</h1>
                    @endif
                
                    @if($this->votes->count()!=0 && $this->votes_team_1 < $this->votes_team_2)
                        <h1 class="text-center text-1xl md:text-4xl font-bold my-8 text-[#e34e34]">الفريق الثاني 🤚</h1>
                    @endif

                    @if($this->votes->count()!=0 && $this->votes_team_1 == $this->votes_team_2)
                    <h1 class="text-center text-1xl md:text-4xl font-bold my-8 text-[#e34e34]">تعادل 🤚</h1>
                    @endif
                
                    @if($this->votes->count() == 0)
                        <h1 class="text-center text-2xl md:text-5xl font-bold my-8 text-[#e34e34]">الجولة {{ request('round') }}💪</h1>
                        <h1 class="text-center text-1xl md:text-4xl font-bold my-8 text-[#e34e34]">غير متاح الآن🤚</h1>
                    @endif
                </div>
            </div>
        </div>
        @endif

        </div>
    @endvolt
@endsection
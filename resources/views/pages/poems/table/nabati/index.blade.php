<?php

use function Livewire\Volt\{rules, state, computed};
use App\Models\DatesOfPoem;

$days = DatesOfPoem::select('date')->where('type', 'nabati')->distinct()->orderBy('date', 'asc')->get()->pluck('date');

state([
    'days' => $days,
    'currentDay' => $days->first(),
]);

$dates = computed(function () {
    return DatesOfPoem::where('type', 'nabati')->where('date', $this->currentDay)->get();
});

$nowDates = computed(function () {
    return DatesOfPoem::where('type', 'nabati')->where('date', now('Asia/Riyadh')->format('Y-m-d'))->get();
});

?>

@extends('layouts.app')

@section('title', 'جدول القصائد')

@section('content')
    @volt
        <div id="app" class="mb-4">
            <div class="px-0">
                <div class="py-2 px-2 md:px-8 bg-[#ec6646]">
                    <img src="{{ asset('website/images/navbar-light.svg') }}" class="mt-4 w-[100%] h-[70px] md:h-[100px] mx-auto">

                    <p class="text-center text-1xl md:text-2xl p-4 font-semibold text-black" style="line-height:normal">
                        استعدوا لتجربة شعرية استثنائية،
                        في هذه المساحة
                        سيقوم الشاعر بإلقاء قصائد الشعر النبطي
                        بصوت جهور مصحوب بإيقاعات موسيقية.
                    </p>

                    <div class="mb-2 text-2xl font-bold flex flex-col justify-center items-center text-center">
                        @if($this->currentDay)
                        <select wire:model.change="currentDay" name="day" class="text-[#ec6646] bg-white py-1 px-2 cursor-pointer rounded-lg text-sm">
                            @foreach ($days as $day)
                                <option value="{{ $day }}">{{\Carbon\Carbon::createFromDate($day)->translatedFormat('j F')}}</option>
                            @endforeach
                        </select>
                        @endif
                    </div>

                    <div class="relative overflow-x-auto shadow-md">
                        <table class="w-full text-sm text-right text-black border-2 border-black">
                            <thead class="text-sm md:text-2xl text-black bg-[#f1e1c6] text-center">
                                <tr>
                                    <th class="border-2 border-black p-2 text-base">صاحب القصيده</th>
                                    <th class="border-2 border-black p-2 text-base">الوقت</th>
                                    <th class="border-2 border-black p-2 text-base">التفاصيل</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($this->dates as $item)
                                    <tr class="text-sm md:text-lg text-black bg-[#f1e1c6] text-center">
                                        <td @if($item->is_break) class="border-2 border-black p-2 bg-[#f4ceb0]" @else class="border-2 border-black p-2" @endif>
                                            {{ !$item->is_break ? $item->owner : 'استراحة' }}
                                        </td>
                                        <td @if($item->is_break) class="border-2 border-black p-2 bg-[#f4ceb0]" @else class="border-2 border-black p-2" @endif>
                                            {{ \Carbon\Carbon::createFromFormat('H:i:s', $item->start_time)->translatedFormat('h:i A').' - '.\Carbon\Carbon::createFromFormat('H:i:s', $item->end_time)->translatedFormat('h:i A') }}
                                        </td>
                                        <td @if($item->is_break) class="border-2 border-black p-2 bg-[#f4ceb0]" @else class="border-2 border-black p-2" @endif>
                                            {{ !$item->is_break ? $item->details : 'استراحة' }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>

                <div wire:ignore x-data="{ currentDate: 0 }">
                    @foreach ($this->nowDates as $item)
                        <div x-data="{
                            showContent: false,
                            countDownDate: new Date('{{ now('Asia/Riyadh')->format('Y-m-d') }}T{{$item->start_time}}').getTime(),
                            pad: function(num) {
                            return num < 10 ? '0' + num : num;
                            },
                            intervalId: null,
                            initCountdown: function() {
                            this.intervalId = setInterval(() => {
                                const now = new Date().getTime();
                                const distance = this.countDownDate - now;
                                this.showContent = true;

                                if (distance >= 0) {
                                const hours = this.pad(Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60)));
                                const minutes = this.pad(Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60)));
                                const seconds = this.pad(Math.floor((distance % (1000 * 60)) / 1000));
                                this.formatCountdown = `${hours}:${minutes}:${seconds}`;
                                } else {
                                this.formatCountdown = 'بدأت';
                                this.currentDate++;
                                this.showContent = false;
                                clearInterval(this.intervalId);
                                }
                            }, 1000);
                            },
                            formatCountdown: '00h 00m 00s',
                        }" x-init="initCountdown" x-show="showContent && currentDate=={{$loop->index}}" class="mt-4 text-2xl font-bold flex flex-col justify-center items-center">
                            <h1>
                                {{ !$item->is_break ? $item->owner : 'استراحة' }}
                            </h1>

                            @if(!$item->is_break)
                            <p class="mt-2 text-center font-normal text-2xl">
                                {{ $item->details }}
                            </p>
                            @endif
                            <p x-text="formatCountdown" class="mt-2 rounded-lg py-1 px-2 text-2xl bg-[#ec6646] text-white font-bold"></p>
                        </div>
                    @endforeach
                    </div>

                <div class="flex flex-col justify-center items-center px-4">
                    @if(setting('shareYourPoemQrCode'))
                        <img class="py-2 rounded-lg max-w-32 max-h-32" src="{{ url('storage/'.setting('shareYourPoemQrCode')) }}">
                    @endif

                    <span class="text-1xl md:text-2xl text-center font-bold py-2">شاركنا قصيدتك بالفصحى !</span>
                    <img class="py-2" src="{{ asset('website/images/palm-horizontal.svg') }}">
                </div>

            </div>
        </div>
    @endvolt
@endsection

<?php

use function Livewire\Volt\{rules, state, computed};
use App\Models\DatesOfPoem;

$days = DatesOfPoem::select('date')->where('type', 'fosha')->distinct()->orderBy('date', 'asc')->get()->pluck('date');

state([
    'days' => $days,
    'currentDay' => $days->first(),
]);

$dates = computed(function () {
    return DatesOfPoem::where('type', 'fosha')->where('date', $this->currentDay)->get();
});

?>

@extends('layouts.app')

@section('title', 'جدول القصائد')

@section('content')
    @volt
        <div id="app" class="mb-4">
            <div class="px-0 md:px-48">
                <div class="py-2 px-2 md:px-8 bg-[#ec6646]">
                    <img src="{{ asset('website/images/navbar-light.svg') }}" class="w-full md:w-auto sm:w-6 mx-auto">

                    <p class="text-center text-1xl md:text-2xl p-4 font-semibold text-black" style="line-height:normal">
                        استعدوا لتجربة شعرية استثنائية،
                        في هذه المساحة
                        سيقوم الشاعر بإلقاء قصائد الشعر الفصيح
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
                                    <th class="border-2 border-black p-2 text-base">الوقت (التاريخ: {{\Carbon\Carbon::createFromDate($this->currentDay)->translatedFormat('j F')}})</th>
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
                                            {{ $item->start_time.' - '.$item->end_time }}
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
                    @foreach ($this->dates as $item)
                        <div x-data="{
                            showContent: false,
                            countDownDate: new Date('{{ \Carbon\Carbon::now()->format("Y-m-d") }}T{{$item->start_time}}').getTime(),
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
                        }" x-init="initCountdown" x-show="showContent && currentDate=={{$loop->index}}" class="mt-4 text-4xl font-bold flex flex-col justify-center items-center">
                            <h1>
                                {{ !$item->is_break ? $item->owner : 'استراحة' }}
                            </h1>

                            @if(!$item->is_break)
                            <p class="mt-2 text-center font-normal text-2xl">
                                {{ $item->details }}
                            </p>
                            @endif
                            <p x-text="formatCountdown" class="mt-2 rounded-lg py-2 px-4 text-2xl bg-[#ec6646] text-white font-bold"></p>
                        </div>
                    @endforeach
                    </div>

                <div class="flex flex-col justify-center items-center px-4">
                    @if(setting('shareYourPoemQrCode'))
                        <img class="py-8 rounded-lg max-w-40 max-h-40" src="{{ url('storage/'.setting('shareYourPoemQrCode')) }}">
                    @endif

                    <span class="text-1xl md:text-2xl text-center font-bold py-2">شاركنا قصيدتك بالفصحى !</span>
                    <img class="py-2" src="{{ asset('website/images/palm-horizontal.svg') }}">
                </div>

            </div>
        </div>

    @script
    function timer(expiry) {
        return {
            expiry: expiry,
            remaining:null,
            init() {
            this.setRemaining()
            setInterval(() => {
                this.setRemaining();
            }, 1000);
            },
            setRemaining() {
            const diff = this.expiry - new Date().getTime();
            this.remaining =  parseInt(diff / 1000);
            },
            days() {
            return {
                value:this.remaining / 86400,
                remaining:this.remaining % 86400
            };
            },
            hours() {
            return {
                value:this.days().remaining / 3600,
                remaining:this.days().remaining % 3600
            };
            },
            minutes() {
                return {
                value:this.hours().remaining / 60,
                remaining:this.hours().remaining % 60
            };
            },
            seconds() {
                return {
                value:this.minutes().remaining,
            };
            },
            format(value) {
            return ("0" + parseInt(value)).slice(-2)
            },
            time(){
                return {
                days:this.format(this.days().value),
                hours:this.format(this.hours().value),
                minutes:this.format(this.minutes().value),
                seconds:this.format(this.seconds().value),
            }
            },
        }
        }
    @endscript
    @endvolt
@endsection

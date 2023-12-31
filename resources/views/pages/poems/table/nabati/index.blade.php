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

?>

@extends('layouts.app')

@section('title', 'جدول القصائد')


@section('content')
    @volt
        <div id="app">
            <div class="px-0 md:px-48">
                <div class="py-20 md:py-40 px-2 md:px-8 bg-[#ec6646]">
                    <img src="{{ asset('website/images/navbar-light.svg') }}" class="w-full md:w-auto sm:w-6 mx-auto">
                
                    <div class="mt-4 text-2xl font-bold flex flex-col justify-center items-center text-center">
                        @if($this->currentDay)
                        <h1 class="text-black mb-4">اليوم</h1>
    
                        <select wire:model.change="currentDay" name="day" class="text-[#ec6646] bg-white py-1 px-2 cursor-pointer rounded-lg">
                            @foreach ($days as $day)
                                <option value="{{ $day }}">{{\Carbon\Carbon::createFromDate($day)->translatedFormat('j F')}}</option>
                            @endforeach
                        </select>
                        @endif
                    </div>

                    <p class="text-center text-2xl md:text-4xl p-4 font-semibold text-black" style="line-height:normal">
                        استعدوا لتجربة شعرية استثنائية،
                        في هذه المساحة
                        سيقوم الشاعر بإلقاء قصائد الشعر النبطي
                        بصوت جهور مصحوب بإيقاعات موسيقية.
                    </p>

                    <div class="relative overflow-x-auto shadow-md">
                        @if($this->currentDay)
                        <table class="w-full text-sm text-right text-black border-2 border-black">
                            <thead class="text-sm md:text-2xl text-black bg-[#f1e1c6] text-center">
                                <tr>
                                    <th class="border-2 border-black px-4 py-6">صاحب القصيده</th>
                                    <th class="border-2 border-black px-4 py-6">الوقت (التاريخ: {{\Carbon\Carbon::createFromDate($this->currentDay)->translatedFormat('j F')}})</th>
                                    <th class="border-2 border-black px-4 py-6">التفاصيل</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($this->dates as $item)
                                    <tr class="text-sm md:text-lg text-black bg-[#f1e1c6] text-center">
                                        <td @if($item->is_break) class="border-2 border-black px-2 py-4 bg-[#f4ceb0]" @else class="border-2 border-black px-2 py-4" @endif>
                                            {{ !$item->is_break ? $item->owner : 'استراحة' }}
                                        </td>
                                        <td @if($item->is_break) class="border-2 border-black px-2 py-4 bg-[#f4ceb0]" @else class="border-2 border-black px-2 py-4" @endif>
                                            {{ $item->start_time.' - '.$item->end_time }}
                                        </td>
                                        <td @if($item->is_break) class="border-2 border-black px-2 py-4 bg-[#f4ceb0]" @else class="border-2 border-black px-2 py-4" @endif>
                                            {{ !$item->is_break ? $item->details : 'استراحة' }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @endif
                    </div>

                </div>

                <!--
                    <div class="mt-24 text-4xl font-bold flex flex-col justify-center items-center">
                        <h1>اسم القصيدة</h1>
                        <span class="m-12 p-4 text-4xl bg-[#ec6646] text-white font-bold">1.30.1</span>
                    </div>
                -->

                <div class="flex flex-col justify-center items-center px-4">
                    <!--
                    <img class="py-8" src="{{ asset('website/images/qr.png') }}">
                    -->

                    <span class="text-3xl md:text-4xl text-center font-bold py-8">شاركنا قصيدتك بالنبطي !</span>
                    <img class="py-8" src="{{ asset('website/images/palm-horizontal.svg') }}">
                </div>

            </div>
        </div>
    @endvolt
@endsection

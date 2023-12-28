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
        <div id="app">
            <div class="px-0 md:px-48">
                <div class="py-20 md:py-40 px-2 md:px-8 bg-[#ec6646]">
                    <p class="text-center text-2xl md:text-4xl my-8 p-4 font-semibold text-black">
                        استعدوا لتجربة شعرية استثنائية،
                        في هذه المساحة
                        سيقوم الشاعر بإلقاء قصائد الشعر الفصيح
                        بصوت جهور مصحوب بإيقاعات موسيقية.
                    </p>

                    <div class="relative overflow-x-auto shadow-md">
                        <table class="w-full text-sm text-right text-black border-2 border-black">
                            <thead class="text-sm md:text-2xl text-black bg-[#f1e1c6] text-center">
                                <tr>
                                    <th class="border-2 border-black px-4 py-6">صاحب القصيده</th>
                                    <th class="border-2 border-black px-4 py-6">الوقت (التاريخ {{\Carbon\Carbon::createFromDate($this->currentDay)->translatedFormat('j F')}})</th>
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
                    </div>

                </div>

                <div class="mt-24 text-4xl font-bold flex flex-col justify-center items-center text-center">
                    <h1 class="text-black mb-4">اليوم</h1>

                    <select wire:model.change="currentDay" name="day" class="bg-[#ec6646] text-white rounded-lg">
                        @foreach ($days as $day)
                            <option value="{{ $day }}">{{ $day }}</option>
                        @endforeach
                    </select>
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

                    <span class="text-3xl md:text-4xl text-center font-bold py-8">شاركنا قصيدتك بالفصحة !</span>
                    <img class="py-8" src="{{ asset('website/images/palm-horizontal.svg') }}">
                </div>

            </div>
        </div>
    @endvolt
@endsection

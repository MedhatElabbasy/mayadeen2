<?php

use App\Models\DatesOfPoem;

?>


        <div id="app" class="mb-4">
            <div class="px-0 md:px-8 lg:px-48">
                <div class="py-20 md:py-40 px-2 md:px-8 bg-[#ec6646]">
                    <img src="{{ asset('website/images/navbar-light.svg') }}" class="w-full md:w-auto sm:w-6 mx-auto">

                    <p class="text-center text-2xl md:text-4xl p-4 font-semibold text-black" style="line-height:normal">
                        استعدوا لتجربة شعرية استثنائية،
                        في هذه المساحة
                        سيقوم الشاعر بإلقاء قصائد الشعر النبطي
                        بصوت جهور مصحوب بإيقاعات موسيقية.
                    </p>

                    <div class="mb-4 text-2xl font-bold flex flex-col justify-center items-center text-center">
                        @if($this->currentDay)
                        <select wire:model.change="currentDay" name="day" class="text-[#ec6646] bg-white py-1 px-2 cursor-pointer rounded-lg">
                            @foreach ($days as $day)
                                <option value="{{ $day }}">{{\Carbon\Carbon::createFromDate($day)->translatedFormat('j F')}}</option>
                            @endforeach
                        </select>
                        @endif
                    </div>

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

                @if($this->currentDay)
                <div x-data="{ currentDate: 0 }">
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
                        }" x-init="initCountdown" x-show="showContent && currentDate=={{$loop->index}}" class="mt-24 text-4xl font-bold flex flex-col justify-center items-center">
                            <h1>
                                {{ !$item->is_break ? $item->owner : 'استراحة' }}
                            </h1>

                            @if(!$item->is_break)
                            <p class="mt-4 text-center font-normal">
                                {{ $item->details }}
                            </p>
                            @endif
                            <p x-text="formatCountdown" class="m-12 rounded-lg p-4 text-4xl bg-[#ec6646] text-white font-bold"></p>
                        </div>
                    @endforeach
                    </div>
                    @endif

                <div class="flex flex-col justify-center items-center px-4">
                    @if(asset('website/images/qr.png'))
                        <img class="py-8 rounded-lg" src="{{ asset('website/images/qr.png') }}">
                    @endif

                    <span class="text-3xl md:text-4xl text-center font-bold py-8">شاركنا قصيدتك بالنبطي !</span>
                    <img class="py-8" src="{{ asset('website/images/palm-horizontal.svg') }}">
                </div>
            </div>
        </div>
    
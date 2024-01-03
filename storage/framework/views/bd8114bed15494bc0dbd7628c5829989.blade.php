<?php

use App\Models\Writer;

?>


<div id="app" class="mb-4">
    <div class="flex flex-col justify-center items-center p-8">
        <a href="{{ url('/writers') }}" wire:navigate>
            <img src="{{ asset('website/images/navbar-light.svg') }}">
        </a>

        <div class="bg-[#f2e7d1] mt-8 rounded-3xl p-8 text-center justify-center items-center w-12/12 md:w-8/12">
            <h1 class="font-semibold mt-4 text-4xl">الاقتباسات</h1>

            <p class="m-8" style="line-height:normal">{!! $this->writer->quote !!}</p>

            <div class="flex flex-col justify-center items-center">
                <img src="{{ asset('website/images/palm-horizontal.svg') }}" class="h-36 w-36">
            </div>

            <div class="flex justify-between mt-12">
                <div>
                    <a href="{{ url('/writers/'.$writer->id.'/works') }}" wire:navigate class="flex gap-2 justify-center items-start">
                        <p class="font-semibold">الأعمال</p>
                        <img src="{{ asset('website/images/arrow-right.svg') }}" class="w-6">
                    </a>
                </div>

                <div>
                    <a href="{{ url('/writers/'.$writer->id) }}" wire:navigate class="flex gap-2 justify-center items-start">
                        <img src="{{ asset('website/images/arrow-left.png') }}" class="w-6">
                        <p class="font-semibold">الأديب</p>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
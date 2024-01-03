<?php

use App\Models\Writer;

?>


<div id="app">

    <div class="flex flex-col justify-center items-center p-8">
        <a href="{{ url('/') }}" wire:navigate>
            <img src="{{ asset('website/images/navbar-light.svg') }}" class="w-full md:w-auto sm:w-6 mx-auto">
        </a>

        <div class="bg-[#f2e7d1] mt-8 rounded-3xl p-8 text-center justify-center items-center w-12/12 md:w-8/12">
            <div class="flex flex-col justify-center items-center">
                <img
                src="{{asset('storage/'.$this->writer->image)}}"
                class="rounded-3xl h-60 w-60"
                >
            </div>
            <h1 class="font-semibold mt-4">{{$this->writer->name}}</h1>

            <p class="font-semibold mt-2">({{ $this->writer->birthday.' / '.$this->writer->deathday }})</p>

            <h1 class="font-semibold mt-4">المقدمة</h1>
            <p class="mb-4">{!! $this->writer->about !!}</p>

            <div class="flex flex-col justify-center items-center">
                <img src="{{ asset('website/images/palm-horizontal.svg') }}" class="h-36 w-36">
            </div>

            <div class="flex flex-col justify-center items-center">
                @if($this->writer->podcast)
                <audio controls class="mb-4 bg-gray-200 rounded-lg">
                    <source src="{{ asset("storage/".$this->writer->podcast) }}">
                    تعذر بدأ مشغل الصوت.
                </audio>
                @endif

                @if($this->writer->qr)
                <img src="{{ asset("storage/".$this->writer->qr) }}" class="h-24 w-24 rounded-lg">
                @endif
            </div>

            <div class="flex justify-between mt-12">
                <div>
                    <a href="{{ url('/writers/'.$writer->id.'/quote') }}" wire:navigate class="flex gap-2 justify-center items-start">
                        <img src="{{ asset('website/images/arrow-right.png') }}" class="w-6">
                        <p class="font-semibold">الإقتباسات</p>
                    </a>
                </div>

                <div>
                    <a href="{{ url('/writers/'.$writer->id.'/works') }}" wire:navigate class="flex gap-2 justify-center items-start">
                        <p class="font-semibold">الأعمال</p>
                        <img src="{{ asset('website/images/arrow-left.svg') }}" class="w-6">
                    </a>
                </div>
            </div>
        </div>
    </div>

</div>
@script
<script>
Calamansi.autoload();
</script>
@endscript

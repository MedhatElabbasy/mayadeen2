<?php

use function Livewire\Volt\{rules, state};
use App\Models\Poem;

// $poems = Poem::get();

state([
    'completed' => false,
    'type' => null,
    'name' => null,
    'poem' => null,
    'author' => null,
    'phone' => null,
    'email' => null,
    // 'currentPoems' => 'faq',
    // 'faqPoems' => $poems->where('type', 'faq'),
    // 'nabatiehPoems' => $poems->where('type', 'Nabatieh'),

]);





rules([
    'type'   => 'required|in:Nabatieh,faq',
    'name' => "required",
    'poem'    => 'required',
    'author'    => 'required|min:2',
    'phone'  => 'required|min:9',
    'email'   => 'required|email',
  
]);

$selectedType =function($value)
    {
        $this->type = $value;
    };

    $submit = function ()
        {
            //  $this->validate();
          Poem::create([
                'type'         => $this->type,
                'name'          =>$this->name,
                'poem'       => $this->poem,
                'author'       => $this->author,
                'phone'     => $this->phone,
                'email'      => $this->email,
              
            ]);
            $this->completed = true;
        };

?>
@extends('layouts.app')

@push('head')
    <link rel="stylesheet" href="{{ asset('website/css/poll-quesition.css') }}" />
    <link rel="stylesheet" href="{{ asset('website/css/global-style.css') }}" />
    <link rel="stylesheet" href="{{ asset('website/css/story-title.css') }}" />

    <!-- css files-->
    <link rel="stylesheet" href="{{ asset('website/story/css/story-title.css') }}" />
    <link rel="stylesheet" href="{{ asset('website/story/css/write-story.css') }}" />
    <link rel="stylesheet" href="{{ asset('website/story/css/global-style.css') }}" />
    <link rel="stylesheet" href="{{ asset('website/story/css/writers.css') }}" />
    <!-- bootstrap link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
@endpush
@section('title', 'شارك قصيدتك')

@section('content')
    @volt
        <div>

            <div id="app" x-data="{ step: 1 }" class="border-x-2 border-[#e34e34]">

                <div  x-show="step==1">
                <div  class="beep text-center relative hover:scale-95" wire:click="selectedType('faq')"  x-on:click="step++">
                    <img class="h-16 md:h-24 w-full" src="{{ asset('website/images/button.svg') }}" alt="">
                    <a type="button" :class="{ 'bg-blue-500': type === 'faq' }" class="mt-2 absolute inset-0 flex items-center justify-center text-white text-1xl md:text-2xl font-semibold"> فصحي</a>
                </div>

                <div class="beep text-center relative hover:scale-95" wire:click="selectedType('Nabatieh')" x-on:click="step++">
                    <img class="h-16 md:h-24 w-full" src="{{ asset('website/images/button.svg') }}" alt="">
                    <a type="button" :class="{ 'bg-blue-500': type === 'Nabatieh' }" class="mt-2 absolute inset-0 flex items-center justify-center text-white text-1xl md:text-2xl font-semibold">النبطية</a>
                </div>

            </div>

               {{-------########-----------}}
               <div x-show="step==2" class="flex flex-col items-center justify-center  animate__animated animate__backInDown">
                <div class="z-10">
                    <div class="beep text-center relative hover:scale-95 mt-16">
                        <div class="story-title-container">
                            <img src="{{ asset('website/poem/poem-title1.PNG') }}" alt=""
                                class="story-title-img" />
                            <input type="text" name="story-title"  wire:model="name" />
                        </div>
                    </div>
                </div>

                <div class="beep text-center relative hover:scale-95 mt-5" x-on:click="step++">
                    <img class="mx-auto" src="{{ asset('website/images/button.svg') }}" alt="">
                    <button type="button" class="mt-2 absolute inset-0 flex items-center justify-center text-white text-3xl  ">التالي</button>
                </div>
            </div>
        
                {{-- ############################ --}}
        
                {{-- ############################ --}}
                <div x-show="step==3" class="flex flex-col items-center justify-center  animate__animated animate__fadeInBottomRight">
                    <div class="z-10">
                        <div class="beep text-center relative hover:scale-95 ">
                            <div class="write-story-container">
                                <span>اكتب القصيده</span>
                                <div class="input-container">
                                    <img class="write-story-img" src="{{ 'website/story/imges/Path 115.svg' }}" alt="" />
                                    <textarea  wire:model="poem"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class=" mt-3">
                        <div class="d-flex justify-content-evenly  ">
                            <div class="beep text-center relative hover:scale-95 mt-5" x-on:click="step++">
                                <img class="mx-auto" src="{{ asset('website/images/button.svg') }}" alt="">
                                <button type="button" class="mt-2 absolute inset-0 flex items-center justify-center text-white text-3xl  ">التالي</button>
                            </div>

                            <!-- Add margin-right to create space between the two buttons -->
                            <div class="beep text-center relative hover:scale-95 mt-5" x-on:click="step--">
                                <img class="mx-auto" src="{{ asset('website/images/button.svg') }}" alt="">
                                <button type="button" class="mt-2 absolute inset-0 flex items-center justify-center text-white text-3xl  ">السابق</button>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- ############################ --}}
                @if (!$this->completed)
                <div x-show="step==4"
                    class="flex flex-col items-center justify-center h-screen animate__animated animate__fadeInBottomLeft">
                    <div class="z-10 p-8">
                        <div class="bg-[#e34e34] py-8 px-2 rounded-lg flex flex-col gap-2"
                            style="clip-path:polygon(100% 89%, 79% 90%, 80% 100%, 25% 100%, 23% 89%, 0% 89%, 0% 20%, 25% 20%, 23% 5%, 75% 6%, 75% 20%, 100% 20%)">

                            <div class="max-w-sm mx-auto pt-16">
                                <h1  class="block mb-2 font-medium text-[#f1e1c6] text-center">الشاعر </h1>
                                <label for="name" class="block mb-2 font-medium text-[#f1e1c6]">الإسم</label>
                                <input required min="2" type="name" class="bg-[#f1e1c6] p-2.5 text-black"
                                    wire:model="author" placeholder="أدخل الإسم">
                            </div>
                            <div class="max-w-sm mx-auto">
                                <label for="email" class="block mb-2 font-medium text-[#f1e1c6]">البريد الإلكتروني</label>
                                <input required type="email" class="bg-[#f1e1c6] p-2.5 text-black" wire:model="email"
                                    placeholder="أدخل البريد الإلكتروني">
                            </div>
                            <div class="max-w-sm mx-auto pb-10">
                                <label for="phone" class="block mb-2 font-medium text-[#f1e1c6]">الهاتف</label>
                                <input required min="9" type="number" class="bg-[#f1e1c6] p-2.5 text-black"
                                    wire:model="phone" placeholder="أدخل الهاتف">
                            </div>
                        </div>

                        <div class="beep text-center relative hover:scale-95 mt-16" wire:click="submit">
                            <img class="mx-auto" src="{{ asset('website/images/button.svg') }}" alt="">
                            <button type="button"
                                class="mt-2 absolute inset-0 flex items-center justify-center text-white text-4xl">إرسال</button>
                        </div>
                    

                        @error('author')
                            <div class="p-4 mt-4 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
                                ادخل اسمك الحقيقي.
                            </div>
                        @enderror

                        @error('email')
                            <div class="p-4 mt-4 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
                                ادخل بريد إلكتروني صالح.
                            </div>
                        @enderror

                        @error('phone')
                            <div class="p-4 mt-4 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
                                ادخل رقم هاتف صحيح.
                            </div>
                        @enderror
                    </div>
                </div>
                @endif

                {{-- ############################ --}}
      
                {{-- ############################ --}}

                @if ($this->completed)
                <div class="flex flex-col items-center justify-center h-screen animate__animated animate__bounce">
                    <div class="z-10">
                        <h1 class="text-center text-4xl mt-16">تم ارسال البيانات!</h1>
                        <div class="beep text-center relative hover:scale-95 mt-16">
                            <img class="mx-auto" src="{{ asset('website/images/button.svg') }}" alt="">
                            <a href="{{ url('/') }}" wire:navigate
                                class="mt-2 absolute inset-0 flex items-center justify-center text-white text-4xl">الرئيسية</a>
                        </div>

                    </div>
                 
                    <div>
                     

                </div>
            @endif
            </div>
            <div class="absolute top-0 left-8 z-0">
                <img src="{{ asset('website/images/banner.svg') }}" class="w-20 md:w-64">
            </div>
        </div>
    @endvolt


@endsection


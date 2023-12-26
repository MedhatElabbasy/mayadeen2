<?php

use function Livewire\Volt\{rules,state};
use App\Models\Question;
use App\Models\Challenge;

$questions = Question::inRandomOrder()->limit(setting('questionsCount'))->get();

state([
  'questionsTotal' => $questions->count(),
  'questions'      => $questions,
  'completed'      => false,
  'score'          => 0,
  'name'           => null,
  'email'          => null,
  'phone'          => null,
  'opinion'        => null,
]);

rules([
    'name'    => 'required|min:2',
    'email'   => "required|email",
    'phone'   => "required|min:9",
    'opinion' => 'required|min:2',
]);

$incrementScore = function () {
    $this->score++;
};

$submit = function () {
    $this->validate();

    Challenge::create([
        'name'     => $this->name,
        'email'    => $this->email,
        'phone'    => $this->phone,
        'mark'     => $this->score,
        'fullMark' => $this->questionsTotal,
        'opinion'  => $this->opinion,
    ]);

    $this->completed = true;
};

?>

@extends('layouts.app')

@section('title', 'تحدي نفسك')

@section('content')
@volt
<div id="app" x-data="{ 
  step           : 1,
  hint_text      : '',
  hint_image     : '',
  stepTemp       : 1,
  currentQuestion: 1,
  questionsCount : {{$this->questionsTotal}},
  nextQuestion() {
    this.step = this.stepTemp;
    this.currentQuestion++; 
  }
  }" class="border-x-2 border-[#e34e34]">

    <!-- Step 0 : Wrong answer hint -->
    <div x-show="step==0" class="flex items-center justify-center min-h-screen animate__animated animate__backInDown">
      <div class="container mx-auto px-4">
        <div class="z-10">
    
          <figure class="max-w-lg mx-auto">
            <a target="_blank" :href="hint_image">
              <img class="h-auto max-w-full rounded-lg" :src="hint_image" alt="image description">
            </a>
          <figcaption class="mt-2 text-sm text-center text-gray-500 dark:text-gray-400" x-text="hint_text"></figcaption>
          </figure>
    
          <div class="beep text-center relative hover:scale-95 mt-4" x-on:click="nextQuestion">
              <img class="h-16 md:h-24 w-full" src="{{ asset('website/images/button.svg') }}" alt="">
              <span class="mt-2 absolute inset-0 flex items-center justify-center text-white text-1xl md:text-2xl font-semibold">أكمل</span>
        </div>

        </div>
      </div>
    </div>
    
    <!-- //Step 0 -->

  <!-- Step 1 : Welcome -->
  <div x-show="step==1" class="flex flex-col items-center justify-center min-h-screen animate__animated animate__backInDown">
    <div class="container mx-auto px-4 justify">
      <div class="z-10">
        <h1 class="text-center text-2xl md:text-6xl font-bold mb-8 text-[#e34e34]">تحدَّ نفسك!</h1>
  
        <div class="beep text-center relative hover:scale-95 mb-8" x-on:click="step++">
          <img class="h-16 md:h-24 w-full" src="{{ asset('website/images/button.svg') }}" alt="">
          <span class="mt-2 absolute inset-0 flex items-center justify-center text-white text-1xl md:text-2xl font-semibold">بدء التحدي</span>
        </div>
      </div>
    </div>
  </div>
  <!-- //Step 1 -->

  <!-- Step 2 : Questions -->
  <div x-show="step==2" class="flex flex-col items-center justify-center min-h-screen animate__animated animate__backInDown">
    <div class="container mx-auto px-4 justify">
      <div class="z-10">

        <div x-data="{ 
          correctQuestion(el) {
            this.currentQuestion++; 
            if(this.questionsCount==this.currentQuestion) this.step++;
            party.confetti(el,{
              count: party.variation.range(50, 100),
            });
            soundEffectPlay('correctAnswerPlayer');
          },
          wrongQuestion(text, image) {
            if(this.questionsCount==this.currentQuestion) this.step++;
            soundEffectPlay('wrongAnswerPlayer');
            this.hint_text=text;
            this.hint_image=image;
            this.stepTemp=step;
            this.step=0;
          },
         }">

        @foreach ($this->questions as $question)
          <div x-show="currentQuestion=={{$loop->index+1}}" class="animate__animated animate__backInDown">
            <h1 class="text-1xl md:text-4xl font-bold mb-8 text-[#e34e34]">{{$question->content}}</h1>
      
            <div class="mb-8">
              <ol class="font-semibold text-black max-w-md space-y-4 md:space-y-12 list-decimal list-inside text-1xl md:text-2xl">
                @foreach ($question->answers as $answer)
                  <li 
                    class="beep md:hover:scale-125 text-black hover:text-[#e34e34]"
                    @if($answer['isCorrect'] && $loop->index+1) 
                      x-on:click="correctQuestion($event.target)" wire:click="incrementScore"
                    @else
                      x-on:click="wrongQuestion('{{$answer['wrongText']}}', '{{asset('storage/'.$answer['wrongImage'])}}')"
                    @endif
                    >
                      <span>{{$answer['content']}}</span>
                  </li>
                @endforeach
              </ol>
            </div>
          </div>
          @endforeach
        </div>

      </div>
    </div>
  </div>
  <!-- //Step 2 -->

  <!-- Step 3 : Information -->
  @if(!$this->completed)
  <div x-show="step==3" class="flex flex-col items-center justify-center min-h-screen animate__animated animate__backInDown">
      <form wire:submit='submit'>
        <div class="z-10 p-2">
            <div class="bg-[#e34e34] py-4 px-4 rounded-lg flex flex-col gap-2">
                <div class="max-w-sm mx-auto pt-2">
                    <label for="name" class="block mb-2 font-medium text-[#f1e1c6] rounded-lg">الإسم</label>
                    <input required min="2" type="name" class="bg-[#f1e1c6] p-2.5 text-black" wire:model="name" placeholder="أدخل الإسم">
                    @error ('name')<div class="text-white">ادخل الإسم*</div> @enderror
                 </div>
                <div class="max-w-sm mx-auto">
                    <label for="email" class="block mb-2 font-medium text-[#f1e1c6] rounded-lg">البريد الإلكتروني</label>
                    <input required type="email" class="bg-[#f1e1c6] p-2.5 text-black" wire:model="email" placeholder="أدخل البريد الإلكتروني">
                    @error ('email')<div class="text-white">ادخل البريد الإلكتروني*</div> @enderror
                </div>
                <div class="max-w-sm mx-auto">
                    <label for="phone" class="block mb-2 font-medium text-[#f1e1c6] rounded-lg">الهاتف</label>
                    <input required min="9" type="number" class="bg-[#f1e1c6] p-2.5 text-black" wire:model="phone" placeholder="أدخل الهاتف">
                    @error ('phone')<div class="text-white">ادخل الهاتف*</div> @enderror
                </div>

                <div class="max-w-sm mx-auto">
                  <label for="phone" class="block mb-2 font-medium text-[#f1e1c6] rounded-lg">رأيك في التحدي</label>
                  <textarea required min="2" class="bg-[#f1e1c6] p-2.5 text-black" wire:model="opinion" placeholder="أكتب لنا رأيك في التحدي"></textarea>
                  @error ('opinion')<div class="text-white">ادخل رأيك*</div> @enderror
                </div>
            </div>

            <div class="beep text-center relative hover:scale-95 mt-4 rounded-lg" wire:click="submit">
                <img class="h-16 md:h-24 w-full" src="{{ asset('website/images/button.svg') }}" alt="">
                <button type="button" class="mt-2 absolute inset-0 flex items-center justify-center text-white text-1xl md:text-2xl font-semibold">إرسال</button>
            </div>
        </div>
      </form>
  </div>
  @endif
  <!-- //Step 3 -->

  @if($this->completed)
  <!-- Step 4 : Score -->
  <div class="flex flex-col items-center justify-center min-h-screen animate__animated animate__backInDown">
    <div class="container mx-auto px-4 justify">
      <div class="z-10">
        <h1 class="text-center text-2xl md:text-6xl font-bold mb-8 text-[#e34e34]">{{ $this->score.' - '.''.$this->questionsTotal }}</h1>

        <div class="beep text-center relative hover:scale-95 mb-8">
          <a href="/" wire:navigate>
            <img class="h-16 md:h-24 w-full" src="{{ asset('website/images/button.svg') }}" alt="">
            <span class="mt-2 absolute inset-0 flex items-center justify-center text-white text-1xl md:text-2xl font-semibold">النتيجة</span>
          </a>
        </div>
      </div>
    </div>
  </div>
  <!-- //Step 4 -->
  @endif

  <!-- Banner -->
  <div class="absolute top-0 left-8 z-0">
      <a href="/" wire:navigate>
        <img src="{{ asset('website/images/banner.svg') }}" class="h-36 md:h-64 w-full">
      </a>
  </div>
  <!-- //Banner -->
</div>
@endvolt
@endsection
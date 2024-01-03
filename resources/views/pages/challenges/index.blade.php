<?php

use function Livewire\Volt\{rules, state, computed};
use App\Models\Question;
use App\Models\Challenge;

state([
    'completed' => false,
    'score' => 0,
]);

$questions = computed(function () {
    $questions = Question::all();
    $questionsCount = $questions->count() < setting('questionsCount') ? $questions->count() : setting('questionsCount');
    return Question::all()->random($questionsCount);
});

$questionsTotal = computed(function () {
    return $this->questions->count();
});

rules([
    'score' => 'required',
]);

$incrementScore = function () {
    $this->score++;
};

$submit = function () {
    $this->validate();

    Challenge::create([
        'mark' => $this->score,
        'fullMark' => $this->questionsTotal,
    ]);

    $this->completed = true;
};

?>

@extends('layouts.app')

@section('title', 'تحد نفسك')

@section('content')
    @volt
        <div id="app" x-data="{
            step: 1,
            hint_text: '',
            hint_image: '',
            stepTemp: 1,
            currentQuestion: 1,
            questionsCount: {{ $this->questionsTotal }},
            nextQuestion() {
                this.step = this.stepTemp;
                this.currentQuestion++;
            }
        }" class="border-x-2 border-[#e34e34] mb-4">

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

            <!-- Step 0 : Wrong answer hint -->
            <div x-show="step==0" class="flex items-center justify-center animate__animated animate__backInDown z-10">
                <div class="container mx-auto px-4">
                    <div class="z-10">

                        <figure class="max-w-lg mx-auto flex flex-col items-center mt-4">
                            <a target="_blank" :href="hint_image">
                            <img class="max-h-96 w-full rounded-lg object-fit:cover" :src="hint_image" alt="image description">
                            </a>
                            <figcaption class="mt-2 text-sm text-center text-black font-semibold" x-text="hint_text">
                            </figcaption>
                        </figure>

                        <div class="beep text-center relative hover:scale-95 mt-4 cursor-pointer" x-on:click="nextQuestion">
                            <img class="h-16 md:h-24 w-full" src="{{ asset('website/images/button.svg') }}" alt="">
                            <span
                                class="mt-2 absolute inset-0 flex items-center justify-center text-white text-1xl md:text-2xl font-semibold">أكمل</span>
                        </div>

                    </div>
                </div>
            </div>
            <!-- //Step 0 -->

            <!-- Step 1 : Welcome -->
            <div x-show="step==1" class="flex flex-col items-center justify-center animate__animated animate__backInDown">
                <div class="container mx-auto px-4 justify">
                    <div class="z-10">
                        <h1 class="text-center text-2xl md:text-6xl font-bold my-8 text-[#e34e34]">تحدَّ نفسك!</h1>

                        <div class="beep text-center relative hover:scale-95 mb-8 cursor-pointer" x-on:click="step++">
                            <img class="h-16 md:h-24 w-full" src="{{ asset('website/images/button.svg') }}" alt="">
                            <span
                                class="mt-2 absolute inset-0 flex items-center justify-center text-white text-1xl md:text-2xl font-semibold">بدء
                                التحدي</span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- //Step 1 -->

            <!-- Step 2 : Questions -->
            <div x-show="step==2" class="flex flex-col items-center justify-center animate__animated animate__backInDown">
                <div class="container mx-auto px-4 justify">
                    <div class="z-10">

                        <div x-data="{
                            correctQuestion(el) {
                                    if (this.questionsCount == this.currentQuestion) this.step++;
                                    this.currentQuestion++;
                                    party.confetti(el, { count: party.variation.range(50, 100) });
                                    soundEffectPlay('correctAnswerPlayer');
                                },
                                wrongQuestion(text, image) {
                                    if (this.questionsCount == this.currentQuestion) this.step++;
                                    soundEffectPlay('wrongAnswerPlayer');
                                    this.hint_text = text;
                                    this.hint_image = image;
                                    this.stepTemp = step;
                                    this.step = 0;
                                },
                        }">

                            @foreach ($this->questions as $question)
                                <div x-show="currentQuestion=={{ $loop->index + 1 }}"
                                    class="animate__animated animate__backInDown">
                                    <div class="flex flex-col items-center justify-center mt-4">
                                        <h1 class="text-1xl md:text-4xl font-bold mb-8 text-[#e34e34] text-center" style="line-height:normal">{{ $question->content }}
                                        </h1>

                                        <div class="grid sm:grid-cols-1 md:grid-cols-2 mx-auto justify-center mt-4 gap-4">
                                            @foreach ($question->answers as $answer)
                                                <div class="rounded-lg bg-[#e34e34] text-white p-8 items-center text-center font-semibold cursor-pointer beep hover:scale-95"
                                                    @if ($answer['isCorrect'] && $loop->index + 1) x-on:click="correctQuestion($event.target)" wire:click="incrementScore"
                                                    @else x-on:click="wrongQuestion('{{ $answer['wrongText'] }}', '{{ asset('storage/' . $answer['wrongImage']) }}')" @endif>
                                                    <span>{{ $answer['content'] }}</span>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                    </div>
                </div>
            </div>
            <!-- //Step 2 -->

            <!-- Step 3 : Information -->
            @if (!$this->completed)
            <div x-show="step==3" class="flex flex-col items-center my-8 md:my-4 justify-center animate__animated animate__backInDown">
                <form wire:submit='submit'>
                    <div class="container mx-auto px-4 justify">
                    <h1 class="text-center text-2xl md:text-6xl font-bold my-8 text-[#e34e34]">شكراً لك!</h1>
                    <div class="z-10">
                        <div class="beep text-center relative hover:scale-95 mt-4 rounded-lg" wire:click="submit">
                            <img class="h-16 md:h-24 w-full" src="{{ asset('website/images/button.svg') }}" alt="">
                            <button type="button" class="mt-2 absolute inset-0 flex items-center justify-center text-white text-1xl md:text-2xl font-semibold">إرسال</button>
                        </div>
                    </div>
                </div>
                </form>
            </div>
            @endif
            <!-- //Step 3 -->

            <!-- Step 4 : Score -->
            @if ($this->completed)
                <div class="flex flex-col items-center my-8 md:my-4 justify-center animate__animated animate__backInDown">
                    <div class="container mx-auto px-4 justify">
                        <h1 class="text-center text-2xl md:text-6xl font-bold my-8 text-[#e34e34]">النتيجة</h1>

                        <div class="z-10">
                            <h1 class="text-center text-2xl md:text-6xl font-bold mb-8 text-[#e34e34]">
                                {{ $this->score . ' - ' . '' . $this->questionsTotal }}</h1>

                            <div class="beep text-center relative hover:scale-95 mb-8">
                                <a href="{{ url('/challenges') }}" wire:navigate>
                                    <img class="h-16 md:h-24 w-full" src="{{ asset('website/images/button.svg') }}"
                                        alt="">
                                    <span
                                        class="mt-2 absolute inset-0 flex items-center justify-center text-white text-1xl md:text-2xl font-semibold">الرئيسية</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            <!-- //Step 4 -->

        </div>

        @assets
            <link href=" https://cdn.jsdelivr.net/npm/intl-tel-input@18.3.3/build/css/intlTelInput.min.css" rel="stylesheet">
            <script src="https://cdn.jsdelivr.net/npm/intl-tel-input@18.2.1/build/js/intlTelInput.min.js"></script>
        @endassets

        @script
            <script>
                const input = document.querySelector("#phone");
                window.intlTelInput(input, {
                    initialCountry: "auto",
                    geoIpLookup: callback => {
                        fetch("https://ipapi.co/json")
                            .then(res => res.json())
                            .then(data => callback(data.country_code))
                            .catch(() => callback("sa"));
                    },
                    utilsScript: "https://cdn.jsdelivr.net/npm/intl-tel-input@18.2.1/build/js/utils.js",
                });
            </script>
        @endscript
    @endvolt
@endsection

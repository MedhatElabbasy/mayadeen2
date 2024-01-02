<?php

use function Laravel\Folio\{middleware};

use App\Models\Story;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Illuminate\Support\Facades\Mail;
use App\Mail\StoryPdfSendMail;
use Dompdf\Options;

?>


        <div>

            <div id="app" x-data="{ step: 1 }" class="border-x-2 border-[#e34e34]">


                <div x-show="step==1" class="flex flex-col items-center justify-center  animate__animated animate__backInDown">
                    <div class="z-10">
                        <div class="beep text-center relative hover:scale-95 mt-16">
                            <div class="story-title-container">
                                <img src="{{ asset('website/story/imges/story-title.svg') }}" alt=""
                                    class="story-title-img" />
                                <input type="text" name="story-title" wire:model="title" />
                            </div>
                        </div>
                    </div>

                    <div class="beep text-center relative hover:scale-95 mt-5" x-on:click="step++">
                        <img class="mx-auto" src="{{ asset('website/images/button.svg') }}" alt="">
                        <button type="button"
                            class="mt-2 absolute inset-0 flex items-center justify-center text-white text-3xl  ">التالي</button>
                    </div>
                </div>
                {{-- ############################ --}}
                <div x-show="step==2"
                    class="flex flex-col items-center justify-center  animate__animated animate__fadeInBottomRight">
                    <div class="z-10">
                        <div class="beep text-center relative hover:scale-95 ">
                            <div class="write-story-container">
                                <span>اكتب القصه</span>
                                <div class="input-container">
                                    <img class="write-story-img" src="{{ 'website/story/imges/Path 115.svg' }}"
                                        alt="" />
                                    <textarea wire:model="content"></textarea>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class=" mt-3">
                        <div class="d-flex justify-content-evenly  ">
                            <div class="beep text-center relative hover:scale-95 mt-5" x-on:click="step++">
                                <img class="mx-auto" src="{{ asset('website/images/button.svg') }}" alt="">
                                <button type="button"
                                    class="mt-2 absolute inset-0 flex items-center justify-center text-white text-3xl  ">التالي</button>
                            </div>

                            <!-- Add margin-right to create space between the two buttons -->
                            <div class="beep text-center relative hover:scale-95 mt-5" x-on:click="step--">
                                <img class="mx-auto" src="{{ asset('website/images/button.svg') }}" alt="">
                                <button type="button"
                                    class="mt-2 absolute inset-0 flex items-center justify-center text-white text-3xl  ">السابق</button>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- ############################ --}}
                @if (!$this->completed)
                    <div x-show="step==3"
                        class="flex flex-col items-center justify-center my-36 animate__animated animate__fadeInBottomLeft">
                        <div class="z-10 p-8">
                            <div class="bg-[#e34e34] py-8 px-2 rounded-lg flex flex-col gap-2"
                                style="clip-path:polygon(100% 89%, 79% 90%, 80% 100%, 25% 100%, 23% 89%, 0% 89%, 0% 20%, 25% 20%, 23% 5%, 75% 6%, 75% 20%, 100% 20%)">

                                <div class="max-w-sm mx-auto pt-16">
                                    <h1 class="block mb-2 font-medium text-[#f1e1c6] text-center">الكاتب الأول</h1>
                                    <label for="name" class="block mb-2 font-medium text-[#f1e1c6]">الإسم</label>
                                    <input required min="2" type="name" class="bg-[#f1e1c6] p-2.5 text-black"
                                        wire:model="w1_name" placeholder="أدخل الإسم">
                                </div>
                                <div class="max-w-sm mx-auto">
                                    <label for="email" class="block mb-2 font-medium text-[#f1e1c6]">البريد
                                        الإلكتروني</label>
                                    <input required type="email" class="bg-[#f1e1c6] p-2.5 text-black" wire:model="w1_email"
                                        placeholder="أدخل البريد الإلكتروني">
                                </div>
                                <div class="max-w-sm mx-auto pb-10">
                                    <label for="number" class="block mb-2 font-medium text-[#f1e1c6]">الهاتف</label>
                                    <input required min="9" type="number" class="bg-[#f1e1c6] p-2.5 text-black"
                                        wire:model="w1_number" placeholder="أدخل الهاتف">
                                </div>
                            </div>

                            <div class="beep text-center relative hover:scale-95 mt-16" x-on:click="step++">
                                <img class="mx-auto" src="{{ asset('website/images/button.svg') }}" alt="">
                                <button type="button"
                                    class="mt-2 absolute inset-0 flex items-center justify-center text-white text-4xl">التالي</button>
                            </div>
                            {{-- <div class="beep text-center relative hover:scale-95 mt-16" x-on:click="step++">
                            <img class="mx-auto" src="{{ asset('website/images/button.svg') }}" alt="">
                            <button type="button"
                                class="mt-2 absolute inset-0 flex items-center justify-center text-white text-4xl">السابق</button>
                        </div> --}}

                            @error('w1_name')
                                <div class="p-4 mt-4 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
                                    ادخل اسمك الحقيقي.
                                </div>
                            @enderror

                            @error('w1_email')
                                <div class="p-4 mt-4 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
                                    ادخل بريد إلكتروني صالح.
                                </div>
                            @enderror

                            @error('w1_number')
                                <div class="p-4 mt-4 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
                                    ادخل رقم هاتف صحيح.
                                </div>
                            @enderror
                        </div>
                    </div>
                @endif

                {{-- ############################ --}}
                {{-- ############################ --}}
                @if (!$this->completed)
                    <div x-show="step==4"
                        class="flex flex-col items-center justify-center my-36 animate__animated animate__fadeInTopRight">
                        <div class="z-10 p-8">
                            <div class="bg-[#e34e34] py-8 px-2 rounded-lg flex flex-col gap-2"
                                style="clip-path:polygon(100% 89%, 79% 90%, 80% 100%, 25% 100%, 23% 89%, 0% 89%, 0% 20%, 25% 20%, 23% 5%, 75% 6%, 75% 20%, 100% 20%)">
                                <div class="max-w-sm mx-auto pt-16">
                                    <h1 class="block mb-2 font-medium text-[#f1e1c6] text-center">الكاتب الثاني </h1>

                                    <label for="name" class="block mb-2 font-medium text-[#f1e1c6]">الإسم</label>
                                    <input required min="2" type="name" class="bg-[#f1e1c6] p-2.5 text-black"
                                        wire:model="w2_name" placeholder="أدخل الإسم">
                                </div>
                                <div class="max-w-sm mx-auto">
                                    <label for="email" class="block mb-2 font-medium text-[#f1e1c6]">البريد
                                        الإلكتروني</label>
                                    <input required type="email" class="bg-[#f1e1c6] p-2.5 text-black"
                                        wire:model="w2_email" placeholder="أدخل البريد الإلكتروني">
                                </div>
                                <div class="max-w-sm mx-auto pb-10">
                                    <label for="number" class="block mb-2 font-medium text-[#f1e1c6]">الهاتف</label>
                                    <input required min="9" type="number" class="bg-[#f1e1c6] p-2.5 text-black"
                                        wire:model="w2_number" placeholder="أدخل الهاتف">
                                </div>
                            </div>

                            <div class="beep text-center relative hover:scale-95 mt-16" x-on:click="step++">
                                <img class="mx-auto" src="{{ asset('website/images/button.svg') }}" alt="">
                                <button type="button"
                                    class="mt-2 absolute inset-0 flex items-center justify-center text-white text-4xl">التالي</button>
                            </div>

                            @error('w2_name')
                                <div class="p-4 mt-4 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
                                    ادخل اسمك الحقيقي.
                                </div>
                            @enderror

                            @error('w2_email')
                                <div class="p-4 mt-4 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
                                    ادخل بريد إلكتروني صالح.
                                </div>
                            @enderror

                            @error('w2_number')
                                <div class="p-4 mt-4 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
                                    ادخل رقم هاتف صحيح.
                                </div>
                            @enderror
                        </div>
                    </div>
                @endif
                {{-- ############################ --}}
                @if (!$this->completed)
                    <div x-show="step==5"
                        class="flex flex-col items-center justify-center my-36 animate__animated animate__fadeInTopLeft">
                        <div class="z-10 p-8">
                            <div class="bg-[#e34e34] py-8 px-2 rounded-lg flex flex-col gap-2"
                                style="clip-path:polygon(100% 89%, 79% 90%, 80% 100%, 25% 100%, 23% 89%, 0% 89%, 0% 20%, 25% 20%, 23% 5%, 75% 6%, 75% 20%, 100% 20%)">
                                <div class="max-w-sm mx-auto pt-16">
                                    <h1 class="block mb-2 font-medium text-[#f1e1c6] text-center">الكاتب الثالث </h1>
                                    <label for="name" class="block mb-2 font-medium text-[#f1e1c6]">الإسم</label>
                                    <input required min="2" type="name" class="bg-[#f1e1c6] p-2.5 text-black"
                                        wire:model="w3_name" placeholder="أدخل الإسم">
                                </div>
                                <div class="max-w-sm mx-auto">
                                    <label for="email" class="block mb-2 font-medium text-[#f1e1c6]">البريد
                                        الإلكتروني</label>
                                    <input required type="email" class="bg-[#f1e1c6] p-2.5 text-black"
                                        wire:model="w3_email" placeholder="أدخل البريد الإلكتروني">
                                </div>
                                <div class="max-w-sm mx-auto pb-10">
                                    <label for="number" class="block mb-2 font-medium text-[#f1e1c6]">الهاتف</label>
                                    <input required min="9" type="number" class="bg-[#f1e1c6] p-2.5 text-black"
                                        wire:model="w3_number" placeholder="أدخل الهاتف">
                                </div>
                            </div>

                            <div class="beep text-center relative hover:scale-95 mt-16" wire:click="submit">
                                <img class="mx-auto" src="{{ asset('website/images/button.svg') }}" alt="">
                                <button type="button"
                                    class="mt-2 absolute inset-0 flex items-center justify-center text-white text-4xl">إرسال</button>
                            </div>

                            @error('w3_name')
                                <div class="p-4 mt-4 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
                                    ادخل اسمك الحقيقي.
                                </div>
                            @enderror

                            @error('w3_email')
                                <div class="p-4 mt-4 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
                                    ادخل بريد إلكتروني صالح.
                                </div>
                            @enderror

                            @error('w3_number')
                                <div class="p-4 mt-4 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
                                    ادخل رقم هاتف صحيح.
                                </div>
                            @enderror
                        </div>
                    </div>
                @endif
                {{-- ############################ --}}

                @if ($this->completed)
                    <div class="flex flex-col items-center justify-center my-36 animate__animated animate__bounce">
                        <div class="z-10">
                            <h1 class="text-center text-4xl mt-16">تم انشاء الاأقصوصة</h1>
                            <div class="beep text-center relative hover:scale-95 mt-16">
                                <img class="mx-auto" src="{{ asset('website/images/button.svg') }}" alt="">
                                <a href="{{ url('/') }}"
                                    class="mt-2 absolute inset-0 flex items-center justify-center text-white text-4xl">الرئيسية</a>
                            </div>
                            <a href="{{ route('story.pdf', $this->id) }}">
                                <div class="beep text-center relative hover:scale-95 mt-16">
                                    {{-- wire:click="downloadPdf()" --}}
                                    <img class="mx-auto" src="{{ asset('website/images/button.svg') }}" alt="">
                                    <div class="mt-2 absolute inset-0 flex items-center justify-center text-white text-4xl">
                                        تحميل
                                        الأقصوصة PDF</div>
                                </div>
                            </a>



                            @if ($this->mailersSend)
                                <h1 class="text-center text-4xl mt-16">تم ارسال الاأقصوصة عبر البريد </h1>
                            @endif
                            {{-- @if (!$this->mailersSend)
                                <div class="beep text-center relative hover:scale-95 mt-16"
                                    style="cursor: pointer;"
                                    wire:click="sendMail()">
                                    <img class="mx-auto" src="{{ asset('website/images/button.svg') }}" alt="">
                                    <div class="mt-2 absolute inset-0 flex items-center justify-center text-white text-4xl">
                                        ارسال
                                        الأقصوصة الي الأعضاء</div>
                                </div>
                            @endif --}}

                            <br>
                            <br>
                        </div>
                    </div>
                @endif
            </div>
            <div class="absolute top-0 left-8 -z-50">
                <img src="{{ asset('website/images/banner.svg') }}" class="w-20 md:w-64">
            </div>
        </div>
    
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

                <div x-data="{ titel: '' }" x-show="step==1"
                class="flex flex-col items-center justify-center my-2 md:my-4 animate__animated animate__backInDown">
                <h1 class="block mb-2 font-semibold text-[#e34e34] text-center text-3xl">شارك الأقصوصة</h1>

                <div class="z-10 p-2"">
                    <div class="bg-[#e34e34] py-4 px-4 rounded-lg flex flex-col gap-2">
                        <div class="w-full">
                            <label for="title" class="block mb-2 font-medium text-[#f1e1c6]">إسم الأقصوصة</label>
                            <input required min="2" type="text" class="w-full bg-[#f1e1c6] p-4 text-black rounded-lg"
                                x-model="titel" wire:model="title" placeholder="أدخل إسم الأقصوصة">
                                <div x-show="titel.length < 2" class="text-white mt-2">
                                    يجب ان يحتوي الإسم علي حرفين علي الأقل*
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="beep text-center relative hover:scale-95 mt-4 rounded-lg"
                    x-on:click="if(titel.length >= 2) step++">
                    <img class="h-16 md:h-24 w-full" src="{{ asset('website/images/button.svg') }}" alt="">
                        <button type="button" class="mt-2 absolute inset-0 flex items-center justify-center text-white text-1xl md:text-2xl font-semibold">التالي</button>
                    </div>
                </div>

                {{-- ############################ --}}

                <div x-show="step==2"
                class="flex flex-col items-center justify-center my-2 md:my-4 animate__animated animate__backInDown">
                <h1 class="block mb-2 font-semibold text-[#e34e34] text-center text-3xl">اكتب القصه</h1>

                <div class="z-10 p-2" x-data="{ content: '' }">
                    <div class="bg-[#e34e34] py-4 px-4 rounded-lg flex flex-col gap-2">
                        <div class="w-full">
                            <label for="content" class="block mb-2 font-medium text-[#f1e1c6]">الأقصوصة</label>
                            <textarea
                                class="bg-[#f1e1c6] text-black rounded-lg w-full p-4"
                                rows="6"
                                required
                                min="12"
                                type="name"
                                x-model="content"
                                wire:model="content"
                                >أدخل القصة</textarea>
                            <div x-show="content.length < 12" class="text-white mt-2">يجب ان يزيد طول القصة عن 12 حرف علي
                                الأقل*</div>
                        </div>
                    </div>

                        <div class="beep text-center relative hover:scale-95 mt-4 rounded-lg"
                            x-on:click="if(content.length >= 12) step++">
                            <img class="h-16 md:h-24 w-full" src="{{ asset('website/images/button.svg') }}" alt="">
                            <button type="button"
                                class="mt-2 absolute inset-0 flex items-center justify-center text-white text-1xl md:text-2xl font-semibold">التالي</button>
                        </div>
                    </div>
                </div>

                {{-- ############################ --}}

                @if (!$this->completed)
                    <div x-show="step==3"
                        class="flex flex-col items-center justify-center my-2 md:my-4 animate__animated animate__backInDown"
                        x-data="{name: '', email: '', number: ''}"
                        >
                        <h1 class="block mb-2 font-semibold text-[#e34e34] text-center text-3xl">ادخل بياناتك الشخصية</h1>

                            <div class="z-10 p-2">
                                <div class="bg-[#e34e34] py-4 px-4 rounded-lg flex flex-col gap-2">
                                    <div class="w-full">
                                        <label for="author" class="block mb-2 font-medium text-[#f1e1c6]">الإسم</label>
                                        <input required min="2" type="text"
                                            class="bg-[#f1e1c6] p-2.5 text-black rounded-lg w-full" wire:model="w1_name"
                                            x-model="name"
                                            placeholder="أدخل الإسم">
                                            <div x-show="name.length < 2" class="text-white">ادخل الإسم*</div>
                                    </div>
                                    <div class="w-full">
                                        <label for="email" class="block mb-2 font-medium text-[#f1e1c6]">البريد
                                            الإلكتروني</label>
                                        <input required type="email" class="bg-[#f1e1c6] p-2.5 text-black rounded-lg w-full"
                                            x-model="email" wire:model="w1_email" placeholder="أدخل البريد الإلكتروني">
                                            <div x-show="email.length < 9" class="text-white">ادخل البريد الإلكتروني*</div>
                                    </div>
                                    <div class="max-w-sm mx-auto" wire:ignore>
                                        <label for="phone" class="block mb-2 font-medium text-[#f1e1c6]">الهاتف</label>
                                        <input wire:ignore id="phone" required min="9" type="tel"
                                        class="bg-[#f1e1c6] w-80 p-2.5 rounded-lg text-black" wire:model="w1_number"
                                        x-model="number"
                                        placeholder="أدخل الهاتف">
                                            <div x-show="number.length < 9" class="text-white">ادخل الهاتف*</div>
                                    </div>
                                </div>

                                <div class="beep text-center relative hover:scale-95 mt-4 rounded-lg" wire:click="submit">
                                    <img class="h-16 md:h-24 w-full" src="{{ asset('website/images/button.svg') }}"
                                        alt="">
                                    <button type="button"
                                        x-on:click="if(name.length >= 2 && email.length >= 9 && number.length >= 9) step++"
                                        class="mt-2 absolute inset-0 flex items-center justify-center text-white text-1xl md:text-2xl font-semibold">إرسال</button>
                                </div>
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
        </div>
    
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

                {{-- @if (!$this->completed) --}}
                    <div x-show="step==3"
                        class="flex flex-col items-center justify-center my-2 md:my-4 animate__animated animate__backInDown"
                        x-data="{name: '', email: '', number: ''}"
                        >
                        <h1 class="block mb-2 font-semibold text-[#e34e34] text-center text-3xl">الكاتب الاول</h1>

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
                                    <div class="w-full" wire:ignore>
                                        <label for="phone" class="block mb-2 font-medium text-[#f1e1c6]">الهاتف</label>
                                        <input wire:ignore required min="9" type="tel" id="phone1"
                                        class="bg-[#f1e1c6] w-80 p-2.5 rounded-lg text-black" wire:model="w1_number"
                                        x-model="number"
                                        placeholder="أدخل الهاتف">
                                            <div x-show="number.length < 9" class="text-white">ادخل الهاتف*</div>
                                    </div>
                                </div>

                                <div class="beep text-center relative hover:scale-95 mt-4 rounded-lg">
                                    <img class="h-16 md:h-24 w-full" src="{{ asset('website/images/button.svg') }}"
                                        alt="">
                                    <button type="button"
                                        x-on:click="if(name.length >= 2 && email.length >= 9 && number.length >= 9) step++"
                                        class="mt-2 absolute inset-0 flex items-center justify-center text-white text-1xl md:text-2xl font-semibold">التالي</button>
                                </div>
                            </div>
                    </div>
                {{-- @endif --}}

                {{-- @if (!$this->completed) --}}
                    <div x-show="step==4"
                        class="flex flex-col items-center justify-center my-2 md:my-4 animate__animated animate__backInDown"
                        x-data="{name: '', email: '', number: ''}"
                        >
                        <h1 class="block mb-2 font-semibold text-[#e34e34] text-center text-3xl">الكاتب الثاني</h1>

                            <div class="z-10 p-2">
                                <div class="bg-[#e34e34] py-4 px-4 rounded-lg flex flex-col gap-2">
                                    <div class="w-full">
                                        <label for="author" class="block mb-2 font-medium text-[#f1e1c6]">الإسم</label>
                                        <input required min="2" type="text"
                                            class="bg-[#f1e1c6] p-2.5 text-black rounded-lg w-full" wire:model="w2_name"
                                            x-model="name"
                                            placeholder="أدخل الإسم">
                                            <div x-show="name.length < 2" class="text-white">ادخل الإسم*</div>
                                    </div>
                                    <div class="w-full">
                                        <label for="email" class="block mb-2 font-medium text-[#f1e1c6]">البريد
                                            الإلكتروني</label>
                                        <input required type="email" class="bg-[#f1e1c6] p-2.5 text-black rounded-lg w-full"
                                            x-model="email" wire:model="w2_email" placeholder="أدخل البريد الإلكتروني">
                                            <div x-show="email.length < 9" class="text-white">ادخل البريد الإلكتروني*</div>
                                    </div>
                                    <div class="w-full" wire:ignore>
                                        <label for="phone" class="block mb-2 font-medium text-[#f1e1c6]">الهاتف</label>
                                        <input wire:ignore required min="9" type="tel" id="phone2"
                                        class="bg-[#f1e1c6] w-80 p-2.5 rounded-lg text-black" wire:model="w2_number"
                                        x-model="number"
                                        placeholder="أدخل الهاتف">
                                            <div x-show="number.length < 9" class="text-white">ادخل الهاتف*</div>
                                    </div>
                                </div>

                                <div class="beep text-center relative hover:scale-95 mt-4 rounded-lg">
                                    <img class="h-16 md:h-24 w-full" src="{{ asset('website/images/button.svg') }}"
                                        alt="">
                                    <button type="button"
                                        x-on:click="if(name.length >= 2 && email.length >= 9 && number.length >= 9) step++"
                                        class="mt-2 absolute inset-0 flex items-center justify-center text-white text-1xl md:text-2xl font-semibold">التالي</button>
                                </div>
                            </div>
                    </div>
                {{-- @endif --}}

                {{-- @if (!$this->completed) --}}
                    <div x-show="step==5"
                        class="flex flex-col items-center justify-center my-2 md:my-4 animate__animated animate__backInDown"
                        x-data="{name: '', email: '', number: ''}"
                        >
                        <h1 class="block mb-2 font-semibold text-[#e34e34] text-center text-3xl">الكاتب الثالث</h1>

                            <div class="z-10 p-2">
                                <div class="bg-[#e34e34] py-4 px-4 rounded-lg flex flex-col gap-2">
                                    <div class="w-full">
                                        <label for="author" class="block mb-2 font-medium text-[#f1e1c6]">الإسم</label>
                                        <input required min="2" type="text"
                                            class="bg-[#f1e1c6] p-2.5 text-black rounded-lg w-full" wire:model="w3_name"
                                            x-model="name"
                                            placeholder="أدخل الإسم">
                                            <div x-show="name.length < 2" class="text-white">ادخل الإسم*</div>
                                    </div>
                                    <div class="w-full">
                                        <label for="email" class="block mb-2 font-medium text-[#f1e1c6]">البريد
                                            الإلكتروني</label>
                                        <input required type="email" class="bg-[#f1e1c6] p-2.5 text-black rounded-lg w-full"
                                            x-model="email" wire:model="w3_email" placeholder="أدخل البريد الإلكتروني">
                                            <div x-show="email.length < 9" class="text-white">ادخل البريد الإلكتروني*</div>
                                    </div>
                                    <div class="w-full" wire:ignore>
                                        <label for="phone" class="block mb-2 font-medium text-[#f1e1c6]">الهاتف</label>
                                        <input wire:ignore required min="9" type="tel" id="phone3"
                                        class="bg-[#f1e1c6] w-80 p-2.5 rounded-lg text-black" wire:model="w3_number"
                                        x-model="number"
                                        placeholder="أدخل الهاتف">
                                            <div x-show="number.length < 9" class="text-white">ادخل الهاتف*</div>
                                    </div>
                                </div>

                                <div class="beep text-center relative hover:scale-95 mt-4 rounded-lg"  x-on:click="step++">
                                    <img class="h-16 md:h-24 w-full" src="{{ asset('website/images/button.svg') }}"
                                        alt="">
                                    <button type="button"
                                        wire:click="submit"
                                        class="mt-2 absolute inset-0 flex items-center justify-center text-white text-1xl md:text-2xl font-semibold">إرسال</button>
                                </div>
                            </div>
                    </div>
                {{-- @endif --}}

                @if ($this->completed)
                    <div class="px-8 border-x-2 border-[#e34e34]" x-show="step==6">
                        <div class="flex flex-col items-center justify-center my-8">
                            <div class="z-10">
                                <h1 class="text-center text-2xl md:text-6xl font-bold my-8 text-[#e34e34]">تم انشاء الأقصوصة</h1>

                                <div class="grid sm:grid-cols-1 md:grid-cols-2 mx-auto justify-center mt-12 gap-4">

                                    <div class="beep text-center relative hover:scale-95 cursor-pointer">
                                        <a href="{{ url('/story') }}" class="mt-2 absolute inset-0 flex items-center justify-center text-white text-4xl">                                    <img class="h-16 md:h-24 w-full" src="{{ asset('website/images/button.svg') }}">
                                            <span class="mt-2 absolute inset-0 flex items-center justify-center text-white text-1xl md:text-2xl font-semibold">عودة</span>
                                        </a>
                                    </div>


                                    <div class="beep text-center relative hover:scale-95 cursor-pointer">
                                        <a href="{{ route('story.pdf', $this->id) }}">
                                            <img class="h-16 md:h-24 w-full" src="{{ asset('website/images/button.svg') }}">
                                            <span class="mt-2 absolute inset-0 flex items-center justify-center text-white text-1xl md:text-2xl font-semibold">تحميل الأقصوصة PDF</span>
                                        </a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>

    @assets
        <link href=" https://cdn.jsdelivr.net/npm/intl-tel-input@18.3.3/build/css/intlTelInput.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/intl-tel-input@18.2.1/build/js/intlTelInput.min.js"></script>
    @endassets

    @script
        <script>
            const input = document.querySelector("#phone1");
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

            const input2 = document.querySelector("#phone2");
            window.intlTelInput(input2, {
                initialCountry: "auto",
                geoIpLookup: callback => {
                    fetch("https://ipapi.co/json")
                        .then(res => res.json())
                        .then(data => callback(data.country_code))
                        .catch(() => callback("sa"));
                },
                utilsScript: "https://cdn.jsdelivr.net/npm/intl-tel-input@18.2.1/build/js/utils.js",
            });

            const input3 = document.querySelector("#phone3");
            window.intlTelInput(input3, {
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
    
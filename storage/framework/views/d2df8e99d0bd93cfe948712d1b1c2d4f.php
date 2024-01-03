<?php

use App\Models\Poem;

?>


        <div id="app" x-data="{ step: 1 }" class="border-x-2 border-[#e34e34] mb-4">

            <!-- Banner -->
            <div class="h-36 md:h-64 w-full">
                <div class="relative">
                    <a href="<?php echo e(url('/')); ?>" wire:navigate>
                        <div class="absolute top-0 left-8 -z-50">
                            <img src="<?php echo e(asset('website/images/banner.svg')); ?>" alt="Banner" class="h-36 md:h-64 w-full">
                        </div>
                    </a>
                </div>
            </div>
            <!-- //Banner -->

            <div>
                <div x-show="step == 1" class="px-8 border-x-2 border-[#e34e34]">
                    <div class="flex flex-col items-center justify-center my-8">
                        <div class="z-10">
                            <h1 class="text-center text-2xl md:text-6xl font-bold my-8 text-[#e34e34]">اختر نوع القصيدة</h1>

                            <div class="grid sm:grid-cols-1 md:grid-cols-2 mx-auto justify-center mt-12 gap-4">

                                <div class="beep text-center relative hover:scale-95 cursor-pointer"
                                    wire:click="selectedType('fosha')" x-on:click="step++">
                                    <img class="h-16 md:h-24 w-full" src="<?php echo e(asset('website/images/button.svg')); ?>">
                                    <span
                                        class="mt-2 absolute inset-0 flex items-center justify-center text-white text-1xl md:text-2xl font-semibold">فصحى</span>
                                </div>


                                <div class="beep text-center relative hover:scale-95 cursor-pointer"
                                    wire:click="selectedType('nabati')" x-on:click="step++">
                                    <img class="h-16 md:h-24 w-full" src="<?php echo e(asset('website/images/button.svg')); ?>">
                                    <span
                                        class="mt-2 absolute inset-0 flex items-center justify-center text-white text-1xl md:text-2xl font-semibold">نبطي</span>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="text-center p-4 my-4" style="line-height:normal">
                        <h1 class="text-center text-2xl font-bold my-8 text-[#e34e34]">شروط المشاركة بالقصائد:</h1>
                        <?php echo setting("shareYourPoemTerms"); ?>

                    </div>
                </div>

                <div x-show="step==2"
                    class="flex flex-col items-center justify-center my-2 md:my-4 animate__animated animate__backInDown">
                    <h1 class="block mb-2 font-semibold text-[#e34e34] text-center text-3xl">شارك قصيدتك</h1>

                    <div class="z-10 p-2" x-data="{ name: '' }">
                        <div class="bg-[#e34e34] py-4 px-4 rounded-lg flex flex-col gap-2">
                            <div class="w-full">
                                <label for="name" class="block mb-2 font-medium text-[#f1e1c6]">إسم القصيدة</label>
                                <input required min="2" type="text" class="w-full bg-[#f1e1c6] p-4 text-black rounded-lg"
                                    x-model="name" wire:model="name" placeholder="أدخل إسم القصيدة">
                                <div x-show="name.length < 2" class="text-white mt-2">يجب ان يحتوي الإسم علي حرفين علي الأقل*
                                </div>
                            </div>
                        </div>

                        <div class="beep text-center relative hover:scale-95 mt-4 rounded-lg"
                            x-on:click="if(name.length >= 2) step++">
                            <img class="h-16 md:h-24 w-full" src="<?php echo e(asset('website/images/button.svg')); ?>" alt="">
                            <button type="button"
                                class="mt-2 absolute inset-0 flex items-center justify-center text-white text-1xl md:text-2xl font-semibold">إرسال</button>
                        </div>
                    </div>
                </div>

                <div x-show="step==3"
                    class="flex flex-col items-center justify-center my-2 md:my-4 animate__animated animate__backInDown">
                    <h1 class="block mb-2 font-semibold text-[#e34e34] text-center text-3xl">شارك قصيدتك</h1>

                    <div class="z-10 p-2" x-data="{ content: '' }">
                        <div class="bg-[#e34e34] py-4 px-4 rounded-lg flex flex-col gap-2">
                            <div class="w-full">
                                <label for="name" class="block mb-2 font-medium text-[#f1e1c6]">القصيدة</label>
                                <textarea rows="6" required min="12" type="name" class="bg-[#f1e1c6] p-4 text-black rounded-lg"
                                    x-model="content" wire:model="content">أدخل القصيدة</textarea>
                                <div x-show="content.length < 12" class="text-white mt-2">يجب ان تحتوي القصيدة علي 12 حرف علي
                                    الأقل*</div>
                            </div>
                        </div>

                        <div class="beep text-center relative hover:scale-95 mt-4 rounded-lg"
                            x-on:click="if(content.length >= 12) step++">
                            <img class="h-16 md:h-24 w-full" src="<?php echo e(asset('website/images/button.svg')); ?>" alt="">
                            <button type="button"
                                class="mt-2 absolute inset-0 flex items-center justify-center text-white text-1xl md:text-2xl font-semibold">إرسال</button>
                        </div>
                    </div>
                </div>

                <!--[if BLOCK]><![endif]--><?php if(!$this->completed): ?>
                    <div x-show="step==4"
                        class="flex flex-col items-center justify-center my-2 md:my-4 animate__animated animate__backInDown">
                        <h1 class="block mb-2 font-semibold text-[#e34e34] text-center text-3xl">ادخل بياناتك الشخصية</h1>

                        <form wire:submit='submit'>
                            <div class="z-10 p-2">
                                <div class="bg-[#e34e34] py-4 px-4 rounded-lg flex flex-col gap-2">
                                    <div class="w-full">
                                        <label for="author" class="block mb-2 font-medium text-[#f1e1c6]">الإسم</label>
                                        <input required min="2" type="text"
                                            class="bg-[#f1e1c6] p-2.5 text-black rounded-lg w-full" wire:model="author"
                                            placeholder="أدخل الإسم">
                                        <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['author'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div class="text-white">ادخل الإسم*</div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> <!--[if ENDBLOCK]><![endif]-->
                                    </div>
                                    <div class="w-full">
                                        <label for="email" class="block mb-2 font-medium text-[#f1e1c6]">البريد
                                            الإلكتروني</label>
                                        <input required type="email" class="bg-[#f1e1c6] p-2.5 text-black rounded-lg w-full"
                                            wire:model="email" placeholder="أدخل البريد الإلكتروني">
                                        <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div class="text-white">ادخل البريد الإلكتروني*</div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> <!--[if ENDBLOCK]><![endif]-->
                                    </div>
                                    <div class="w-full" wire:ignore>
                                        <label for="phone" class="block mb-2 font-medium text-[#f1e1c6]">الهاتف</label>
                                        <input wire:ignore id="phone" required min="9" type="tel"
                                        class="bg-[#f1e1c6] w-80 p-2.5 rounded-lg text-black" wire:model="phone"
                                        placeholder="أدخل الهاتف">
                                        <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div class="text-white">ادخل الهاتف*</div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> <!--[if ENDBLOCK]><![endif]-->
                                    </div>
                                </div>

                                <div class="beep text-center relative hover:scale-95 mt-4 rounded-lg" wire:click="submit">
                                    <img class="h-16 md:h-24 w-full" src="<?php echo e(asset('website/images/button.svg')); ?>"
                                        alt="">
                                    <button type="button"
                                        class="mt-2 absolute inset-0 flex items-center justify-center text-white text-1xl md:text-2xl font-semibold">إرسال</button>
                                </div>
                            </div>
                        </form>
                    </div>
                <?php endif; ?> <!--[if ENDBLOCK]><![endif]-->

                <!--[if BLOCK]><![endif]--><?php if($this->completed): ?>
                    <div class="flex flex-col items-center my-8 md:my-4 justify-center animate__animated animate__backInDown">
                        <div class="container mx-auto px-4 justify">
                            <h1 class="text-center text-2xl md:text-6xl font-bold my-8 text-[#e34e34]">تم ارسال قصيدتك</h1>

                            <div class="z-10">
                                <div class="beep text-center relative hover:scale-95 mb-8">
                                    <a href="<?php echo e(url('/poems')); ?>" wire:navigate>
                                        <img class="h-16 md:h-24 w-full" src="<?php echo e(asset('website/images/button.svg')); ?>"
                                            alt="">
                                        <span
                                            class="mt-2 absolute inset-0 flex items-center justify-center text-white text-1xl md:text-2xl font-semibold">الرئيسية</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?> <!--[if ENDBLOCK]><![endif]-->
            </div>
        </div>

            <?php
        $__assetKey = '2791216420-0';

        ob_start();
    ?>
            <link href=" https://cdn.jsdelivr.net/npm/intl-tel-input@18.3.3/build/css/intlTelInput.min.css" rel="stylesheet">
            <script src="https://cdn.jsdelivr.net/npm/intl-tel-input@18.2.1/build/js/intlTelInput.min.js"></script>
            <?php
        $__output = ob_get_clean();

        // If the asset has already been loaded anywhere during this request, skip it...
        if (in_array($__assetKey, \Livewire\Features\SupportScriptsAndAssets\SupportScriptsAndAssets::$alreadyRunAssetKeys)) {
            // Skip it...
        } else {
            \Livewire\Features\SupportScriptsAndAssets\SupportScriptsAndAssets::$alreadyRunAssetKeys[] = $__assetKey;
            \Livewire\store($this)->push('assets', $__output, $__assetKey);
        }
    ?>

            <?php
        $__scriptKey = '2791216420-1';
        ob_start();
    ?>
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
            <?php
        $__output = ob_get_clean();

        \Livewire\store($this)->push('scripts', $__output, $__scriptKey)
    ?>
    <?php /**PATH E:\xampp\htdocs\mayadeen2\storage\framework\views/ca051799c0f08abe2124302652a3070a.blade.php ENDPATH**/ ?>
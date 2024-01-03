<?php

use App\Models\Visitor;

?>


        <div id="app" class="mb-4">

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

            <!-- Step 1 : Form -->
            <!--[if BLOCK]><![endif]--><?php if(!$this->completed): ?>
                <div class="flex flex-col items-center justify-center animate__animated animate__backInDown">
                    <form wire:submit.prevent='submit' accept="file" enctype="multipart/form-data">
                        <div class="z-10 p-2">
                            <div class="bg-[#e34e34] py-4 px-4 rounded-lg flex flex-col gap-2">
                                <div class="w-full">
                                    <label for="name" class="block mb-2 font-medium text-[#f1e1c6]">الإسم</label>
                                    <input required min="2" type="name"
                                        class=" rounded-lg bg-[#f1e1c6] p-2.5 text-black w-full" wire:model="name"
                                        placeholder="أدخل الإسم">
                                    <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['name'];
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
                                    <input required type="email" class="rounded-lg bg-[#f1e1c6] p-2.5 text-black w-full"
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

                                <div wire:ignore class="w-full">
                                    <label for="phone"
                                        class="block mb-2 font-medium text-[#f1e1c6] rounded-lg">الهاتف</label>
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

                                <div class="w-full">
                                    <label for="name" class="block mb-2 font-medium text-[#f1e1c6]">الصورة</label>

                                    <label for="uploadFile"
                                        class="bg-[#f1e1c6] text-black text-base rounded w-80 h-52 flex flex-col items-center justify-center cursor-pointer border-2 border-gray-300 border-dashed mx-auto font-[sans-serif]">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 mb-2 fill-black" viewBox="0 0 32 32">
                                            <path
                                                d="M23.75 11.044a7.99 7.99 0 0 0-15.5-.009A8 8 0 0 0 9 27h3a1 1 0 0 0 0-2H9a6 6 0 0 1-.035-12 1.038 1.038 0 0 0 1.1-.854 5.991 5.991 0 0 1 11.862 0A1.08 1.08 0 0 0 23 13a6 6 0 0 1 0 12h-3a1 1 0 0 0 0 2h3a8 8 0 0 0 .75-15.956z"
                                                data-original="#000000" />
                                            <path
                                                d="M20.293 19.707a1 1 0 0 0 1.414-1.414l-5-5a1 1 0 0 0-1.414 0l-5 5a1 1 0 0 0 1.414 1.414L15 16.414V29a1 1 0 0 0 2 0V16.414z"
                                                data-original="#000000" />
                                        </svg>
                                        <span class="font-sans">رفع الصورة</span>
                                        <input type="file" capture id='uploadFile' class="hidden" wire:model="image" />
                                        <p class="text-xs text-gray-400 mt-2 font-sans">مسموح بالصورة فقط.</p>
                                        <div wire:loading wire:target="image" class="text-sm text-gray-500 italic mt-4">يتم الرفع ...</div>
                                        <!--[if BLOCK]><![endif]--><?php if($this->image): ?> <div class="text-center text-sm text-gray-500 italic mt-4">الملف: <br> <?php echo e($this->image?->getClientOriginalName()); ?></div> <?php endif; ?> <!--[if ENDBLOCK]><![endif]-->
                                    </label>
                                    <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div class="text-white">اختر الصورة*</div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> <!--[if ENDBLOCK]><![endif]-->
                                </div>
                            </div>

                            <div class="beep text-center relative hover:scale-95 mt-4 rounded-lg" wire:click="submit">
                                <img class="h-16 md:h-24 w-full" src="<?php echo e(asset('website/images/button.svg')); ?>" alt="">
                                <button type="button"
                                    class="mt-2 absolute inset-0 flex items-center justify-center text-white text-1xl md:text-2xl font-semibold">إرسال</button>
                            </div>
                        </div>
                    </form>
                </div>
            <?php endif; ?> <!--[if ENDBLOCK]><![endif]-->
            <!-- //Step 1 -->

            <!-- Step 2 : Thank you -->
            <!--[if BLOCK]><![endif]--><?php if($this->completed): ?>
                <div class="flex flex-col items-center my-8 md:my-4 justify-center animate__animated animate__backInDown">
                    <div class="container mx-auto px-4 justify">
                        <div class="z-10">
                            <h1 class="text-center text-2xl md:text-6xl font-bold mb-8 text-[#e34e34]">تم التسجيل!</h1>

                            <div class="beep text-center relative hover:scale-95 mb-8">
                                <a href="<?php echo e(url('/visitors')); ?>" wire:navigate>
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
            <!-- //Step 2 -->

        </div>

            <?php
        $__assetKey = '1868177810-0';

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
        $__scriptKey = '1868177810-1';
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
    <?php /**PATH E:\xampp\htdocs\mayadeen2\storage\framework\views/27ba6506361053f1519cc443b38f96dc.blade.php ENDPATH**/ ?>

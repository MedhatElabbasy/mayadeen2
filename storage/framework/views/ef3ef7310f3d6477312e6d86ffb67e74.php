<?php

use App\Models\Question;
use App\Models\Challenge;

?>


        <div id="app" x-data="{
            step: 1,
            hint_text: '',
            hint_image: '',
            stepTemp: 1,
            currentQuestion: 1,
            questionsCount: <?php echo e($this->questionsTotal); ?>,
            nextQuestion() {
                this.step = this.stepTemp;
                this.currentQuestion++;
            }
        }" class="border-x-2 border-[#e34e34] mb-4">

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

            <!-- Step 0 : Wrong answer hint -->
            <div x-show="step==0" class="flex items-center justify-center animate__animated animate__backInDown z-10">
                <div class="container mx-auto px-4">
                    <div class="z-10">

                        <figure class="max-w-lg mx-auto flex flex-col items-center mt-4">
                            <a target="_blank" :href="hint_image">
                            <img class="h-64 w-64 rounded-lg object-fit:cover" :src="hint_image" alt="image description">
                            </a>
                            <figcaption class="mt-2 text-sm text-center text-black font-semibold" x-text="hint_text">
                            </figcaption>
                        </figure>

                        <div class="beep text-center relative hover:scale-95 mt-4 cursor-pointer" x-on:click="nextQuestion">
                            <img class="h-16 md:h-24 w-full" src="<?php echo e(asset('website/images/button.svg')); ?>" alt="">
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
                            <img class="h-16 md:h-24 w-full" src="<?php echo e(asset('website/images/button.svg')); ?>" alt="">
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

                            <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $this->questions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $question): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div x-show="currentQuestion==<?php echo e($loop->index + 1); ?>"
                                    class="animate__animated animate__backInDown">
                                    <div class="flex flex-col items-center justify-center mt-4">
                                        <h1 class="text-1xl md:text-4xl font-bold mb-8 text-[#e34e34]"><?php echo e($question->content); ?>

                                        </h1>

                                        <div class="grid sm:grid-cols-1 md:grid-cols-2 mx-auto justify-center mt-4 gap-4">
                                            <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $question->answers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $answer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="rounded-lg bg-[#e34e34] text-white p-8 items-center text-center font-semibold cursor-pointer beep hover:scale-95"
                                                    <?php if($answer['isCorrect'] && $loop->index + 1): ?> x-on:click="correctQuestion($event.target)" wire:click="incrementScore"
                                                    <?php else: ?> x-on:click="wrongQuestion('<?php echo e($answer['wrongText']); ?>', '<?php echo e(asset('storage/' . $answer['wrongImage'])); ?>')" <?php endif; ?>>
                                                    <span><?php echo e($answer['content']); ?></span>
                                                </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <!--[if ENDBLOCK]><![endif]-->
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <!--[if ENDBLOCK]><![endif]-->
                        </div>

                    </div>
                </div>
            </div>
            <!-- //Step 2 -->

            <!-- Step 3 : Information -->
            <!--[if BLOCK]><![endif]--><?php if(!$this->completed): ?>
            <div x-show="step==3" class="flex flex-col items-center my-8 md:my-4 justify-center animate__animated animate__backInDown">
                <form wire:submit='submit'>
                    <div class="container mx-auto px-4 justify">
                    <h1 class="text-center text-2xl md:text-6xl font-bold my-8 text-[#e34e34]">شكراً لك!</h1>
                    <div class="z-10">
                        <div class="beep text-center relative hover:scale-95 mt-4 rounded-lg" wire:click="submit">
                            <img class="h-16 md:h-24 w-full" src="<?php echo e(asset('website/images/button.svg')); ?>" alt="">
                            <button type="button" class="mt-2 absolute inset-0 flex items-center justify-center text-white text-1xl md:text-2xl font-semibold">إرسال</button>
                        </div>
                    </div>
                </div>
                </form>
            </div>
            <?php endif; ?> <!--[if ENDBLOCK]><![endif]-->
            <!-- //Step 3 -->

            <!-- Step 4 : Score -->
            <!--[if BLOCK]><![endif]--><?php if($this->completed): ?>
                <div class="flex flex-col items-center my-8 md:my-4 justify-center animate__animated animate__backInDown">
                    <div class="container mx-auto px-4 justify">
                        <h1 class="text-center text-2xl md:text-6xl font-bold my-8 text-[#e34e34]">النتيجة</h1>

                        <div class="z-10">
                            <h1 class="text-center text-2xl md:text-6xl font-bold mb-8 text-[#e34e34]">
                                <?php echo e($this->score . ' - ' . '' . $this->questionsTotal); ?></h1>

                            <div class="beep text-center relative hover:scale-95 mb-8">
                                <a href="<?php echo e(url('/challenges')); ?>" wire:navigate>
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
            <!-- //Step 4 -->

        </div>

            <?php
        $__assetKey = '1169432894-0';

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
        $__scriptKey = '1169432894-1';
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
    <?php /**PATH E:\xampp\htdocs\mayadeen2\storage\framework\views/f9613974513d54a0341c68e30b346fbb.blade.php ENDPATH**/ ?>
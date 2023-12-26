<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Noto+Kufi+Arabic:wght@300;400;500;600;700;800&display=swap" rel="stylesheet"/>

    <!-- css -->
    <style> 
      body { 
        font-family: "Noto Kufi Arabic", sans-serif !important;
        cursor: url("{{asset('website/images/feather.png')}}"), auto;
      } 
      
      a, label, button {
        cursor: url("{{asset('website/images/feather.png')}}"), auto;
      }
    </style>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
  
    <title>@yield('title') | {{setting('siteName')}}</title>

    @stack('head')
  </head>
  <body dir="rtl" class="bg-[#f1e1c6]">
    @yield('content')

    <div class="absolute bottom-8 left-8 z-0">
        <img src="{{ asset('website/images/palm.svg') }}" class="w-full md:w-auto sm:w-6">
    </div>

    <div class="hidden md:block absolute top-8 right-8 z-0">
        <img src="{{ asset('website/images/palm.svg') }}" class="w-full md:w-auto sm:w-6">
    </div>

    @stack('body')

    @foreach ([
      'beep',
      'correctAnswer',
      'wrongAnswer',
    ] as $item)
      <audio id="{{$item.'Player'}}" src="{{asset("website/audio/{$item}.mp3")}}" preload="auto">
        Your browser does not support the <code>audio</code> element.
      </audio>
    @endforeach

    <script>
      function soundEffectPlay(player, background=false) {
        if(!background){
          const audioElements = document.querySelectorAll('audio');
          audioElements.forEach(audio => audio.pause());
        }

        let beepOne = document.getElementById(player);
        beepOne.pause();
        beepOne.currentTime = 0;
        beepOne.play();
      }

      document.addEventListener("DOMContentLoaded", function() {
          let beepElements = document.querySelectorAll(".beep");

          beepElements.forEach(function(beepElement) {
              beepElement.addEventListener("mouseenter", function() {
                  soundEffectPlay("beepPlayer", true)
              });
          });
      });
    </script>

<script src="https://cdn.jsdelivr.net/npm/party-js@latest/bundle/party.min.js"></script>
</body>
</html>

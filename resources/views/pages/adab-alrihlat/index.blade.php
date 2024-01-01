<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>أدب الرحلات | {{ setting('siteName') }}</title>
    <!-- google fonts -->
    <!-- <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;500;600;700&family=Tajawal:wght@300;400;500;700;800;900&display=swap"
      rel="stylesheet"
    /> -->
    <!-- css files-->
    <link rel="stylesheet" href="{{ asset('adab/css/general-style.css') }}" />
    <!-- bootstrap link-->
    <link rel="stylesheet" href="{{ asset('adab/css/bootstrap.min.css') }}" />

    <style>
        /* Scrollbar */
        body::-webkit-scrollbar {
            width: 16px;
        }

        body::-webkit-scrollbar-track {
            border-radius: 8px;
            background-color: #e7e7e7;
            border: 1px solid #cacaca;
        }

        body::-webkit-scrollbar-thumb {
            border-radius: 8px;
            border: 3px solid transparent;
            background-clip: content-box;
            background-color: #e34e34;
        }

        /* End scrollbar */
        </style>
  </head>

  <body>
    <section class="start-container">
      <img src="{{ asset('adab/images/logo.svg') }}" alt="" class="logo-img-min-size" />
      <div class="card-man-image">
        <a class="mt-1" href="{{ url('adab-alrihlat/muhamad-bin-nasir-aleabuwdii') }}">
          <a href="{{ url('adab-alrihlat/muhamad-bin-nasir-aleabuwdii') }}"
            ><img src="{{ asset('adab/images/atek.svg') }}" alt="" class="man-image"
          /></a>
          <span class="fs-3">العلامة الراحل</span>
          <p class="fs-3">محمد بن ناصر العبودي</p>
        </a>
      </div>
      <img src="{{ asset('adab/images/logo.svg') }}" alt="" class="logo-img" />
      <div class="card-man-image">
        <a href="{{ url('adab-alrihlat/eatiq-albiladii') }}" class="d-inline-block mt-1">
          <a href="{{ url('adab-alrihlat/eatiq-albiladii') }}"
            ><img src="{{ asset('adab/images/naser.svg') }}" alt="" class="man-image"
          /></a>
          <span class="fs-3">العلامة </span>
          <p class="fs-3">عاتق البلادي</p>
        </a>
      </div>
    </section>
    <script></script>
  </body>
</html>

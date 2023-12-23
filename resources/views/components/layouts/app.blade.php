<!DOCTYPE html>
<html lang="ar">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Noto+Kufi+Arabic:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet"
    />
    <!-- css files-->
    <link rel="stylesheet" href="{{asset('website/css/style.css')}}" />
    <link rel="stylesheet" href="{{asset('website/css/global-style.css')}}" />
    <!-- bootstrap link-->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
      crossorigin="anonymous"
    />
    <title>{{ $title ?? '' }} | {{setting('siteName')}}</title>

  </head>
  <body>
    <img class="top-right" src="{{asset('website/images/column.svg')}}" alt="" />

    <div class="nav-container">
      <img src="{{asset('website/images/navbar.svg')}}" alt="" />
    </div>

    <div>

        {{ $slot }}

    </div>

    <img class="bottom-left" src="{{asset('website/images/column.svg')}}" alt="" />

  </body>
</html>

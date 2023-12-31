<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{ asset('adab/css/all.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('adab/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('adab/css/bootstrap.min.css.map') }}" />
    <link rel="stylesheet" href="{{ asset('adab/css/card.css') }}" />
    <!-- google fonts -->
    <!-- <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;500;600;700&family=Tajawal:wght@300;400;500;700;800;900&display=swap"
      rel="stylesheet"
    /> -->
    <title>العلامة عاتق البلادي | {{ setting('siteName') }}</title>

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
    <div class="container overflow-hidden">
      <div class="m-0 p-0 row justify-content-center">
        <div class="col-12 col-md-6 m-0 p-0">
          <img src="{{ asset('adab/imgs/navbar.svg') }}" class="nav-img" />
        </div>
      </div>
    </div>

    <div class="container authors-container mt-5 p-4">
      <div class="row">
        <div class="text-foot text-center">
          <h2 class="fw-bold fs-2">بعض من كتب</h2>
          <p class="fw-bold fs-2">عاتق البلادي فى الرحلات</p>
        </div>
        <ul class="text-des fw500 px-5" dir="rtl">
          <li>معالم مكة التاريخية والأثرية</li>
          <li>رحلات في بلادالعرب</li>
          <li>الرحلة النجدية</li>
          <li>طرائف وأمثال شعبية</li>
          <li>بين مكة وحضرموت</li>
          <li>بين مكة واليمن</li>
          <li>اخلاق البدو</li>
          <li>على ربى نجد</li>
        </ul>
        <div class="img-des text-center">
          <img src="{{ asset('adab/imgs/Group 105.svg') }}" alt="" />
        </div>
        <!-- =================================================== routing =================================================== -->
        <div
          class="routing-container d-flex justify-content-between align-items-center flex-column flex-md-row mt-2 mt-md-0"
        >
          <div
            class="img-routing-container d-flex align-items-center gap-2"
            onclick="window.location.href='{{url('/adab-alrihlat')}}' "
          >
            <img src="{{ asset('adab/imgs/Group 99.svg') }}" alt="" />
            <p class="m-0 p-0 fw-bold fs-4">العودة للصفحة الرئيسة</p>
            <!-- <img src="../imgs/right-arrow.svg" alt="" /> -->
          </div>
          <div
            class="img-routing-container d-flex align-items-center gap-2"
            onclick="window.location.href='{{url('/adab-alrihlat/eatiq-albiladii/map')}}' "
          >
            <p class="m-0 p-0 fw-bold fs-4">الرجوع للصفحة السابقة</p>
            <img
              src="{{ asset('adab/imgs/Group 99.svg') }}"
              alt=""
              style="transform: rotate(180deg)"
            />
          </div>
        </div>
      </div>
    </div>
  </body>
</html>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="{{ asset('adab/css/bootstrap.min.css') }}" />
  <link rel="stylesheet" href="{{ asset('adab/css/bootstrap.min.css.map') }}" />
  <link rel="stylesheet" href="{{ asset('adab/css/description.css') }}" />
  <link rel="stylesheet" href="{{ asset('adab/css/card.css') }}" />
  <!-- google fonts -->
  <!-- <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;500;600;700&family=Tajawal:wght@300;400;500;700;800;900&display=swap"
    rel="stylesheet" /> -->
    <title>العلامة عاتق البلادي | {{ setting('siteName') }}</title>
</head>

<body>
    <div class="container overflow-hidden">
      <div class="m-0 p-0 row justify-content-center">
    <div class="col-12 col-md-6 m-0 p-0 ">

      <img src="{{ asset('adab/imgs/navbar.svg') }}" class="nav-img" />

    </div>
  </div>
    </div>
  <div class="container mt-5 p-4 desc-container">
    <div class="row justify-content-center">
      <div class="text-host text-center">
        <div class="fs-2">العلاّمة</div>
        <div class="fs-2">عاتق البلادي</div>
      </div>
      <div class="hostory-text fw500">
        <div>
          عاتق البلادي، مؤرخ ونسابة وأديب سعودي، وُلد في خليص وترعرع في صحراء
          الحجاز، حيث تلقى تعليمه الأولي بالمساجد. انضم إلى الجيش السعودي قبل
          أن يتوجه إلى العمل الثقافي. له إسهامات بارزة في مجالات الجغرافيا
          والتاريخ مع أكثر من 41 مؤلفٍ، بما في ذلك "بين مكة والمدينة" و"رحلات
          في بلاد العرب". اشتهر برحلاته الواسعة وكتبه التي توثق الجزيرة
          العربية ومكة المكرمة. تلقى <br />
          تكريمات عدة أبرزها جائزة أمين مدني للبحث في تاريخ الجزيرة العربية.
          كما تم تكريمه بتسمية شارع باسمه في جدة، تقديرًا لإسهاماته في مجالات
          الأدب والتاريخ والجغرافيا.
        </div>
      </div>
      <div class="img-des text-center">
        <img src="{{ asset('adab/imgs/Group 105.svg') }}" alt="" />
      </div>
      <div class="routing-container d-flex justify-content-between align-items-center flex-column flex-md-row mt-2 mt-md-0 ">
        <div class="img-routing-container d-flex align-items-center gap-2"
          onclick="window.location.href='{{url('adab-alrihlat/eatiq-albiladii/map')}}' ">
          <img src="{{ asset('adab/imgs/Group 99.svg') }}" alt="" />
          <p class="m-0 p-0 fs-4 fw-bold">اذهب للخريطة</p>
        </div>
        <div class="img-routing-container d-flex align-items-center gap-2"
          onclick="window.location.href='{{url('adab-alrihlat')}}' ">
          <p class="m-0 p-0 fs-4 fw-bold ">الرجوع للصفحه الرئيسة</p>
          <!-- <img src="../imgs/right-arrow.svg" alt="" /> -->
          <img src="{{ asset('adab/imgs/Group 99.svg') }}" alt="" style="transform: rotate(180deg);" />

        </div>
      </div>
    </div>
  </div>
  </div>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="<?php echo e(asset('adab/css/bootstrap.min.css')); ?>" />
  <link rel="stylesheet" href="<?php echo e(asset('adab/css/bootstrap.min.css.map')); ?>" />
  <link rel="stylesheet" href="<?php echo e(asset('adab/css/description.css')); ?>" />
  <link rel="stylesheet" href="<?php echo e(asset('adab/css/card.css')); ?>" />
  <!-- google fonts -->
  <!-- <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;500;600;700&family=Tajawal:wght@300;400;500;700;800;900&display=swap"
    rel="stylesheet" /> -->
    <title>العلامة الراحل محمد بن ناصر العبودي | <?php echo e(setting('siteName')); ?></title>

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
    <div class="col-12 col-md-6 m-0 p-0 ">

      <img src="<?php echo e(asset('adab/imgs/navbar.svg')); ?>" class="nav-img" />

    </div>
  </div>
    </div>
  <div class="container mt-5 p-4 desc-container">
    <div class="row justify-content-center">
      <div class="text-host text-center">
        <div class="fs-2 fw">العلاّمة الراحل</div>
        <div class="fs-2 fw">محمد بن ناصر العبودي</div>
      </div>
      <div class="hostory-text fw500">
        <div>
          "العلاّمة الراحل محمد بن ناصر العبودي"، يُعد رمزاً للثقافة والسفر. وُلد عام 1926 في بريدة، حيث بدأ تعليمه في
          الكتاتيب قبل الانتقال إلى دراسة القرآن واللغة العربية. نشط في التدريس والفقه والأدب، وتولى مناصب قيادية مثل
          مدير المعهد العلمي في بريدة ووكيل الجامعة الإسلامية في المدينة المنورة.
          معروف بتأليفه الغزير في أدب الرحلات، حيث زار العبودي معظم بقاع العالم وكتب عن ثقافات متنوعة في كتب مثل "صلة
          الحديث عن إفريقية" و"من روسيا البيضاء إلى روسيا الحمراء". كما كتب في الشريعة والفقه واللغة، ومن بين مؤلفاته
          "نفحات من السكينة القرآنية" و"معجم الأصول الفصيحة للكلمات الدارجة".
          حاز العبودي على تقدير عالٍ لجهوده في الدعوة وخدمة الإسلام، وكُرم في مهرجانات وحصل على جوائز مثل جائزة الأمير
          سلمان لدراسات تاريخ الجزيرة العربية وجائزة "شخصية العام الثقافية". يُشاد به لقربه من مختلف الثقافات والأعراق،
          وترجمته لرحلاته إلى كتب مؤثرة ومفيدة، حاملاً رسالة السلام والمعرفة عبر العالم.
        </div>
      </div>
      <div class="img-des text-center">
        <img src="<?php echo e(asset('adab/imgs/Group 105.svg')); ?>" alt="" />
      </div>
      <div class="routing-container d-flex justify-content-between align-items-center flex-column flex-md-row mt-2 mt-md-0 ">
        <div class="img-routing-container d-flex align-items-center gap-2"
          onclick="window.location.href='<?php echo e(url('adab-alrihlat/muhamad-bin-nasir-aleabuwdii/map')); ?>' ">
          <img src="<?php echo e(asset('adab/imgs/Group 99.svg')); ?>" alt="" />
          <p class="m-0 p-0 fs-4 fw-bold">اذهب للخريطة</p>
        </div>
        <div class="img-routing-container d-flex align-items-center gap-2"
          onclick="window.location.href='<?php echo e(url('adab-alrihlat')); ?>' ">
          <p class="m-0 p-0 fs-4 fw-bold ">الرجوع للصفحه الرئيسة</p>
          <!-- <img src="../imgs/right-arrow.svg" alt="" /> -->
          <img src="<?php echo e(asset('adab/imgs/Group 99.svg')); ?>" alt="" style="transform: rotate(180deg);" />

        </div>
      </div>
    </div>
  </div>
  </div>
</body>

</html><?php /**PATH E:\xampp\htdocs\mayadeen2\resources\views\pages\adab-alrihlat\muhamad-bin-nasir-aleabuwdii\index.blade.php ENDPATH**/ ?>
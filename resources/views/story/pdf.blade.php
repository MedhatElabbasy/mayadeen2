{{-- <!DOCTYPE html>
<html dir="rtl">

<head>
    <title>الأقصوصة </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <style>
        * {
            font-family: DejaVu Sans !important;
        }

        body {
            font-size: 16px;
            font-family: 'DejaVu Sans', 'Roboto', 'Montserrat', 'Open Sans', sans-serif;
            padding: 10px;
            margin: 10px;

            color: #777;
        }


        body {
            color: #777;
            text-align: right;
        }

        body h1 {

            margin-bottom: 0px;
            padding-bottom: 0px;
            color: #000;
        }

        body h3 {

            margin-top: 10px;
            margin-bottom: 20px;
            color: #555;
        }

        body a {
            color: #06f;
        }

        @page {
            size: a4;
            margin: 0;
            padding: 0;
        }

        .invoice-box table {
            direction: ltr;
            width: 100%;
            text-align: right;
            border: 1px solid;
            font-family: 'DejaVu Sans', 'Roboto', 'Montserrat', 'Open Sans', sans-serif;
        }


        .row {
            display: block;
            padding-left: 24;
            padding-right: 24;
            page-break-before: avoid;
            page-break-after: avoid;
        }

        .column {
            display: block;
            page-break-before: avoid;
            page-break-after: avoid;
        }
    </style>
</head>

<body>



    {{ $content }}
</body>

</html> --}}


<!DOCTYPE html>
<html dir="rtl">
<head>
    <title>الأقصوصة </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
         * {
            font-family: DejaVu Sans !important;
        }
    </style>
</head>
<body>

    <div class="container mt-5">
        {{-- <h1 class="text-center">{{ $title }}</h1> --}}

        <div class="row mt-4">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">  </h5>
                        <p class="card-text">{{ $content }}</p>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Bootstrap JS and Popper.js from CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>


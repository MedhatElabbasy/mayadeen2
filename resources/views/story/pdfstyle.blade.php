<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css.map"> -->
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css.map"> --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    {{-- <link rel="stylesheet" href="css/main.css"> --}}

    <title>Document</title>

    <style>
        @media dompdf {
           * { line-height: 1.2; }
        }
        </style>
        
    <style>

 * {
            font-family: DejaVu Sans !important;
        }
        body {
            direction: rtl;
        }

        table {
            width: 90%;
        }

        table,
        th,
        td {
            border: 3px solid #eb6745;
            border-radius: 10px;
            border-collapse: collapse;
            padding: 10px;
            /* border-style: dashed; */
        }

        th {
            font-size: 17px;
        }

        td {
            font-size: 14px;
            font-weight: 400;
        }

        .conten-text div {
            font-size: 14px;
        }

        .paragraphe-content {
            text-align: justify;
            padding: 0 30px;
            padding-bottom: 20px;
        }

        body {
            background-color: #eb6745;
        }

        @font-face {
            font-family: 'riyad';
            src: url('riyad.ttf');
        }

        .header {
            padding: 50px 0;
        }

        .headr-img img {
            width: 70%;
            margin-bottom: 20px;
        }

        .conten-text {
            text-align: center;
            width: 89%;
            margin: auto;
            border: 2px solid #f2e7d1;
            background-color: #f2e7d1;
            border-radius: 32px
                /* clip-path: polygon(0 8%, 21% 7%, 15% 0%, 83% 0, 77% 9%, 100% 9%, 100% 80%, 78% 80%, 85% 100%, 15% 100%, 21% 80%, 0 80%); */
            ;
            margin-top: 23px;
            font-family: riyad;
        }

        .conten-text h1 {
            font-size: 19px;
            font-weight: bold;
        }

        .conten-text img {
            width: 24%;
            margin-top: 25px;
            border-radius: 27px;
        }

        .conten-text div {
            text-wrap: balance;
            font-size: 17px;
        }

        @media (max-width: 477px) {
            .conten-text img {
                width: 41%;
                margin-top: 5px;
                border-radius: 27px;
            }

            .conten-text {
                height: auto;
            }

            .conten-text div {
                font-size: 15px;
            }
        }

        @media (max-width: 799px) {
            .conten-text {
                height: 48%;
            }

            .conten-text h3 {
                font-size: 14px;
            }
        }

        @media (max-width: 1024px) {
            .conten-text {
                height: 48%;
            }
        }

        .foot-img img {
            margin-bottom: 12px;
            width: 16%;
        }

        /* @media (max-width:477px) {
    .headr-img img{
    width: 97%;
    margin-top: 7px;
}
} */
    </style>
</head>

<body>
    <div class="header">
        <div class="container">
            <div class="row">
                <div class="headr-img text-center">
                    <img src="{{ ('pdfstyle/imgs/Group 40.svg') }}" alt="">
                </div>
                <div class="conten-text" style="text-overflow: auto;">
                    <!-- <img src="imgs/photo1703672560.jpeg" alt=""> -->
                    <h1 class="mt-5"> {{ $title }}
                    </h1>
                    <h1 class="mt-3 mb-5">  {{ $user }} اسم المشرف :
                    </h1>
                    <h1 class="mb-4">محتوى الاقصوصه</h1>
                    <div class="paragraphe-content text-center">{{ $content }}
                    </div>
                </div>
                <div class="conten-text">
                    <div class="d-flex justify-content-around mt-3 flex-column align-items-center">
                        <h1 class="mb-3">بيانات المشاركين</h1>
                        <table>
                            <tr>
                                <th>البريد الإلكتروني</th>
                                <th>الجوال</th>
                                <th>اسم الكاتب</th>

                            </tr>
                            <tr>
                                <td>{{ $w1_email }}</td>
                                <td>{{ $w1_name }}</td>
                                <td>{{ $w1_name }} </td>

                            </tr>
                            <tr>
                                <td>{{ $w2_email }}</td>
                                <td>{{ $w2_number }}</td>
                                <td>{{ $w2_name }} </td>

                            </tr>
                            <tr>
                                <td>{{ $w3_email }}</td>
                                <td>{{ $w3_number }}</td>
                                <td>{{ $w3_name }} </td>

                            </tr>
                        </table>
                    </div>
                    <div class="foot-img mt-2 mb-1">
                        <img src="{{ ('pdfstyle/imgs/Group 33.svg') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

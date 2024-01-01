<!DOCTYPE html>
<html dir="rtl">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- <link rel="stylesheet" href="{{ asset('pdfstyle/css/all.min.css') }}"> --}}
    {{-- <link rel="stylesheet" href="{{ asset('pdfstyle/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('pdfstyle/css/pbootstrap.min.css.map') }}"> --}}
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"> --}}

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css.map">

    {{-- <link rel="stylesheet" href="{{ asset('pdfstyle/css/main.css') }}"> --}}

    <title>Document</title>
    <style>
        * {
            font-family: DejaVu Sans !important;
        }

        body {

            background-color: #EB6745;
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
            margin-bottom: 20px
        }

        .conten-text {
            /* text-align: center; */
            width: auto;
            margin: auto;
            height: auto;
            border: 2px solid #F2E7D1;
            background-color: #F2E7D1;
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
            width: auto;
            margin-top: 25px;
            border-radius: 27px
        }

        .conten-text div {
            text-wrap: balance;
            font-size: 17px;
        }

        /*
@media (max-width: 477px) {
.conten-text img {
width: 41%;
margin-top: 5px;
border-radius: 27px;
}
.conten-text{
height: auto;
width: auto;
}
.conten-text div{
font-size: 15px;
}

}
@media (max-width:799px) {
.conten-text{
height: 48%;
}
}
@media (max-width:1024px) {
.conten-text{
height: 48%;
}
}
.foot-img img{
margin-bottom: 12px;
width: 16%;
} */
    </style>

</head>

<body>
    <div class="header">
        <div class="container">
            <div class="row">
                <div class="headr-img text-center">
                    <img src="{{ 'pdfstyle/imgs/Group 40.svg' }}" alt="">
                </div>
                <div class="conten-text" style="width: 100%">
                    <h1 class="mt-1"> {{ $title }}
                    </h1>
                    {{-- <p class="fw-bold">(<span>١٩٤٢م</span> - <span>الأن</span>)</p> --}}
                    {{-- <h1>المقدمة</h1> --}}
                    <div class="">{{ $content }}</div>
                    <hr>
                    <div class="">
                        <p>اسم المشرف </p>
                        <span> {{ Auth::user()->name }}</span>
                    </div>
                    <div class="foot-img mt-2 mb-1">
                        <img src="{{ 'pdfstyle/imgs/Group 33.svg' }}" alt="">
                    </div>
                </div>
                <div class="conten-text" style="width: 100%" !important>
                    <h1 class="mt-1"> الاعضاء المشاركون
                    </h1>
                    <table class="table table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">الهاتف </th>
                                <th scope="col">البريد</th>
                                <th scope="col">اسم الكاتب</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="border">{{ $w1_number }}</td>
                                <td class="border">{{ $w1_email }}</td>
                                <td class="border">{{ $w1_name }}</td>
                            </tr>
                            <tr>
                                <td class="border">{{ $w2_number }}</td>
                                <td class="border">{{ $w2_email }}</td>
                                <td class="border">{{ $w2_name }}</td>
                            </tr>
                            <tr>
                                <td class="border">{{ $w3_number }}</td>
                                <td class="border">{{ $w3_email }}</td>
                                <td class="border">{{ $w3_name }}</td>
                            </tr>
                        </tbody>
                    </table>




                    <div class="foot-img mt-2 mb-1">
                        <img src="{{ 'pdfstyle/imgs/Group 33.svg' }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

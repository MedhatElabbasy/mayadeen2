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
        body{

background-color: #EB6745;
}
@font-face {
font-family: 'riyad';
src: url('riyad.ttf') ;

}
.header{
padding: 50px 0;

}
.headr-img img{
width: 70%;
margin-bottom: 20px
}
.conten-text{
text-align: center;
width: 89%;
margin: auto;
height: 666px;
border: 2px solid #F2E7D1;
background-color: #F2E7D1;
border-radius: 32px /* clip-path: polygon(0 8%, 21% 7%, 15% 0%, 83% 0, 77% 9%, 100% 9%, 100% 80%, 78% 80%, 85% 100%, 15% 100%, 21% 80%, 0 80%); */;
margin-top: 23px ;
font-family: riyad;

}
.conten-text h1{
font-size: 19px;
font-weight: bold;
}
.conten-text img{
width: 24%;
margin-top: 25px;
border-radius: 27px
}
.conten-text div{
text-wrap:balance ;
font-size: 17px;
}
@media (max-width: 477px) {
.conten-text img {
width: 41%;
margin-top: 5px;
border-radius: 27px;
}
.conten-text{
height: 517px;
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
}
    </style>

</head>

<body>
    <div class="header">
        <div class="container">
            <div class="row">
                <div class="headr-img text-center">
                    <img src="{{ ('pdfstyle/imgs/Group 40.svg') }}" alt="">
                </div>
                <div class="conten-text">
                    {{-- <img src="{{ ('pdfstyle/imgs/photo1703672560.jpeg') }}" alt=""> --}}
                    <h1 class="mt-1">
                        {{ $title  }}
                    </h1>
                    <p class="fw-bold">(<span>
                        {{ $user->name }}
                    </span> - <span>المشرف</span>)</p>
                    <h1>المحتوى</h1>
                    <p>
                        {{ $content }}
                    </p>
                    <div class="foot-img mt-2 mb-1">
                        <img src="{{ ('pdfstyle/imgs/Group 33.svg') }}" alt="">
                    </div>
                    {{-- create table style to displat w1_name, w1_email , w1_number --}}
                    <h1>المشاركين</h1>
                    <table class="table table-striped table-hover"
                        style="direction: ltr; text-align: center; width: 100%;"
                        >
                        <thead>
                            <tr>
                                <th scope="col">رقم الهاتف</th>
                                <th scope="col">البريد الالكتروني</th>
                                <th scope="col">الاسم</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $w1_number }}</td>
                                <td>{{ $w1_email }}</td>
                                <td>{{ $w1_name }}</td>
                            </tr>
                            <tr>
                                <td>{{ $w2_number }}</td>
                                <td>{{ $w2_email }}</td>
                                <td>{{ $w2_name }}</td>
                            </tr>
                            <tr>
                                 <td>{{ $w3_number }}</td>
                                <td>{{ $w3_email }}</td>
                                <td>{{ $w3_name }}</td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="foot-img mt-2 mb-1">
                        <img src="{{ ('pdfstyle/imgs/Group 33.svg') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

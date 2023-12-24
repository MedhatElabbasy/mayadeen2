@extends('layouts.app')

@section('title', 'مرحبا')

@push('head')
    <link rel="stylesheet" href="{{asset('website/css/welcome.css')}}" />
    <link rel="stylesheet" href="{{asset('website/css/global-style.css')}}" />
@endpush

@section('content')
@volt
<div class="app">

<img class="top-right" src="{{asset('website/imges/column.svg')}}" alt="" />

<div class="nav-container">
  <img src="{{asset('website/imges/navbar.svg')}}" alt="" />
</div>

    @auth
    <div class="img-btn">
        <img class="red-small-btn" src="{{asset('website/imges/red-small-btn.svg')}}" alt="" />
        <div>
            <h2>مرحبا {{ auth()->user()->name }}!</h2>
        </div>
    </div>
    @endauth

    @guest
    <div class="img-btn">
        <img class="red-small-btn" src="{{asset('website/imges/red-small-btn.svg')}}" alt="" />
        <a href="#" wire:navigate>
            <h2>تحدي نفسك</h2>
        </a>
    </div>

    <div class="img-btn">
        <img class="red-small-btn" src="{{asset('website/imges/red-small-btn.svg')}}" alt="" />
        <a href="/survey" wire:navigate>
            <h2>شاركنا تجربتك</h2>
        </a>
    </div>
    @endguest


</div>

<script src="{{asset('website/js/survey.js')}}"></script>
@endvolt
@endsection

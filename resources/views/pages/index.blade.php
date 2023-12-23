@extends('layouts.app')

@section('title', 'تحدي نفسك')

@section('content')
<div class="img-btn">
    <img class="red-small-btn" src="{{asset('website/images/red-small-btn.svg')}}" alt="" />

    @auth
    <h2>مرحبا {{ auth()->user()->name }}!</h2>
    @endauth

    @guest
    <a href="#">
        <h2>تحد نفسك</h2>
    </a>   
    @endguest

</div>
@endsection
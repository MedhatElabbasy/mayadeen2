<?php
 
use function Laravel\Folio\name;
 
name('home.index');

?>

@extends('layouts.app')

@section('title', 'مرحبا')

@section('content')
<div class="img-btn">
    <img class="red-small-btn" src="{{asset('website/images/red-small-btn.svg')}}" alt="" />

    @auth
    <h2>مرحبا {{ auth()->user()->name }}!</h2>
    @endauth


    @guest
    <a href="/challenge" wire:navigate>
        <h2>تحدي نفسك</h2>
    </a>   
    @endguest

</div>
@endsection
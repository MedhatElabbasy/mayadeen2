<x-layouts.app title="مرحبا">
@volt
<link rel="stylesheet" href="{{asset('website/css/style.css')}}" />

<div class="app">
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
</div>
@endvolt
</x-layouts.app>
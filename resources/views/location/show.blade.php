@extends('layouts.left-sidebar')

@section('sidebar')
<div class="lib-panel">
    <div class="lib-row">
        <h2 class="big-title">Address</h2>
    </div>
    <div class="lib-row lib-desc">
        <h2 class="big-title"></h2>
        <p>{{ $location->address }}</p>
        <p>{{ $location->locality->postal_code }} {{ $location->locality->locality }}</p>

        @if($location->website)
        <p><a href="{{ $location->website }}" target="_blank">{{ $location->website }}</a></p>
        @else
        <p><em>Pas de site web</em></p>
        @endif
        @if($location->phone)
        <p><a href="tel:{{ $location->phone }}">{{ $location->phone }}</a></p>
        @else
        <p><em>Pas de téléphone</em></p>
        @endif
    </div>
</div>
@endsection

@section('content')
    <div class="back-nav mb-4">
        <a href="{{ route('locations_index') }}"><i class="fas fa-angle-left"></i>All Locations</a>
    </div>
        <h2  class="big-title">Shows happening at {{ $location->designation }}</h2>
        @foreach($location->shows as $show)
        
        <article class="row d-flex">
            <a href="{{ route('shows_show', $show->id) }}" class="col-4"><img src="{{  asset('images/show_posters/'.$show->poster_url) }}" class="mb-1" alt="" /></a>
            <div class="col">
                <header>
                    <h3><a href="{{ route('shows_show', $show->id) }}">{{ $show->title }}</a></h3>
                </header>
                <p class="mb-3"><em>{{ $show->description}}</em></p>
                <p class="d-flex justify-content-between">
                    <span><strong>Prix:</strong> {{ $show->price ? $show->price.'€' : 'Inconnu' }}</span>
                    <a class="button"  href="{{ route('shows_show', $show->id) }}">Checkout</a>
                </p>
            </div>
        </article>
        @endforeach

    
@endsection

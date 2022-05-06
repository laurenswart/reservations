@extends('layouts.app')

@section('title', 'Fiche d\'une représentation')

@section('content')
    <div class="nav">
        <a href="{{ route('representations_index') }}"><i class="fa-solid fa-chevron-left"></i>Retour à l'index</a>
    </div>
<div class="lib-item" data-category="view">
    <div class="lib-panel">
        <div class="row box-shadow">
            <div class="col-md-6">
                @if($representation->show->poster_url)
                <img class="lib-img-show" src="{{ asset('images/show_posters/'.$representation->show->poster_url) }}" alt="{{ $representation->show->title }}">
                @endif
            </div>
            <div class="col-md-6">
                <div class="lib-row">
                    <h1>Représentation</h1>
                </div>
                <p><strong>Quand:</strong> {{ $date }} à {{ $time }}</p>
                <p><strong>Spectacle:</strong> {{ $representation->show->title }}</p>

                <p><strong>Lieu:</strong> 
                @if($representation->location)
                {{ $representation->location->designation }}
                @elseif($representation->show->location)
                {{ $representation->show->location->designation }}
                @else
                <em>à déterminer</em>
                @endif
                </p>
                @if($representation->show->bookable && $representation->when > date('Y-m-d H:i:s') )
                <p><strong>Prix:</strong> {{ $representation->show->price }} &#8364</p>
                <div class="lib-desc">
                    <h2>Réserver</h2>
                    <form method="POST" class="reserve" action="{{ route('reservations_checkout') }}">
                        @csrf
                        <label for="places">Places</label>
                        <input type="number" id="places" name="places" min="1" value=2>
                        <input type="text" name="representation" value="{{ $representation->id }}" hidden>
                        <button type="submit" class="button expanded">Payer</button>
                    </form>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
    
    

@endsection

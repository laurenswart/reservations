@extends('layouts.app')

@section('title', 'Fiche d\'un spectacle')

@section('content')
    <article>
        <h1>{{ $show->title }}</h1>
            
        @if($show->poster_url)
        <p><img src="{{ asset('images/'.$show->poster_url) }}" alt="{{ $show->title }}" width="200"></p>
        @else
        <canvas width="200" height="100" style="border:1px solid #000000;"></canvas>
        @endif
        
        @if($show->location)
        <p><strong>Lieu de création:</strong> {{ $show->location->designation }}</p>
        @endif

        <p><strong>Prix:</strong> {{ $show->price }} €</p>
        
        @if($show->bookable)
        <p><em>Réservable</em></p>
        @else
        <p><em>Non réservable</em></p>
        @endif
        
        <h2>Liste des représentations</h2>
        @if($show->representations->count()>=1)
        <ul>
            @foreach ($show->representations as $representation)
                <li>{{ $representation->when }} 
                @if($representation->location)
                ({{ $representation->location->designation }})
                @elseif($representation->show->location)
                ({{ $representation->show->location->designation }})
                @else
                (lieu à déterminer)
                @endif
                </li>
            @endforeach
        </ul>
        @else
        <p>Aucune représentation</p>
        @endif
    </article>
    
    <nav><a href="{{ route('show_index') }}">Retour à l'index</a></nav>
@endsection

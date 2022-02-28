@extends('layouts.app')

@section('title', 'Fiche d\'un spectacle')

@section('content')
    <div class="nav">
        <a href="{{ route('shows_index') }}"><i class="fa-solid fa-chevron-left"></i>Retour à l'index</a>
    </div>
    <div class="lib-item" data-category="view">
        <div class="lib-panel">
            <div class="row box-shadow">
                <div class="col-md-6">
                    @if($show->poster_url)
                    <img class="lib-img-show" src="{{ asset('images/show_posters/'.$show->poster_url) }}" alt="{{ $show->title }}">
                    @endif
                </div>
                <div class="col-md-6">
                    <div class="lib-row">
                    <h1>{{ $show->title }}</h1>
                    </div>
                    <div class="lib-row lib-desc">
                    @if($show->location)
                        <p><strong>Lieu de création:</strong> {{ $show->location->designation }}</p>
                    @endif
                    <p><strong>Prix:</strong> {{ $show->price }} €
                        @if($show->bookable)
                            <em>Réservable</em>
                        @else
                            <em>Non réservable</em>
                        @endif
                    </p>
                    <h2>Représentations</h2>
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

                    <h2>Artistes</h2>
                    @foreach ($collaborateurs as $collabName => $collabData)
                        <p><strong>{{ ucfirst($collabName) }}s:</strong>
                        @foreach ($collabData as $auteur)
                            {{ $auteur->firstname }} 
                            {{ $auteur->lastname }}
                            @if($loop->iteration == $loop->count-1) et 
                            @elseif(!$loop->last), 
                            @endif
                        @endforeach
                        </p>
                    @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
@endsection

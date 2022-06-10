@extends('layouts.left-sidebar')

@section('sidebar')
    @if($show->poster_url)
        <img class="lib-img-show" src="{{ asset('images/show_posters/'.$show->poster_url) }}" alt="{{ $show->title }}">
    @endif
@endsection

@section('content')
    <div class="back-nav mb-4">
        <a href="{{ route('shows_index') }}"><i class="fas fa-angle-left"></i>Retour à l'index</a>
    </div>
    <div class="lib-item" data-category="view">
        <div class="lib-panel">
                    <div class="lib-row">
                    <h1>{{ $show->title }}</h1>
                    </div>
                    <div class="lib-row lib-desc">
                    @if($show->location)
                        <p><strong>Lieu de création:</strong> <a href="{{route('locations_show', $show->location_id)}}">{{ $show->location->designation }}</a></p>
                    @endif
                    <p><strong>Prix:</strong> {{ $show->price }} €</p>
                    <h2>Représentations</h2>
                    @if($show->representations->count()>=1)
                    <ul>
                        @foreach ($show->representations as $representation)
                            <li class="d-flex justify-content-between my-1"><span>{{ $representation->when }} 
                            @if($representation->location)
                            <a href="{{route('locations_show', $representation->location_id)}}">({{ $representation->location->designation }})</a>
                            @elseif($representation->show->location)
                            <a href="{{route('locations_show', $representation->show->location_id)}}">({{ $representation->show->location->designation }})</a>
                            @else
                            (lieu à déterminer)
                               
                            @endif
                            </span>
                            @if($representation->when > now() && $representation->show->bookable)
                                <a class="button small"  href="{{ route('representations_show', $representation->id) }}">Book</a>
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
                        <a href="{{ route('artists_show', $auteur->id) }}">
                            {{ $auteur->firstname }} 
                            {{ $auteur->lastname }}
                            @if($loop->iteration == $loop->count-1) et 
                            @elseif(!$loop->last), 
                            @endif
                        </a>
                        @endforeach
                        </p>
                    @endforeach

            </div>
        </div>
    </div>
    
    
@endsection

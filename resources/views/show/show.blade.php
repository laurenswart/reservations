@extends('layouts.left-sidebar')

@section('sidebar')

        <hr class="first" />
        <section>
            <a href="#" class="image featured"><img  src="{{ asset('images/show_posters/'.$show->poster_url) }}" alt="{{ $show->title }}" /></a>
        </section>
        <hr />
        
        <section>
            @if(!empty($similarShows))
            <header>
                <h3>Shows with similar Artists</h3>
            </header>
            
            <div class="row gtr-50">
            @foreach($similarShows as $similarShow)
                <div class="col-4">
                    <a href="{{ route('shows_show', $similarShow->id) }}" class="image fit"><img src="{{ asset('images/show_posters/'.$similarShow->poster_url) }}" alt="" /></a>
                </div>
                <div class="col-8">
                    <h4><a href="{{ route('shows_show', $similarShow->id) }}">{{ $similarShow->title}}</a></h4>
                    <p><strong>Prix:</strong> {{ $similarShow->price ? $similarShow->price.'€' : '' }} 
                        @if($show->bookable)
                            <em>Réservable</em>
                        @else
                            <em>Non réservable</em>
                        @endif
                    </p>
                </div>
            @endforeach
            </div>
            @endif
            <footer>
                <a href="{{ route('shows_index') }}" class="button">All our Shows</a>
            </footer>
        </section>
    @endsection
    @section('content')
        <article id="main">
            <section>
                <div class="lib-item" data-category="view">
                    <div class="back-nav">
                        <a href="{{ url()->previous() }}"><i class="fas fa-angle-left"></i>Retour</a>
                    </div>
                    <div class="lib-panel">
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
                                        <li>
                                            {{ $representation->when }} 
                                            @if($representation->location)
                                                ({{ $representation->location->designation }})
                                            @elseif($representation->show->location)
                                                ({{ $representation->show->location->designation }})
                                            @else
                                                (lieu à déterminer)
                                            @endif
                                            @if($show->bookable && $representation->when > date('Y-m-d H:i:s'))
                                                <a href="{{ route('representations_show', $representation->id) }}">Réserver</a>
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
            </section>
        </article>
    
@endsection

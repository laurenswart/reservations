@extends('layouts.app')

@section('title', 'Fiche d\'une représentation')

@section('content')
<article>
        <h1>Représentation du {{ $date }} à {{ $time }}</h1>
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
    </article>
    
    <nav><a href="{{ route('representation_index') }}">Retour à l'index</a></nav>

@endsection

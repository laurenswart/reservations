@extends('layouts.app')

@section('title', 'Liste des lieux de représentations')

@section('content')
    <h1>Liste des {{ $resource }}</h1>

    <ul>
    @foreach($representations as $representation)
    <li>{{ $representation->show->title }}
        @if($representation->location)
        - <span>{{ $representation->location->designation }}</span>
        @endif
        - <datetime>{{ substr($representation->when,0,-3) }}</datetime>
    </li>
    @endforeach
    </ul>
@endsection

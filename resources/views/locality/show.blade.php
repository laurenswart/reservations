@extends('layouts.app')

@section('title', 'Fiche d\'une localité')

@section('content')
    <h1>{{ $locality->postal_code }} {{ $locality->locality }}</h1>
    <ul>
    @foreach($locality->locations as $location)
        <li>{{ $location->designation }}</li>
    @endforeach
    </ul>
    <div><a href="{{ route('localities_edit' ,$locality->id) }}">Modifier</a></div>
    <nav><a href="{{ route('localities_index') }}">Retour à l'index</a></nav>
@endsection

@extends('layouts.app')

@section('title', 'Fiche d\'un artiste')

@section('content')
    <h1>{{ $artist->firstname }} {{ $artist->lastname }}</h1>
    <nav><a href="{{ route('artist_index') }}">Retour à l'index</a></nav>
@endsection

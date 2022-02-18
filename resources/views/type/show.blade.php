@extends('layouts.app')

@section('title', 'Fiche d\'un type')

@section('content')
    <h1>{{ $type->type }} <a href="{{ route('types_edit', $type->id) }}">Modifier</a></h1>

    <h2>Liste des artistes</h2>
    <ul>
    @foreach($type->artists as $artist)    
        <li>{{ $artist->firstname }} {{ $artist->lastname }}</li>
    @endforeach
    </ul>

    <nav><a href="{{ route('types_index') }}">Retour à l'index</a></nav>
@endsection

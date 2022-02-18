@extends('layouts.app')

@section('title', 'Fiche d\'un role')

@section('content')
    <h1>{{ $role->role }}</h1>
    <a href="{{ route('roles_edit', $role->id)}}">Modifier</a>
    <nav><a href="{{ route('roles_index') }}">Retour à l'index</a></nav>
@endsection

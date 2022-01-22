@extends('layouts.app')

@section('title', 'Fiche d\'un role')

@section('content')
    <h1>{{ $role->role }}</h1>
    <nav><a href="{{ route('role_index') }}">Retour à l'index</a></nav>
@endsection

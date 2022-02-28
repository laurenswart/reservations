@extends('layouts.app')

@section('title', 'Liste des artistes')

@section('content')
    <h1 class="center">Les {{ $resource }}</h1>

    <div class="flex-grid">
        @foreach($artists as $artist)
            <div class="flex-item">
                <a href="{{ route('artists_show', $artist->id) }}">{{ $artist->firstname }}<br>{{ $artist->lastname }}</a>
            </div>
        @endforeach
    </div>
@endsection

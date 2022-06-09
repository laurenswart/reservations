@extends('layouts.no-sidebar')

@section('content')
<div class="back-nav mb-4">
        <a href="{{ route('artists_index') }}"><i class="fas fa-angle-left"></i>All Artists</a>
    </div>
    <h2>Description</h2>
    <p>{{ $artist->information ?? '-'}}</p>
    <h2>Différents types</h2>
    <ul>
    @foreach($artist->types as $type)    
        <li>{{ $type->type }}</li>
    @endforeach
    </ul>
@endsection

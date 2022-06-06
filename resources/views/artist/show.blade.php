@extends('layouts.no-sidebar')

@section('content')
<div class="back-nav">
    <a href="{{ route('artists_index') }}"><i class="fas fa-angle-left"></i>All Artists</a>
</div>

    <h2>Liste des types</h2>
    <ul>
    @foreach($artist->types as $type)    
        <li>{{ $type->type }}</li>
    @endforeach
    </ul>
@endsection

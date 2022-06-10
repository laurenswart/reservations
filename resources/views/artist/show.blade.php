@extends('layouts.left-sidebar')

@section('sidebar')

    <h2>Description</h2>
    <p>{{ $artist->information ?? '-'}}</p>
    <h2>Différents types</h2>
    <ul>
    @foreach($artist->types as $type)    
        <li>{{ $type->type }}</li>
    @endforeach
    </ul>
@endsection


@section('content')
<?php use App\Models\Show; ?>
    <div class="back-nav mb-4">
        <a href="{{ route('artists_index') }}"><i class="fas fa-angle-left"></i>All Artists</a>
    </div>
    <h2 class="mb-4">Shows in which {{$resource}} appears</h2>
    @foreach($shows as $showId=>$artistTypes)    
    <?php  $show=Show::find($showId); ?>
        <article class="row d-flex">
            <a href="{{ route('shows_show', $showId) }}" class="col-4"><img src="{{  asset('images/show_posters/'.$show->poster_url) }}" class="mb-1" alt="" /></a>
            <div class="col">
                <header>
                    <h3><a href="{{ route('shows_show', $showId) }}">{{ $show->title }}</a></h3>
                </header>
                <p class="mb-3"><em>{{ $show->description}}</em></p>
                <p>Roles: 
                @foreach($artistTypes as $artistType)
                    {{$artistType->type->type}}
                    @if($loop->iteration == $loop->count-1) et 
                    @elseif(!$loop->last), 
                    @endif
                @endforeach
                </p>    
            </div>
            
        </article>
    @endforeach

@endsection

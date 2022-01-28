@extends('layouts.app')

@section('title', 'Liste des spectacles')

@section('content')
    <h1>Liste des {{ $resource }}</h1>

    <ul>
    @foreach($shows as $show)
    <li>
        <a href="{{ route('show_show', $show->id) }}">{{ $show->title }}</a>
        @if($show->bookable)
        <span>{{ $show->price }} €</span>
        @endif
        
        @if($show->representations->count()==1)
        - <span>1 représentation</span>
        @elseif($show->representations->count()>1)
        - <span>{{ $show->representations->count() }} représentations</span>
        @else
        - <em>aucune représentation</em>
        @endif
    </li>
    @endforeach
    </ul>
@endsection


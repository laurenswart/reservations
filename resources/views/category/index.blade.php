@extends('layouts.app')

@section('title', 'Liste des categories')

@section('content')
    <h1>Nos {{ $resource }}</h1>

    @foreach($categories as $category)
            <h2>{{ ucfirst($category->name) }}</h2>
            @if(count($category->shows)>0)
                <ul class="category">
                @foreach($category->shows as $show)
                    <li><a href="{{ route('shows_show', $show->id) }}">{{ $show->title }}</a></li>
                @endforeach
                </ul>
            @else 
                <p style="color:grey;margin-left:100px;">Aucun spectacle</p>
            @endif
    @endforeach
@endsection

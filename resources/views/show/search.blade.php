@extends('layouts.app')

@section('title', 'Liste des spectacles')

@section('content')


    <div>
        <div class="image-flex">
            <ul>
                @foreach ($shows as $show)
                    <li class="image-container">
                        <a href="{{ route('shows_show', $show->id) }}">
                            <img src="{{ asset('images/show_posters/' . $show->poster_url) }}" style="width:200px">
                            <div class="info">
                                <div class="text">
                                    <h3>{{ $show->title }}</h3><span> - {{ $show->price }}&euro;</span>
                                </div>
                            </div>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
        {{-- {{$shows->links()}} --}}
    </div>

@endsection

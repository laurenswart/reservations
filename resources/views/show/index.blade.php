@extends('layouts.app')

@section('title', 'Liste des spectacles')

@section('content')

<div class="container">
    <div id="options">
        <!-- places -->
        <div>
            <label>Places</label>
            <input type="number" name="places" value="2">  
        </div>
        <!-- Date -->
        <div>
            <label>From</label>
            <input type="date" name="dates">  
        </div>
        <div>
            <label>To</label>
            <input type="date" name="dates">  
        </div>
        <!-- price -->
        <div>
            <label>Maximum price</label>
            <input type="range" name="price" min="0" max="30" value="30" onchange="this.nextElementSibling.innerText = this.value + '&euro;'">
            <span>30 &euro;</span>
        </div>
        <button class="btn btn-outline-light" style="max-height:50px;align-self:center">Search</button>
    </div>

    <div>
        <div class="image-flex">
        <ul>
        @foreach($shows as $show)
            <li class="image-container">
                <a href="{{ route('shows_show', $show->id) }}">
                <img src="{{ asset('images/show_posters/'.$show->poster_url) }}">
                <div class="info">
                    <div class="text">
                        <h3>{{$show->title}}</h3><span> - {{$show->price}}&euro;</span>
                    </div>
                </div>
                </a>
            </li>
        @endforeach
        </ul>
        </div>
    </div>
</div>
@endsection


@extends('layouts.app')

@section('title', 'Liste des spectacles')

@section('content')
<nav class="navbar ">
    <form class="form-inline" action="{{ url('/search') }}" method="get" >
        <div>
            <label>search</label>
            <input class="form-control mr-sm-2" name="search" type="search" placeholder="Search" aria-label="Search">
        </div>

        <!-- places -->
        <div>
            <label>Places</label>
            <input class="form-control mr-sm-2" type="number" name="nbPlace" value="2">
        </div>

        <!-- Date -->
        <div>
            <label>From</label>
            <input class="form-control mr-sm-2" type="date" name="fromDate">
        </div>
        {{-- <div>
            <label>To</label>
            <input type="date" name="toDate" class="form-control mr-sm-2">
        </div> --}}

        <!-- price -->
        <div>
            <label>Maximum price</label>
            <input type="range" name="price" min="0" max="30" value="9.00"
                onchange="this.nextElementSibling.innerText = this.value + '&euro;'" class="form-control mr-sm-2">
            <span>30 &euro;</span>
        </div>
        <button name="btn" class="btn btn-outline-success ml-3 mt-3" type="submit">Search</button>
    </form>

</nav>

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

@extends('layouts.app')

@section('title', 'Liste des spectacles')

@section('content')

    <div class="container">

        <nav class="navbar ">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <form class="form-inline" action="{{ url('/search') }}" method="get">
                @csrf
                <div>
                    <label>search</label>
                    <input id="search_product" class="form-control mr-sm-2" name="search" type="search" placeholder="Search" aria-label="Search">
                </div>

                <!-- places -->


                <!-- Date -->
                <div>
                    <label>Calendrier</label>
                    <input class="form-control mr-sm-2" type="date" name="fromDate">
                </div>


                <!-- price -->
                <div>
                    <label>Maximum price</label>
                    <input type="range" name="price" min="0" max="30" value="30.00"
                        onchange="this.nextElementSibling.innerText = this.value + '&euro;'" class="form-control mr-sm-2">
                    <span>30 &euro;</span>
                </div>
                <button name="btn" class="btn btn-outline-success ml-3 mt-3" type="submit">Search</button>
            </form>

        </nav>


        <div>
            <div class="image-flex shows">
                <ul>
                    @foreach ($shows as $show)
                        <li class="image-container">
                            <a href="{{ route('shows_show', $show->id) }}">
                                <img src="{{ asset('images/show_posters/' . $show->poster_url) }}">
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
        </div>
        {{ $shows->links() }}
    </div>
@endsection

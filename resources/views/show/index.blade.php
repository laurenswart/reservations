@extends('layouts.no-sidebar')

@section('content')
        <nav class="navbar d-flex flex-column align-items-center">
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

                <!-- Date -->
                <div class="mx-2">
                    <label>When</label>
                    <input class="form-control mr-sm-2" type="date" name="fromDate">
                </div>


                <!-- price -->
                <div class="mx-2">
                    <label>Maximum price</label>
                    <div class="d-flex">
                        <input type="range" name="price" min="0" max="30" value="30.00"
                            onchange="this.nextElementSibling.innerText = this.value + '&euro;'" class="form-control mr-sm-2 w-auto">
                        <span class="ml-2">30 &euro;</span>
                    </div>
                </div>
                <div class="ml-3 mt-3 px-5 d-flex flex-column justify-content-end">
                <button name="btn" class="button" type="submit">Search</button>
                </div>
            </form>

        </nav>
        <hr style="top:0;" class="my-4">

        <div class="mb-4">
            <div class="image-flex shows">
                <ul>
                    @foreach ($shows as $show)
                        <li class="image-container ps-0">
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
@endsection

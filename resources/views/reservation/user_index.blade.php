@extends('layouts.app')

@section('title', 'Vos réservations')

@section('content')
<h1 class="big-title">Mes Réservations</h1>
    <table class="table table-dark table-striped">
        <thead>
            <tr>
                <th scope="col">Date</th>
                <th scope="col">Film</th>
                <th scope="col">Places</th>
                <th scope="col">Prix Total</th>
                <th scope="col">Reservé</th>
            </tr>
        </thead>
        <tbody>
        @foreach($reservations as $reservation)
            <tr>
                <th>{{ $reservation->representation->when }}</th>
                <td>{{ $reservation->representation->show->title }}</td>
                <td>{{ $reservation->places }}</td>
                <td>{{ $reservation->places * $reservation->representation->show->price }} &#8364</td>
                <td>{{ $reservation->created_at }}</td>
            </tr>
            @endforeach
        </tbody>

@endsection



@extends('layouts.app')

@section('title', 'Fiche d\'une réservation')

@section('content')
    <h1>Your reservation</h1>
    <p>Reservation for {{ $reservation->user->firstname }} {{ $reservation->user->lastname }}</p>
    <p>Show : {{ $reservation->representation->show->title }}</p>
    <p>Places : {{ $reservation->places }}</p>
    <p>When : {{ $reservation->representation->when }}</p>
    <p>Where : {{ $reservation->representation->location->designation }}</p>
    <div><a href="{{ route('reservations_edit' ,$reservation->id) }}">Modifier</a></div>
@endsection

@extends('layouts.no-sidebar')

@section('content')
    @if(count($reservations) > 0)
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Date</th>
                    <th scope="col">Film</th>
                    <th scope="col">Location</th>
                    <th scope="col">Places</th>
                    <th scope="col">Prix Total</th>
                    <th scope="col">Reservé</th>
                </tr>
            </thead>
            <tbody>
            @foreach($reservations as $reservation)
                <tr>
                    <th>{{ $reservation->representation->when }}</th>
                    <td><a href="{{ route('shows_show', $reservation->representation->show->id)}}">{{ $reservation->representation->show->title }}</a></td>
                    <td><a href="{{ route('locations_index')}}">{{ $reservation->representation->location->designation }}</a></td>
                    <td>{{ $reservation->places }}</td>
                    <td>{{ $reservation->places * $reservation->representation->show->price }} &#8364</td>
                    <td>{{ $reservation->created_at }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>You don't have any reservations</p>

    @endif
@endsection



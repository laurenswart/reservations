@extends('layouts.left-sidebar')

@section('sidebar')
        
    <h2 class="big-title">Mon Profil</h2>
    <table class="table table-striped">
        <tbody>
            <tr>
                <th>Prénom</th>
                <td>{{ $user->firstname }}</td>
            </tr>
            <tr>
                <th>Nom</th>
                <td>{{ $user->lastname }}</td>
            </tr>
            <tr>
                <th>Login</th>
                <td>{{ $user->login }}</td>
            </tr>
            <tr>
                <th>Email</th>
                <td>{{ $user->email }}</td>
            </tr>
            <tr>
                <th>Langue</th>
                <td>{{ $user->langue }}</td>
            </tr>
        </tbody>
    </table>
    <div class="back-nav">
        <a href="{{ route('user_edit') }}" ><i class="fas fa-pen"></i>Modifier mes données</a>
    </div>
 
@endsection

@section('content')
<h2 class="big-title">Réservations à venir</h2>
@if(count($user->reservations) != 0 )
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Date</th>
                <th scope="col">Lieu</th>
                <th scope="col">Film</th>
                <th scope="col">Places</th>
                <th scope="col">Prix Total</th>
                <th scope="col">Reservé</th>
            </tr>
        </thead>
        <tbody>
        @foreach($user->reservations as $reservation)
            @if($reservation->representation->when > date('Y-m-d H:i:s'))
            <tr>
                
                <th>{{ date('d/m/Y  H:i', strtotime($reservation->representation->when) ) }}</th>
                <td><a href="{{ route('locations_index') }}">{{ $reservation->representation->location->designation }}</a></td>
                <td><a href="{{ route('shows_show', $reservation->representation->show_id) }}">{{ $reservation->representation->show->title }}</a></td>
                <td>{{ $reservation->places }}</td>
                <td>{{ $reservation->places * $reservation->representation->show->price }} &#8364;</td>
                <td>{{ date('d/m/Y', $reservation->created_at->timestamp ) }}</td>
            </tr>
            @endif
        @endforeach
        </tbody>
    </table>
    <div class="back-nav">
        <a href="{{ route('reservations_forUser') }}"><i class="fas fa-chevron-right"></i>Voir toutes mes réservations</a>
    </div>
@else 
    <p>Aucune réservation à venir.</p>
@endif

@endsection  
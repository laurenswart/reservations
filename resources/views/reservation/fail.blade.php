@extends('layouts.app')

@section('title', 'Vos réservations')

@section('content')
    <p>{{ $message ?? 'Something Went Wrong'}}</p>
    <a href="{{ route('welcome') }}">Home Page</a>        
@endsection
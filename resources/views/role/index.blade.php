@extends('layouts.app')

@section('title', 'Liste des roles')

@section('content')
    <h1>Liste des {{ $resource }}</h1>

    <table>
        <thead>
            <tr>
                <th>Role</th>
            </tr>
        </thead>
        <tbody>
        @foreach($roles as $role)
            <tr>
                <td>
                    <a href="{{ route('roles_show', $role->id) }}">{{ $role->role }}</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection

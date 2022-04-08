@extends('layouts.app')

@section('title', 'Formulaire de modification des données personnelles')

@section('content')

    <h1 class="big-title">Mon Profil</h1>
    <div class="nav">
    <a href="{{ route('user_account') }}"><i class="fa-solid fa-chevron-left"></i>Retour</a>
</div>
    <form class="form-horizontal col-md-4 m-auto" action="{{ route('user_update') }}" method="post">
        @csrf
        @method('PUT')
        <!-- Firtname-->
        <div class="form-group">
            <label class=" control-label" for="type">Prénom</label>  
            <div class="">
                <input id="type" name="type" type="text" placeholder="" class="form-control input-md @error('firstname') is-invalid @enderror" required="" value="{{  old('firstname') ?? $user->firstname }}">
            </div>
            @error('firstname')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <!-- Lastname-->
        <div class="form-group">
            <label class=" control-label" for="type">Nom</label>  
            <div class="">
                <input id="type" name="type" type="text" placeholder="" class="form-control input-md @error('lastname') is-invalid @enderror" required="" value="{{  old('lastname') ?? $user->lastname }}">
            </div>
            @error('lastname')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <!-- Login-->
        <div class="form-group">
            <label class=" control-label" for="type">Login</label>  
            <div class="">
                <input id="type" name="type" type="text" placeholder="" class="form-control input-md @error('login') is-invalid @enderror" required="" value="{{  old('login') ?? $user->login }}">
            </div>
            @error('login')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <!-- Email-->
        <div class="form-group">
            <label class=" control-label" for="type">Email</label>  
            <div class="">
                <input id="type" name="type" type="email" placeholder="" class="form-control input-md @error('email') is-invalid @enderror" required="" value="{{  old('email') ?? $user->email }}">
            </div>
            @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <!-- Langue-->
        <div class="form-group">
            <label class=" control-label" for="langue">Langue</label>  
            <div class="">
                <select class="form-select @error('langue') is-invalid @enderror" id="langue" name="langue" required="">
                    <option value="fr" {{ (old('langue') ?? $user->langue) == "fr" ? 'selected' : '' }}>Français</option>
                    <option value="en" {{ (old('langue') ?? $user->langue) == "en" ? 'selected' : '' }}>Anglais</option>
                    <option value="nl" {{ (old('langue') ?? $user->langue) == "nl" ? 'selected' : '' }}>Néerlandais</option>
                </select>
            </div>
            @error('langue')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>


        <!-- Button -->
        <div class="form-group">
            <div class=" align-end">
                <button id="submit" name="submit" class="btn btn-primary">Save</button>
            </div>
        </div>
    </form>
@endsection

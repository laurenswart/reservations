@extends('layouts.no-sidebar')

@section('content')

    <h1 class="big-title">Mon Profil</h1>
    <div class="back-nav">
                        <a href="{{ route('user_account') }}"><i class="fas fa-angle-left"></i>Retour</a>
                    </div>

    <form class="form-horizontal col-md-4 m-auto" action="{{ route('user_update') }}" method="post">
        @csrf
        @method('PUT')
        <!-- Firtname-->
        <div class="form-group">
            <label class=" control-label" for="firstname">Prénom</label>  
            <div class="">
                <input id="firstname" name="firstname" type="text" placeholder="" class="form-control input-md @error('firstname') is-invalid @enderror" required="" value="{{  old('firstname') ?? $user->firstname }}">
            </div>
            @error('firstname')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <!-- Lastname-->
        <div class="form-group">
            <label class=" control-label" for="lastname">Nom</label>  
            <div class="">
                <input id="lastname" name="lastname" type="text" placeholder="" class="form-control input-md @error('lastname') is-invalid @enderror" required="" value="{{  old('lastname') ?? $user->lastname }}">
            </div>
            @error('lastname')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <!-- Login-->
        <div class="form-group">
            <label class=" control-label" for="login">Login</label>  
            <div class="">
                <input id="login" name="login" type="text" placeholder="" class="form-control input-md @error('login') is-invalid @enderror" required="" value="{{  old('login') ?? $user->login }}">
            </div>
            @error('login')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <!-- Email-->
        <div class="form-group">
            <label class=" control-label" for="email">Email</label>  
            <div class="">
                <input id="email" name="email" type="email" placeholder="" class="form-control input-md @error('email') is-invalid @enderror" required="" value="{{  old('email') ?? $user->email }}">
            </div>
            @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <!-- Langue-->
        <div class="form-group">
            <label class=" control-label" for="langue">Langue</label>  
            <div class="">
                <select class=" @error('langue') is-invalid @enderror" id="langue" name="langue" required="">
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
        <div class="back-nav mt-4">
                <button id="submit" name="submit" class="button">Save</button>
        </div>
    </form>
@endsection

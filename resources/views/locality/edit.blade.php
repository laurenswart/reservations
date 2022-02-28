@extends('layouts.app')

@section('title', 'Formulaire de modification d\'une localité')

@section('content')
<form class="form-horizontal" action="{{ route('localities_update', $locality->id) }}" method="post">
    @csrf
    @method('PUT')
    <!-- Text input-->
    <div class="form-group">
        <label class="col-md-4 control-label" for="postal_code">Postal Code</label>  
        <div class="col-md-4">
            <input id="postal_code" name="postal_code" type="text" placeholder="" class="form-control input-md @error('postal_code') is-invalid @enderror" required="" value="{{  old('postal_code') ?? $locality->postal_code }}">
        </div>
        @error('postal_code')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <!-- Text input-->
    <div class="form-group">
        <label class="col-md-4 control-label" for="locality">Locality</label>  
        <div class="col-md-4">
            <input id="locality" name="locality" type="text" placeholder="" class="form-control input-md @error('locality') is-invalid @enderror" required="" value="{{ old('locality') ?? $locality->locality }}">  
        </div>
        @error('locality')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <!-- Button -->
    <div class="form-group">
    <label class="col-md-4 control-label" for="submit"></label>
    <div class="col-md-4">
        <button id="submit" name="submit" class="btn btn-primary">Save</button>
    </div>
    </div>
</form>
<nav><a href="{{ route('localities_index') }}">Retour à l'index</a></nav>
@endsection

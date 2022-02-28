@extends('layouts.app')

@section('title', 'Formulaire de modification d\'un artiste')

@section('content')
<form class="form-horizontal" action="{{ route('artists_update', $artist->id) }}" method="post">
    @csrf
    @method('PUT')
    <!-- Text input-->
    <div class="form-group">
        <label class="col-md-4 control-label" for="firstname">Firstname</label>  
        <div class="col-md-4">
            <input id="firstname" name="firstname" type="text" placeholder="" class="form-control input-md @error('firstname') is-invalid @enderror" required="" value="{{  old('firstname') ?? $artist->firstname }}">
        </div>
        @error('firstname')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <!-- Text input-->
    <div class="form-group">
        <label class="col-md-4 control-label" for="lastname">Lastname</label>  
        <div class="col-md-4">
            <input id="lastname" name="lastname" type="text" placeholder="" class="form-control input-md @error('lastname') is-invalid @enderror" required="" value="{{ old('lastname') ?? $artist->lastname }}">  
        </div>
        @error('lastname')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <!-- Check boxes for types-->
    <div class="form-group">
        @foreach($allTypes as $type)
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="{{$type->id}}" id="types_{{$type->id}}" name="types[]" <?= in_array($type->id, $checkedTypes) ? 'checked disabled="disabled"': '' ?>>
            <label class="form-check-label" for="types_{{$type->id}}">
               {{$type->type}}
            </label>
        </div>
        @endforeach
        @error('types')
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
<nav><a href="{{ route('artists_index') }}">Retour à l'index</a></nav>
@endsection

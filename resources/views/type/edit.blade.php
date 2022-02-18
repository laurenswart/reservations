@extends('layouts.app')

@section('title', 'Formulaire de modification d\'un type')

@section('content')
<form class="form-horizontal" action="{{ route('types_update', $type->id) }}" method="post">
    @csrf
    @method('PUT')
    <!-- Text input-->
    <div class="form-group">
        <label class="col-md-4 control-label" for="type">type</label>  
        <div class="col-md-4">
            <input id="type" name="type" type="text" placeholder="" class="form-control input-md @error('type') is-invalid @enderror" required="" value="{{  old('type') ?? $type->type }}">
        </div>
        @error('type')
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
<nav><a href="{{ route('types_index') }}">Retour à l'index</a></nav>
@endsection

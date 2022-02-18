@extends('layouts.app')

@section('title', 'Formulaire de modification d\'un role')

@section('content')
<form class="form-horizontal" action="{{ route('roles_update', $role->id) }}" method="post">
    @csrf
    @method('PUT')
    <!-- Text input-->
    <div class="form-group">
        <label class="col-md-4 control-label" for="role">type</label>  
        <div class="col-md-4">
            <input id="role" name="role" type="text" placeholder="" class="form-control input-md @error('role') is-invalid @enderror" required="" value="{{  old('role') ?? $role->role }}">
        </div>
        @error('role')
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
<nav><a href="{{ route('roles_index') }}">Retour à l'index</a></nav>
@endsection

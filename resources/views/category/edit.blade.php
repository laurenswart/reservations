@extends('layouts.app')

@section('title', 'Formulaire de modification d\'une categorie')

@section('content')
<form class="form-horizontal" action="{{ route('categories_update', $category->id) }}" method="post">
    @csrf
    @method('PUT')
    <!-- Text input-->
    <div class="form-group">
        <label class="col-md-4 control-label" for="name">Name</label>  
        <div class="col-md-4">
            <input id="name" name="name" type="text" placeholder="" class="form-control input-md @error('name') is-invalid @enderror" required="" value="{{  old('name') ?? $category->name }}">
        </div>
        @error('name')
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
<nav><a href="{{ route('categories_index') }}">Retour à l'index</a></nav>
@endsection

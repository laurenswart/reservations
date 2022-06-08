@extends('admin.admin_master')
@section('admin')

<div class="box-body">
    <div class="table-responsive">
        <form method="POST" action="{{ route('admin-role-update') }}">
            @csrf
            
            <input type="hidden" name="id" value="{{ $role->id}}">
            <div class="form-group">
                <h5>Name of the role <span class="text-danger">*</span></h5>
                <div class="controls">
                    <input type="text" name="type" class="form-control" value="{{ $role->role}}">
                    @error('type')
                        <span class="text-danger">{{ $message }} </span>
                    @enderror
                </div>
            </div>
            <div class="text-xs-right">
                <input type="submit" class="btn btn-rounded btn-primary mb-5"
                    value="Update">
            </div>

    </div>
</div>
</form>
@endsection

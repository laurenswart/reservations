@extends('admin.admin_master')
@section('admin')
    <div class="container-full">

        <!-- Main content -->
        <section class="content">

            @if (count($errors) > 0)
                <div class="allert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (Session::has('status'))
                <div class="alert alert-success">
                    {{ Session::get('status') }}
                </div>
            @endif

            <h1>Edit locality</h1>

            <form action="{{ route('update_locality',$locality->id) }}" method="POST">
                <div class="form-column">
                    <div class="col-md-4 mb-3">
                        <label for="postal_code">postal_code</label>
                        <input type="text" class="form-control" name="postal_code" id="" value="{{$locality->postal_code}}" 
                            required>

                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="locality">locality</label>
                        <input type="text" class="form-control" name="locality" id=""value="{{$locality->locality}}" required>

                    </div>

                </div>
                <button class="btn btn-primary" type="submit">update</button>
            </form>
        </section>
        <!-- /.content -->
    </div>
@endsection

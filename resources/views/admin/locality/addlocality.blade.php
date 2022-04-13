@extends('admin.admin_master')
@section('admin')
    <div class="container-fluid text-center">

        <!-- Main content -->
        <section class="content">

            @if (count($errors) > 0)
            <div class="allert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (Session::has('status'))
            <div class="alert alert-success">
                {{Session::get('status')}}
            </div>
        @endif

            <h1  >add locality</h1>
           <div class="text-align">
            <form action="{{ route('save_locality') }}" method="POST" class="form-group" >
                <div class="form-column">
                    <div class="col-md-4 mb-3">
                        <label for="prenom">postal_code</label>
                        <input type="text" class="form-control" name="postal_code" id="" placeholder="postal code"
                            required>

                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="nom">locality</label>
                        <input type="text" class="form-control" name="locality" id="" placeholder="locality" required>

                    </div>

                </div>
                <button class="btn btn-primary" type="submit">save</button>
            </form>
           </div>
          
        </section>
        <!-- /.content -->
    </div>
@endsection

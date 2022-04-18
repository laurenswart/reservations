@extends('admin.admin_master')
@section('admin')
    <div class="container-full">

        <!-- Main content -->
        <section class="content">
            <input type="hidden" value="{{$increment = 1}}">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">First</th>
                        <th scope="col">Last</th>
                        <th scope="col">Handle</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($localities as $locality)
                        <tr>
                            <th scope="row">{{$increment}}</th>
                            <td>{{ $locality->postal_code }}</td>
                            <td>{{ $locality->locality }}</td>
                            <td>
                                <a href="{{route('edit_locality', $locality->id)}}"
                                    class="btn btn-primary a-btn-slide-text">
                                    <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                                    <span><strong>Edit</strong></span>
                                </a>

                    
                                <a href="{{route('delete_locality',$locality->id)}}"
                                    class="btn btn-primary a-btn-slide-text">
                                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                    <span><strong>Delete</strong></span>
                                </a>
                            </td>
                        </tr>
            <input type="hidden" value="{{$increment = $increment + 1}}">
                        
                    @endforeach

                </tbody>
            </table>

        </section>
        <!-- /.content -->
    </div>
@endsection

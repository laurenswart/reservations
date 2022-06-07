@extends('admin.admin_master')
@section('admin')
    <div class="container-full">
        <!-- Content Header (Page header) -->

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Shows List</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Firstname</th>
                                            <th>Lastname</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($artists as $item)
                                            <tr>
                                                <th>{{ $item->firstname }}</th>
                                                <th>{{ $item->lastname }}</th>
                                                <th> <a
                                                        href="{{ route('admin-artist-edit', $item->id) }}">Edit</a>
                                                    or
                                                    {{-- <a href="{{ route('admin-representation-delete',$item->id) }}"> delete </a> --}}
                                                    <a href="{{ route('admin-representation-delete',$item->id) }}" title="delete" class="delete" onclick="return confirm('Are you sure you want to delete this item')">Delete</a>
                                                    or
                                                    {{-- <a href="{{ route('admin-representation-delete',$item->id) }}"> delete </a> --}}
                                                    <a href="{{ route('admin-representation-delete',$item->id) }}" title="delete" class="delete" onclick="return confirm('Are you sure you want to delete this item')">More info</a>
                                                    ?
                                                </th>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                    <!-- /.box -->
                </div>
                <!-- /.col -->
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
            <!-- /.box -->
    </div>
    <!-- /.row -->

    </section>
    <!-- /.content -->
    </div>
@endsection

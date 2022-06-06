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
                                            <th>Slug</th>
                                            <th>Title</th>
                                            <th>Description</th>
                                            <th>locations</th>
                                            <th>Bookable</th>
                                            <th>Price</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($shows as $show)
                                            <tr>
                                                <th>{{ $show->slug }}</th>
                                                <th>{{ $show->title }}</th>
                                                <th>{{ $show->description }}</th>
                                                <th>{{ $show->location->address ?? "pas d'adresse disponible" }}</th>
                                                <th>{{ $show->bookable }}</th>
                                                <th>{{ $show->price }}</th>
                                                <th> <a href="{{ route('admin-show-edit', $show->id) }}">Edit</a>
                                                    or
                                                    <a href="{{ route('admin-show-delete', $show->id) }}" title="delete" class="delete" onclick="return confirm('Are you sure you want to delete this item')"> delete </a>
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

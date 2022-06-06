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
                                            <th>when</th>
                                            <th>adress</th>
                                            <th>show</th>
                                            <th>action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($representations as $item )
                                            <tr>
                                                <th>{{$item->when }}</th>
                                                <th>{{ $item->location->address  ?? "pas d'adresse disponible" }}</th>
                                                <th>{{ $item->show->title  ?? "pas de show disponible" }}</th>
                                                <th> <a href="{{ route('admin-representation-edit', $item->id) }}">Edit</a>
                                                    or
                                                    <a href="{{ route('admin-representation-delete',$item->id) }}"> delete </a>
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

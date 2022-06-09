@extends('admin.admin_master')
@section('admin')
    <div class="container-full">
        <!-- Content Header (Page header) -->

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <!--    ------------ Add Category Page -->
                <div class="col-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Artist : {{ $artists->firstname }}</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <form method="POST" action="">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $artists->id }}">
                                    <div class="form-group">
                                        <h5> Firstname <span class="text-danger">*</span></h5>
                                        {{ $artists->firstname }}
                                    </div>
                                    <div class="form-group">
                                        <h5> Lastname <span class="text-danger">*</span></h5>
                                        {{ $artists->firstname }}
                                    </div>
                                    <div class="form-group">
                                        <h5> Text about the artist <span class="text-danger">*</span></h5>
                                        {{ $artists->information }}
                                    </div>
                            </div>
                            </form>
                        </div>
                    </div>
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

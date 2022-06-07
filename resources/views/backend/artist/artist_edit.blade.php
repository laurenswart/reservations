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
                            <h3 class="box-title">Edit {{ $artists->firstname }}</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <form method="POST" action="{{ route('admin-artist-update') }}">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $artists->id }}">
                                    <div class="form-group">
                                        <h5> Firstname <span class="text-danger">*</span></h5>
                                        <input type="text" name="firstname" value="{{ $artists->firstname }}">
                                    </div>
                                    <div class="form-group">
                                        <h5> Lastname <span class="text-danger">*</span></h5>
                                        <input type="text" name="lastname" value="{{ $artists->lastname }}">
                                    </div>
                                    <div class="form-group">
                                        <h5> Text about the artist <span class="text-danger">*</span></h5>
                                        <textarea name="information"  value="{{ $artists->information }}" cols="40" rows="5"></textarea>
                                    </div>
                                    <div class="text-xs-right">
                                        <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update">
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

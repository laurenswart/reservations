@extends('admin.admin_master')
@section('admin')
    <div class="col-8">

        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Add a </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="table-responsive">
                    <form method="POST" action="{{ route('admin-artist-store') }}">
                        @csrf
                        <div class="form-group">
                            <h5> Firstname <span class="text-danger">*</span></h5>
                            <input type="text" name="firstname">
                        </div>
                        <div class="form-group">
                            <h5> Lastname <span class="text-danger">*</span></h5>
                            <input type="text" name="lastname" >
                        </div>
                        <div class="form-group">
                            <h5> Text about the artist <span class="text-danger">*</span></h5>
                            <textarea name="information" cols="40" rows="5"></textarea>
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
@endsection

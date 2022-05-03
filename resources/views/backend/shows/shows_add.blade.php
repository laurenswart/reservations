@extends('admin.admin_master')
@section('admin')
    <div class="col-8">

        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Add a Show</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="table-responsive">
                    <form method="POST" action="{{ route('admin-show-add') }}">
                        @csrf

                        <div class="form-group">
                            <h5>Slug <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text" name="slug" class="form-control">
                                @error('slug')
                                    <span class="text-danger">{{ $message }} </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <h5>Title <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text" name="title" class="form-control">
                                @error('title')
                                    <span class="text-danger">{{ $message }} </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <h5>Description <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text" name="description" class="form-control">
                                @error('description')
                                    <span class="text-danger">{{ $message }} </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <div>
                                <input type="radio" id="bookable1" name="bookable" value="1" checked>
                                <label for="bookable1">YES</label>
                            </div>

                            <div>
                                <input type="radio" id="bookable2" name="bookable" value="0">
                                <label for="bookable2">NO</label>
                            </div>
                        </div>

                        <div class="form-group">
                            @foreach ( $locations as $location )

                            <div>
                                <input type="radio" id="{{$location->id}}" name="location_id"

                                value="{{$location->id}}" checked >
                                <label for="location_id">{{ $location->address }}</label>
                            </div>
                            @endforeach
                        </div>


                        <div class="col-md-4">
                            <div class="form-group">
                                <h5>Main Thambnail <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="file" name="poster_url" class="form-control" required="">
                                    @error('poster_url')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <img src="" id="mainThmb">
                                </div>
                            </div>


                            <div class="text-xs-right">
                                <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Add New ">
                            </div>

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

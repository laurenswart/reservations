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
                            <h3 class="box-title">Edit Shows</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <form method="POST" action="{{ route('admin-show-update') }}">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $shows->id }}">
                                    <div class="form-group">
                                        <h5>Show Name <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="title" class="form-control"
                                                value="{{ $shows->title }}">
                                            @error('title')
                                                <span class="text-danger">{{ $message }} </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <h5>Show description <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="description" class="form-control"
                                                value="{{ $shows->description }}">
                                            @error('description')
                                                <span class="text-danger">{{ $message }} </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <h5>Show Price <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="number" name="price" class="form-control"
                                                value="{{ $shows->price }}">
                                            @error('price')
                                                <span class="text-danger">{{ $message }} </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <h5>Show Locations <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <div>
                                                <select name="location_id">
                                                    @foreach ($locations as $location)
                                                        <option value="{{ $location->id }}" id="{{$location->id}}"> {{ $location->address }} </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <h5>Bookable <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <div>
                                                <select name="bookable">
                                                        <option value="1">Yes</option>
                                                        <option value="0">No</option>
                                                </select>
                                            </div>
                                        </div>
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

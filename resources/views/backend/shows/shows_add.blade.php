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
                    <form method="POST" action="{{ route('admin-show-store') }}">
                        @csrf
                        <input type="hidden" name="id" value="">
                        <div class="form-group">
                            <h5>Slug <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text" name="slug" class="form-control" value="">
                                @error('slug')
                                    <span class="text-danger">{{ $message }} </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <h5>Show Name <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text" name="title" class="form-control" value="">
                                @error('title')
                                    <span class="text-danger">{{ $message }} </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <h5>Show description <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text" name="description" class="form-control" value="">
                                @error('description')
                                    <span class="text-danger">{{ $message }} </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <h5>Show Price <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="number" name="price" class="form-control" step="0.1" value="">
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
                                            <option value="{{ $location->id }}" id="{{ $location->id }}">
                                                {{ $location->address }} </option>
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
                                <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Add new Show">
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

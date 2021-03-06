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
                    <form method="POST" action="{{ route('admin-show-store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <h5>Show Name <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text" name="title" class="form-control" value="{{ old('title') ?? ''}}">
                                @error('title')
                                    <span class="text-danger">{{ $message }} </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <h5>Show description <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text" name="description" class="form-control" value="{{ old('description') ?? ''}}">
                                @error('description')
                                    <span class="text-danger">{{ $message }} </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <h5>Show Price <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="number" name="price" class="form-control" step="0.1" value="{{ old('price') ?? ''}}">
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
                                            <option value="{{ $location->id }}" {{ old('location_id')==$location->id ? 'selected' : ''}}>
                                                {{ $location->designation }} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <h5>Show Categories <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <div>
                                    <select name="category_id">
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}" {{ old('category_id')==$category->id ? 'selected' : ''}}> {{ $category->type }} </option>
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
                                        <option value="1" {{ old('bookable')==1 ? 'selected' : ''}}>Yes</option>
                                        <option value="0" {{ old('bookable')==0 ? 'selected' : ''}}>No</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <h5>Main Thumbnail <span class="text-danger">*</span></h5>
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

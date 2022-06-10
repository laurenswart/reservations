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
                                    <input type="hidden" name="id" value="{{ $show->id }}">
                                    
                                    <div class="form-group">
                                        <h5>Show Name <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="title" class="form-control"
                                                value="{{ old('title') ?? $show->title }}">
                                            @error('title')
                                                <span class="text-danger">{{ $message }} </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <h5>Show description <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="description" class="form-control"
                                                value="{{ old('description') ?? $show->description }}">
                                            @error('description')
                                                <span class="text-danger">{{ $message }} </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <h5>Show Price <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="number" name="price" class="form-control"
                                                value="{{ old('price') ?? $show->price }}">
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
                                                        <option value="{{ $location->id }}" {{ ($errors->any() && old('location_id')==$location->id) || (!$errors->any() && $show->location_id==$location->id) ? 'selected' : ''}}> {{ $location->designation }} </option>
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
                                                        <option value="1" {{ ($errors->any() && old('bookable')==1) || (!$errors->any() && $show->bookable) ? 'selected' : ''}}>Yes</option>
                                                        <option value="0" {{ ($errors->any() && old('bookable')==0) || (!$errors->any() && !$show->bookable) ? 'selected' : ''}}>No</option>
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
                                                        <option value="{{ $category->id }}" {{($errors->any() && old('category_id')==$category->id) || (!$errors->any() && $show->category_id==$category->id) ? 'selected' : ''}}> {{ $category->type }} </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <h5>Artists</h5>
                                        <div class="controls">
                                            <table>
                                                <thead>
                                                    <tr>
                                                        <th>Artist</th>
                                                        @foreach($types as $type)
                                                        <th>{{ ucfirst($type->type) }}</th>
                                                        @endforeach
                                                    </tr>
                                                </thead>
                                                
                                                <tbody>
                                                    @foreach($allArtists as $artist)
                                                        <tr>
                                                            <td>{{$artist->firstname}} {{$artist->lastname}}</td>
                                                            @foreach($types as $type)
                                                                <td><input type="checkbox" class="visible" name="newArtists[{{ $type->id }}][]" value="{{$artist->id}}" {{($errors->any() && in_array($artist->id,old('newArtists.'.$type->id))) || (!$errors->any()  && in_array($artist->id, $currentArtists[ $type->id ])) ? 'checked' : ''}}></td>
                                                            @endforeach
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
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

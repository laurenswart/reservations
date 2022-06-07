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
                    <form method="POST" action="{{ route('admin-representation-store') }}">
                        @csrf
                        <input type="hidden" name="id" value="">
                        <div class="form-group">
                            <h5>Date  <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="datetime-local" value="2022-05-01T20:36:00" step="1" name="date" class="form-control"
                                    value="">
                                @error('when')
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
                            <h5>Show <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <div>
                                    <select name="show_id">
                                        @foreach ($shows as $show)
                                            <option value="{{ $show->id }}" id="{{ $show->id }}">
                                                {{ $show->title }} </option>
                                        @endforeach
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
@endsection

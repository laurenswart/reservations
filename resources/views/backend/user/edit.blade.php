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
                                <table id="example1" class="table table-bordered table-striped data_role">
                                    <thead>
                                        <tr>
                                            <th>firstname</th>
                                            <th>lastname</th>
                                            <th>email</th>
                                            <th>action</th>


                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th>{{ $user->firstname }}</th>
                                            <th>{{ $user->lastname }}</th>
                                            <th>{{ $user->email }}</th>
                                            <th>
                                                <form action="{{ route('admin-user-update') }}" method="POST">
                                                    <input type="hidden" value="{{ $user->id }}" class="userId" name="userId">

                                                    <select name="role_id">
                                                        @foreach ($roles as $role)
                                                            <option value="{{ $role->id }}" id="{{$role->id}}"> {{ $role->role }} </option>
                                                        @endforeach
                                                    </select>
                                        <input type="submit" class="btn btn-rounded " value="select">

                                                </form>

                                            </th>
                                        </tr>
                                    </tbody>
                                </table>


                            </div>

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

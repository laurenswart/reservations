@extends('admin.admin_master')
@section('admin')

<div class="container-full">

<!-- Main content -->
@if(isset($error))
    <div class="alert alert-danger">{{ $error }}</div>
@endif
<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="box">
                <div class="box-header">
                    <h4 class="box-title align-items-start flex-column">
                        Export Resources
                        <small class="subtitle">CSV Format</small>
                    </h4>
                </div>
                <div class="box-body">
                    <div class="table-responsive">
                        <table class="table no-border">
                            <thead>
                                <tr class="text-uppercase bg-lightest">
                                    <th style="min-width: 250px"><span class="text-white">Resource</span></th>
                                    <th style="min-width: 100px"><span class="text-fade">Actions</span></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="pl-0 py-8">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0 mr-20">
                                                <div class="bg-img h-50 w-50" style="background-image: url({{ asset('backend/images/gallery/creative/img-1.jpg') }})"></div>
                                            </div>

                                            <div>
                                                <a href="#" class="text-white font-weight-600 hover-primary mb-1 font-size-16">Artists</a>
                                                <span class="text-fade d-block">Firstname and Lastname</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-right">
                                        <a href="{{ route('admin.export.get', ['artists', 'csv']) }}" class="waves-effect waves-light btn btn-info btn-circle mx-5"><span class="mdi mdi-arrow-right"></span></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="pl-0 py-8">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0 mr-20">
                                                <div class="bg-img h-50 w-50" style="background-image: url({{ asset('backend/images/gallery/creative/img-2.jpg') }})"></div>
                                            </div>

                                            <div>
                                                <a href="#" class="text-white font-weight-600 hover-primary mb-1 font-size-16">Shows</a>
                                                <span class="text-fade d-block">Slug, title, description</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-right">
                                        <a href="{{ route('admin.export.get', ['shows', 'csv']) }}" class="waves-effect waves-light btn btn-info btn-circle mx-5"><span class="mdi mdi-arrow-right"></span></a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /.content -->
</div>
@endsection

@extends('admin.admin_master')
@section('admin')

<div class="container-full">

<!-- Main content -->
@if(isset($error))
    <div class="alert alert-danger">{{ $error }}</div>
@elseif(isset($count))
<div class="alert alert-success">Successful imports : {{ $count }}</div>
@endif
<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="box">
                <div class="box-header">
                    <h4 class="box-title align-items-start flex-column">
                        Import Resources
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
                                        <form method="post" action="{{ route('admin.import.store', ['artists', 'csv']) }}" enctype="multipart/form-data">
                                            @csrf  
                                            <input type="hidden" name="MAX_FILE_SIZE" value="2000000">
                                            <input type="file" name="rows">
                                            <button type="submit"><span class="mdi mdi-arrow-up"></span>Upload</button>
                                        </form>
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
                                        <form method="post" action="{{ route('admin.import.store', ['shows', 'csv']) }}"  enctype="multipart/form-data">
                                            @csrf  
                                            <input type="hidden" name="MAX_FILE_SIZE" value="2000000">
                                            <input type="file" name="rows">
                                            <button type="submit"><span class="mdi mdi-arrow-up"></span>Upload</button>
                                        </form>
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

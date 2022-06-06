@extends('admin.admin_master')
@section('admin')

<div class="container-full">

<!-- Main content -->
<section class="content">
        <div class="col-12">
            <div class="box">
                <div class="box-header">
                    <h4 class="box-title align-items-start flex-column">
                        Update by Api 
                        <small class="subtitle"><a href="https://www.ressources-theatre.net/doc/api">Ressource theatre</a></small>
                    </h4>
                </div>
                <form action="{{ route('admin.apiSearch') }}" method="POST">
                    @csrf
                    <div class="my-4 px-4 py-4 d-flex">
                        <input name="keyword" type="text" placeholder="Search..." class="form-control">
                        <button name="key" value="director" type="submit" class="btn btn-primary mx-2">Director</button>
                        <button name="key" value="author" type="submit" class="btn btn-primary mx-2">Author</button>
                        <button name="key" value="title" type="submit" class="btn btn-primary mx-2">Title</button>
                    </div>
                </form>
               
            </div>
        </div>

        @if(isset($data))
        <div>
            <h2>Résultats pour <em>{{ $key }} : {{ $keyword}}</em></h2>
            <form action="{{ route('admin.apiImport') }}" method="post" class="table-responsive">
                @csrf
                <table class="table no-border">
                    <thead>
                        <tr class="text-uppercase bg-lightest">
                            <th style="min-width: 250px" colspan="2"><span class="text-white">Title</span></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $dataId => $dataItem)
                        <tr>
                            <td>
                                <img src="{{ $dataItem['poster'] }}">
                            </td>
                            <td class="pl-0 py-8">
                                 {{ $dataItem['title'] }}
                            </td>
                            <td>
                                <input class="visible" type="checkbox" name="ids[]" value="{{ $dataId }}">
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>   
                <div class="d-flex justify-content-center my-4">
                    <button class="btn btn-primary">Import Selected shows</button> 
                </div>
            </form>

        </div>
        @else
            @if(!empty($passed))
                <h2>Successful imports</h2>
                <ul>
                @foreach($passed as $passId)
                    <li>{{$shows[$passId]['title']}}</li>
                @endforeach
                </ul>
            @endif
            @if(!empty($failed))
                <h2>Failed imports</h2>
                <ul>
                @foreach($failed as $failedData)
                    <li>{{$shows[$failedData['id']]['title']}} : {{$failedData['msg']}}</li>
                @endforeach
                </ul>
            @endif
        @endif
</section>
<!-- /.content -->
</div>
@endsection

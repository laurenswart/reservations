@extends('layouts.no-sidebar')

@section('content')
   
   
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Date</th>
                <th scope="col">Lieu</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        @foreach($representations as $representationGroup)
            <tr class="table-warning">
                <th colspan="3">{{ $representationGroup[0]->show->title}}
                    <em>{{ $representationGroup[0]->show->price ? ' - '.$representationGroup[0]->show->price.'€' : '' }}</em></td>
                </th>
            </tr>
            @foreach($representationGroup as $representation)
                <tr>
                    <td><datetime>{{ substr($representation->when,0,-3) }}</datetime></td>
                    <td>
                        @if($representation->location)
                            {{ $representation->location->designation }}
                        @endif
                    </td>
                    <td style="text-align:right">
                            @if($representation->show->bookable && $representation->when > now())
                                <a class="button"  href="{{ route('representations_show', $representation->id) }}">Book</a>
                            @else
                            <a class="button"  href="{{ route('shows_show', $representation->show->id) }}">View</a>
                            @endif        
                    </td>
                </tr>
            @endforeach
        @endforeach
        </tbody>
    </table>
   @endsection

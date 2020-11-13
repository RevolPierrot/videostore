@extends('layouts.default_bernd')
@section('title','Movies')
@section('header','Movies')

@section('content')
    <div>
        <h5>
            {{$data->id}} {{$data->author_id}} {{$data->title}} {{$data->price}} (Authors: {{count($data->authors)}})
        </h5>
        <div>
            @if($data->authors)
                <ul>
                    @foreach($data->authors as $item)
                        <li>{{$item->author_id}}</li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>
@endsection

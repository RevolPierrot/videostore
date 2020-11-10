@extends('layouts.default_bernd')
@section('title','Author')
@section('header','Author')

@section('content')
    <div>
        <h5>
            {{$data->id}} {{$data->firstname}} {{$data->lastname}} (Movies: {{count($data->movies)}})
        </h5>
        <div>
            @if($data->movies)
                <ul>
                    <!--foreach-Schleife für alle movies des Autors-->
                    @foreach($data->movies as $item)
                        <li>{{$item->title}}</li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>
@endsection

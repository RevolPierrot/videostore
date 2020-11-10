@extends('layouts.default_bernd')
@section('title','Author')
@section('header','Author')

@section('content')
    <div>
        <h5>
            {{$data->id}} {{$data->firstname}} {{$data->lastname}}
        </h5>
        <p></p>
    </div>
@endsection

@extends('layouts.default')
@section('title','Todo')
@section('header','Todo')

@section('content')
    <div>
        <h5>
            {{$todo->text}}
        </h5>
        <p>...ist erledigt? <br> <b>{{$todo->erledigt}}</b></p>
    </div>
@endsection

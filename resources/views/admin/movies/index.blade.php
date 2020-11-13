@extends('layouts.default_bernd')
@section('title','Movies')
@section('header','Movies')

@section('content')
    <div class="m-0">
        <a role="button" class="btn btn-primary" href="{{route('movies.create')}}">Create new Author</a>
    </div>
    <div class="mt-3">

                @if(count($data) > 0)
                    <table class="table table-striped">
                        <tr>
                            <th>ID</th>
                            <th>AURTHOR ID</th>
                            <th>TITLE</th>
                            <th>PRICE</th>
                            <!--mit colspan="2" springt man über zwei Spalten, fyi-->
                            <th colspan="2"></th>
                        </tr>
                        @foreach ($data as $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td><a class="link" href="{{route('authors.show', ['id' => $item->id])}}"> {{$item->author_id}}</a></td>
                                <td>{{$item->title}}</td>
                                <td>{{$item->price}}</td>
                                <td><a role="button" class="btn-sm btn-primary"
                                       href="{{route('movies.edit', ['id' => $item->id])}}">Edit</a></td>
                                <td><a role="button" class="btn-sm btn-danger"
                                       onclick="return confirm('Datensatz wirklich löschen?')"
                                       href="{{route('movies.destroy', ['id' => $item->id])}}"><i class="fas fa-trash-alt"></i>Löschen</a></td>
                            </tr>
                        @endforeach
                    </table>
                @else
                    <h3>No available data</h3>
                @endif
    </div>
@endsection


@extends('layouts.default_bernd')
@section('title','Todos')
@section('header','Todos')

@section('content')
    <div class="m-0">
        <a role="button" class="btn btn-primary" href="{{route('todos.create')}}">
            <i class="fas fa-plus-circle"></i>Create new Todo</a>
    </div>
    <div class="mt-3">

                @if(count($todos) > 0)
                    <table class="table table-striped">
                        <tr>
                            <th>ID</th>
                            <th>DONE</th>
                            <th>TEXT</th>
                            <!--mit colspan="2" springt man über zwei Spalten, fyi-->
                            <th colspan="2"></th>

                        </tr>
                        @foreach ($todos as $todo)
                            <tr>
                                <td>{{$todo->id}}</td>
                                <td>
                                    {{$todo->erledigt}}
                                </td>

                                <td><a class="link" href="{{route('todos.show', ['id' => $todo->id])}}"> {{$todo->text}}</a></td>
                                <td><a role="button" class="btn-sm btn-primary" href="{{route('todos.edit', ['id' => $todo->id])}}">Edit</a></td>
                                <td><a role="button" class="btn-sm btn-danger"
                                       onclick="return confirm('Datensatz wirklich löschen?')"
                                       href="{{route('todos.destroy', ['id' => $todo->id])}}"><i class="fas fa-trash-alt"></i>Löschen</a></td>
                            </tr>
                        @endforeach
                    </table>
                @else
                    <h3>No available data</h3>
                @endif
    </div>
@endsection


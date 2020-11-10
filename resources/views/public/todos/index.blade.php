@extends('layouts.default_bernd')
@section('title','Todos')
@section('header','Todos')

@section('content')
    <div>
        <!--todos tabelle darstellen, sofern Daten vorhanden;
        if-abfrage: wenn ja, dann tabelle darstellen, wenn nicht, dann dann "keine daten vorhanden"-->


        @if(count($todos) > 0)
            <table class="table table-striped">
                <tr>
                    <th>ID</th>
                    <th>DONE</th>
                    <th>TEXT</th>
                </tr>
                @foreach ($todos as $todo)
                    <tr>
                        <td>{{$todo->id}}</td>
                        <td>
                            {{$todo->erledigt}}
                        </td>

                        <td><a class="link" href="{{route('todos.show', ['id' => $todo->id])}}"> {{$todo->text}}</a></td>
                    </tr>
                @endforeach
            </table>
            @else
                <h3>No available data</h3>
        @endif
    </div>
@endsection

@extends('layouts.default_bernd')
@section('title','Edit Movie')
@section('header','Edit Movie')
.
@section('content')
    <form method="post" action="{{route('movies.update', ['id' => $data->id])}}">
    @csrf
        <div class="form-group row">
            <label for="author_id" class="col-md-2 col-form-label">Author</label>
            <div class="col-md-10">
                <input
                    type="text"
                    id="author_id"
                    name="author_id"
                    value="{{$data->author_id}}"
                    class="@error('author_id') is-invalid @enderror form-control px-1"
                />

                @error('author_id')
                <span class="d-block invalid-feedback" role="alert">
                    <strong>{{ $errors->first('author_id') }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="title" class="col-md-2 col-form-label">Title</label>
            <div class="col-md-10">
                <input
                    type="text"
                    id="title"
                    name="title"
                    value="{{$data->title}}"
                    class="@error('title') is-invalid @enderror form-control px-1"
                />

                @error('title')
                <span class="d-block invalid-feedback" role="alert">
                    <strong>{{ $errors->first('lastname') }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="price" class="col-md-2 col-form-label">Price</label>
            <div class="col-md-10">
                <input
                    type="text"
                    id="price"
                    name="price"
                    value="{{$data->price}}"
                    class="@error('price') is-invalid @enderror form-control px-1"
                />

                @error('price')
                <span class="d-block invalid-feedback" role="alert">
                    <strong>{{ $errors->first('lastname') }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-auto float-right">
                <input
                    type="submit"
                    id="submit"
                    name="submit"
                    value="Speichern"
                    role="button"
                    class="btn btn-primary col-md-auto px-5"
                />
            </div>
        </div>
    </form>
@endsection

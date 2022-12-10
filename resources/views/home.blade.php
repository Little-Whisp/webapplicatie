@extends('layouts.app')
@section('title', 'Home')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="pull-left">
                <h2>My Dashboard</h2>
            </div>

            <div class="pull-right">
{{--                <a class="btn btn-primary" href="{{ route('category') }}"> Categories</a>--}}
{{--                <a class="btn btn-primary" href="{{ route('$artworks') }}"> Artwork lists</a>--}}
                <a class="btn btn-primary" href="{{ route('artworks.create') }}"> Upload new artwork</a>
                <a class="btn btn-primary" href="{{ route('users') }}"> View users</a>
    </div>

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Image</th>
            <th>Name</th>
            <th>Details</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($artworks as $artwork)
            <tr>
                <td>{{ ++$i }}</td>
                <td><img src="/image/{{ $artwork->image }}" width="200px"></td>
                <td>{{ $artwork->name }}</td>
                <td>{{ $artwork->detail }}</td>
                <td>
                        <a class="btn btn-primary" href="{{ route('artworks.destroy', [$artwork->id]) }}">Delete</a>

                        <a class="btn btn-info" href="{{ route('artworks.view',$artwork->id) }}">Details</a>

                        <a class="btn btn-primary" href="{{ route('artworks.edit',$artwork->id) }}">Edit</a>
                </td>
            </tr>

        @endforeach
        </div>
    </div>
    </table>

    {!! $artworks->links() !!}

@endsection

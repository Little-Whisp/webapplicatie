@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="pull-left">
                <h2>Home Page</h2>

                 <ul class="navbar-nav mr-auto">
                     <li class="nav-item active">
                        <a class="nav-link" href="{{ route('category.index') }}">Categories <span class="sr-only"> </span></a>
                    </li>
                </ul>

            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('artworks.create') }}"> Create New Product</a>
                <a class="btn btn-primary" href="{{ route('library.users') }}"> View users</a>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

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
                <td><img src="/image/{{ $artwork->image }}" width="100px"></td>
                <td>{{ $artwork->name }}</td>
                <td>{{ $artwork->detail }}</td>
                <td>

                    <a class="btn btn-primary" href="{{ route('artworks.destroy', [$artwork->id]) }}">Delete</a>

                        <a class="btn btn-info" href="{{ route('artworks.view',$artwork->id) }}">Show</a>

                        <a class="btn btn-primary" href="{{ route('artworks.edit',$artwork->id) }}">Edit</a>

                </td>
            </tr>

        @endforeach
        </div>
    </div>
    </table>

    {!! $artworks->links() !!}

@endsection

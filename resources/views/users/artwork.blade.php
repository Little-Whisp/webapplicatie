<!--<!doctype html>-->

@extends('layouts.app')

@section('content')

<body>
<div class="container">

    <div class="panel panel-primary">

        <div class="panel-heading">
            <h2>Artwork Upload</h2>
        </div>

        <div class="panel-body">

            <body>
            <!-- if validation in the controller fails, show the errors -->
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div>

                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('home') }}"> Back</a>
                </div>

                <form action="{{ route('artwork.store') }}" method="post" enctype="multipart/form-data">
                    <!-- Add CSRF Token -->
                    @csrf
                    <div class="form-group">
                        <label>Artwork Name</label>
                        <input type="text" class="form-control" name="name" required>
                    </div>
                    <div class="form-group">
                        <input class="btn btn-primary" type="file" name="file" required>
                    </div>
                    <button class="btn btn-primary" type="submit">Submit</button>
                </form>


            </div>
            </body>

@endsection


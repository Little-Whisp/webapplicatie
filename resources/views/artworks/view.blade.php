@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="pull-left">
                <h2> Details Artwork</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('home') }}"> Back</a>
            </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {{ $artwork->name}}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Details:</strong>
                {{ $artwork->detail}}
            </div>

        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Image:</strong>
                <img src="/image/{{ $artwork->image}}" width="300px">
            </div>
        </div>
    </div>


        </div>
    </div>


@endsection

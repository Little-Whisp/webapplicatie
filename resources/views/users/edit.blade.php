@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Posts') }}</div>
                    <div class="card-body">
                        <table class="table">


                            <div class="pull-right">
                                <a class="btn btn-primary" href="{{ route('home') }}"> Back</a>
                            </div>

                        <div class="row">

{{--                            <form class="form" method="POST" action="{{route('posts.update')}}">--}}

                                <form action="{{ route('posts.update', $posts->id) }}" method="POST"
                                @csrf

                                <div class="mb-3">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" class="form-control" id="name" value="{{$posts->name}}" name="name">
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
@endsection

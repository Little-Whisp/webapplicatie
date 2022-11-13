@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('My posts') }}</div>
                    <div class="card-body">
                        <table class="table">

                            <div class="pull-right">
                                <a class="btn btn-primary" href="{{ route('home') }}"> Back</a>
                            </div>

                            <thead>
                            <tr>
                                <th>name</th>
                                <th>File</th>
                            <tr>
                            </thead>
                            <tbody>
                            @foreach( $posts as $post)

{{--                                    <div class="row row-cols-1 row-cols-md-3 g-3">--}}
{{--                                        <div class="row row-cols-1 row-cols-md-3 g-3">--}}
{{--                                            <div class="card">--}}
{{--                                                <img src="storage/app/public/artwork" alt="{{$post->file_path}}">--}}
{{--                                                <tr>--}}
                                                    <td>{{$post->name}}<td/>
                                                    <td><img src="={{$post->file_path}}"></td>

                                                    @if (Auth::user() && Auth::user()->role == 'admin')
                                                    <td>
                                                        <a class="btn btn-primary" href="{{ route('posts.edit', [$post->id]) }}">  Edit</a>

                                                        <a class="btn btn-primary" href="{{ route('posts.delete', [$post->id]) }}">Delete</a>
                                                    </td>
                                                </tr>
                                            <div>
                                                     @endif
                            @endforeach

                            </tbody>
                        </table>
                    </div>
@endsection

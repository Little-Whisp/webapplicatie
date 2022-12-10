@extends('layouts.app')
@section('title', 'About')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if (session('alert'))
                    <div class="alert alert-success" role="alert">
                        {{ session('alert') }}
                    </div>
                @endif
                <div class="card">
                    <div class="card-header">About</div>
                    <div class="card-body">
                        <h2>{{$name}}</h2>
                        <p>{{$image}}</p>
                        <p>{{$detail}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

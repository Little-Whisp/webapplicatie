@extends('layout.app')
@section('content')
    <div class="card">
        <div class="card-header">View Request</div>
        <div class="card-body">

{{--            <div class="card-body">--}}
{{--                <h5 class="card-title">Name : {{ $artwork->name }}</h5>--}}
{{--                <p class="card-text">Address : {{ $artwork->path}}</p>--}}
{{--            </div>--}}

{{--            </hr>--}}

            @error('view')
            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
            @enderror

        </div>
    </div>
@endsection

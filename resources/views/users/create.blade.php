{{--@extends('layouts.app')--}}

{{--@section('content')--}}
{{--    <div class="container">--}}
{{--        <div class="row justify-content-center">--}}
{{--            <div class="col-md-8">--}}
{{--                <div class="card">--}}
{{--                    <div class="card-header">{{ __('Make Request') }}</div>--}}
{{--        <div class="card-body">--}}

{{--            <form action="{{ url('create') }}" method="post">--}}
{{--                {!! csrf_field() !!}--}}
{{--                <label>Title</label></br>--}}
{{--                <input type="text" name="title" id="title" class="form-control"></br>--}}
{{--                <label>Description</label></br>--}}
{{--                <input type="text" name="description" id="description" class="form-control"></br>--}}
{{--                <input type="submit" value="Save" class="btn btn-success"></br>--}}
{{--            </form>--}}

{{--        </div>--}}
{{--    </div>--}}

{{--<body>--}}
{{--<!-- if validation in the controller fails, show the errors -->--}}
{{--@if ($errors->any())--}}
{{--    <div class="alert alert-danger">--}}
{{--        <ul>--}}
{{--            @foreach ($errors->all() as $error)--}}
{{--                <li>{{ $error }}</li>--}}
{{--            @endforeach--}}
{{--        </ul>--}}
{{--    </div>--}}
{{--@endif--}}

{{--<div>--}}

{{--    <form action="{{ route('artwork.store') }}" method="post" enctype="multipart/form-data">--}}
{{--        <!-- Add CSRF Token -->--}}
{{--        @csrf--}}
{{--        <div class="form-group">--}}
{{--            <label>Artwork Name</label>--}}
{{--            <input type="text" class="form-control" name="title" required>--}}
{{--        </div>--}}
{{--        <div class="form-group">--}}
{{--            <input type="file" name="file" required>--}}
{{--        </div>--}}
{{--        <button type="submit">Submit</button>--}}
{{--    </form>--}}

{{--</div>--}}
{{--</body>--}}
{{--@endsection--}}

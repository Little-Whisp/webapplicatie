@extends('layouts.app')

@section('content')
    @if(auth()->user()->isVerified() || auth()->user()->isAdmin())
    <div class="container">
        <div class="row justify-content-center">
            <div class="pull-left">
                <h2>Add new artwork</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('home') }}"> Back</a>
            </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('artworks.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="name" class="form-control" placeholder="Name">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Detail:</strong>
                    <textarea class="form-control" style="height:150px" name="detail" placeholder="Detail"></textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Image:</strong>
                    <input type="file" name="image" class="form-control" placeholder="image">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>

            <div>
                <input
                    id="user_id"
                    name="user_id"
                    type="hidden"
                    value="{{Auth::user()->id}}"
                >
            </div>
        </div>
        <div>
            Categories:
            @foreach($categories as $category)
                <div class="form-check">
                    <label class="form-check-label"
                           for="flexCheckDefault">{{$category->name}}</label>
                    <input class="form-check-input" type="checkbox" id="flexCheckDefault"
                           name="category_id[]" value="{{$category->id}}">
                </div>
            @endforeach
            @error("category_id[]")
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <br>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        </div>
    </div>

    @endif
@endsection

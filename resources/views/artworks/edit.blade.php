@extends('layouts.app')

@section('content')
    @if(auth()->user()->id === $artwork->user_id && auth()->user()->isVerified() || auth()->user()->isAdmin())
    <div class="container">
        <div class="row justify-content-center">
            <div class="pull-left">
                <h2>Edit artwork request</h2>
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

    <form action="{{ route('artworks.update',$artwork->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="name" value="{{ $artwork->name }}" class="form-control" placeholder="Name">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Detail:</strong>
                    <textarea class="form-control" style="height:150px" name="detail" placeholder="Detail">{{ $artwork->detail }}</textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Image:</strong>
                    <input type="file" name="image" class="form-control" placeholder="image">
                    <img src="/image/{{ $artwork->image }}" width="300px">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
        <br>
        <div>
            Categories:
            @foreach($categories as $category)
                @if($artwork->categories->contains($category->id))
                    <div class="form-check form-check-inline">
                        <label class="form-check-label"
                               for="flexCheckChecked">{{$category->name}}</label>
                        <input class="form-check-input" type="checkbox" id="flexCheckChecked"
                               name="category_id[]" value="{{$category->id}}" checked>
                    </div>
                @else
                    <div class="form-check form-check-inline">
                        <label class="form-check-label"
                               for="flexCheckDefault">{{$category->name}}</label>
                        <input class="form-check-input" type="checkbox" id="flexCheckDefault"
                               name="category_id[]" value="{{$category->id}}">
                    </div>
                @endif
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
        <br>


        <div class="justify-content-center row row-cols-auto">
            <input class="btn btn-primary" type="submit" value="Save changes">
        </div>
    </form>
        </div>
    </div>
    <br>

    </form>

        </div>
    </div>
    @endif
@endsection

@extends('layouts.app')
@section('title', 'Edit Portfolio')
@section('content')
    @if(auth()->user()->id === $artwork->user_id && auth()->user()->isVerified() || auth()->user()->isAdmin())
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header text-bg-primary">
                            <h1>Edit artwork</h1>
                        </div>
                        <div class="card-body">
                            <form action="/portfolio/{{$artwork->id}}" method="POST" enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                <input id="id"
                                       name="id"
                                       type="hidden"
                                       value="{{$artwork->id}}}">
                                <label for="name">Name: </label>
                                <input id="name"
                                       name="name"
                                       type="text"
                                       value="{{old("name", $artwork->name)}}"
                                       class="input-group input-group-text @error("name") is-invalid @enderror">
                                @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <br>
                                <label for="detail">Detail: </label>
                                <input id="detail"
                                       name="detail"
                                       type="text"
                                       value="{{old("detail", $artwork->detail)}}"
                                       class="input-group input-group-text @error("detail") is-invalid @enderror">
                                @error("detail")
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <br>
                                <label for="image">Image: </label>
                                <input id="image"
                                       name="image"
                                       type="file"
                                       value="{{old("image", $artwork->image)}}"
                                       class="input-group input-group-text @error("image") is-invalid @enderror">
                                @error("image")
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
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
                    @can('delete', $artwork)
                        <div class="card">
                            <div class="card-header bg-warning">
                                <h1>Delete artwork</h1>
                            </div>
                            <div class="card-body">
                                <h5>Are you sure you want to delete, {{$artwork->name}}?</h5>
                                <br>
                                <form action="{{route('artworks.destroy', $artwork->id)}}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <div class="justify-content-center row row-cols-auto">
                                        <input id="id"
                                               name="id"
                                               type="hidden"
                                               value="{{$artwork->id}}">
                                        <input type="submit" value="Yes, I'm sure" class="btn btn-warning">
                                    </div>
                                </form>
                            </div>
                        </div>
                    @endcan
                </div>
            </div>
            @else
                <meta http-equiv="refresh" content="0; url='/404'"/>
    @endif
@endsection

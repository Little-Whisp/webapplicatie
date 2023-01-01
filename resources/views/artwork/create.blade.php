@extends('layouts.app')
@section('title', 'Add Artwork')
@section('content')
    @if(auth()->user()->isVerified() || auth()->user()->isAdmin())
        {{-- Create a new artwork.--}}
        <div class="container">
            <div class="row justify-content-center">
                <div class="mb-4 col-6">
                    <div class="card">
                        <div class="card-header bg-info">
                            <h2>Add a new Artwork</h2>
                        </div>
                        <div class="card-body">

                            <form action="/portfolio" method="POST" enctype="multipart/form-data" >
                                @csrf
                                <div class="row">
                                    <div class="mb-4">
                                        <label for="name" class="form-label">Name: </label>
                                        <input id="name"
                                               name="name"
                                               type="text"
                                               value="{{old("name")}}"
                                               placeholder="Name artwork"
                                               class="input-group input-group-text @error("name") is-invalid @enderror">
                                        @error('name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="mb-4">
                                        <label for="detail">Detail: </label>
                                        <input id="detail"
                                               name="detail"
                                               type="text"
                                               placeholder="details"
                                               class="input-group input-group-text @error("detail") is-invalid @enderror">
                                        @error("detail")
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="mb-4">
                                        <label for="image" class="form-label">Image: </label>
                                        <input id="image"
                                               name="image"
                                               type="file"
                                               value="{{old("image")}}"
                                               placeholder="add file"
                                               class="input-group input-group-text @error("image") is-invalid @enderror">
                                        @error("image")
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
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
                                <div class="justify-content-center row row-cols-auto">
                                    <input type="submit" value="Add" class="btn btn-primary">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    @else
                <meta http-equiv="Refresh" content="0; url='/404'" />
    @endif

@endsection



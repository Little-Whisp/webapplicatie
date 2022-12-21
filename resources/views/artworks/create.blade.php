@extends('layouts.app')
@section('content')
    @if(auth()->user()->isVerified() || auth()->user()->isAdmin())

        <div class="container">
            <btn class="btn btn-info text-bg-info"><a href="{{route('home')}}"
                                                      class="link page-link">Back</a></btn>
            <div class="row justify-content-center">
                <div class="mb-4 col-6">
                    <div class="card">
                        <div class="card-header bg-info">
                            <h2>Add a new Artwork</h2>
                        </div>
                        <div class="card-body">

                            <form action="{{route('artworks.store')}}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="mb-4">
                                        <label for="name" class="form-label">Name: </label>
                                        <input id="name"
                                               name="name"
                                               type="text"
                                               value="{{old("name")}}"
                                               placeholder="EG: New art piece"
                                               class="input-group input-group-text @error("name") is-invalid @enderror">
                                        @error('name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="mb-4">
                                        <label for="image">Image: </label>
                                        <input id="image"
                                               name="image"
                                               type="file"
                                               min="0.0"
                                               step="0.01"
                                               placeholder="EG: 20"
                                               class="input-group input-group-text @error("image") is-invalid @enderror">
                                        @error("image")
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="mb-4">
                                        <label for="detail" class="form-label">Detail: </label>
                                        <input id="detail"
                                               name="detail"
                                               type="text"
                                               value="{{old("detail")}}"
                                               placeholder="EG: Random."
                                               class="input-group input-group-text @error("detail") is-invalid @enderror">
                                        @error("detail")
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
{{--                <meta http-equiv="Refresh" content="0; url='/404'" />--}}
    @endif

@endsection

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

                            <form action="/portfolio" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="mb-4">
                                        <label for="title" class="form-label">Title: </label>
                                        <input id="title"
                                               name="title"
                                               type="text"
                                               value="{{old("title")}}"
                                               placeholder="EG: Attack on Titan"
                                               class="input-group input-group-text @error("title") is-invalid @enderror">
                                        @error('title')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="mb-4">
                                        <label for="price">Price (in €): </label>
                                        <input id="price"
                                               name="price"
                                               type="number"
                                               min="0.0"
                                               step="0.01"
                                               placeholder="EG: 20"
                                               class="input-group input-group-text @error("price") is-invalid @enderror">
                                        @error("price")
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="mb-4">
                                        <label for="description" class="form-label">Description: </label>
                                        <input id="description"
                                               name="description"
                                               type="text"
                                               value="{{old("description")}}"
                                               placeholder="EG: The walls have fallen."
                                               class="input-group input-group-text @error("description") is-invalid @enderror">
                                        @error("description")
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



@extends('layouts.app')
@section('title', 'Artworks')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="mb-4 col-6">
                <h2>List of Artworks</h2>
                <div>
                    @can('create', \App\Models\Artwork::class)
                        <btn class="btn btn-info"><a href="{{route('artworks.create')}}" class="link page-link">Add new artwork</a></btn>
                    @endcan
                </div>
                <div class="input-group-lg col col-auto">
                    <form action="{{ route('artworks.search') }}" method="POST">
                        @csrf
                        <label for="search"></label><input type="text" class="form-control" name="search" id="search" placeholder="Search...">
                        <button type="submit" class="btn btn-success">
                            <i class="fa fa-search"></i>
                        </button>
                    </form>
                    <br>
                </div>
                <h3>Search Results: </h3>
                @foreach($artworks as $artwork)
                    <div class="card">
                        <div class="card-header"><h1><a href="/products/{{$artwork->id}}"
                                                        class="link page-link">{{$artwork->title}}</a></h1>
                            @can('update', $artwork)
                                <a class="btn btn-secondary" href="{{route('artworks.edit', $artwork->id)}}">
                                    <i class="fa fa-pencil" aria-hidden="true"></i>
                                </a>
                            @endcan
                        </div>
                        <div class="card-body">
                            <p>{{$artwork->details}}</p>
                            <div>
                                <h3>
                                    @foreach($artwork->categories as $category)
                                        <btn class="btn btn-primary"><a class="link page-link text-white"
                                                                        href="/categories/{{$category->id}}">{{$category->name}}</a>
                                        </btn>
                                        @if($artwork->categories->count() > 1)

                                        @endif
                                    @endforeach
                                </h3>
                            </div>
                        </div>
                    </div>
                    <br>
                @endforeach
            </div>
        </div>
    </div>
@endsection

@extends('layouts.app')
@section('title', 'Portfolio - View')
{{-- Show artwork.--}}
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @include('partials.verify-piece')
                <div class="card">
                    <div class="card-header text-bg-primary"><h1>{{$artwork->name}}</h1></div>
                    <div class="card-body">
                        <h3>Image: {{$artwork->image}}</h3>
                        <h3>Gallery: {{$artwork->image / 10}}</h3>
                        <h3>Detail:</h3>

                        <p>{{$artwork->detail}}</p>
                        <h3>
                            @foreach($artwork->categories as $category)
                                {{--Show categories linked to artwork--}}
                                <btn class="btn btn-dark btn-lg"><a class="link page-link text-white"
                                                                    href="/categories/{{$category->id}}">{{$category->name}}</a>
                                </btn>
                                @if($artwork->categories->count() > 1)
                                    {{--If there are multiple categories, add space in between.--}}
                                @endif
                            @endforeach
                        </h3>
                    </div>
                </div>
                <br>
                <div>
                    <btn class="btn btn-primary"><a href="{{route('artworks.index')}}" class="link page-link"><i
                                    class="fa fa-arrow-left" aria-hidden="true"></i>
                        </a></btn>
                </div>
            </div>
        </div>
    </div>
@endsection

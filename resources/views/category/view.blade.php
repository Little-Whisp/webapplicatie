@extends('layouts.app')
@section('title', 'Category')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-bg-dark"><h1>{{$category->name}}</h1></div>
                    <div class="card-body">
                        <h3>Description:</h3>
                        <p>{{$category->description}}</p>
                    </div>
                </div>
                <br>
                <div>
                    <btn class="btn btn-primary"><a href="{{route('categories.index')}}" class="link page-link"><i
                                class="fa fa-arrow-left" aria-hidden="true"></i>
                        </a></btn>
                </div>
            </div>
        </div>
    </div>
@endsection

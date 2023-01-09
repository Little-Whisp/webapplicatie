@extends('layouts.app')
@section('title', 'Category')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="row">
                <div class="col-9">
                    <div class="card-header text-bg-dark"><h1>{{$category->name}}</h1></div>
                    <div class="card-body">
                        <h3>Detail:</h3>
                        <p>{{$category->detail}}</p>
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

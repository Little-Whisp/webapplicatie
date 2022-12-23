@extends('layouts.app')
@section('title', 'Add Category')
@section('content')
    {{-- Create a new category.--}}
    <div class="container">
        <div class="row justify-content-center">
            <div class="mb-4 col-6">
                <div class="card">
                    <div class="card-header bg-info">
                        <h2>Add a new category</h2>
                    </div>
                    <div class="card-body">

                        <form action="/categories" method="POST">
                            @csrf
                            <div class="row">
                                <div class="mb-4">
                                    <label for="name" class="form-label">Name: </label>
                                    <input id="name"
                                           name="name"
                                           type="text"
                                           value="{{old("name")}}"
                                           placeholder="EG: Category 420"
                                           class="input-group input-group-text @error("name") is-invalid @enderror">
                                    @error('name')
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
                                           placeholder="EG: It's catergorizing."
                                           class="input-group input-group-text @error("detail") is-invalid @enderror">
                                    @error("detail")
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
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
@endsection

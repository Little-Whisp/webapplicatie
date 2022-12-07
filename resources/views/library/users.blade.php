@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
{{--            @if (Auth::user() && Auth::user()->role == 'admin')--}}
{{--                <div>'THIS IS WHAT I WANT ONLY ADMIN USERS TO SEE!'</div>--}}
{{--            <div class="card">--}}
{{--                <div class="card-header">{{ __('User Requests') }}</div>--}}
{{--                <div class="card-body">--}}
{{--        <table class="table">--}}

            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('home') }}"> Back</a>
            </div>

            <thead>
            <tr>
                <th>Id</th>
                <th>name</th>
                <th>Email</th>
            <tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>

                    </td>
                </tr>
            @endforeach


            </tbody>
        </table>
    </div>
                {--@endif--}}

@endsection

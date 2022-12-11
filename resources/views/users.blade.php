@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('User Requests') }}</div>
                    <div class="card-body">
                        <table class="table">

                            <div class="pull-right">
                                <a class="btn btn-primary" href="{{ route('home') }}"> Back</a>
                            </div>
                            <div class="mb-4 col-6">
                            {{--Show message if user is successfully made admin.--}}
                            @if (session('alert'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('alert') }}
                                </div>
                            @endif
                            <h2>Admin - Users</h2>
                            <p>List of registered users.</p>
                            <table class="table table-responsive table-hover">

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
                            @endforeach
                            <td>
                                    <td>
                                        <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">Edit</a>
                                        <a class="btn btn-primary" href="{{ route('users.destroy',$user->id) }}">Delete</a>
                                    </td>
                            @if(!$user->isAdmin())
                                {{--Make user admin button for non admin-users--}}
                                <form action="{{ route('users.make-admin', $user->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-success btn-sm">Make Admin</button>
                                </form>
                            @endif

                            <td>
                                @if($user->verified_status == 1)
                                    {{--If user is verified, show checkmark--}}
                                    <i class="fa fa-check" aria-hidden="true"></i>
                                @else
                                    {{--If user isn't verified, show cross--}}
                                    <i class="fa fa-times" aria-hidden="true"></i>
                                @endif
                            </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

@endsection

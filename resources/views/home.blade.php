@extends('layouts.app')
@section('title', 'Home')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Home') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <h2>Welcome to my Porfolio!</h2>
                        <p>You are now logged in.</p>
                        <br>
                        <h2>Verification</h2>
                        <p>To add art to the site the user must be verified. View <a href="/portfolio">two art pieces</a>. After you're verified
                            you will be able to add and edit their own artwork. You can see your verification status on your profile.</p>
                        <br>
                        <div>
                            @include('partials.header-piece', ['heroText' => 'Owner: '])
                        </div>

                                <img src="https://cdn.discordapp.com/attachments/372804664053334016/1054006472503214150/1671365114959.jpg ">

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

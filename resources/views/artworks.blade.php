@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="mb-4 col-6">
                @if (session('alert'))
                    <div class="alert alert-success" role="alert">
                        {{ session('alert') }}
                    </div>
                @endif
                <h2>List of artwork</h2>
                <div>
                        @if(auth()->user()->isVerified() || auth()->user()->isAdmin())
                    @can('create', \App\Models\Artwork::class)
                        <btn class="btn btn-info text-bg-info"><a href="{{route('artworks.create')}}"
                                                                  class="link page-link">Add new artwork</a></btn>
                    @endcan
                        @endif
                </div>
                <div class="input-group-lg col col-auto">
                    @include('partials.search-piece')
                    <br>
                </div>
                @foreach($artworks as $artwork)
                    @if($artwork->hidden_status === 1)
                        @if(auth()->guest())
                        @elseif(auth()->user()->isAdmin())
                            @include('partials.artwork-piece')
                        @endif
                    @else
                        @include('partials.artwork-piece')
                    @endif
                    <br>
                @endforeach
                @if($artworks->count() < 1)
                    <p>No results found.</p>
                @endif
            </div>
        </div>
    </div>
@endsection

<div class="card">
    <div class="card-header"><h1><a href="{{route('artworks.show', $artwork->id)}}"
                                    class="link page-link">{{$artwork->name}}</a></h1>
        <div class="justify-content-end row row-cols-auto">
            @can('update', $artwork)
                @if(auth()->user()->id === $artwork->user_id || auth()->user()->isAdmin())
                    <a class="btn btn-primary" href="{{route('artworks.edit', $artwork->id)}}">
                        <i class="fa fa-pencil" aria-hidden="true"></i>
                    </a>
                @endif
            @endcan
            @can ('toggle', $artwork)
                {{--Toggle visibility button for artwork--}}
                <form action="{{ route('artworks.toggle-visibility', $artwork->id) }}"
                      method="POST">
                    @csrf
                    @if ($artwork->hidden_status == 1)
                        {{--Show slashed out eye icon if the artwork is hidden--}}
                        <button type="submit" class="btn btn-secondary">
                            <i class="fa fa-eye-slash" aria-hidden="true"></i>
                        </button>
                    @else
                        {{--Show eye icon if the artwork is visible--}}
                        <button type="submit" class="btn btn-success">
                            <i class="fa fa-eye" aria-hidden="true"></i>
                        </button>
                    @endif
                </form>
            @endcan
        </div>
    </div>
    <div class="card-body">
        <h4>Collection: {{$artwork->image}}</h4>
        <p>{{$artwork->detail}}</p>
        <div>
            <h3>
                @foreach($artwork->categories as $category)
                    {{--Show categories linked to artwork--}}
                    @if($category->name == 'New')
                        <btn class="btn btn-primary"><a class="link page-link text-white"
                                                        href="/categories/{{$category->id}}">{{$category->name}}</a>
                        </btn>
                    @elseif ($category->name == 'Recently added')
                        <btn class="btn btn-success"><a class="link page-link text-white"
                                                        href="/categories/{{$category->id}}">{{$category->name}}</a>
                        </btn>
                    @elseif ($category->name == 'old')
                        <btn class="btn btn-warning"><a class="link page-link text-white"
                                                        href="/categories/{{$category->id}}">{{$category->name}}</a>
                        </btn>
                    @else
                        <btn class="btn btn-dark"><a class="link page-link text-white"
                                                     href="/categories/{{$category->id}}">{{$category->name}}</a>
                        </btn>
                    @endif

                    @if($artwork->categories->count() > 1)
                        {{--If there are multiple categories, add space in between.--}}
                    @endif
                @endforeach
            </h3>
        </div>
    </div>
</div>

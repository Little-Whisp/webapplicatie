<form action="{{ route('artworks.search') }}" method="POST">
    @csrf
    <label for="search"></label>
    <input
        type="text" class="form-control"
        name="search"
        id="search"
        placeholder="Search..."
        value="{{request('search')}}"
    >
    <br>
    <div class="mb-4 col-6">
        <div class="btn-group btn-group">
            @if(request(['searchCategory']))
                @php
                    $searchRequest = request(['searchCategory'][0]);
                @endphp

                @foreach($categories as $category)
                    @if(in_array($category->id, $searchRequest))

                        <input class="btn-check" name="searchCategory[]" type="checkbox"
                               id="category-{{$category->id}}" value="{{$category->id}}" checked>

                        <label class="btn btn-outline-success"
                               for="category-{{$category->id}}">{{$category->name}}</label>
                    @else
                        <input class="btn-check" name="searchCategory[]" type="checkbox"
                               id="category-{{$category->id}}" value="{{$category->id}}">

                        <label class="btn btn-outline-success"
                               for="category-{{$category->id}}">{{$category->name}}</label>
                    @endif
                @endforeach

            @else
                @foreach($categories as $category)
                    <input class="btn-check" name="searchCategory[]" type="checkbox"
                           id="category-{{$category->id}}" value="{{$category->id}}">

                    <label class="btn btn-outline-success"
                           for="category-{{$category->id}}">{{$category->name}}</label>
                @endforeach
            @endif

            <button type="submit" class="btn btn-success">
                <i class="fa fa-search"></i>
            </button>
        </div>
    </div>
</form>

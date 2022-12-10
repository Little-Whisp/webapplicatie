@if(session()->exists('artworksSeen'))
    @php
        $i = session()->get('artworksSeen');
        $i ++;
        session()->put('artworksSeen', $i)
    @endphp

    @if($i >= 2 and !Auth::user()->verified_status)
        <div class="alert alert-success" role="alert">
            <h4 class="alert-heading">Succesfull</h4>
            <p> verification completed</p>
            <hr>
            <btn class="btn btn-success" href="{{ route('users.verify-user', Auth::id()) }}"
                 onclick="event.preventDefault();document.getElementById('verification').submit();">Click here to
                verify!</btn>

            <form id="verification" action="{{ route('users.verify-user', Auth::id()) }}" method="POST">
                @csrf
            </form>
        </div>
    @endif
@else
    @php
        session()->put('artworksSeen', 1)
    @endphp
@endif

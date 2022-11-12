@extends('..\layout\layoutm')
@section('content1')
@guest
            <div class="cnt_sh_mv">
                <img src="../{{$movie->imagepath}}">
                <h3>{{$movie->name}}</h3>
                <p><span>Length: </span><span>{{$movie->length}}</span></p>
                <p><span>Genre: </span><span>{{$movie->genre}}</span></p>
                <p><span>Director: </span><span>{{$movie->director}}</span></p>
                <p><span>Premiere: </span><span>{{$movie->premiere}}</span></p>
                <p><span>Description: </span><span>{{$movie->descr}}</span></p>
            </div>
            <form action="{{route('moviesessions.show', $movie->id)}}"><button type="submit" class="btn btn-primary">Sessions</button></form>
@else
    <div class="cnt_sh_mv">
        <img src="../{{$movie->imagepath}}">
        <h3>{{$movie->name}}</h3>
        <p><span>Length: </span><span>{{$movie->length}}</span></p>
        <p><span>Genre: </span><span>{{$movie->genre}}</span></p>
        <p><span>Director: </span><span>{{$movie->director}}</span></p>
        <p><span>Premiere: </span><span>{{$movie->premiere}}</span></p>
        <p><span>Description: </span><span>{{$movie->descr}}</span></p>
    </div>
    <form action="{{route('moviesessions.show', $movie->id)}}"><button type="submit" class="btn btn-primary">Sessions</button></form>
    @if(Auth::user()->isadmin)
            <form action="{{route('movies.edit', $movie->id)}}"><button type="submit" class="btn btn-primary">Edit</button></form>
    @endif
@endguest
@endsection
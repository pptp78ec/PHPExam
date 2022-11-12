@extends('..\layout\layoutm')
@section('content')

        @if ($user)
          <h3>{{$user->name}}</h3>
            
        @endif
        @foreach ($movies as $item)
        <div class="card" style="width: 18rem;">
            <img src={{$item->imagepath}} class="card-img-top" alt="Movie image">
            <div class="card-body">
              <h5 class="card-title">{{$item->name}}</h5>
              <a href="{{route('movies.show', $item->id)}}" class="btn btn-primary">Details</a>
              <a href="{{route('movies.destroy', $item->id)}}" class="btn btn-danger">Delete</a>
            </div>
          </div>
        @endforeach
  {{ $movies->links() }}
@endsection
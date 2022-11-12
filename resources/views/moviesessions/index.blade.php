@extends('..\layout\layoutms')
@section('content1')
@guest
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Place</th>
      <th scope="col">Starts</th>
      <th scope="col">Ends</th>
      <th scope="col">Movie</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($sessions as $item)
    <tr>
      <td>{{$item->id}}</td>
      <td>{{$item->place}}</td>
      <td>{{$item->timestart}}</td>
      <td>{{$item->timeend}}</td>
      <td>{{$movies->find($item->movieid)->name}}</td>
    </tr>
    @endforeach
  </tbody>
</table>
{{ $sessions->links() }}
@else
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Place</th>
      <th scope="col">Starts</th>
      <th scope="col">Ends</th>
      <th scope="col">Movie</th>
      @if(Auth::user()->isadmin)
      <th scope="col">Edit</th>
      <th scope="col">Delete</th>
      @endif
    </tr>
  </thead>
  <tbody>
    @foreach ($sessions as $item)
    <tr>
      <td>{{$item->id}}</td>
      <td>{{$item->place}}</td>
      <td>{{$item->timestart}}</td>
      <td>{{$item->timeend}}</td>
      <td>{{$movies->find($item->movieid)->name}}</td>
      @if(Auth::user()->isadmin)
      <td><a href="{{route('moviesessions.edit', $item->id)}}" class="btn btn-primary">Edit</a></td>
      <td><a href="{{route('moviesessions.destroy', $item->id)}}" class="btn btn-danger">Delete</a></td>
      @endif
    </tr>
    @endforeach
  </tbody>
</table>

{{ $sessions->links() }}        
@endguest
@endsection
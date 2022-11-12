@extends('..\layout\layoutms')
@section('content1')
        <table class="table">
          <thead class="thead-dark">
            <tr>
              <th scope="col">#</th>
              <th scope="col">Place</th>
              <th scope="col">Starts</th>
              <th scope="col">Ends</th>
              <th scope="col">Movie</th>
              <th scope="col">Edit</th>
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
              <td><form method="GET" action={{route('moviesessions.edit',$item->id)}}><button type="submit" class="btn btn-primary">Edit</button></form></td>
              <td><form method="GET" action={{route('moviesessions.edit',$item->id)}}><button type="submit" class="btn btn-primary">Edit</button></form></td>
            </tr>
            @endforeach
          </tbody>
        </table>
        
  {{ $sessions->links() }}
@endsection
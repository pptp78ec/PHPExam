@extends('..\layout\layoutms')
@section('content1')
        <h3>Sessions for {{$movie->name}}</h3>
        <table class="table">
          <thead class="thead-dark">
            <tr>
              <th scope="col">#</th>
              <th scope="col">Place</th>
              <th scope="col">Starts</th>
              <th scope="col">Ends</th>
              <th scope="col">Order</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($sessions as $item)
            <tr>
              <td>{{$item->id}}</td>
              <td>{{$item->place}}</td>
              <td>{{$item->timestart}}</td>
              <td>{{$item->timeend}}</td>
              <td><form action="post"><button type="submit" class="btn btn-primary">Book it!</button></form></td>
            </tr>
            @endforeach
          </tbody>
        </table>
        
@endsection
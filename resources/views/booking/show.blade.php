@extends('..\layout\layoutbk')
@section('content')
      <h3>My booked tickets</h3>
        <table class="table">
        <tr>
              <th scope="col">#</th>
              <th scope="col">Movie</th>
              <th scope="col">Place</th>
              <th scope="col">Session Starts</th>
              <th scope="col">Session Ends</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($bookings as $item)
            <tr>
              <td>{{$item->id}}</td>
              <td>{{$movies->find($moviesessions->find($item->moviesessionid)->movieid)->name}}</td>
              <td>{{$moviesessions->find($item->moviesessionid)->place}}</td>
              <td>{{$moviesessions->find($item->moviesessionid)->timestart}}</td>
              <td>{{$moviesessions->find($item->moviesessionid)->timeend}}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
  {{ $bookings->links() }}
@endsection
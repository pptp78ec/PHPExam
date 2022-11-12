@extends('..\layout\layoutbk')
@section('content')
        <table class="table">
          <thead class="thead-dark">
            <tr>
              <th scope="col">#</th>
              <th scope="col">UserId</th>
              <th scope="col">SessionId</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($bookings as $item)
            <tr>
              <td>{{$item->id}}</td>
              <td>{{$item->userid}}</td>
              <td>{{$item->moviesessionid}}</td>
              {{-- <td><form method="GET" action={{route('bookings.edit',$item->id)}}><button type="submit" class="btn btn-primary">Edit</button></form></td> --}}
            </tr>
            @endforeach
          </tbody>
        </table>
        @endforeach
  {{ $movies->links() }}
@endsection
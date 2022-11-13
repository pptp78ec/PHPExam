@extends('..\layout\layoutbk')
@section('content')
    <h3>All booked tickets</h3>
        <table class="table">
          <thead class="thead-dark">
            <tr>
              <th scope="col">#</th>
              <th scope="col">User</th>
              <th scope="col">Movie</th>
              <th scope="col">Place</th>
              <th scope="col">Session Starts</th>
              <th scope="col">Session Ends</th>
              @if(Auth::user()->isadmin)
              <th scope="col">Delete</th>
              @endif
            </tr>
          </thead>
          <tbody>
            @foreach ($bookings as $item)
            <tr>
              <td>{{$item->id}}</td>
              <td>{{$users->find($item->userid)->name}}</td>
              <td>{{$movies->find($moviesessions->find($item->moviesessionid)->movieid)->name}}</td>
              <td>{{$moviesessions->find($item->moviesessionid)->place}}</td>
              <td>{{$moviesessions->find($item->moviesessionid)->timestart}}</td>
              <td>{{$moviesessions->find($item->moviesessionid)->timeend}}</td>
              @if(Auth::user()->isadmin)
              <td>
              <form action="{{ route('booking.destroy', $item->id)}}" method="post">           @csrf
                @method('DELETE')
              <button class="btn btn-danger" type="submit">Delete</button>
              </form>
              </td>
              @endif
            </tr>
            @endforeach
          </tbody>
        </table>
  {{ $bookings->links() }}
@endsection
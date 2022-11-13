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
              @if(Auth::check())
              <td><form action="{{route('bookings.store')}}" >
                @crsf
                <input type="text" name="userid" id="" style="visibility: hidden;" value="{{Auth::id()}}">
                <input type="text" name="moviesessionid" id="" style="visibility: hidden;" value="{{$item->id}}">
                <button type="submit" class="btn btn-primary">Book it!</button>
              </form>
              @endif
            </td>
            </tr>
            @endforeach
          </tbody>
        </table>
        
@endsection
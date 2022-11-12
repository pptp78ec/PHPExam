@extends('..\layout\layoutms')
@section('content1')
            <form method="POST" action="{{route('moviesessions.store')}}">
                @csrf
                <div class="form-group" >
                    <label for="idplace">Place</label>
                    <input type="text" class="form-control" name="place" id="idplace" value="{{old('place')}}" required>
                </div>
                <div class="form-group">
                    <label for="idmovie">Movie</label>
                    <select name="movieid" class="form-select" value="{{old('movieid')}}" required>
                        <option selected>Choose Movie</option>
                        @foreach ($movies as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                      </select>
                </div>
                <div class="form-group">
                    <label for="idtimest">Start time</label>
                    <input type="datetime-local" class="form-control" name="timestart" id="idtimest" value="{{old('timestart')}}" reqired>
                </div>
                <div class="form-group">
                    <label for="idtimeend">End time</label>
                    <input type="datetime-local" class="form-control" name="timeend" id="idtimeend" value="{{old('timeend')}}" reqired>
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
            
@endsection
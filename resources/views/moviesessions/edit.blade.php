@extends('..\layout\layoutms')
@section('content1')
            <form method="POST" action="{{route('moviesessions.update', $session->id)}}">
                @csrf
                @method('PATCH')
                <div class="form-group" >
                    <label for="idplace">Place</label>
                    <input type="text" class="form-control" name="place" id="idplace" value="{{$session->place}}" required>
                </div>
                <div class="form-group">
                    <label for="idmovie">Movie</label>
                    <select name="movieid" class="form-select" value="{{$session->movieid}}" required>
                        <option selected value="{{$session->movieid}}">{{$movies->find($session->movieid)->name}}</option>
                        @foreach ($movies as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                      </select>
                </div>
                <div class="form-group">
                    <label for="idtimest">Start time</label>
                    <input type="datetime-local" class="form-control" name="timestart" id="idtimest" value="{{$session->timestart}}" reqired>
                </div>
                <div class="form-group">
                    <label for="idtimeend">End time</label>
                    <input type="datetime-local" class="form-control" name="timeend" id="idtimeend" value="{{$session->timeend}}" reqired>
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
            
@endsection
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@extends('..\layout\layoutm')
@section('content1')
            <form method="POST" action="{{route('movies.update', $movie->id)}}">
                @csrf
                @method('PATCH')
                <div class="form-group" >
                    <label for="idname">Name</label>
                    <input type="text" class="form-control" name="name" id="idname" value="{{$movie->name}}" required>
                </div>
                <div class="form-group">
                  <label for="idgenre">Genre</label>
                  <input type="text" class="form-control" name="genre" id="idgenre" value="{{$movie->genre}}" required>
                </div>
                <div class="form-group">
                    <label for="iddir">Director</label>
                    <input type="text" class="form-control" name="director" id="iddir" value="{{$movie->director}}" required>
                </div>
                <div class="form-group">
                    <label for="idlentgh">Length</label>
                    <input type="number" class="form-control" name="length" id="idlentgh" value="{{$movie->length}}" required>
                </div>
                <div class="form-group">
                    <label for="idprem">Premiere</label>
                    <input type="date" class="form-control" name="premiere" id="idprem" value="{{$movie->premiere}}" reqired>
                </div>
                <div class="form-group">
                    <label for="iddescr">Description</label>
                    <input type="text" class="form-control" name="descr" id="iddescr" value="{{$movie->director}}" required>
                </div>
                <div class="form-group">
                    <label for="idpic">Picture</label>
                    <input type="file" class="form-control" name="imagepath" id="idpic" value="{{$movie->imagepath}}" reqired>
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
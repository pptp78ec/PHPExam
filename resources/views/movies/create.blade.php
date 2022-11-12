@extends('..\layout\layoutm')
@section('content')
            <form method="POST" action="{{route('movies.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="form-group" >
                    <label for="idname">Name</label>
                    <input type="text" class="form-control" name="name" id="idname" value="{{old('name')}}" required>
                </div>
                <div class="form-group">
                  <label for="idgenre">Genre</label>
                  <input type="text" class="form-control" name="genre" id="idgenre" value="{{old('genre')}}" required>
                </div>
                <div class="form-group">
                    <label for="iddir">Director</label>
                    <input type="text" class="form-control" name="director" id="iddir" value="{{old('director')}}" required>
                </div>
                <div class="form-group">
                    <label for="idlentgh">Length</label>
                    <input type="number" class="form-control" name="length" id="idlentgh" value="{{old('length')}}" required>
                </div>
                <div class="form-group">
                    <label for="idprem">Premiere</label>
                    <input type="date" class="form-control" name="premiere" id="idprem" value="{{old('premiere')}}" reqired>
                </div>
                <div class="form-group">
                    <label for="iddescr">Description</label>
                    <input type="text" class="form-control" name="descr" id="iddescr" value="{{old('descr')}}" required>
                </div>
                <div class="form-group">
                    <label for="idpic">Picture</label>
                    <input type="file" class="form-control" name="imagepath" id="idpic" value="{{old('imagepath')}}" reqired>
                </div>

                <button type="submit" class="btn btn-primary">Save</button>
            </form>
            
@endsection
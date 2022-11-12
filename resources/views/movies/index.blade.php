@extends('..\layout\layoutm')
@section('content1')
@foreach ($movies as $item)
@if($user->isadmin === false)
        <div class="card" style="width: 18rem;">
            <img src={{$item->imagepath}} class="card-img-top" alt="Movie image">
            <div class="card-body">
              <h5 class="card-title">{{$item->name}}</h5>
              <a href="{{route('movies.show', $item->id)}}" class="btn btn-primary">Details</a>
              @if($user->isadmin)
              <a href="{{route('movies.destroy', $item->id)}}" class="btn btn-danger">Delete</a>
              @endif
            </div>
          </div>
@else
<table class="table table-striped">
  <thead>
    <th>Id</th>
    <th>Name</th>
    <th>Imagepath</th>
    <th>Details</th>
    <th>Edit</th>
    <th>Delete</th>
  </thead>
  <tbody>
    <tr>
      <td>{{$item->id}}</td>
      <td>{{$item->name}}</td>
      <td>{{$item->imagepath}}</td>
      <td><a href="{{route('movies.show', $item->id)}}" class="btn btn-primary">Details</a></td>
      <td><a href="{{route('movies.edit', $item->id)}}" class="btn btn-primary">Edit</a></td>
      <td><a href="{{route('movies.destroy', $item->id)}}" class="btn btn-danger">Delete</a></td>
    </tr>
  </tbody>
</table>
@endif
@endforeach
  {{ $movies->links() }}
@endsection
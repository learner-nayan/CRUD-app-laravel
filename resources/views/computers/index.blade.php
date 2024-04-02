<!DOCTYPE html>
<html lang="en">
<head>
  <title>Computers</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

@if (session('message'))
<div class="container">
    <div class="alert alert-success alert-dismissable">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
      <p>{{{ session('message') }}}</p>
    </div>
</div>
@endif

<h4><a href="{{route('computers.create')}}">Create Computer</a></h4>

<div class="container">
  <h2>Computers</h2>
  <table class="table">
    <thead>
      <tr>
        <th>Brand</th>
        <th>Model</th>
        <th>Storage</th>
        <th>Price</th>
      </tr>
    </thead>
    <tbody>
        @foreach($computers as $computer)
        <tr>
            <td>{{$computer->brand}}</td>
            <td>{{$computer->model}}</td>
            <td>{{$computer->storage}}</td>
            <td>{{$computer->price}}</td>
            <td><a href="{{route('computers.edit', [$computer->id])}}">Edit</a></td>
            <td>
              <form action="{{route('computers.destroy', [$computer->id])}}" method="post">
                @method('delete')
                @csrf
                <button type="submit" class="btn btn-default"  onclick="return confirm('Are you sure you want to delete this item?')">Delete</button>
              </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
</div>

</body>
</html>

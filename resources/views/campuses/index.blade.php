<!DOCTYPE html>
<html lang="en">
<head>
  <title>Colleges</title>
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

@if (session('delete_confirmation') && session('id_to_delete'))
<div class="container">
    <div class="alert alert-warning alert-dismissable">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
      <p>{{{ session('delete_confirmation') }}}</p>
      <form action="{{route('campuses.delete', session('id_to_delete'))}}" method="post">
        @method('delete')
        @csrf
        <a href="{{route('campuses.index')}}" class="btn btn-default">No</a>
        <button type="submit" class="btn btn-warning">Yes</button>
      </form>
    </div>
</div>
@endif

<h4><a href="{{route('campuses.create')}}">Create College</a></h4>

<div class="container">
  <h2>Colleges</h2>
  <table class="table">
    <thead>
      <tr>
        <th>Name</th>
        <th>Contact</th>
        <th>No. of Teachers</th>
        <th>No. of Students</th>
        <th>Estd</th>
        <th>Total class</th>
        <th>Opening hr.</th>
        <th>Closing hr.</th>
        <th>Teacher's gender</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach($campuses as $campus)
        <tr>
            <td>{{$campus->name}}</td>
            <td>{{$campus->phone_number}}</td>
            <td>{{$campus->number_of_teachers}}</td>
            <td>{{$campus->number_of_students}}</td>
            <td>{{$campus->est_date}}</td>
            <td>{{$campus->total_class}}</td>
            <td>{{$campus->opening_hour}}</td>
            <td>{{$campus->closing_hour}}</td>
            <td>{{$campus->teachers_gender}}</td>
            <td><a href="{{route('campuses.edit', [$campus->id])}}">Edit</a></td>
            <!-- <td>
              <form action="{{route('campuses.delete', [$campus->id])}}" method="post">
                @method('delete')
                @csrf
                <button type="submit" class="btn btn-default">Delete</button>
              </form>
            </td> -->
            <td><a href="{{route('campuses.delete_confirmation', [$campus->id])}}">Delete</a></td>
        </tr>
        @endforeach
    </tbody>
  </table>
</div>

</body>
</html>

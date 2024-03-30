<!DOCTYPE html>
<html lang="en">
<head>
  <title>Edit college</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

@if ($errors->any())
<div class="container">
    <div class="alert alert-danger">
      <ul>
        @foreach($errors->all() as $error ) 
          <li>{{$error}}</li>
        @endforeach
      </ul>
    </div>
</div>
@endif

<h4><a href="{{route('campuses.index')}}">Colleges Table</a></h4>

<div class="container">
  <h2>Edit college</h2>
  <form class="form-horizontal" action="{{route('campuses.update', [$campus->id])}}" method="post">
    @method('put')
    @csrf
    <div class="form-group">
      <label class="control-label col-sm-2" for="name">Name:</label>
      <div class="col-sm-10">
        <input type="text" value="{{old('name', $campus->name)}}" class="form-control" id="name" placeholder="Enter name" name="name">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="phone_number">Contact:</label>
      <div class="col-sm-10">
        <input type="text" value="{{old('phone_number', $campus->phone_number)}}" class="form-control" id="phone_number" placeholder="Enter contact" name="phone_number">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="number_of_teachers">No. of teachers:</label>
      <div class="col-sm-10">
        <input type="number" value="{{old('number_of_teachers', $campus->number_of_teachers)}}" class="form-control" id="number_of_teachers" placeholder="Enter no. of teachers" name="number_of_teachers">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="number_of_students">No. of students::</label>
      <div class="col-sm-10">
        <input type="number" value="{{old('number_of_students', $campus->number_of_students)}}" class="form-control" id="number_of_students" placeholder="Enter no. of students" name="number_of_students">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="est_date">Establish date:</label>
      <div class="col-sm-10">
        <input type="date" value="{{old('est_date', $campus->est_date)}}" class="form-control" id="est_date" placeholder="Enter estd. date" name="est_date">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="total_class">Total classes:</label>
      <div class="col-sm-10">
        <input type="number" value="{{old('total_class', $campus->total_class)}}" class="form-control" id="total_class" placeholder="Enter total classes" name="total_class">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="opening_hour">Opening hour:</label>
      <div class="col-sm-10">
        <input type="time" value="{{old('opening_hour', $campus->opening_hour)}}" class="form-control" id="opening_hour" placeholder="Enter opening hour" name="opening_hour">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="closing_hour">Closing hour:</label>
      <div class="col-sm-10">
        <input type="time" value="{{old('closing_hour', $campus->closing_hour)}}" class="form-control" id="closing_hour" placeholder="Enter closing hour" name="closing_hour">
      </div>
    </div>
    <select name="teachers_gender" id="teachers_gender">
        <option value="male" {{$campus->teachers_gender=='male'?'selected':''}}>Male</option>
        <option value="female" {{$campus->teachers_gender=='female'?'selected':''}}>Female</option>
        <option value="other" {{$campus->teachers_gender=='other'?'selected':''}}>Other</option>
    </select>
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default">Submit</button>
      </div>
    </div>
  </form>
</div>

</body>
</html>
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

<h4><a href="{{route('computers.index')}}">Computers Table</a></h4>

<div class="container">
  <h2>Edit college</h2>
  <form class="form-horizontal" action="{{route('computers.update', [$computer->id])}}" method="post">
    @method('put')
    @csrf
    <div class="form-group">
      <label class="control-label col-sm-2" for="brand">Brand:</label>
      <div class="col-sm-10">
        <input type="text" value="{{old('brand', $computer->brand)}}" class="form-control" id="brand" placeholder="Enter brand" name="brand">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="model">Model:</label>
      <div class="col-sm-10">
        <input type="text" value="{{old('model', $computer->model)}}" class="form-control" id="model" placeholder="Enter model" name="model">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="storage">Storage:</label>
      <div class="col-sm-10">
        <input type="number" step="0.01" value="{{old('storage', $computer->storage)}}" class="form-control" id="storage" placeholder="Enter storage" name="storage">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="price">Price:</label>
      <div class="col-sm-10">
        <input type="number" step="0.01" value="{{old('price', $computer->price)}}" class="form-control" id="price" placeholder="Enter price" name="price">
      </div>
    </div>
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default">Submit</button>
      </div>
    </div>
  </form>
</div>

</body>
</html>
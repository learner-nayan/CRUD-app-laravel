<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>
<body>
    @if(Auth::check())
    <h2>Hello {{auth()->user()->name}}</h2>
    <form action="{{route('logout')}}" method="post">
        @csrf
        <button class="btn btn-success" type="submit">Logout</button>
    </form>
    @endif
</body>
</html>
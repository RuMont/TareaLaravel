<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <title>Update</title>
</head>

<body>
  <h1 class="text-center">Updating {{$centro->city}}: {{$centro->name}}</h1>
  {{-- El formulario tiene puesto en los inputs el value actual --}}
  <form class="col-6 mx-auto" action="{{ url('centros/update') }}/{{ $centro->id }}" method="POST">
    @csrf {{-- Token obligatorio para utilizar method="post" --}}
    <div class="form-group">
      <label for="city">city</label>
      <input type="text" class="form-control" name="city" placeholder="Enter city name" value="{{ $centro->city }}">
    </div>
    <div class="form-group">
      <label for="name">name</label>
      <input type="text" class="form-control" name="name" placeholder="Enter name" value="{{ $centro->name }}">
    </div>
    <button type="submit" class="btn btn-primary mt-1">Update</button>
  </form>
</body>

</html>

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
  <h1 class="text-center">Updating {{$usuario->name}}: {{$usuario->surname}}</h1>
  {{-- El formulario tiene puesto en los inputs el value actual --}}
  <form class="col-6 mx-auto" action="{{ url('usuarios/update') }}/{{ $usuario->id }}" method="POST">
    @csrf {{-- Token obligatorio para utilizar method="post" --}}
    <div class="form-group">
            <label for="dni">DNI</label>
            <input type="text" class="form-control" name="dni" placeholder="Enter DNI" value="{{$usuario->dni}}">
        </div>
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" placeholder="Enter name" value="{{$usuario->name}}">
        </div>
        <div class="form-group">
            <label for="surname">Surname</label>
            <input type="text" class="form-control" name="surname" placeholder="Enter surname" value="{{$usuario->surname}}">
        </div>
        <div class="form-group">
            <label for="birth_date">birthDate</label>
            <input type="date" class="form-control" name="birth_date" placeholder="Enter birthDate" value="{{$usuario->birth_date}}">
        </div>
        <div class="form-group">
            <label for="centre">Centre_id</label>
            <input type="text" class="form-control" name="centre_id" placeholder="Enter centre id" value="{{$usuario->centre_id}}">
        </div>
    <button type="submit" class="btn btn-primary mt-1">Update</button>
  </form>
</body>

</html>
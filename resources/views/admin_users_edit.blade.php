<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <title>Admin User Update</title>
  <style>
    body {
      overflow-x: hidden;
    }

  </style>
</head>

<body>
  @includeIf('components.navbar')
  <h1 class="text-center mt-5">Updating: "{{ $usuario->email }}"</h1>
  {{-- El formulario tiene puesto en los inputs el value actual --}}
  <form class="col-6 d-flex flex-column mx-auto my-5 border p-5"
    action="{{ url('/admin/users/update') }}/{{ $usuario->id }}" method="post">
    @csrf {{-- Token obligatorio para utilizar method="post" --}}
    <div class="form-group">
      <label for="email"><b>Email</b></label>
      <input type="email" class="form-control" name="email" placeholder="Enter email" value="{{ $usuario->email }}">
    </div>
    <div class="form-group mt-1">
      <label for="dni"><b>DNI</b></label>
      <input type="text" class="form-control" name="dni" placeholder="Enter dni" value="{{ $usuario->dni }}">
    </div>
    <div class="form-group mt-1">
      <label for="password"><b>Password</b></label>
      <input type="password" class="form-control" name="password" placeholder="Enter password"
        value="{{ $usuario->password }}">
    </div>
    <div class="col text-center">
      @foreach ($errors->all(':message') as $error)
        <p class="text-danger">{{ $error }}</p>
      @endforeach
    </div>
    <button type="submit" class="col-4 btn btn-outline-dark mt-3 text-align-center mx-auto">Update</button>
  </form>
  <p class="invisible my-5 p-2">a</p>
  @includeIf('components.footer')
</body>

</html>

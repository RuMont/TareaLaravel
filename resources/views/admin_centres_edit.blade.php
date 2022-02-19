<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <title>Admin Centre Edit</title>
  <style>
    body {
      overflow-x: hidden;
    }

  </style>
</head>

<body>
  @includeIf('components.navbar')
  <h1 class="text-center mt-5">Updating {{ $centro->name }}</h1>
  {{-- El formulario tiene puesto en los inputs el value actual --}}
  <form class="col-6 d-flex flex-column mx-auto my-5 border p-5" action="{{ url('/admin/centres/update') }}/{{ $centro->id }}"
    method="post">
    @csrf {{-- Token obligatorio para utilizar method="post" --}}
    <div class="form-group">
      <label for="name"><b>Name</b></label>
      <input type="text" class="form-control" name="name" placeholder="Enter name"  value="{{ $centro->name }}">
    </div>

    <div class="form-group mt-1">
      <label for="city"><b>City</b></label>
      <input type="text" class="form-control" name="city" placeholder="Enter city name" value="{{ $centro->city }}">
    </div>

    @if (Session::has('errors'))
      <div class="row">
        <div class="col text-center">
          @foreach ($errors->all(':message') as $error)
            <p class="text-danger">{{ $error }}</p>
          @endforeach
        </div>
      </div>
    @endif
    <button type="submit" class="col-4 btn btn-outline-dark mt-3 text-align-center mx-auto">Update</button>
  </form>
  <p class="invisible my-5 p-5">a</p>
  @includeIf('components.footer')
</body>


</html>

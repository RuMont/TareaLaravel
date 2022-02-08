<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <title>ListaCentros</title>
</head>

<body>
  {{-- Formulario para añadir centros --}}
  <form class="col-6 mx-auto" action="{{ url('centros/insert') }}" method="post">
    @csrf {{-- Token obligatorio para utilizar method="post" --}}
    <div class="form-group">
      <label for="city">city</label>
      <input type="text" class="form-control" name="city" placeholder="Enter city name">
    </div>
    <div class="form-group">
      <label for="name">name</label>
      <input type="text" class="form-control" name="name" placeholder="Enter name">
    </div>
    <button type="submit" class="btn btn-primary mt-1">Insert</button>
  </form>
  <hr />

  <div class="row">
    <div class="col-6 mx-auto">
      <table class="table">
        <tr>
          <th>ID</th>
          <th>city</th>
          <th>name</th>
          <th>options</th>
        </tr>

        @foreach ($centros as $centro)
          <tr>
            <td>{{ $centro->id }}</td>
            <td>{{ $centro->city }}</td>
            <td>{{ $centro->name }}</td>
            <td>
              <a class="ms-1 btn btn-primary" href="{{ url('centros/edit') }}/{{ $centro->id }}">Edit</a>
              <a class="btn btn-danger" href="{{ url('centros/delete') }}/{{ $centro->id }}">Delete</a>
            </td>
          </tr>
        @endforeach
      </table>
    </div>
  </div>
</body>

</html>

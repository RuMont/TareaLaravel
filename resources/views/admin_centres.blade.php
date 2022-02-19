<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <title>Admin Centres</title>
  <style>
    body {
      overflow-x: hidden;
    }

  </style>
</head>

<body>
  @includeIf('components.navbar')
  <section class="p-5">
    {{-- Formulario para añadir centros --}}
    <form class="col-6 d-flex flex-column mx-auto mb-5 border p-5" action="{{ url('admin/centres/insert') }}"
      method="post">
      @csrf {{-- Token obligatorio para utilizar method="post" --}}
      <div class="form-group">
        <label for="name"><b>Name</b></label>
        <input type="text" class="form-control" name="name" placeholder="Enter name">
      </div>

      <div class="form-group mt-1">
        <label for="city"><b>City</b></label>
        <input type="text" class="form-control" name="city" placeholder="Enter city name">
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
      <button type="submit" class="col-4 btn btn-outline-dark mt-3 text-align-center mx-auto">Insert</button>
    </form>

    <div class="row">
      <div class="col-7 mx-auto">
        <table class="table table-hover table-bordered text-center align-middle mb-5">
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>City</th>
            <th>Actions</th>

          </tr>

          @foreach ($centros as $centro)
            <tr>
              <td>{{ $centro->id }}</td>
              <td>{{ $centro->name }}</td>
              <td>{{ $centro->city }}</td>
              <td>
                <a class="ms-1 btn btn-dark"
                  href="{{ url('admin/centres/edit') }}/{{ $centro->id }}">Edit</a>
                <a class="btn btn-outline-danger" href="{{ url('/admin/centres/delete') }}/{{ $centro->id }}">Delete</a>
              </td>
            </tr>
          @endforeach
        </table>
      </div>
    </div>
  </section>
  @includeIf('components.footer')
</body>

</html>

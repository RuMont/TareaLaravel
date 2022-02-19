</html>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <title>Admin Users</title>
  <style>
    body {
      overflow-x: hidden;
    }

  </style>
</head>

<body>
  @includeIf('components.navbar')

  {{-- Formulario para añadir usuarios --}}
  <section class="p-5">
    <form class="col-6 d-flex flex-column mx-auto mb-5 border p-5" action="{{ url('/admin/users/insert') }}"
      method="post">
      @csrf {{-- Token obligatorio para utilizar method="post" --}}
      <div class="form-group">
        <label for="email"><b>Email</b></label>
        <input type="email" class="form-control" name="email" placeholder="Enter email">
      </div>
      <div class="form-group mt-1">
        <label for="dni"><b>Dni</b></label>
        <input type="text" class="form-control" name="dni" maxlength="9" placeholder="Enter dni">
      </div>
      <div class="form-group mt-1">
        <label for="password"><b>Password</b></label>
        <input type="password" class="form-control" name="password" minlength="8" placeholder="Enter password">
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
        <table class="table table-hover table-bordered text-center align-middle">
          <tr>
            <th>ID</th>
            <th>User email</th>
            <th>User DNI</th>
            <th>Password</th>
            <th>Privileges</th>
            <th>Actions</th>
          </tr>

          @foreach ($usuarios as $user)
            <tr>
              <td>{{ $user->id }}</td>
              <td>{{ $user->email }}</td>
              <td>{{ $user->dni }}</td>
              <td>{{ substr($user->password,0,8).'... (Hashed)' }}</td>
              <td>{{ $user->is_admin ? 'Admin' : 'Normal user' }}</td>

              <td>
                <a class="ms-1 btn btn-dark" href="{{ url('admin/users/edit') }}/{{ $user->id }}">Edit</a>
                <a class="btn btn-outline-danger"
                  href="{{ url('/admin/users/delete') }}/{{ $user->id }}">Delete</a>
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

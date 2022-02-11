</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>ListaUsuarios</title>
</head>

<body>
    {{-- Formulario para añadir usuarios --}}
    <form class="col-6 mx-auto" action="{{ url('usuarios/insert') }}" method="post">
        @csrf {{-- Token obligatorio para utilizar method="post" --}}
        <div class="form-group">
            <label for="dni">DNI</label>
            <input type="text" class="form-control" name="dni" placeholder="Enter DNI">
        </div>
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" placeholder="Enter name">
        </div>
        <div class="form-group">
            <label for="surname">Surname</label>
            <input type="text" class="form-control" name="surname" placeholder="Enter surname">
        </div>
        <div class="form-group">
            <label for="birthDate">birthDate</label>
            <input type="date" class="form-control" name="birth_date" placeholder="Enter birthDate">
        </div>
        <div class="form-group">
            <label for="centre">Centre_id</label>
            <input type="text" class="form-control" name="centre_id" placeholder="Enter center id">
        </div>
        <button type="submit" class="btn btn-primary mt-1">Insert</button>
    </form>
    <hr />

    <div class="row">
        <div class="col-10 mx-auto">
            <table class="table">
                <tr>
                    <th>ID</th>
                    <th>dni</th>
                    <th>Name</th>
                    <th>Surname</th>
                    <th>birthDate</th>
                    <th>Centre_id</th>
                </tr>

                @foreach($usuarios as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->dni}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->surname}}</td>
                    <td>{{$user->birth_date}}</td>
                    <td>{{$user->centre_id}}</td>
                    <td>
                        <a class="ms-1 btn btn-primary" href="{{ url('usuarios/edit') }}/{{ $user->id }}">Edit</a>
                        <a class="btn btn-danger" href="{{ url('usuarios/delete') }}/{{ $user->id }}">Delete</a>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</body>

</html>
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
  

  <div class="row">
    <div class="col-6 mx-auto">
    <table class="table">
        <tr>
            <th>ID</th>
            <th>User_id</th>
            <th>Entry</th>
            <th>Exit</th>
        </tr>

        @foreach($checks as $check)
            <tr>
                <td>{{$check->id}}</td>
                <td>{{$check->user_id}}</td>
                <td>{{$check->created_at}}</td>
                <td>{{$check->updated_at}}</td>
                <td>
                    <a class="ms-1 btn btn-primary" href="{{url('checks/delete')}}/{{ $checks->id}}" >Delete</a>
                </td>
            </tr>
        @endforeach
    </table>
    </div>
  </div>
</body>
</html>
    
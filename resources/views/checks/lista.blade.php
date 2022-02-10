<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <title>Lista checks</title>
</head>

<body>
{{-- Formulario para añadir fichajes --}}
  <hr/>
  <form class="col-6 mx-auto" action="{{ url('checks/insert') }}" method="post">
    
    @csrf {{-- Token obligatorio para utilizar method="post" --}}
    <div class="form-group">
      <label for="check_id">Check ID</label>
      <input type="text" class="form-control" name="check_id" placeholder="Enter check id">
    </div>
    <div class="form-group">
      <label for="user_id">user ID</label>
      <input type="text" class="form-control" name="user_id" placeholder="Enter user id">
    </div>
    <br>
    <button type="submit" class="btn btn-primary mt-1 text-align-center">Send</button>
  </form>
  <hr />
  

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
                  <a class="ms-1 btn btn-primary" href="{{url('checks/update')}}/{{ $check->id}}">EXIT</a>
                  <a class="ms-1 btn btn-danger" href="{{url('checks/delete')}}/{{ $check->id}}">Delete</a>
                  </td>
            </tr>
        @endforeach
    </table>
    </div>
  </div>
</body>
</html>
    
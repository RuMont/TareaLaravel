<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <title>Admin Checks</title>
  <style>
    body {
      overflow-x: hidden;
    }

  </style>
</head>

<body>
  @include('components/navbar')
  <p class="d-none">{{ date_default_timezone_set('Europe/Madrid') }}</p>
  <section class="p-5">
    <form class="col-6 d-flex flex-column mx-auto mb-5 border p-5" action="{{ url('/admin/checks/insert') }}" method="post">
      @csrf {{-- Token obligatorio para utilizar method="post" --}}
      <div class="form-group">
        <label for="check_id"><b>User ID</b></label>
        <select class="form-select" name="user_id">
          <option value="null" selected>Open this select menu</option>
          @foreach ($users as $user)
            <option value="{{ $user->id }}">{{ $user->email }}</option>
          @endforeach
        </select>
      </div>
      <div class="form-group mt-1">
        <label for="check_id"><b>Entry</b></label>
        <input type="datetime-local" class="form-control" name="entry_time" value="{{ str_replace(" ", "T", date('Y-m-d H:i')) }}">
      </div>
      <div class="form-group mt-1">
        <label for="check_id"><b>Exit</b></label>
        <input type="datetime-local" class="form-control" name="exit_time" value="{{ str_replace(" ", "T", date('Y-m-d H:i')) }}">
      </div>
      <div class="form-group mt-1">
        <label for="check_id"><b>Centre ID</b></label>
        <select class="form-select" name="centres_id">
            <option value="null" selected>Open this select menu</option>
            @foreach ($centres as $centre)
              <option value="{{ $centre->id }}">{{ $centre->name }}</option>
            @endforeach
          </select>
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
      <button type="submit" class="col-4 btn btn-outline-dark mt-3 text-align-center mx-auto">Insertar</button>
    </form>


    <div class="row">
      <div class="col-7 mx-auto">
        <table class="table table-hover table-bordered text-center align-middle">
          <tr>
            <th scope="col">ID</th>
            <th scope="col">User ID</th>
            <th scope="col">User email</th>
            <th scope="col">Entry</th>
            <th scope="col">Exit</th>
            <th scope="col">Centre ID</th>
            <th scope="col">Centre</th>
            <th scope="col">Actions</th>
          </tr>

          @foreach ($rows as $row)
            <tr>
              <td scope="row">{{ $row->id }}</td>
              <td>{{ $row->user_id }}</td>
              <td>{{ $row->user_email }}</td>
              <td>{{ $row->entry_time }}</td>
              <td>{{ $row->exit_time }}</td>
              <td>{{ $row->centres_id }}</td>
              <td>{{ $row->centre_name }}</td>
              <td>
                <a class="ms-1 btn btn-dark" href="{{ url('/admin/checks/edit') }}/{{ $row->id }}">Edit</a>
                <a class="ms-1 btn btn-outline-danger" href="{{ url('/admin/checks/delete') }}/{{ $row->id }}">Delete</a>
              </td>
            </tr>
          @endforeach
        </table>
      </div>
    </div>
  </section>
  @include('components/footer')
</body>

</html>

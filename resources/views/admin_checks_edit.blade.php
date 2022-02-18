<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <title>Admin Check Edit</title>
</head>

<body>
  @include('components/navbar')
  <h3 class="text-center mt-5">Updating: {{ $selectedCheck->entry_time }} to {{ $selectedCheck->exit_time }}</h3>
  <form class="col-6 d-flex flex-column mx-auto my-5 border p-5" action="{{ url('/admin/checks/update') }}/{{ $selectedCheck->id }}"
    method="post">
    @csrf {{-- Token obligatorio para utilizar method="post" --}}
    <div class="form-group">
      <label for="check_id"><b>User ID</b></label>
      <select class="form-select" name="user_id">
        <option value="{{ $selectedUser->id }}">{{ $selectedUser->email }}</option>
        @foreach ($users as $user)
          @if ($user->id != $selectedUser->id)
            <option value="{{ $user->id }}">{{ $user->email }}</option>
          @endif
        @endforeach
      </select>
    </div>
    <div class="form-group mt-1">
      <label for="check_id"><b>Entry</b></label>
      <input type="datetime-local" class="form-control" name="entry_time"
        value="{{ str_replace(' ', 'T', date('Y-m-d H:i', strtotime($selectedCheck->entry_time))) }}">
    </div>
    <div class="form-group mt-1">
      <label for="check_id"><b>Exit</b></label>
      <input type="datetime-local" class="form-control" name="exit_time"
        value="{{ str_replace(' ', 'T', date('Y-m-d H:i', strtotime($selectedCheck->exit_time))) }}">
    </div>
    <div class="form-group mt-1">
      <label for="check_id"><b>Centre ID</b></label>
      <select class="form-select" name="centres_id">
        <option value="{{ $selectedCentre->id }}">{{ $selectedCentre->name }}</option>
        @foreach ($centres as $centre)
          @if ($centre->id != $selectedCentre->id)
            <option value="{{ $centre->id }}">{{ $centre->name }}</option>
          @endif
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
    <button type="submit" class="col-4 btn btn-outline-dark mt-3 text-align-center mx-auto">Update</button>
  </form>
  <p class="invisible my-2">a</p>
  @include('components/footer')
</body>

</html>

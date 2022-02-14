<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <title>EXIT</title>
</head>

<body>
  <h1 class="text-center">EXIT {{$checks->user_id}}</h1>
  <form class="col-6 mx-auto" action="{{ url('checks/update') }}/{{ $checks->user_id }}" method="GET">
    <div class="form-group">
      <label for="exit_time">Exit</label>
      <div>
          hola
      </div>
    </div>
    
    <button type="submit" class="btn btn-primary mt-1">OK</button>
  </form>
</body>

</html>

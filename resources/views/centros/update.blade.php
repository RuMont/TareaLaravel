<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Update</title>
</head>

<body>
  <form action="{{url('centros/update')}}/{{$centro->id}}">
    <div class="form-group">
      <label for="city">city</label>
      <input type="text" class="form-control" name="city" placeholder="Enter city name" value="{{$centro->city}}">
    </div>
    <div class="form-group">
      <label for="name">name</label>
      <input type="text" class="form-control" name="name" placeholder="Enter name" value="{{$centro->name}}">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</body>

</html>

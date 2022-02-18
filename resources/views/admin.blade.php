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
  <title>Home</title>
  <style>
    body {
      overflow-x: hidden;
    }

  </style>
</head>

<body>
  @include('components/navbar')
  <section class="p-5">
    <div class="row">
      <div class="col-6 d-flex flex-column mx-auto p-5">
        <a href="{{ url('/admin/users') }}" class="btn btn-lg btn-outline-dark my-5">Manage users</a>
        <a href="{{ url('/admin/centros') }}" class="btn btn-lg btn-outline-dark my-5">Manage centros</a>
        <a href="{{ url('/admin/checks') }}" class="btn btn-lg btn-outline-dark my-5">Manage checks</a>
      </div>
    </div>
  </section>
  @include('components/footer')
</body>

</html>

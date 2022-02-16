<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
  </script>
  <title>Sign Up</title>
  <style>
    body {
      overflow-x: hidden;
    }

    .card-registration .select-input.form-control[readonly]:not([disabled]) {
      font-size: 1rem;
      line-height: 2.15;
      padding-left: .75em;
      padding-right: .75em;
    }

    .card-registration .select-arrow {
      top: 13px;
    }

  </style>
</head>

<body>
  @include('components/navbar')

  <section class="vh-100">
    <div class="container py-5 h-100">
      <div class="row justify-content-center align-items-center h-100">
        <div class="col-12 col-lg-9 col-xl-7">
          <div class="card shadow-lg card-registration" style="border-radius: 15px;">
            <div class="card-body p-4">
              <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Registration</h3>
              <form method="POST" action={{ url('usuarios/insert') }} >
                @csrf
                <div class="row">
                  <div class="col mb-4">

                    <div class="form-outline">
                      <input type="email" id="email" class="form-control form-control-lg" name="email" required/>
                      <label class="form-label" for="email">Email</label>
                    </div>

                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6 mb-4 pb-2">

                    <div class="form-outline">
                      <input type="text" id="dni" class="form-control form-control-lg" name="dni" maxlength="9" required/>
                      <label class="form-label" for="dni">DNI</label>
                    </div>

                  </div>
                  <div class="col-md-6 mb-4 pb-2">

                    <div class="form-outline">
                      <input type="password" id="password" class="form-control form-control-lg" name="password" minlength="8" required/>
                      <label class="form-label" for="password">Password</label>
                    </div>

                  </div>
                </div>

                @if (Session::has('errors'))
                  <div class="row">
                    <div class="col text-center">
                      <p class="text-danger">Error: Provided email has already been used</p>
                    </div>
                  </div>
                @endif

                <div class="mt-4 pt-2 text-center">
                  <input class="btn btn-dark btn-lg" type="submit" value="Submit" />
                </div>

              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  @include('components/footer')

</body>

</html>

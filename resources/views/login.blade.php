<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <title>Log In</title>
    <style>
        body {
            overflow-x: hidden;
        }
        
        .gradient-custom {
            background: #f093fb;
            background: -webkit-linear-gradient(to bottom right, rgba(240, 147, 251, 1), rgba(245, 87, 108, 1));
            background: linear-gradient(to bottom right, rgba(240, 147, 251, 1), rgba(245, 87, 108, 1))
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

<body style="background-color: lightblue">
    @include('components/navbar')
    <section class="vh-100 gradient-custom">
        <div class="container py-5 h-100">
            <div class="row justify-content-center align-items-center h-100">
                <div class="col-12 col-lg-9 col-xl-7">
                    <div class="card shadow-lg card-registration" style="border-radius: 15px;">
                        <div class="card-body p-4 p-md-5">
                            <div class="d-flex justify-content-between">
                                <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Log In</h3>
                                <p><a class="text-decoration-none text-dark" href="./register">Not registered?</a></p>
                            </div>
                            

                            <form>
                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <div class="form-outline">
                                            <input type="text" id="firstName" class="form-control form-control-lg"/>
                                            <label class="form-label" for="firstName">Email</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <div class="form-outline">
                                            <input type="password" id="lastName" class="form-control form-control-lg"/>
                                            <label class="form-label" for="lastName">Password</label>
                                        </div>
                                    </div>
                                </div>

                                @if (isset($_GET["error"]))
                                    <div class="row">
                                        <div class="col text-center">
                                            <p class="text-danger">Credentials are not valid</p>
                                        </div>
                                    </div>
                                @endif

                                <div class="mt-4 pt-2 text-center">
                                    <input class="btn btn-dark" type="submit" value="Log In"/>
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
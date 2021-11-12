<nav class="sticky-top navbar navbar-expand-lg navbar-light" style="background-color: lightblue">
    <div class="container-fluid">
        <a class="navbar-brand" href="#"><img src="../resources/img/square.png" alt="Logo" width="32" height="32"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                @if (Route::currentRouteName() != 'home')
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="./home">Home</a>
                    </li>
                @endif
                <li class="nav-item">
                    <a class="nav-link" href="javascript:void(0);">About</a>
                </li>
            </ul>
        </div>
        <div class="d-flex">
            @auth
                <a href="./edittable" class="btn btn-outline-dark">Table</a>
            @else
                @if (Route::currentRouteName() != 'register')
                    <a href="./login" class="btn btn-outline-dark">Sign In</a>
                @else
                    <a class="visually-hidden btn btn-outline-dark">Sign In</a>
                @endif
            @endauth
        </div>
    </div>
</nav>
<section class="vh-100 gradient-custom">
    <div class="container py-5 h-100">
        <div class="row justify-content-center align-items-center h-100">
            <div class="col-12 col-lg-9 col-xl-7">
                <div class="card shadow-lg card-registration" style="border-radius: 15px;">
                    <div class="card-body p-4 p-md-5">
                        <div class="d-flex justify-content-between">
                            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Check In/Out</h3>
                        </div>
                        

                        <form action="/home" method="POST">
                            <div class="row justify-content-center">
                                <div class="col-md-8 mb-5">
                                    <select class="form-select" aria-label="Default select example">
                                        <option selected>Check In</option>
                                        <option value="1">Check Out</option>
                                      </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <div class="form-outline">
                                        <input type="text" value="example@gmail.com" id="firstName" class="form-control-plaintext mb-2" disabled/>
                                        <label class="form-label" for="firstName">Email</label>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="form-outline">
                                        <input type="time" id="lastName" class="form-control form-control-lg"/>
                                        <label class="form-label" for="lastName">Timestamp</label>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-4 pt-2 text-center">
                                <input class="btn btn-dark" type="submit" value="Check"/>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="vh-100">
  <p class="d-none">{{ date_default_timezone_set('Europe/Madrid') }}</p>
  <div class="container py-5 h-100">
    <div class="row justify-content-center align-items-center h-100">
      <div class="col-12 col-lg-9 col-xl-7">
        <div class="card shadow-lg card-registration" style="border-radius: 15px;">
          <div class="card-body p-4 p-md-5">

            <div class="d-flex justify-content-between">
              <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Check In/Out</h3>
            </div>

            <form action="{{ url('/checks/insert') }}" method="POST">
              @csrf
              <div class="row">

                <div class="col-md-4 mb-4">
                  <div class="form-outline">
                    <input type="text" value="{{ Auth::user()->email }}" id="email"
                      class="form-control-plaintext mb-2" disabled />
                    <label class="form-label" for="email">Email</label>
                  </div>
                </div>

                <div class="col-md-4 mb-4">
                  <select class="form-select mb-2" name="checktype">
                    <option value="entry">Entry</option>
                    <option value="exit">Exit</option>
                  </select>
                  <label class="form-label" for="checktype">Check In/Out</label>
                </div>

                <div class="col-md-4 mb-4">
                  <select class="form-select mb-2" name="centres">
                    <option value="1">medac 1</option>
                    <option value="2">medac 2</option>
                  </select>
                  <label class="form-label" for="centres">Centres</label>
                </div>
              </div>

              <div class="row">

                <div class="col-md-6 mb-4">
                  <div class="form-outline">
                    <input type="time" value="{{ date('H:i') }}" id="entry" class="form-control form-control-lg" />
                    <label class="form-label" for="entry">Entry</label>
                  </div>
                </div>

                <div class="col-md-6 mb-4">
                  <div class="form-outline">
                    <input type="time" value="{{ date('H:i') }}" id="exit" class="form-control form-control-lg" />
                    <label class="form-label" for="exit">Exit</label>
                  </div>
                </div>
              </div>

              <div class="mt-4 pt-2 text-center">
                <input class="btn btn-dark" type="submit" value="Check" />
              </div>

            </form>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>

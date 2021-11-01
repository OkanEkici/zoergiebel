@include('partials.home.promo-banner-small')
    <!-- CONTENT -->
    <section class="pt-7 pb-12 bg-light">
      <div class="container">
        <div class="row">
          <div class="col-12 text-center">

            <!-- Heading -->
            <h3 class="mb-10">Passwort zurücksetzen</h3>

          </div>
        </div>
        <div class="row">
          <div class="col-12 col-md-3">

            <!-- Nav -->
            <nav class="mb-10 mb-md-0">
              <div class="list-group list-group-sm list-group-strong list-group-flush-x">
                <a class="list-group-item list-group-item-action dropright-toggle" href="{{ route('register') }}">
                  Sie haben noch keinen Account?<br>
									Registrieren
                </a>
              </div>
            </nav>

          </div>
          <div class="col-12 col-md-9 col-lg-8 offset-lg-1">

						@if (session('status'))
								<div class="alert alert-success" role="alert">
										{{ session('status') }}
								</div>
						@endif

            <!-- Form -->
            <form method="post" action="{{ route('password.email') }}">
							@csrf
              
							<div class="form-group row">
									<label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Addresse') }}</label>

									<div class="col-md-6">
											<input id="email" type="email" class="form-control form-control-sm @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

											@error('email')
													<span class="invalid-feedback" role="alert">
															<strong>{{ $message }}</strong>
													</span>
											@enderror
									</div>
							</div>
              <div class="form-group row mb-3">
                      <div class="g-recaptcha col-md-6 offset-md-4" id="feedback-recaptcha" data-sitekey="{{ env('GOOGLE_RECAPTCHA_KEY')  }}"></div>
                    </div>
							<div class="form-group row mb-0">
									<div class="col-md-6 offset-md-4">
											<button type="submit" class="btn btn-primary">
													Link zum Zurücksetzen senden
											</button>
									</div>
							</div>
							
            </form>

          </div>
        </div>
      </div>
    </section>

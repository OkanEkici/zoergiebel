@include('partials.home.promo-banner-small')
    <!-- CONTENT -->
    <section class="pt-7 pb-12 bg-white">
      <div class="container">
        <div class="row">
          <div class="col-12 text-center">

            <!-- Heading -->
            <h3 class="mb-10">Login</h3>

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

            <!-- Form -->
            <form method="post" action="{{ route('login') }}">
							@csrf
              
							<input type="hidden" name="redirect_to" value="{{ $redirect_to }}">
							
              <div class="form-group row">
                <div class="col-12">

                  <!-- Email -->
                  <div class="form-group">
										<label for="email">E-Mail Adresse *</label>
										
										<input id="email" type="email" class="form-control form-control-sm @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="on" autofocus placeholder="E-Mail Adresse *">
										
										@error('email')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
										@enderror
                  </div>

                </div>
              </div>
							<div class="form-group row">
                <div class="col-12">

                  <!-- Password -->
                  <div class="form-group">
                    <label for="password">Passwort *</label>
                    
										<input id="password" type="password" class="form-control form-control-sm @error('password') is-invalid @enderror" name="password" required autocomplete="off" placeholder="Passwort *">

										@error('password')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
										@enderror
                  </div>

                </div>
              </div>
							<div class="form-group row">
									<div class="col-12">
											<div class="form-check">
													<input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

													<label class="form-check-label" for="remember">
															Eingeloggt bleiben
													</label>
											</div>
									</div>
							</div>
							<div class="form-group row mb-0">
									<div class="col-12">
											<button type="submit" class="btn btn-primary">
													Login
											</button>

											@if (Route::has('password.request'))
													<a class="btn btn-link" href="{{ route('password.request') }}">
															Haben Sie Ihr Passwort vergessen?
													</a>
											@endif
									</div>
							</div>
            </form>

          </div>
        </div>
      </div>
    </section>

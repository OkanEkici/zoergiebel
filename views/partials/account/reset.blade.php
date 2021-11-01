
    <!-- CONTENT -->
    <section class="pt-7 pb-12">
      <div class="container">
        <div class="row">
          <div class="col-12 text-center">

            <!-- Heading -->
            <h3 class="mb-10">{{ __('Reset Password') }}</h3>

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
                <a class="list-group-item list-group-item-action dropright-toggle" href="{{ route('login') }}">
                  zum Login
                </a>
              </div>
            </nav>

          </div>
          <div class="col-12 col-md-9 col-lg-8 offset-lg-1">

            <!-- Form -->
            <form method="post" action="{{ route('password.update') }}">
							@csrf
              
							<input type="hidden" name="token" value="{{ $token }}">
							
							<div class="form-group row">
									<label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Addresse') }}</label>

									<div class="col-md-6">
											<input id="email" type="email" class="form-control form-control-sm @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

											@error('email')
													<span class="invalid-feedback" role="alert">
															<strong>{{ $message }}</strong>
													</span>
											@enderror
									</div>
							</div>

							<div class="form-group row">
									<label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

									<div class="col-md-6">
											<input id="password" type="password" class="form-control form-control-sm @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

											@error('password')
													<span class="invalid-feedback" role="alert">
															<strong>{{ $message }}</strong>
													</span>
											@enderror
									</div>
							</div>

							<div class="form-group row">
									<label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

									<div class="col-md-6">
											<input id="password-confirm" type="password" class="form-control form-control-sm" name="password_confirmation" required autocomplete="new-password">
									</div>
							</div>

							<div class="form-group row mb-0">
									<div class="col-md-6 offset-md-4">
											<button type="submit" class="btn btn-primary">
													{{ __('Reset Password') }}
											</button>
									</div>
							</div>
							
            </form>

          </div>
        </div>
      </div>
    </section>

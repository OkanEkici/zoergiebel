
    <!-- CONTENT -->
    <section class="pt-7 pb-12">
      <div class="container">
        <div class="row">
          <div class="col-12 text-center">

            <!-- Heading -->
            <h3 class="mb-10">{{ __('Confirm Password') }}</h3>

          </div>
        </div>
        <div class="row">
          <div class="col-12 col-md-3">

            <!-- Nav -->
            <nav class="mb-10 mb-md-0">
              <div class="list-group list-group-sm list-group-strong list-group-flush-x">
                <a class="list-group-item list-group-item-action dropright-toggle" href="{{ route('login') }}">
                  zurück zum Account
                </a>
              </div>
            </nav>

          </div>
          <div class="col-12 col-md-9 col-lg-8 offset-lg-1">
					
						{{ __('Please confirm your password before continuing.') }}

            <!-- Form -->
            <form method="post" action="{{ route('password.confirm') }}">
							@csrf
              
							<div class="form-group row">
									<label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

									<div class="col-md-6">
											<input id="password" type="password" class="form-control form-control-sm @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

											@error('password')
													<span class="invalid-feedback" role="alert">
															<strong>{{ $message }}</strong>
													</span>
											@enderror
									</div>
							</div>

							<div class="form-group row mb-0">
									<div class="col-md-8 offset-md-4">
											<button type="submit" class="btn btn-dark">
													{{ __('Confirm Password') }}
											</button>

											@if (Route::has('password.request'))
													<a class="btn btn-link" href="{{ route('password.request') }}">
															{{ __('Forgot Your Password?') }}
													</a>
											@endif
									</div>
							</div>
							
            </form>

          </div>
        </div>
      </div>
    </section>

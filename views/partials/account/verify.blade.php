
    <!-- CONTENT -->
    <section class="pt-7 pb-12">
      <div class="container">
        <div class="row">
          <div class="col-12 text-center">

            <!-- Heading -->
            <h3 class="mb-10">{{ __('Bestätigen: E-Mail Addresse') }}</h3>

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

						@if (session('resent'))
								<div class="alert alert-success" role="alert">
										{{ __('A fresh verification link has been sent to your email address.') }}
								</div>
						@endif

						{{ __('Before proceeding, please check your email for a verification link.') }}
						{{ __('If you did not receive the email') }},
						<form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
            <div class="mb-3">
                    <div class="g-recaptcha" id="feedback-recaptcha" data-sitekey="{{ env('GOOGLE_RECAPTCHA_KEY')  }}"></div>
                  </div>
								@csrf
								<button type="submit" class="btn btn-dark">{{ __('click here to request another') }}</button>.
						</form>
						
          </div>
        </div>
      </div>
    </section>

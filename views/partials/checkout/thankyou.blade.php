
    <!-- CONTENT -->
    <section class="py-12">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-12 col-md-10 col-lg-8 col-xl-6 text-center">

						@if (session('status_thankyou'))
								<div class="alert alert-success" role="alert">
										{{ session('status_thankyou') }}
								</div>
						@endif

            <!-- Icon -->
            <div class="mb-7 font-size-h1">❤️</div>

            <!-- Heading -->
            <h2 class="mb-5">Ihre Bestellung ist abgeschlossen!</h2>

            <!-- Text -->
            <p class="mb-7 text-gray-500">
							@if (!Auth::user())
								
								Ihre Bestellung ist eingegangen. Details senden wir Ihnen per Mail.
								<br>
								<br>
								
								<!-- Button -->
								<a class="btn btn-primary" href="{{ route('home') }}">
									weiter stöbern
								</a>
								
							@else
								
							Ihre Bestellung ist eingegangen. Details können Sie in Ihrem Account sehen.
								<br>
								<br>
								
								<!-- Button -->
								<a class="btn btn-primary" href="{{ route('account.orders') }}">
									Meine Bestellungen ansehen
								</a>
								
							@endif
            </p>

          </div>
        </div>
      </div>
    </section>

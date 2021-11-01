
    <!-- CONTENT -->
    <section class="py-12">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-12 col-md-10 col-lg-8 col-xl-6 text-center">

						@if (session('status_pay'))
								<div class="alert alert-success" role="alert">
										{{ session('status_pay') }}
								</div>
						@endif

            <form method="post" action="{{ route('checkout.thankyou', $order->id) }}">
							@csrf
							
							<pre>PAYMENT tbd</pre>
							<pre>{{ $order->fk_shop_config_payment_id }}</pre>
							<br>
							<br>
							<br>
							
							<!-- Button -->
							<button class="btn btn-dark" type="submit">weiter</button>
							
						</form>
						
          </div>
        </div>
      </div>
    </section>

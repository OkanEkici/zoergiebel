
    <!-- CONTENT -->
    <section class="pt-7 pb-12 bg-light">
      <div class="container">
        <div class="row">
          <div class="col-12 text-center">

            <!-- Heading -->
            <h3 class="mb-10">Bestellung {{ $order_id }}</h3>

          </div>
        </div>
        <div class="row">
          <div class="col-12 col-md-3">

						@include('partials.account.include.loggedin_sidenav')

          </div>
          <div class="col-12 col-md-9 col-lg-8">

						@if (session('status'))
								<div class="alert alert-success" role="alert">
										{{ session('status') }}
								</div>
						@endif

            <!-- Form -->
            <div class="form_replace">
							
							<!-- Order -->
							<div class="card card-lg mb-5 border">
								<div class="card-body pb-0">

									<!-- Info -->
									<div class="card card-sm">
										<div class="card-body bg-light">
											<div class="row">
												<div class="col-6 col-lg-3">

													<!-- Heading -->
													<h6 class="heading-xxxs text-muted">Bestell Nr:</h6>

													<!-- Text -->
													<p class="mb-lg-0 font-size-sm font-weight-bold">
													{{ $order->id }}
													</p>

												</div>
												<div class="col-6 col-lg-3">

													<!-- Heading -->
													<h6 class="heading-xxxs text-muted">Bestelldatum:</h6>

													<!-- Text -->
													<p class="mb-lg-0 font-size-sm font-weight-bold">
														<time datetime="2019-10-01">
															{{ $order->updated_at }}
														</time>
													</p>

												</div>
												<div class="col-6 col-lg-3">

													<!-- Heading -->
													<h6 class="heading-xxxs text-muted">Status:</h6>

													<!-- Text -->
													<p class="mb-0 font-size-sm font-weight-bold">
														{{ $order->description }}
													</p>

												</div>
												<div class="col-6 col-lg-3">

													<!-- Heading -->
													<h6 class="heading-xxxs text-muted">Preis:</h6>

													<!-- Text -->
													<p class="mb-0 font-size-sm font-weight-bold">
														{{ number_format($order_amount, 2) }} €
													</p>

												</div>
											</div>
										</div>
									</div>

								</div>
								<div class="card-footer">
									<div class="row align-items-center">
										<div class="col-12">
											<div class="form-row mb-4 mb-lg-0">
												
												@foreach ($order_articles as $article)
												
													<div class="col-3">

														<a href="{{ route('shop.index').'/'.$article->slug }}">
															<!-- Image -->
															<div class="embed-responsive embed-responsive-1by1 bg-cover" style="background-image: url(/assets/img/products/product-5.jpg);"></div>
														</a>
														
													</div>
												
												@endforeach
												
											</div>
										</div>
									</div>
								</div>
							</div>
	
            </div>
						
          </div>
        </div>
      </div>
    </section>

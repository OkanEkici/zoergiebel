
    <!-- CONTENT -->
    <section class="pt-7 pb-12 bg-light">
      <div class="container">
        <div class="row">
          <div class="col-12 text-center">

            <!-- Heading -->
            <h3 class="mb-10">Bestellungen</h3>

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
							
							@forelse ($orders as $order)
								
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
																{{ $order->created_at }}
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
															{{ number_format($order->amount, 2) }} €
														</p>

													</div>
												</div>
											</div>
										</div>

									</div>
									<div class="card-footer">
										<div class="row align-items-center">
											<div class="col-12 col-lg-6">
												<div class="form-row mb-4 mb-lg-0">
													
													@php
													$number = 0;
													@endphp
													
													@forelse ($order->articles as $article)
													
														<div class="col-3">

															<!-- Image -->
															<div class="embed-responsive embed-responsive-1by1 bg-cover" style="background-image: url(/assets/img/products/product-5.jpg);"></div>

														</div>
														
														@php
														$number++;
														@endphp
														
														@if ($number == 3)
																@break
														@endif
													
													@empty
													
														<div class="col">

															<p>keine Artikel</p>

														</div>
													
													@endforelse
													
													@if (count($order->articles) > 3)
													
													<div class="col-3">

														<!-- Image -->
														<div class="embed-responsive embed-responsive-1by1 bg-light">
															<a class="embed-responsive-item embed-responsive-item-text text-reset" href="/account/order/{{ $order->id }}/view">
																<div class="font-size-xxs font-weight-bold">
																+ {{ count($order->articles) - $number }} <br> more
																</div>
															</a>
														</div>

													</div>
													
													@endif
													
												</div>
											</div>
											<div class="col-12 col-lg-6">
												<div class="form-row">
													<div class="col-12">

														<!-- Button -->
														<a class="btn btn-sm btn-block btn-outline-dark" href="/account/order/{{ $order->id }}/view">
															Detailansicht
														</a>

													</div>

												</div>

											</div>
										</div>
									</div>
								</div>
							
							@empty
							
								<p>Sie haben noch keine Bestellungen</p>
							
							@endforelse
							
							@if (count($orders))
								
								<!-- Pagination -->
								<nav class="d-flex justify-content-center justify-content-md-end mt-10">
									
									{{ $orders->links() }}
									
								</nav>
								
							@endif
							
            </div>

          </div>
        </div>
      </div>
    </section>

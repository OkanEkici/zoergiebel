
    <!-- CONTENT -->
    <section class="pt-7 pb-12 bg-light">
      <div class="container">
        <div class="row">
          <div class="col-12 text-center">

            <!-- Heading -->
            <h3 class="mb-10">Adressen</h3>

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
							
							@forelse ($addresses as $address)
								
								<div class="card card-lg mb-5 border">
									<div class="card-body p-0">

										<!-- Info -->
										<div class="card card-sm">
											<div class="card-body bg-light">
												<div class="row">
													<div class="col-6">

														<!-- Heading -->
														<h6 class="heading-xxxs text-muted">Nummer:</h6>

														<!-- Text -->
														<p class="mb-lg-0 font-size-sm font-weight-bold">
															{{ $address->id }}
														</p>

														<br>
														<h6 class="heading-xxxs text-muted">Addresse:</h6>

														<p class="mb-lg-0 font-size-sm font-weight-bold">
															{{ $address->first_name }} {{ $address->last_name }}<br>
															{{ $address->street }}<br>
															{{ $address->additional_address_info }}<br>
															{{ $address->postcode }}, {{ $address->city }}<br>
															{{ $address->county }}<br>
															{{ $address->country }}
														</p>
														
													</div>
													<div class="col-6">

														<!-- Heading -->
														<h6 class="heading-xxxs text-muted">Name:</h6>

														<!-- Text -->
														<p class="mb-lg-0 font-size-sm font-weight-bold">
															<time datetime="2019-10-01">
																{{ $address->name }}
															</time>
														</p>

														<br>
														<h6 class="heading-xxxs text-muted">&nbsp;</h6>

														<!-- Button -->
														<a class="btn btn-sm btn-block btn-outline-dark" href="/account/address/{{ $address->id }}">
															Bearbeiten
														</a>
														
													</div>
												</div>
											</div>
										</div>

									</div>
								</div>
							
							@empty
							
								<p>Sie haben noch keine Adressen</p>
							
							@endforelse
							
            </div>

						<div class="card card-lg mb-5 border">
							<div class="card-body p-0">

								<!-- Info -->
								<div class="card card-sm">
									<div class="card-body bg-light">
										<div class="row">
											<div class="col-6">
												&nbsp;
											</div>
											<div class="col-6">

												<!-- Button -->
												<a class="btn btn-sm btn-block btn-outline-dark" href="/account/address/new">
													Neue Adresse hinzufügen
												</a>
												
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

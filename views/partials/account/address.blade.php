
    <!-- CONTENT -->
    <section class="pt-7 pb-12 bg-light">
      <div class="container">
        <div class="row">
          <div class="col-12 text-center">

            <!-- Heading -->
						@if ($address->id)
            <h3 class="mb-10">Adresse {{ $address->id }} von {{ Auth::user()->name }}</h3>
						@else
            <h3 class="mb-10">neue Adresse von {{ Auth::user()->name }}</h3>
						@endif

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
						@if ($address->id)
            <form method="post" action="{{ route('account.address_update', $address->id) }}">
						@else
						<form method="post" action="{{ route('account.address_create') }}">
						@endif
							@csrf
						
							<div class="card card-lg mb-5 border">
								<div class="card-body p-0">

									<!-- Info -->
									<div class="card card-sm">
										<div class="card-body bg-light">
											<div class="row">
												<div class="col-12">

													@if ($address->id)
															
														<!-- Heading -->
														<h6 class="heading-xxxs text-muted">Nummer:</h6>

														<!-- Text -->
														<p class="mb-lg-0 font-size-sm font-weight-bold">
															{{ $address->id }}
														</p>

														<hr>
													@endif
													
												</div>
												<div class="col-12">
													<div class="row">
													
														<div class="col-12">

															<div class="form-group">
																<label for="gender">Anrede *</label>
																
																<div class="btn-group-toggle" data-toggle="buttons">
																	<label class="btn btn-sm btn-outline-border">
																		<input type="radio" name="gender" value="male" @if ($address->gender == "male") checked @endif required> Herr
																	</label>
																	<label class="btn btn-sm btn-outline-border active">
																		<input type="radio" name="gender" value="woman" @if ($address->gender == "woman") checked @endif required> Frau
																	</label>
																</div>
																
															</div>
															
														</div>
														<div class="col-12 col-md-6">

															<div class="form-group">
																<label for="first_name">Vorname</label>
																
																<input id="first_name" type="text" class="form-control form-control-sm @error('first_name') is-invalid @enderror" name="first_name" value="{{ $address->first_name }}" autocomplete="on" placeholder="Vorname" required>

																@error('first_name')
																	<span class="invalid-feedback" role="alert">
																		<strong>{{ $message }}</strong>
																	</span>
																@enderror
															</div>

														</div>
														<div class="col-12 col-md-6">

															<div class="form-group">
																<label for="last_name">Nachname</label>
																
																<input id="last_name" type="text" class="form-control form-control-sm @error('last_name') is-invalid @enderror" name="last_name" value="{{ $address->last_name }}" autocomplete="on" placeholder="Nachname">

																@error('last_name')
																	<span class="invalid-feedback" role="alert">
																		<strong>{{ $message }}</strong>
																	</span>
																@enderror
															</div>

														</div>
														<div class="col-12 col-md-6">

															<div class="form-group">
																<label for="street">Strasse</label>
																
																<input id="street" type="text" class="form-control form-control-sm @error('street') is-invalid @enderror" name="street" value="{{ $address->street }}" autocomplete="on" placeholder="Strasse" required>

																@error('street')
																	<span class="invalid-feedback" role="alert">
																		<strong>{{ $message }}</strong>
																	</span>
																@enderror
															</div>

														</div>
														<div class="col-12 col-md-6">

															<div class="form-group">
																<label for="additional_address_info">Adress-Zusatz</label>
																
																<input id="additional_address_info" type="text" class="form-control form-control-sm @error('additional_address_info') is-invalid @enderror" name="additional_address_info" value="{{ $address->additional_address_info }}" autocomplete="on" placeholder="Adress-Zusatz">

																@error('additional_address_info')
																	<span class="invalid-feedback" role="alert">
																		<strong>{{ $message }}</strong>
																	</span>
																@enderror
															</div>

														</div>
														<div class="col-12 col-md-6">

															<div class="form-group">
																<label for="country">Land</label>
																
																<input id="country" type="text" class="form-control form-control-sm @error('country') is-invalid @enderror" name="country" value="{{ $address->country }}" autocomplete="on" placeholder="Land" required>

																@error('country')
																	<span class="invalid-feedback" role="alert">
																		<strong>{{ $message }}</strong>
																	</span>
																@enderror
															</div>

														</div>
														<div class="col-12 col-md-6">
															
															<div class="form-group">
																<label for="postcode">PLZ</label>
																
																<input id="postcode" type="text" class="form-control form-control-sm @error('postcode') is-invalid @enderror" name="postcode" value="{{ $address->postcode }}" autocomplete="on" placeholder="PLZ" required>

																@error('postcode')
																	<span class="invalid-feedback" role="alert">
																		<strong>{{ $message }}</strong>
																	</span>
																@enderror
															</div>

														</div>
														<div class="col-12 col-md-6">

															<div class="form-group">
																<label for="city">Stadt</label>
																
																<input id="city" type="text" class="form-control form-control-sm @error('city') is-invalid @enderror" name="city" value="{{ $address->city }}" autocomplete="on" placeholder="Stadt" required>

																@error('city')
																	<span class="invalid-feedback" role="alert">
																		<strong>{{ $message }}</strong>
																	</span>
																@enderror
															</div>

														</div>
														<div class="col-12 col-md-6">
															
															<div class="form-group">
																<label for="county">Bundesland</label>
																
																<input id="county" type="text" class="form-control form-control-sm @error('county') is-invalid @enderror" name="county" value="{{ $address->county }}" autocomplete="on" placeholder="Bundesland" required>

																@error('county')
																	<span class="invalid-feedback" role="alert">
																		<strong>{{ $message }}</strong>
																	</span>
																@enderror
															</div>

														</div>
														<div class="col-12">
															
															<div class="row">
																<div class="col-12 col-md-6">
																	
																	<!-- Button -->
																	<button class="btn btn-dark" type="submit">Speichern</button>
																	
																</div>
																<div class="col-12 col-md-6">
																	
																	@if ($address->id)
																			
																	<!-- Button -->
																	<button class="btn btn-danger" type="button" onclick="event.preventDefault(); if (confirm('Wirklich Löschen?')) { document.getElementById('delete-form').submit(); }">Löschen</button>
																	
																	@endif
																	
																</div>
															</div>
															
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>

								</div>
							</div>
							
            </form>

						<form id="delete-form" action="{{ route('account.address_delete', $address->id) }}" method="POST" style="display: none;">
								@csrf
						</form>
          </div>
        </div>
      </div>
    </section>

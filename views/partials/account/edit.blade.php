
    <!-- CONTENT -->
    <section class="pt-7 pb-12 bg-light">
      <div class="container">
        <div class="row">
          <div class="col-12 text-center">

            <!-- Heading -->
            <h3 class="mb-10">Daten bearbeiten</h3>

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
            <form method="post" action="{{ route('account.update') }}">
							@csrf
							
							<input type="hidden" name="name" value="">
							
              <div class="row">
                <div class="col-12">

                  <div class="form-group">
                    <label for="gender">Anrede *</label>
                    
                    <div class="btn-group-toggle" data-toggle="buttons">
                      <label class="btn btn-sm btn-outline-border">
                        <input type="radio" name="gender" value="male" @if (Auth::user()->gender == "male") checked @endif> Herr
                      </label>
                      <label class="btn btn-sm btn-outline-border active">
                        <input type="radio" name="gender" value="woman" @if (Auth::user()->gender == "woman") checked @endif> Frau
                      </label>
                    </div>
										
                  </div>
									
                </div>
                <div class="col-12 col-md-6">
									
                  <div class="form-group">
                    <label for="first_name">Vorname</label>
										
										<input id="first_name" type="text" class="form-control form-control-sm @error('first_name') is-invalid @enderror" name="first_name" value="{{ Auth::user()->first_name }}" autocomplete="on" placeholder="Vorname" required>

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
										
										<input id="last_name" type="text" class="form-control form-control-sm @error('last_name') is-invalid @enderror" name="last_name" value="{{ Auth::user()->last_name }}" autocomplete="on" placeholder="Nachname" required>

										@error('last_name')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
										@enderror
                  </div>

                </div>
                <div class="col-12 col-md-6">
									
                  <div class="form-group">
                    <label for="phone_number">Telefonnummer</label>
										
										<input id="phone_number" type="tel" class="form-control form-control-sm @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ Auth::user()->phone_number }}" autocomplete="on" placeholder="Telefonnummer">

										@error('phone_number')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
										@enderror
                  </div>

                </div>
                <div class="col-12 col-md-6">

                  <div class="form-group">
                    <label for="street">Strasse</label>
										
										<input id="street" type="text" class="form-control form-control-sm @error('street') is-invalid @enderror" name="street" value="{{ Auth::user()->street }}" autocomplete="on" placeholder="Strasse" required>

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
										
										<input id="additional_address_info" type="text" class="form-control form-control-sm @error('additional_address_info') is-invalid @enderror" name="additional_address_info" value="{{ Auth::user()->additional_address_info }}" autocomplete="on" placeholder="Adress-Zusatz">

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
										
										<input id="country" type="text" class="form-control form-control-sm @error('country') is-invalid @enderror" name="country" value="{{ Auth::user()->country }}" autocomplete="on" placeholder="Land" required>

										@error('country')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
										@enderror
                  </div>

                </div>
                <div class="col-12 col-md-4">
									
                  <div class="form-group">
                    <label for="postcode">PLZ</label>
										
										<input id="postcode" type="text" class="form-control form-control-sm @error('postcode') is-invalid @enderror" name="postcode" value="{{ Auth::user()->postcode }}" autocomplete="on" placeholder="PLZ" required>

										@error('postcode')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
										@enderror
                  </div>

                </div>
                <div class="col-12 col-md-4">

                  <div class="form-group">
                    <label for="city">Stadt</label>
										
										<input id="city" type="text" class="form-control form-control-sm @error('city') is-invalid @enderror" name="city" value="{{ Auth::user()->city }}" autocomplete="on" placeholder="Stadt" required>

										@error('city')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
										@enderror
                  </div>

                </div>
                <div class="col-12 col-md-4">
									
                  <div class="form-group">
                    <label for="county">Bundesland</label>
										
										<input id="county" type="text" class="form-control form-control-sm @error('county') is-invalid @enderror" name="county" value="{{ Auth::user()->county }}" autocomplete="on" placeholder="Bundesland" required>

										@error('county')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
										@enderror
                  </div>

                </div>
                <div class="col-12">

                  <!-- Button -->
                  <button class="btn btn-primary" type="submit">Speichern</button>

                </div>
              </div>
							
            </form>

          </div>
        </div>
      </div>
    </section>

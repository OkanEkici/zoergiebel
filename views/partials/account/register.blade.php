@include('partials.home.promo-banner-small')
    <!-- CONTENT -->
    <section class="pt-7 pb-12 bg-light">
      <div class="container">
        <div class="row">
          <div class="col-12 text-center">

            <!-- Heading -->
            <h3 class="mb-10">Registrieren</h3>

          </div>
        </div>
        <div class="row">
          <div class="col-12 col-md-3">

            <!-- Nav -->
            <nav class="mb-10 mb-md-0">
              <div class="list-group list-group-sm list-group-strong list-group-flush-x">
                <a class="list-group-item list-group-item-action dropright-toggle" href="{{ route('login') }}">
                  Sie haben bereits einen Account?<br>
									Einloggen
                </a>
              </div>
            </nav>

          </div>
          <div class="col-12 col-md-9 col-lg-8 offset-lg-1">

            <!-- Form -->
            <form method="post" action="{{ route('register') }}">
							@csrf

							<input type="hidden" name="name" value="">

              <div class="row">
                <div class="col-12 col-md-6">

                  <div class="form-group">
                    <label for="organisation_or_person">Typ</label>

                    <div class="btn-group-toggle" data-toggle="buttons">
                      <label class="btn btn-sm btn-outline-border">
                        <input type="radio" name="organisation_or_person" value="person" checked onclick="document.getElementById('company_name').style.display = 'none';"> Person
                      </label>
                      <label class="btn btn-sm btn-outline-border active">
                        <input type="radio" name="organisation_or_person" value="organisation" onclick="document.getElementById('company_name').style.display = 'block';"> Firma
                      </label>
                    </div>

										@error('organisation_or_person')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
										@enderror
                  </div>

                </div>
                <div class="col-12 col-md-6">

                  <div class="form-group" id="company_name" style="display:none;">
                    <label for="organisation_name">Firmenname</label>

										<input id="organisation_name" type="text" class="form-control form-control-sm @error('organisation_name') is-invalid @enderror" name="organisation_name" value="{{ old('organisation_name') }}" autocomplete="on" placeholder="Firmenname">

										@error('organisation_name')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
										@enderror
                  </div>

                </div>
                <div class="col-12">

                  <div class="form-group">
                    <label for="email">E-Mail Adresse *</label>

										<input id="email" type="email" class="form-control form-control-sm @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="on" required placeholder="E-Mail" autofocus>

										@error('email')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
										@enderror
                  </div>

                </div>
                <div class="col-md-6">

                  <div class="form-group">
                    <label for="password">Passwort *</label>

										<input id="password" type="password" class="form-control form-control-sm @error('password') is-invalid @enderror" name="password" required autocomplete="off" placeholder="Passwort *">

										@error('password')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
										@enderror
                  </div>

                </div>
                <div class="col-md-6">

                  <div class="form-group">
                    <label for="password-confirm">Passwort Bestätigung *</label>

										<input id="password-confirm" type="password" class="form-control form-control-sm" name="password_confirmation" required autocomplete="off" placeholder="Passwort *">

                  </div>

                </div>
                <div class="col-12">
									<hr>
								</div>
                <div class="col-12">

                  <div class="form-group">
                    <label for="gender">Anrede *</label>

                    <div class="btn-group-toggle" data-toggle="buttons">
                      <label class="btn btn-sm btn-outline-border">
                        <input type="radio" name="gender" value="male"> Herr
                      </label>
                      <label class="btn btn-sm btn-outline-border active">
                        <input type="radio" name="gender" value="woman" checked> Frau
                      </label>
                    </div>

                  </div>

                </div>
                <div class="col-12 col-md-6">

                  <div class="form-group">
                    <label for="first_name">Vorname</label>

										<input id="first_name" type="text" class="form-control form-control-sm @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" autocomplete="on" placeholder="Vorname" required>

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

										<input id="last_name" type="text" class="form-control form-control-sm @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" autocomplete="on" placeholder="Nachname" required>

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

										<input id="phone_number" type="tel" class="form-control form-control-sm @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ old('phone_number') }}" autocomplete="on" placeholder="Telefonnummer">

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

										<input id="street" type="text" class="form-control form-control-sm @error('street') is-invalid @enderror" name="street" value="{{ old('street') }}" autocomplete="on" placeholder="Strasse" required>

										@error('street')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
										@enderror
                  </div>

                </div>
                <div class="col-12 col-md-4">

                    <div class="form-group">
                      <label for="street_nr">Hausnummer</label>
                          <input id="street_nr" type="text" class="form-control form-control-sm @error('street_nr') is-invalid @enderror" name="street_nr" value="{{ $checkout['user']->street_nr }}" autocomplete="on" placeholder="Nr." required>
                          @error('street_nr')
                              <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong> </span>
                          @enderror
                    </div>

                  </div>
                <div class="col-12 col-md-4">

                  <div class="form-group">
                    <label for="additional_address_info">Adress-Zusatz</label>

										<input id="additional_address_info" type="text" class="form-control form-control-sm @error('additional_address_info') is-invalid @enderror" name="additional_address_info" value="{{ old('additional_address_info') }}" autocomplete="on" placeholder="Adress-Zusatz">

										@error('additional_address_info')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
										@enderror
                  </div>

                </div>
                <div class="col-12 col-md-4">

                  <div class="form-group">
                    <label for="country">Land</label>

										<input id="country" type="text" class="form-control form-control-sm @error('country') is-invalid @enderror" name="country" value="{{ old('country') }}" autocomplete="on" placeholder="Land" required>

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

										<input id="postcode" type="text" class="form-control form-control-sm @error('postcode') is-invalid @enderror" name="postcode" value="{{ old('postcode') }}" autocomplete="on" placeholder="PLZ" required>

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

										<input id="city" type="text" class="form-control form-control-sm @error('city') is-invalid @enderror" name="city" value="{{ old('city') }}" autocomplete="on" placeholder="Stadt" required>

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

										<input id="county" type="text" class="form-control form-control-sm @error('county') is-invalid @enderror" name="county" value="{{ old('county') }}" autocomplete="on" placeholder="Bundesland" required>

										@error('county')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
										@enderror
                  </div>

                </div>
                <div class="col-12">

                  <!-- Button -->
                  <button class="btn btn-primary" type="submit">Registrieren</button>

                </div>
              </div>
            </form>

          </div>
        </div>
      </div>
    </section>

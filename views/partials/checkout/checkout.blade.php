@php
    use App\Helpers\VAT;
    $tax=VAT::getVAT();
@endphp
@extends('layout.mainlayout')
@section('content')
@include('partials.home.promo-banner-small')
    <!-- CONTENT -->
    <section class="pt-7 pb-12 bg-white">
      <div class="container">
        <div class="row">
          <div class="col-12 text-center">

            <!-- Heading -->
            <h3 class="mb-4">Kasse</h3>

            @if (Auth::user())
						<!-- Subheading -->
            <p class="mb-10">
              <a class="font-weight-bold text-reset" href="{{ route('account') }}">Eingeloggt als: {{ Auth::user()->name }}</a>
            </p>
						@else
						<!-- Subheading -->
            <p class="mb-10">
              Haben Sie bereits einen Account? <a class="font-weight-bold text-reset" href="{{ route('login', 'redirect_to=checkout') }}">Klicken Sie hier zum Einloggen</a>
            </p>
						@endif

						@if (session('status_checkout'))
								<div class="alert alert-danger" role="alert">
										{{ session('status_checkout') }}
								</div>
						@endif

          </div>
        </div>

				@if ($the_cart->amount())

				<!-- Form -->
				<form id="checkoutForm" method="post" action="{{ route('checkout') }}">
					@csrf

					<div class="row">
						<div class="col-12 col-md-7">

              <!-- Heading -->
              <h6 class="mb-7">Rechnungsadresse</h6>

							<input type="hidden" name="name" value="">

              <!-- Billing details -->
              <div class="row mb-9">
                <div class="col-12">

                  <div class="form-group">
                    <label for="gender">Anrede *</label>

                    <div class="btn-group-toggle" data-toggle="buttons">
                      <label class="btn btn-sm btn-outline-border">
                        <input type="radio" name="gender" value="male" @if ($checkout['user']->gender == "male") checked @endif required> Herr
                      </label>
                      <label class="btn btn-sm btn-outline-border active">
                        <input type="radio" name="gender" value="woman" @if ($checkout['user']->gender == "woman") checked @endif required> Frau
                      </label>
                    </div>

                  </div>

                </div>
                <div class="col-12 col-md-6">

                  <div class="form-group">
                    <label for="first_name">Vorname</label>

										<input id="first_name" type="text" class="form-control form-control-sm @error('first_name') is-invalid @enderror" name="first_name" value="{{ $checkout['user']->first_name }}" autocomplete="on" placeholder="Vorname" required>

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

										<input id="last_name" type="text" class="form-control form-control-sm @error('last_name') is-invalid @enderror" name="last_name" value="{{ $checkout['user']->last_name }}" autocomplete="on" placeholder="Nachname" required>

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
						<input id="street" type="text" class="form-control form-control-sm @error('street') is-invalid @enderror" name="street" value="{{ $checkout['user']->street }}" autocomplete="on" placeholder="Strasse" required>
						@error('street')
							<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong> </span>
						@enderror
                  </div>

                </div>
				<div class="col-12 col-md-6">

                  <div class="form-group">
                    <label for="street_nr">Hausnummer</label>
						<input id="street_nr" type="text" class="form-control form-control-sm @error('street_nr') is-invalid @enderror" name="street_nr" value="{{ $checkout['user']->street_nr }}" autocomplete="on" placeholder="Nr." required>
						@error('street_nr')
							<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong> </span>
						@enderror
                  </div>

                </div>
                <div class="col-12">

                  <div class="form-group">
                    <label for="additional_address_info">Adress-Zusatz</label>

										<input id="additional_address_info" type="text" class="form-control form-control-sm @error('additional_address_info') is-invalid @enderror" name="additional_address_info" value="{{ $checkout['user']->additional_address_info }}" autocomplete="on" placeholder="Adress-Zusatz">

										@error('additional_address_info')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
										@enderror
                  </div>

                </div>
                <div class="col-12 col-md-6">

                  <div class="form-group">
                    <label for="postcode">PLZ</label>

										<input id="postcode" type="text" class="form-control form-control-sm @error('postcode') is-invalid @enderror" name="postcode" value="{{ $checkout['user']->postcode }}" autocomplete="on" placeholder="PLZ" required>

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

										<input id="city" type="text" class="form-control form-control-sm @error('city') is-invalid @enderror" name="city" value="{{ $checkout['user']->city }}" autocomplete="on" placeholder="Stadt" required>

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

										<input id="county" type="text" class="form-control form-control-sm @error('county') is-invalid @enderror" name="county" value="{{ $checkout['user']->county }}" autocomplete="on" placeholder="Bundesland" required>

										@error('county')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
										@enderror
                  </div>

                </div>
                <div class="col-12 col-md-6">

                  <div class="form-group">
                    <label for="country">Land</label>

										<input id="country" type="text" class="form-control form-control-sm @error('country') is-invalid @enderror" name="country" value="{{ $checkout['user']->country }}" autocomplete="on" placeholder="Land" required>

										@error('country')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
										@enderror
                  </div>

				</div>
				<div class="col-12">

					<div class="form-group">
					  <label for="email">Email-Adresse</label>

										  <input id="email" type="email" class="form-control form-control-sm @error('email') is-invalid @enderror" name="email" value="{{ $checkout['user']->email }}" autocomplete="on" placeholder="Email-Adresse" required>

										  @error('email')
											  <span class="invalid-feedback" role="alert">
												  <strong>{{ $message }}</strong>
											  </span>
										  @enderror
					</div>

				  </div>
              </div>

              <!-- Heading -->
              <h6 class="mb-7">Versandoptionen</h6>

              <!-- Shipping details -->
              <div class="table-responsive mb-6">
                <table class="table table-bordered table-sm table-hover mb-0">
                  <tbody>

				  	@php
						$shipment = $the_cart->GetShipmentPrices[1];
						$shipment_price = (env('FREE_SHIPPING_MIN', '') != '' && $the_cart->price_with_tax() >= env('FREE_SHIPPING_MIN', '')) ? '0' : $shipment;
					@endphp
                    <tr>
                      <td>
                        <div class="custom-control custom-radio">
                          <input class="custom-control-input" id="checkoutShippingStandard" name="shipping_type" type="radio" data-value="{{  $shipment_price }}" value="1" @if ($checkout['shipping_type']==1 || $checkout['shipping_type'] == 0) checked @endif required>
                          <label class="custom-control-label text-body text-nowrap" for="checkoutShippingStandard">
                            Standardversand
                          </label>
                        </div>
                      </td>
                      <td>Lieferung in 3 - 5 Werktagen</td>
                      <td>{{ number_format( $shipment_price , 2, ',', '.') }} €</td>
					</tr>

					@php
						$shipment = $the_cart->GetShipmentPrices[2];
						$shipment_price = (env('FREE_SHIPPING_MIN', '') != '' && $the_cart->price_with_tax() >= env('FREE_SHIPPING_MIN', '')) ? '0' : $shipment;
					@endphp
					<tr>
						<td>
						  <div class="custom-control custom-radio">
							<input class="custom-control-input" id="checkoutShippingPickup" name="shipping_type" type="radio" data-value="{{  $shipment_price }}" value="2" @if ($checkout['shipping_type']==2) checked @endif required>
							<label class="custom-control-label text-body text-nowrap" for="checkoutShippingPickup">
							  Abholung
							</label>
						  </div>
						</td>
						<td>In der Filiale</td>
						<td>{{ number_format( $shipment_price , 2, ',', '.') }} €</td>
					  </tr>
                  </tbody>
                </table>
              </div>

              <!-- Address -->
              <div class="mb-9">

								<!-- Checkbox -->
								<div class="custom-control custom-checkbox">
									<input class="custom-control-input" id="checkoutShippingAddress" type="checkbox" name="shipping_address" value="1" @if ($checkout['shipping_address']) checked @endif>
									<label class="custom-control-label font-size-sm" data-toggle="collapse" data-target="#checkoutShippingAddressCollapse" for="checkoutShippingAddress" @if ($checkout['shipping_address']) aria-expanded="true" @endif>
										Sollen wir an eine andere Adresse liefern?
									</label>
								</div>

								<!-- Collapse -->
								<div class="collapse @if ($checkout['shipping_address']) show @endif" id="checkoutShippingAddressCollapse">

									<!-- Address details -->
									<div class="row mb-9">
										<div class="col-12">

											<div class="form-group">
												<label for="shipping_gender">Anrede *</label>

												<div class="btn-group-toggle" data-toggle="buttons">
													<label class="btn btn-sm btn-outline-border">
														<input type="radio" name="shipping_gender" value="male" @if ($checkout['shipping']->gender == "male") checked @endif> Herr
													</label>
													<label class="btn btn-sm btn-outline-border active">
														<input type="radio" name="shipping_gender" value="woman" @if ($checkout['shipping']->gender == "woman") checked @endif> Frau
													</label>
												</div>

											</div>

										</div>
										<div class="col-12 col-md-6">

											<div class="form-group">
												<label for="shipping_first_name">Vorname</label>

												<input id="shipping_first_name" type="text" class="form-control form-control-sm @error('shipping_first_name') is-invalid @enderror" name="shipping_first_name" value="{{ $checkout['shipping']->first_name }}" autocomplete="on" placeholder="Vorname">

												@error('shipping_first_name')
													<span class="invalid-feedback" role="alert">
														<strong>{{ $message }}</strong>
													</span>
												@enderror
											</div>

										</div>
										<div class="col-12 col-md-6">

											<div class="form-group">
												<label for="shipping_last_name">Nachname</label>

												<input id="shipping_last_name" type="text" class="form-control form-control-sm @error('shipping_last_name') is-invalid @enderror" name="shipping_last_name" value="{{ $checkout['shipping']->last_name }}" autocomplete="on" placeholder="Nachname">

												@error('shipping_last_name')
													<span class="invalid-feedback" role="alert">
														<strong>{{ $message }}</strong>
													</span>
												@enderror
											</div>

										</div>
										<div class="col-12 col-md-6">

											<div class="form-group">
												<label for="shipping_street">Strasse</label>

												<input id="shipping_street" type="text" class="form-control form-control-sm @error('shipping_street') is-invalid @enderror" name="shipping_street" value="{{ $checkout['shipping']->street }}" autocomplete="on" placeholder="Strasse">

												@error('shipping_street')
													<span class="invalid-feedback" role="alert">
														<strong>{{ $message }}</strong>
													</span>
												@enderror
											</div>

										</div>
										<div class="col-12 col-md-6">

											<div class="form-group">
												<label for="shipping_additional_address_info">Adress-Zusatz</label>

												<input id="shipping_additional_address_info" type="text" class="form-control form-control-sm @error('shipping_additional_address_info') is-invalid @enderror" name="shipping_additional_address_info" value="{{ $checkout['shipping']->additional_address_info }}" autocomplete="on" placeholder="Adress-Zusatz">

												@error('shipping_additional_address_info')
													<span class="invalid-feedback" role="alert">
														<strong>{{ $message }}</strong>
													</span>
												@enderror
											</div>

										</div>
										<div class="col-12 col-md-6">

											<div class="form-group">
												<label for="shipping_postcode">PLZ</label>

												<input id="shipping_postcode" type="text" class="form-control form-control-sm @error('shipping_postcode') is-invalid @enderror" name="shipping_postcode" value="{{ $checkout['shipping']->postcode }}" autocomplete="on" placeholder="PLZ">

												@error('shipping_postcode')
													<span class="invalid-feedback" role="alert">
														<strong>{{ $message }}</strong>
													</span>
												@enderror
											</div>

										</div>
										<div class="col-12 col-md-6">

											<div class="form-group">
												<label for="shipping_city">Stadt</label>

												<input id="shipping_city" type="text" class="form-control form-control-sm @error('shipping_city') is-invalid @enderror" name="shipping_city" value="{{ $checkout['shipping']->city }}" autocomplete="on" placeholder="Stadt">

												@error('shipping_city')
													<span class="invalid-feedback" role="alert">
														<strong>{{ $message }}</strong>
													</span>
												@enderror
											</div>

										</div>
										<div class="col-12 col-md-6">

											<div class="form-group">
												<label for="shipping_county">Bundesland</label>

												<input id="shipping_county" type="text" class="form-control form-control-sm @error('shipping_county') is-invalid @enderror" name="shipping_county" value="{{ $checkout['shipping']->county }}" autocomplete="on" placeholder="Bundesland">

												@error('shipping_county')
													<span class="invalid-feedback" role="alert">
														<strong>{{ $message }}</strong>
													</span>
												@enderror
											</div>

										</div>
										<div class="col-12 col-md-6">

											<div class="form-group">
												<label for="shipping_country">Land</label>

												<input id="shipping_country" type="text" class="form-control form-control-sm @error('shipping_country') is-invalid @enderror" name="shipping_country" value="{{ $checkout['shipping']->country }}" autocomplete="on" placeholder="Land">

												@error('shipping_country')
													<span class="invalid-feedback" role="alert">
														<strong>{{ $message }}</strong>
													</span>
												@enderror
											</div>

										</div>
									</div>

								</div>

              </div>

              <!-- Heading -->
              <h6 class="mb-7">Bezahlung</h6>

              <!-- List group -->
              <div class="list-group list-group-sm mb-7">
                <div class="list-group-item">

                  <!-- Radio -->
                  <div class="custom-control custom-radio">

                    <!-- Input -->
                    <input class="custom-control-input" id="checkoutPaymentPaypal" name="payment_type" type="radio" data-toggle="collapse" data-action="hide" data-target="#checkoutPaymentCardCollapse" value="1" @if ($checkout['payment_type']==1) checked @endif required>

                    <!-- Label -->
                    <label class="custom-control-label font-size-sm text-body text-nowrap" for="checkoutPaymentPaypal">
                      <img src="assets/img/brands/color/paypal.svg" alt="...">
                    </label>

				  </div>

				<!-- Radio -->
				<div class="custom-control custom-radio mt-2">
					<!-- Input -->
					<input class="custom-control-input" id="checkoutPaymentVorkasse" name="payment_type" type="radio" data-toggle="collapse" data-action="hide" data-target="#checkoutPaymentCardCollapse" value="2" @if ($checkout['payment_type']==2 || $checkout['payment_type'] == 0) checked @endif required>

					<!-- Label -->
					<label class="custom-control-label font-size-sm text-body text-nowrap" for="checkoutPaymentVorkasse">
						<img src="assets/img/payment/maestro.svg" alt="..." class="mr-2"> Vorkasse
					</label>

				</div>

				@if (Auth::user() && Auth::user()->canBuyOnInvoice() && $the_cart->price_with_tax() <= 100)
				<!-- Radio -->
					<div class="custom-control custom-radio mt-2">
						<!-- Input -->
						<input class="custom-control-input" id="checkoutPaymentRechnung" name="payment_type" type="radio" data-toggle="collapse" data-action="hide" data-target="#checkoutPaymentCardCollapse" value="3" @if ($checkout['payment_type']==3) checked @endif required>

						<!-- Label -->
						<label class="custom-control-label font-size-sm text-body text-nowrap" for="checkoutPaymentRechnung">
							<i class="fas fa-file-invoice mr-2"></i> Kauf auf Rechnung
						</label>

						</div>

					<!-- Radio -->
					<div class="custom-control custom-radio mt-2">
						<!-- Input -->
						<input class="custom-control-input" id="checkoutPaymentFiliale" name="payment_type" type="radio" data-toggle="collapse" data-action="hide" data-target="#checkoutPaymentCardCollapse" value="4" @if ($checkout['payment_type']==4) checked @endif required>

						<!-- Label -->
						<label class="custom-control-label font-size-sm text-body text-nowrap" for="checkoutPaymentFiliale">
							<i class="fas fa-file-invoice mr-2"></i> Zahlung im Geschäft
						</label>

					</div>

				@endif


                </div>
              </div>

						</div>

						<div class="col-12 col-md-5 col-lg-4 offset-lg-1">

							<!-- Heading -->
							<h6 class="mb-7">Bestellte Artikel: {{ $the_cart->amount() }}</h6>

							<!-- Divider -->
							<hr class="my-7">

							<!-- List group -->
							<ul class="list-group list-group-lg list-group-flush-y list-group-flush-x mb-7">
								@foreach ($the_cart->articles() as $article)
								@php
								$vid = '';
								$size = '';
								$color = '';
								if(get_class($article['data']) == 'App\Article_Variation') {
									$standardPrice = $article['data']->getStandardPrice();
									$discountPrice = $article['data']->getDiscountPrice();
									$mainArticle = $article['data']->article()->first();
									$onSale = $mainArticle->isOnSale();
									$isNew = $mainArticle->isNew();
									$image = $article['data']->getThumbnailImg()->first();
									$length = '';//$article['data']->attributes()->where('name', '=', 'fee-formLaenge')->where('value','!=','')->first();
									$vid = $article['data']->id;
									$size = $article['data']->attributes()->where('name', '=' , 'fee-size')->first()
									? $article['data']->attributes()->where('name', '=' , 'fee-size')->first()->value
									: '';
									$color = $article['data']->attributes()->where('name', '=' , 'fee-info1')->first()
									? $article['data']->attributes()->where('name', '=' , 'fee-info1')->first()->value
									: '';

								}
								elseif(get_class($article['data']) == 'App\Article') {
									$standardPrice = $article['data']->price()->where('name','=','standard')->first();
									$discountPrice = $article['data']->price()->where('name','=','discount')->first();
									$onSale = $article['data']->isOnSale();
									$isNew = $article['data']->isNew();
									$mainArticle = $article;
								}
								@endphp

								<li class="list-group-item">
									<div class="row align-items-center">
										<div class="col-4">

											<!-- Image -->
											<a href="{{ route('shop.show', $mainArticle->slug.'_id'.$mainArticle->id) }}">
												@if ($image)
												<img src="{{ env('VSTCL_DOMAIN', 'https://visticle.online').'/storage'.$image->location }}" alt="..." class="img-fluid">
												@else
													@if ($mainArticle->images()->first())
													<img src="{{ env('VSTCL_DOMAIN', 'https://visticle.online').'/storage'.$mainArticle->images()->first()->location }}" alt="..." class="img-fluid">
													@else
														<img src="assets/img/products/product-5.jpg" alt="..." class="img-fluid">
													@endif
												@endif
											</a>

										</div>
										<div class="col">

											<!-- Title -->
											<p class="mb-4 font-size-sm font-weight-bold">
												<a class="text-body" href="{{ route('shop.show', $mainArticle->slug.'_id'.$mainArticle->id) }}">{{ $mainArticle->webname ?? $mainArticle->name }}</a> <br>
												<span class="text-muted">{{ $article['amount'] }} x {{ number_format($article['single_price'], 2, ',', '.') }} €</span>
											</p>

											<!-- Text -->
											<div class="font-size-sm text-muted">
												Größe: {{ $size.(($length) ? '/'.$length->value : '') }} <br>
												Farbe: {{ $color }}
												@if(isset($article['attributes']))
													@foreach($article['attributes'] as $A_attribute_name => $A_attribute_value)
														{!! (( $A_attribute_name == 'hueftumfang' && $A_attribute_value != '')? '<br>Hüftumfang: '.$A_attribute_value : '' ) !!}
														{!! (( $A_attribute_name == 'Kinder-Groesse' && $A_attribute_value != '')? '<br>Kinder-Größe: '.$A_attribute_value : '' ) !!}
														{!! (( $A_attribute_name == 'Damen-Groesse' && $A_attribute_value != '')? '<br>Damen-Größe: '.$A_attribute_value : '' ) !!}
														{!! (( $A_attribute_name == 'Herren-Groesse' && $A_attribute_value != '')? '<br>Herren-Größe: '.$A_attribute_value : '' ) !!}
														{!! (( $A_attribute_name == 'freitext' && $A_attribute_value != '')? '<br>Freitext: '.$A_attribute_value : '' ) !!}
													@endforeach
												@endif
											</div>

										</div>
									</div>
								</li>
								@endforeach
							</ul>

							@php
								$shipment = $the_cart->GetShipmentPrices[1];
								$shippingCosts = number_format( ((env('FREE_SHIPPING_MIN', '') != '' && $the_cart->price_with_tax() >= env('FREE_SHIPPING_MIN', '')) ? '0' : $shipment) , 2, ',', '.');
							@endphp
							<!-- Card -->
							<div class="card mb-9 bg-white">
								<div class="card-body">
									<ul class="list-group list-group-sm list-group-flush-y list-group-flush-x">
										<li class="list-group-item d-flex">
											<span>Gesamtwarenwert</span> <span class="ml-auto font-size-sm">{{ number_format($the_cart->price_with_tax(), 2, ',', '.') }} €</span>
										</li>
										@if ($the_cart->vouchers_gesamt() > 0 && $the_cart->price_with_tax() > 0)
										<li class="list-group-item d-flex">
											<span>Rabatt</span> <span class="ml-auto font-size-sm">-{{ number_format( $the_cart->vouchers_gesamt() , 2, ',', '.') }} €</span>
										</li>
										@endif
										<li class="list-group-item d-flex">
											<span>{{ $tax }}% MwSt.:</span> <span class="ml-auto font-size-sm">{{ number_format(
												( $the_cart->price_tax()
												-(  ($the_cart->vouchers_gesamt() > 0 && $the_cart->price_with_tax() > 0)
													? ($the_cart->vouchers_gesamt() * $tax / ($tax+100))
													: 0
											     )
												)
												, 2, ',', '.') }} €</span>
										</li>
										<li class="list-group-item d-flex">
											<span>Versandkosten: </span> <span class="ml-auto font-size-sm" id="shippingCostsVal">{{ $shippingCosts }} €</span>
										</li>
										<li class="list-group-item d-flex font-size-lg font-weight-bold">
											<span>Insgesamt</span> <span class="ml-auto" id="totalCostsVal"
												data-value="{{ ( $the_cart->price_with_tax()
													-(	($the_cart->vouchers_gesamt() > 0 && $the_cart->price_with_tax() > 0)
														? $the_cart->vouchers_gesamt()
														: 0
													)
												 	+ (float)str_replace(',','.',$shippingCosts)
												) }}" data-shipcost="{{ (float)str_replace(',','.',$shippingCosts) }}">
												{{ number_format(
												( $the_cart->price_with_tax()
												-(	($the_cart->vouchers_gesamt() > 0 && $the_cart->price_with_tax() > 0)
													? $the_cart->vouchers_gesamt()
													: 0
											     )
												 + (float)str_replace(',','.',$shippingCosts)
												), 2, ',', '.') }} €</span>
										</li>
									</ul>
								</div>
							</div>
							<p class="mb-7 font-size-xs text-gray-500">
								<input type="checkbox" value="1" id="pay_terms_agree" name="pay_terms_agree" class="" required>
								<label for="pay_terms_agree">Ich bestätige die <a href="{{ route('cms.versandundlieferung') }}" target="_blank">Allgemeinen Geschäftsbedingungen</a> anzuerkennen.</label>
							</p>
							<p class="mb-7 font-size-xs text-gray-500">
								<input type="checkbox" value="1" id="terms_agree" name="terms_agree" class="" required>
								<label for="terms_agree">Ich bestätige die <a href="{{ route('cms.datenschutz') }}" target="_blank">Datenschutzbestimmungen</a> zur Kenntnis genommen zu haben.</label>
							</p>
							<div id="paypal-button-container">
							</div>
							<button id="card-button-container" class="btn btn-block btn-primary" type="submit">
								Kostenpflichtig bestellen
							</button>

						</div>
					</div>

				</form>

				@endif

      </div>
    </section>
	@endsection
@section('custom-scripts')
	<script src="https://www.paypal.com/sdk/js?client-id={{ env('PAYPAL_CLIENT_ID', 'sb') }}&currency=EUR"></script>
    <script src="{{ asset('/js/checkout/checkout.js') }}"></script>
@endsection

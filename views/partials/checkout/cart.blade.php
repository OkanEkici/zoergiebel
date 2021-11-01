@php
    use App\Helpers\VAT;
    $tax=VAT::getVAT();
@endphp
@include('partials.home.promo-banner-small')
    <!-- CONTENT -->
    <section class="pt-7 pb-12 bg-white">
      <div class="container">
        <div class="row">
          <div class="col-12">

            <!-- Heading -->
            <h3 class="mb-10 text-center">Warenkorb</h3>

						@if (session('status_cart'))
								<div class="alert alert-success" role="alert">
										{{ session('status_cart') }}
								</div>
						@endif

          </div>
        </div>




				@if ($the_cart->amount())

				<form method="post" action="{{ route('cart.edit') }}">
				@csrf

					<div class="row">
						<div class="col-12 col-md-7">

							<!-- List group -->
							<ul class="list-group list-group-lg list-group-flush-x mb-6">
								<!-- Gutscheine -->
								@php
								if(count($the_cart->vouchers())==0)
								{
									if (Auth::user() && Auth::user()->neuKunde())
									{
										$the_cart->addVoucher("-Neukunde-");
									}
								}
								@endphp


								@foreach ($the_cart->vouchers() as $voucher)
								@php
									$voucherCode = $voucher->code;

									$voucherDescription = '';
									$voucherArticleString = '';
									switch($voucher->for)
									{
										case "global":
											$voucherDescription = "Warenkorb-Gutschein - ".'"'.$voucher->code.'"';
										break;
										case "article":
											$voucherDescription = "Artikel-Gutschein - ".'"'.$voucher->code.'"';
										break;
										case "category":
											$voucherDescription = "Kategorie-Gutschein - ".'"'.$voucher->code.'"';
										break;
									}
									$voucherInfo = '';
									$voucherEurVal = 0;
									switch($voucher->type)
									{
										case "percent":
											$voucherInfo = "Rabatt: ".$voucher->value."%";

											foreach($the_cart->cart_voucher_articles() as $VoucherArticle)
											{
												if($voucher->for == "article" || $voucher->for == "category")
												{$voucherArticleString .= (($voucherArticleString == '')? "für ( " : ", " ).'"'.$VoucherArticle['data']->name.'"';}

												$voucherEurVal += (( (int)( ($VoucherArticle['single_price'] * $VoucherArticle['amount']) * 100) / 100 ) * $voucher->value);
											}
											$voucherArticleString .= ($voucherArticleString != '')? " )" : "";

											$voucherPrice = (($voucherEurVal>0)? "-" : "").$the_cart->presentPrice( ($voucherEurVal/100) );

										break;
										case "solid":
											$voucherInfo = "Rabatt: ".$the_cart->presentPrice( $voucher->value );
											$voucherPrice = (($voucherEurVal>0)? "-" : "").$the_cart->presentPrice( $voucher->value );
										break;
									}

									$voucherCatString = '';
									if($voucher->for == "category")
									{
										foreach ($the_cart->voucher_categories($voucher->id) as $VoucherCategory)
										{
											$voucherCatString .= (($voucherCatString=='')? "auf " :  ", ").$the_cart->get_category($VoucherCategory['pivot']->category_id)->name;
										}
									}
									$voucherInfo .= " ".$voucherCatString;

								@endphp

								<li class="list-group-item">
									<div class="row align-items-center">
										<div class="col-3">&nbsp;</div>
										<div class="col">
											<!-- Title -->
											<div class="d-flex mb-2 font-weight-bold">
												<span class="text-body">{{ $voucherDescription }}</span>
												<span class="ml-auto">{{ $voucherPrice }}</span>
											</div>
											<!-- Text -->
											<p class="mb-7 font-size-sm text-muted"> {{ $voucherInfo }} {{ $voucherArticleString }}</p>
											<!--Footer -->
											<div class="d-flex align-items-center">
												<!-- Remove -->
												<a class="font-size-xs text-gray-400 ml-auto ajax-submit" href="#!" data-id="{{ $voucher->id }}" data-action="cart_voucher_delete">
													<!--<i class="fe fe-x"></i> Löschen-->
													<i class="far fa-trash-alt"></i>
												</a>
											</div>

										</div>
									</div>
								</li>
								@endforeach
								<!-- Gutscheine ENDE-->

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
									$image = $article['data']->getThumbnailImg()->first();
									$length = '';//$article['data']->attributes()->where('name', '=', 'fee-formLaenge')->where('value','!=','')->first();
									$isNew = $mainArticle->isNew();
									$stock = $article['data']->stock;
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
									$stock = 1;
									$mainArticle = $article;
								}
								@endphp

								<li class="list-group-item">
									<div class="row align-items-center">
										<div class="col-3">
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
											<div class="d-flex mb-2 font-weight-bold">
												<a class="text-body" href="{{ route('shop.show', $mainArticle->slug.'_id'.$mainArticle->id) }}">{{ $mainArticle->webname ?? $mainArticle->name }}</a> <span class="ml-auto">{{ $article['amount'] }} x {{
													($discountPrice && $onSale)
													? $discountPrice->presentPrice()
													: $standardPrice->presentPrice()
													}}</span>
											</div>

											<!-- Text -->
											<p class="mb-7 font-size-sm text-muted">
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
											</p>

											<!--Footer -->
											<div class="d-flex align-items-center">

												<!-- Select -->
												<select class="custom-select custom-select-xxs w-auto ajax-submit-change" data-action="cart_item_changeamount" data-id2="{{ $vid }}" data-id="{{ $mainArticle->id }}">
													@for ($i = 1; $i <= $stock; $i++)
													<option value="{{ $i }}" @if ($article['amount'] == $i) selected="selected" @endif>{{ $i }}</option>
													@endfor
												</select>

												<!-- Remove -->
												<a class="font-size-xs text-gray-400 ml-auto ajax-submit" href="#!" data-id2="{{ $vid }}" data-id="{{ $mainArticle->id }}" data-action="cart_item_delete">
													<!--<i class="fe fe-x"></i> Löschen-->
													<i class="far fa-trash-alt"></i>
												</a>

											</div>

										</div>
									</div>
								</li>
								@endforeach
							</ul>

						</div>
						<div class="col-12 col-md-5 col-lg-4 offset-lg-1">
							@if ( count( $the_cart->get_vouchers() ) > 0 )
							<form method="post" action="{{ route('cart.edit') }}">
							@csrf
								<div class="row">
									<div class="col-12 ">

										<div class="form-group">

											<!-- <label for="voucher_code">Gutschein-Code</label>-->
											<input id="voucher_code" type="text" style="padding-right: 125px;" class="form-control form-control-sm @error('voucher_code') is-invalid @enderror" name="voucher_code" value="" autocomplete="off" placeholder="Gutschein-Code eingeben">
											<button id="voucher-button-container" style="right: 17px; bottom: 25px; height: 50px;" class="btn btn-inline position-absolute btn-primary" type="submit">
												senden
											</button>
											@error('voucher_code')
												<span class="invalid-feedback" role="alert">
													<strong>{{ $message }}</strong>
												</span>
											@enderror
										</div>
									</div>
								</div>
							</form>
							@endif

							<!-- Total -->
							<div class="card mb-7 bg-white">
								<div class="card-body">
									<ul class="list-group list-group-sm list-group-flush-y list-group-flush-x">
										<li class="list-group-item d-flex">
											<span>Gesamtwarenwert</span> <span class="ml-auto font-size-sm">{{ number_format( ($the_cart->price_with_tax() ), 2, ',', '.') }} €</span>
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
													? ($the_cart->vouchers_gesamt() * 16 / 116)
													: 0
											     )
												)
												, 2, ',', '.') }} €</span>
										</li>
										<li class="list-group-item d-flex font-size-lg font-weight-bold">
											<span>Insgesamt</span> <span class="ml-auto font-size-sm">{{ number_format(
												( $the_cart->price_with_tax()
												-(	($the_cart->vouchers_gesamt() > 0 && $the_cart->price_with_tax() > 0)
													? $the_cart->vouchers_gesamt()
													: 0
											     )
												), 2, ',', '.') }} €</span>
										</li>
										<li class="list-group-item font-size-sm text-center text-gray-500">
											Versandkosten werden bei der Kasse berechnet *
										</li>
									</ul>
								</div>
							</div>

							<!-- Button -->
							<a class="btn btn-block btn-primary mb-2" href="{{ route('checkout') }}">Weiter zur Kasse</a>

							<!-- Link -->
							<a class="btn btn-link btn-sm px-0 text-body" href="{{ route('home') }}">
								<i class="fe fe-arrow-left mr-2"></i> Weiter einkaufen
							</a>

						</div>
					</div>

				</form>

				@endif

      </div>
    </section>

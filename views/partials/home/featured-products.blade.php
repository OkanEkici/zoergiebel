    <!-- NEW ARRIVALS -->
    <section class="{{ $sectionCssClasses ?? '' }} {{ $bgColor ?? '' }}">
        <div class=" {{ $containerCssClasses ?? 'container' }}">
          <div class="row">
            <div class="col-12">
  
              <!-- Heading -->
              <h2 class="mb-10 text-center">{{ $title ?? '' }}</h2>
  
            </div>
          </div>
          <div class="row">
          <div class="col-12">
          <style>
              
              .flickity-slider-fp .col {
              width:230px;
              padding: 5px;
              border-right: 0px solid transparent;
              border-left: 0px solid transparent;
              }
              .flickity-slider-fp .card-img-top
              {
                  width: auto;
                  height: 270px;
              }
              .flickity-slider-fp .card-body
              {
                  padding: 1rem;
              }
              .flickity-prev-next-button.previous {
                  left: -25px!important;
              }
              .flickity-prev-next-button.next {
                  right: -25px!important;
              }
              
          </style>
          <!-- Slider -->
          <div class="flickity-slider-fp flickity-buttons-lg flickity-buttons-offset px-0 " data-flickity='{"prevNextButtons": true, "setGallerySize": true, "imagesLoaded": true, "pageDots": false, "wrapAround" : true, "freeScroll": true, "cellAlign": "center"}'>
            @foreach ($articles as $article)
            @php
                $firstVariation = $article->variations()->where('stock', '>=', '1')->first();
                $standardPrice = $firstVariation->prices()->where('name','=','standard')->first();
                $discountPrice = $firstVariation->prices()->where('name','=','discount')->first();
                $thumbNail = $firstVariation->getThumbnailImg();
                $onSale = $article->isOnSale();
                $isNew = $article->isNew();

                if(!$standardPrice) {
                  continue;
                }
                if($onSale && !$discountPrice) {
                  continue;
                }

            @endphp
            <div class="col pt-3 pb-12  px-0">
                <!-- Card -->
                <div class="card mb-3" data-toggle="card-collapse">
                    @if ($discountPrice && $onSale)
                    <div class="badge card-badge text-uppercase" style="background-color: red; color: white;">Sale</div>
                    @endif
                    @if ($isNew && !$onSale)
                    <div class="badge badge-white card-badge text-uppercase">Neu</div>
                    @endif
                    <!-- Image TODO: SET CORRECT IMAGE -->
                    <a href="{{ route('shop.show', $article->slug.'_id'.$article->id) }}">
                        @if ($thumbNail->first())
                            <img src="{{ env('VSTCL_DOMAIN', 'https://visticle.online').'/storage'.$thumbNail->first()->location }}" alt="..." class="card-img-top">
                        @else
                            <img src="assets/img/products/product-5.jpg" alt="..." class="card-img-top">
                        @endif
                    </a>
                    <!-- Collapse -->
                    <div class="card-collapse-parent">
                        <!-- Body -->
                        <div class="card-body px-0 {{ $bgCssClass ?? 'bg-white' }} text-center">
                            <!-- Heading TODO: HREF TO RIGHT PRODUCT PAGE -->
                            <div class="mb-1 font-weight-bold">
                                <a class="text-primary" href="{{ route('shop.show', $article->slug.'_id'.$article->id) }}">{{ $article->webname ?? $article->name }}</a>
                                <br>
                                <a class="font-size-xs text-muted">{{$article->getBrand()}}</a>
                            </div>

                            <!-- Price -->
                            <div class="mb-1 font-weight-bold text-muted">
                            @if ($discountPrice && $onSale)
                                <span class="font-size-xs text-gray-350 text-decoration-line-through">
                                    {{ $standardPrice->presentPrice() }}
                                </span>
                                <span style="color: red;">
                                    {{ $discountPrice->presentPrice() }}
                                </span>
                            @else
                                    {{ $standardPrice->presentPrice() }}
                            @endif
                            </div>

                            <!-- Footer TODO: ACTIONS FOR BUTTONS -->
                            <div class="card-collapse collapse">
                                <div class="card-footer px-0 pt-0 {{ $bgCssClass ?? 'bg-white' }} text-center">
                                    <button class="btn btn-xs btn-link btn-circle ajax-submit" data-toggle="button" data-action="cart_item_addbyid" data-id="{{ $article->id }}" data-id2="">
                                        <i class="fe fe-shopping-cart"></i>
                                    </button>
                                    @php
                                    /* <!--
                                    <button class="btn btn-xs btn-link btn-circle ajax-submit" data-toggle="button" data-id="{{ $article->id }}" data-id2="" data-action="wishlist_add">
                                        <i class="fe fe-heart"></i>
                                    </button> --> */
                                    @endphp
                                </div>
                            </div>
                        </div>
                    </div>
                </div>    
            </div>
            @endforeach
            </div></div>
          </div>
          @if (isset($discover_more))
          <div class="row">
            <div class="col-12">
        
              <!-- Link -->
              <div class="mt-7 text-center">
                <a class="btn btn-primary text-white" href="{{ $discover_more }}">Jetzt entdecken</a>
              </div>
        
            </div>
          </div>
          @endif
        </div>
      </section>
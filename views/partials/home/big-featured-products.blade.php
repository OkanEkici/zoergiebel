 <!-- SLIDER -->
 <section class="p-12 bg-secondary">
    <div class="container">
        <div class="row">
            @foreach ($bigarticles as $article)
            @php
                $firstVariation = $article->variations()->first();
                $thumbNail = $firstVariation->getThumbnailImg();
                $standardPrice = $firstVariation->getStandardPrice();
                $discountPrice = $firstVariation->getDiscountPrice();
                $onSale = $article->isOnSale();
                $isNew = $article->isNew();

                if(!$standardPrice) {
                  continue;
                }
                if($onSale && !$discountPrice) {
                  continue;
                }

            @endphp
            <div class="col-12 col-sm-6 d-flex flex-column px-12">
              <!-- Card -->
              <div class="card card-lg bg-secondary">
              @if ($discountPrice && $onSale)
              <div class="badge card-badge text-uppercase" style="background-color: red; color: white;">Sale</div>
              @endif
              @if ($isNew)
              <div class="badge badge-white card-badge text-uppercase">Neu</div>
              @endif
                <!-- Circle -->
                <div class="card-circle card-circle-lg card-circle-right">
                @if ($discountPrice && $onSale)
                        <strong class="font-size-xs text-decoration-line-through opacity-80">{{ $standardPrice->presentPrice() }}</strong>
                        <span class="font-size-h6 font-weight-bold">{{ $discountPrice->presentPrice() }}</span>
                @else
                    <span class="font-size-h6 font-weight-bold">{{ $standardPrice->presentPrice() }}</span>
                @endif
                </div>

                @if ($thumbNail->first())
                <img src="{{ env('VSTCL_DOMAIN', 'https://visticle.online').'/storage'.$thumbNail->first()->location }}" alt="..." class="card-img-top"">
                @else
                <img src="assets/img/products/product-30.jpg" alt="..." class="card-img-top">
                @endif

                <!-- Body -->
                <div class="card-body position-relative mx-6 mx-lg-11 mt-n11 bg-white text-center">

                  <!-- Heading -->
                  <h4 class="mb-0">{{ $article->webname ?? $article->name }}</h4>

                  <!-- Link -->
                  <a class="btn btn-link stretched-link px-0 text-reset" href="{{ route('shop.show', $article->slug.'_id'.$article->id ) }}">
                    Entdecken <i class="fe fe-arrow-right ml-2"></i>
                  </a>

                </div>

              </div>

              </div>
            @endforeach
          
        </div>
    </div>
  </section>
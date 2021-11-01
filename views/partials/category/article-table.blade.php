  <!-- Products -->
  <style>
  .card-img img{
    max-height: 350px;
    width: auto;
    max-width:100%;
  }
  .card-img-hover .card-img-front {
    margin-left: auto;
    margin-right: auto;
    float: none;
}
.card-img-hover .card-img-back {
    opacity: 0;
    position: absolute;
    float: none;
    margin: auto;
}
  </style>
  <div class="row">
  @foreach ($articles as $article)
    @php
    $firstVariation = $article->variations()
    ->where(function ($query) {
        $query->where('stock', '>', '0')
        ->whereHas('prices', function ($query) { $query->where('value', '!=', '');});
    })->first();
    if(!$firstVariation){continue;}

    $firstVariationWithImages = $article->variations()->whereHas('images')->first();
    $checkArtImagesCount = $article->images()->count();
    if(!$firstVariationWithImages) {
      if($checkArtImagesCount>0){
        $thumbNail = $article->getPreviewImage();
        if(!$thumbNail){$thumbNail=false;}
        $thumbNail2 = $article->getPreview2Image('is_preview_2');
        if(!$thumbNail2){$thumbNail2=false;}
      } else{continue;}
    }else
    { $thumbNail = $firstVariationWithImages->getThumbnailImg();
      $thumbNail2 = $firstVariationWithImages->getThumbnailImg('is_preview_2');
      if(!$thumbNail2 && $thumbNail){$thumbNail2=$thumbNail->skip(1)->first(); if(!$thumbNail2){$thumbNail2=false;}}else{$thumbNail2=false;}
      if(!$thumbNail->first()){$thumbNail=false;}else{ $thumbNail =  $thumbNail->first();}
    }

    $standardPrice = $firstVariation->getStandardPrice();
    $discountPrice = $firstVariation->getDiscountPrice();
    $isNew = $article->isNew();

    $onSale=$article->isOnSale();
    if(!$standardPrice) { continue; }
    if($onSale && !$discountPrice ) { continue; }

    $standardPrice_value = false;
    $discountPrice_value = false;
    $present_standardPrice = false;
    $present_discountPrice = false;

    $standardPrice_value = $standardPrice->VPE_Preis(1);
    $present_standardPrice = $standardPrice->present_Preis($standardPrice_value);
    if($discountPrice)
    {	$discountPrice_value = $discountPrice->VPE_Preis(1); $present_discountPrice = $discountPrice->present_Preis($discountPrice_value); }

    $varId = $firstVariation->id;

    if($header == "SALE") {
      if($discountPrice_value >= $standardPrice_value){continue;}
    }


    @endphp
    <div class="col-6 col-md-4">

        <!-- Card -->
        <div class="card mb-7">

          @if ($discountPrice && $onSale)
          <div class="badge card-badge text-uppercase"  style="background-color: red; color: white;">Sale</div>
          @endif
          @if ($isNew && !$onSale)
          <div class="badge badge-white card-badge text-uppercase">Neu</div>
          @endif

           <!-- Image -->
          <div class="card-img overflow-hidden">

          <!-- Image -->
          <a class="card-img-hover sameHeight  text-center w-100 position-relative d-inline-block align-items-center" href="{{ route('shop.show', $article->slug.'_id'.$article->id) }}">
            @if ($thumbNail2)
            <img src="{{ env('VSTCL_DOMAIN', 'https://visticle.online').'/storage'.$thumbNail2->location }}" alt="..." class="card-img-top card-img-back">
              @if ($thumbNail)
              <img src="{{ env('VSTCL_DOMAIN', 'https://visticle.online').'/storage'.$thumbNail->location }}" alt="..." class="card-img-top card-img-front">
              @endif
            @else
              @if ($thumbNail)
                <img src="{{ env('VSTCL_DOMAIN', 'https://visticle.online').'/storage'.$thumbNail->location }}" alt="..." class="card-img-top card-img-back">
                <img src="{{ env('VSTCL_DOMAIN', 'https://visticle.online').'/storage'.$thumbNail->location }}" alt="..." class="card-img-top card-img-front">
              @else
                <img class="card-img-top card-img-back" src="assets/img/products/product-120.jpg" alt="...">
                <img class="card-img-top card-img-front" src="assets/img/products/product-5.jpg" alt="...">
              @endif
            @endif

          </a>

            <!-- Actions -->
            <div class="card-actions">
              <span class="card-action">
                <button class="btn btn-xs btn-circle btn-white-primary ajax-submit" data-toggle="button" data-action="cart_item_addbyid" data-id="{{ $article->id }}" data-id2="{{ $varId }}">
                  <i class="fe fe-shopping-cart"></i>
                </button>
              </span>
              @php
              /* <!--
              <span class="card-action">
                <button class="btn btn-xs btn-circle btn-white-primary ajax-submit" data-toggle="button" data-id="{{ $article->id }}" data-id2="{{ $varId }}" data-action="wishlist_add">
                  <i class="fe fe-heart"></i>
                </button>
              </span> --> */
              @endphp
            </div>

          </div>

          <!-- Body -->
          <div class="card-body px-0">

            <!-- Brand -->
            <div class="font-size-xs">
              <a class="text-muted" href="{{ route('category.brands.name', $article->getBrand()) }}">{{ $article->getBrand() }}</a>
            </div>


            <!-- Title -->
            <div class="font-weight-bold">
              <a class="text-body" href="{{ route('shop.show', $article->slug.'_id'.$article->id) }}">
                {{ $article->webname ?? $article->name }}
              </a>
            </div>

            <!-- Price -->
            <div class="mb-1 font-weight-bold text-muted">
                @if ($discountPrice && $onSale && $standardPrice->presentPrice() != $discountPrice->presentPrice())
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

          </div>

        </div>

      </div>
    @endforeach
  </div>
  @php
      //dd($articles);
  @endphp
  @if (isset($articles) && (property_exists($articles, 'lastPage')) && $articles->lastPage() > 1)
  <!-- Pagination -->
  <nav class="d-flex justify-content-center justify-content-md-end">

      <ul class="pagination pagination-sm text-gray-400">
          <?php
          $interval = isset($interval) ? abs(intval($interval)) : 3 ;
          $from = $articles->currentPage() - $interval;
          if($from < 1){
              $from = 1;
          }

          $to = $articles->currentPage() + $interval;
          if($to > $articles->lastPage()){
              $to = $articles->lastPage();
          }
          ?>

        <li class="page-item">
          <a class="page-link page-link-arrow" href="{{ $articles->url($articles->currentPage() - 1) }}">
            <i class="fa fa-caret-left"></i>
          </a>
        </li>
                <!-- links -->
        @for($i = $from; $i <= $to; $i++)
        <?php
        $isCurrentPage = $articles->currentPage() == $i;
        ?>
          <li class="page-item {{ $isCurrentPage ? 'active' : '' }}">
              <a class="page-link" href="{{ !$isCurrentPage ? $articles->url($i) : '#' }}">
                  {{ $i }}
              </a>
          </li>
        @endfor

        <li class="page-item">
          <a class="page-link page-link-arrow" href="{{ $articles->url($articles->currentPage() + 1) }}">
            <i class="fa fa-caret-right"></i>
          </a>
        </li>

      </ul>
    </nav>
  @endif

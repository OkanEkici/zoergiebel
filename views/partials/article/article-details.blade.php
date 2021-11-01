    <!-- PRODUCT -->
    @php
    $firstVariation = $article->variations()->with(['prices'])
    ->where(function ($query) {
        $query->where('stock', '>', '0')
        ->whereHas('prices', function ($query) { $query->where('value', '!=', '');});
    })->first();
    $firstVariationWithImages = $article->variations()->whereHas('images')->first();
    $isVar = 0;
    if(!$firstVariationWithImages) 
    {         
      $checkArtImagesCount = $article->images()->count();
      if($checkArtImagesCount>0){ 
        $thumbNail = $article->getPreviewImage();        
        if(!$thumbNail){$thumbNail=false;} 
        $thumbNail2 = $article->getPreview2Image('is_preview_2'); 
        if(!$thumbNail2){$thumbNail2=false;} 
      }else{return;}      
    }else
    { $isVar = 1;
      $thumbNail = $firstVariationWithImages->getThumbnailImg(); 
      if(!$thumbNail->first()){$thumbNail=false;}else{ $thumbNail =  $thumbNail->first();}
      $thumbNail2 = $firstVariationWithImages->getThumbnailImg('is_preview_2');
      if($thumbNail2 && $thumbNail2->first()){
          $thumbNail2=$thumbNail->skip(1); 
          if(!$thumbNail2->first()){$thumbNail2=false;}}else{$thumbNail2=false;}        
    }
    $onSale = $article->isOnSale();
    $isNew = $article->isNew();
    @endphp
    <style>
    .section_article .flickity-nav .is-nav-selected::after {background-color: transparent!important;}
    .section_article .custom-control-img .custom-control-label::after { border-bottom: none!important;}
    .section_article img.card-img-top { border: 1px solid black !important; }
    .section_article .btn-wishlist_add_special .ajax_toggle:not(.text-success) .fe-heart
    {
      color: red;
      font-size: 25px;
    }
    .section_article .btn-wishlist_add_special .ajax_toggle:not(.text-success)
    {  
      font-weight: 300;
    }
    .rating-item-color
    {
      color: #f3e433;
    }
    .article-img-height { height:550px; }
    @media only screen and (max-width: 768px) {
      .article-img-height {
        height: 300px!important;
      }
      #articleSlider .flickity-viewport
      {
        border: 0!important;
      }
    }
    </style>

    <section>
        <div class="container">
          <div class="row">
            <div class="col-12">
              <div class="row">
              <div class="col-12 col-md-6">

                <!-- Images -->
                <div class="form-row mb-10 mb-md-0">

                <div class="col-10">

                  <!-- Card -->
                  <div class="card">
                        <!-- Slider -->
                        <div style="max-height: 500px;" data-flickity='{"draggable": false, "fade": true, "pageDots" : false, "initialIndex" : 0, "cellAlign": "left", "wrapAround" : true}' id="articleSlider">
                          @php        
                            $var_count = 0; $imgShown = []; $possibleColors = []; $uniqueColors = [];
                            $variation = $article->variations()->where('stock', '>=', '1')->first(); 
                            $Images = [];
                            if($isVar == 0){$Images = $article->getOriginalImg('is_base');}else{$Images = $variation->getOriginalImg('is_base');}
                          @endphp

                          @foreach ($Images as $image)
                            @php 
                              if($var_count>0){continue;}
                              $var_count++;
                              $color = $variation->attributes()->where('name', '=', 'fee-color')->first();                        
                              if($color){ $possibleColors[] = $color->value;} 
                              $imgShown[]=basename($image->location,""); 
                            @endphp
                            <!-- Item -->
                            <a style="min-height:500px;border:0!important;" {{($loop->first) ? 'id=bigImgFlickity'.(($color)? $color->id : "V".$var_count ) : ''}} href="{{ env('VSTCL_DOMAIN', 'https://visticle.online').'/storage'.$image->location }}" data-fancybox class="bigVarImg bigVarImg-{{ (($color)? $color->id : "V".$var_count ) }} d-flex align-items-center w-100 article-img-height">
                              <img style="border:0!important;max-width: 100%;    max-height: 500px;-webkit-transform: translateX(-50%)!important;transform: translateX(-50%)!important;margin: auto!important;position: absolute!important;left: 50%!important;float: none!important;top: 0!important;" src="{{ env('VSTCL_DOMAIN', 'https://visticle.online').'/storage'.$image->location }}" alt="..." class="card-img-top w-auto" >
                            </a>
                          @endforeach

                          @php  // Bilder für die Farben
                            $possibleColors = [];
                          @endphp
                          @foreach ($article->variations()->where('stock', '>=', '1')->whereHas('images')->get() as $variation)
                            @php
                              $var_count++;
                              $color = $variation->attributes()->where('name', '=', 'fee-color')->first();
                              
                              if(!$color || in_array($color->value, $uniqueColors) || $color->value == "") { continue; }
                              if($color){ $possibleColors[] = $color->value;} 
                            @endphp
                            @foreach ($variation->getThumbnailBigImg('is_preview',2) as $image)
                              @if(!in_array(basename($image->location,""),$imgShown))
                                @php                                
                                  $imgShown[]=basename($image->location,"");
                                @endphp
                                  <!-- Item -->
                                  <a style="min-height:500px;border:0!important;" {{($loop->first) ? 'id=bigImgFlickity'.(($color)? $color->id : "V".$var_count ) : ''}} href="{{ env('VSTCL_DOMAIN', 'https://visticle.online').'/storage'.$image->location }}" data-fancybox class="bigVarImg bigVarImg-{{ (($color)? $color->id : "V".$var_count ) }} d-flex align-items-center w-100 article-img-height">
                                    <img style="border:0!important;max-width: 100%;    max-height: 500px;-webkit-transform: translateX(-50%)!important;transform: translateX(-50%)!important;margin: auto!important;position: absolute!important;left: 50%!important;float: none!important;top: 0!important;" src="{{ env('VSTCL_DOMAIN', 'https://visticle.online').'/storage'.$image->location }}" alt="..." class="card-img-top w-auto" >
                                  </a>
                              @endif
                            @endforeach                      
                          @endforeach

                          @foreach ($variation->getUnSetAttrImg() as $image)
                            @if(!in_array(basename($image->location,""),$imgShown))
                              @php                                
                                $imgShown[]=basename($image->location,"");
                                $var_count++; 
                                  // Bilder ohne Zuweisung
                              @endphp
                              <!-- Item -->
                              <a style="min-height:500px;border:0!important;" {{($loop->first) ? 'id=bigImgFlickity'."V".$var_count : ''}} href="{{ env('VSTCL_DOMAIN', 'https://visticle.online').'/storage'.$image->location }}" data-fancybox class="bigVarImg bigVarImg-{{ "V".$var_count }} d-flex align-items-center w-100 article-img-height">
                               <img style="border:0!important;max-width: 100%;    max-height: 500px;-webkit-transform: translateX(-50%)!important;transform: translateX(-50%)!important;margin: auto!important;position: absolute!important;left: 50%!important;float: none!important;top: 0!important;" src="{{ env('VSTCL_DOMAIN', 'https://visticle.online').'/storage'.$image->location }}" alt="..." class="card-img-top w-auto" >
                              </a>
                            @endif
                          @endforeach

                        </div>
                        <!-- Slider -->
                        <div id="smallImgFlickity" class="flickity-nav mx-n2 mt-2 mb-10 mb-md-0" data-flickity='{"asNavFor": "#articleSlider", "pageDots": false, "contain": true, "wrapAround": false}'>
                          @php   
                            // Hauptbild
                            $var_count = 0; $imgShown = [];  $smallImgC = 0; 
                            $variation = $article->variations()->where('stock', '>=', '1')->first(); 
                            $Images = [];
                            if($isVar == 0){$Images = $article->getOriginalImg('is_base');}else{$Images = $variation->getOriginalImg('is_base');}
                          @endphp
                          @foreach ($Images as $image)
                                @php                                   
                                  if($var_count>0){continue;}
                                  $var_count++;
                                  $color = $variation->attributes()->where('name', '=', 'fee-color')->first();                        
                                  if($color){ $possibleColors[] = $color->value; $smallImgC++;} 
                                  $imgShown[]=basename($image->location,""); 
                                @endphp
                          <!-- Item -->
                          <div {{($loop->first) ? 'id=smallImgFlickity'.(($color)? $color->id : "V".$var_count ) : ''}} class="col-12 px-2 smallVarImg smallVarImg-{{ (($color)? $color->id : "V".$var_count ) }}" style="max-width: 113px;">
                            <div class="embed-responsive embed-responsive-1by1 bg-cover" style="background-size: contain!important;background-image: url({{ env('VSTCL_DOMAIN', 'https://visticle.online').'/storage'.$image->location }});"></div>
                          </div>
                          @endforeach                   
                          
                          @php  // Bilder für die Farben
                            $possibleColors = [];                       
                          @endphp
                          @foreach ($article->variations()->where('stock', '>=', '1')->whereHas('images')->get() as $variation)
                              @php                           
                                $var_count++;
                                $color = $variation->attributes()->where('name', '=', 'fee-color')->first();                        
                                if(!$color || in_array($color->value, $uniqueColors) || $color->value == "") { continue; }
                                if($color){ $possibleColors[] = $color->value; $smallImgC++;} 
                              @endphp
                              @foreach ($variation->getThumbnailSmallImg('is_preview',2) as $image)
                                @if(!in_array(basename($image->location,""),$imgShown))
                                  @php                                
                                    $imgShown[]=basename($image->location,"");
                                  @endphp
                                  <!-- Item -->
                                  <div {{($loop->first) ? 'id=smallImgFlickity'.(($color)? $color->id : "V".$var_count ) : '' }} class="col-12 px-2 smallVarImg smallVarImg-{{ (($color)? $color->id : "V".$var_count ) }}" style="max-width: 113px;">
                                    <!-- Image -->
                                   <div class="embed-responsive embed-responsive-1by1 bg-cover" style="background-size: contain!important;background-image: url({{ env('VSTCL_DOMAIN', 'https://visticle.online').'/storage'.$image->location }});"></div>
                                  </div>
                                @endif
                              @endforeach           
                            
                          @endforeach

                          @foreach ($variation->getUnSetAttrImg() as $image)
                            @if(!in_array(basename($image->location,""),$imgShown))
                              @php // Bilder ohne Zuweisung
                                  $var_count++;
                                  $imgShown[]=basename($image->location,"");                                   
                              @endphp
                              <!-- Item -->
                              <div {{($loop->first) ? 'id=smallImgFlickity'."V".$var_count : '' }} class="col-12 px-2 smallVarImg smallVarImg-{{ "V".$var_count }}" style="max-width: 113px;">
                                <div class="embed-responsive embed-responsive-1by1 bg-cover" style="background-size: contain!important;background-image: url({{ env('VSTCL_DOMAIN', 'https://visticle.online').'/storage'.$image->location }});"></div>
                              </div>
                            @endif
                          @endforeach


      </div>

    </div>

  </div>
</div>

</div>


                <div class="col-12 col-md-6 pl-lg-10">
  
                  <!-- Header -->
                  <div class="row mb-1">
                    <div class="col">
  
                      <!-- Preheading -->
                        <a class="text-muted" href="{{ route('category.brands.name', $article->getBrand()) }}">{{ $article->getBrand() }}</a>
                      
  
                    </div>
                    @if (isset($reviews_meta[$article->id]))
                    @if ($reviews_meta[$article->id]['amount'] > 0)
                    <div class="col-auto">
  
                      <!-- Rating -->
                      <div class="rating font-size-xs text-dark" data-value="{{ $reviews_meta[$article->id]['score'] }}">
                        <div class="rating-item">
                          <i class="fas fa-star"></i>
                        </div>
                        <div class="rating-item">
                          <i class="fas fa-star"></i>
                        </div>
                        <div class="rating-item">
                          <i class="fas fa-star"></i>
                        </div>
                        <div class="rating-item">
                          <i class="fas fa-star"></i>
                        </div>
                        <div class="rating-item">
                          <i class="fas fa-star"></i>
                        </div>
                      </div>
  
                      <a class="font-size-sm text-reset ml-2" href="#reviews">
                        Bewertungen ({{ $reviews_meta[$article->id]['amount'] }})
                      </a>
  
                    </div>
                    @endif
                    @endif
                  </div>
  
                  <!-- Heading -->
                  <h3 class="mb-2">{{ $article->webname ?? $article->name }}</h3>
  
                  <!-- Price -->
                  <div class="mb-7 text-gray-400">
                    @foreach ($article->variations()->where('stock', '>=', '1')->get() as $variation)
                    @php
                        $standardPrice = $variation->getStandardPrice();
                        $discountPrice = $variation->getDiscountPrice();
                        $active = false;
                        if($variation->id == $firstVariation->id) {
                          $active = true;
                        }
                    @endphp    
                    <div id="priceFor{{$variation->id}}" class="articlePrices" style="{{(!$active) ? 'display:none;' : '' }}">
                    @if ($discountPrice && $onSale && $standardPrice->presentPrice() != $discountPrice->presentPrice())
                    <span class="font-size-lg font-weight-bold text-gray-350 text-decoration-line-through">
                        {{ $standardPrice->presentPrice() }}
                    </span>
                    <span class="ml-1 font-size-h5 font-weight-bolder" style="color: red;">
                        {{ $discountPrice->presentPrice() }}
                    </span>
                    @else
                    <span class="ml-1 font-size-h5 font-weight-bold">
                        {{ $standardPrice->presentPrice() }}
                    </span>
                    @endif
                    </div>
                    @endforeach

                    
                    <span class="ml-1 font-size-sm">(Auf Lager)</span>
                  </div>
  
                  <!-- Form -->
                  <form>
                  @php
                     $hiddenelem = 0;                     
                     if(count($possibleColors) == 0){$hiddenelem = 1;}
                     
                    $ArticleCat_of_fashionbox = $article->categories()->where('slug','=','fashionbox')->first(); // fashionbox
                    $Select_Herren = ['48/S','50/M','52/L','54/XL','56/XXL'];
                    $Select_Damen = ['34/XS','36/S','38/M','40/L','42/XL','44/XXL'];
                    $Select_Kinder = ['116','128','140','152','164'];
                  @endphp
                  <div class="form-group  {{ (($hiddenelem==1)? 'd-none' : '' ) }} {{ (($ArticleCat_of_fashionbox)? 'd-none' : '' ) }}">
  
                    <!-- Label -->
                    <p class="mb-4">
                      @php
                          $firstColor = $article->variations()->where('stock', '>=', '1')->first();
                          if($firstColor){$firstColor = $firstColor->attributes()->where('name', '=', 'fee-info1')->first();}                            
                      @endphp
                      Farbe: <strong id="colorCaption">{{ ($firstColor) ? $firstColor->value : '' }}</strong>
                    </p>
                    <!-- Radio -->
                    <div class="mb-8 ml-n1">
                      @php
                      $varCount = 0;
                      $possibleColors = [];
                      $uniqueColors = [];
                      $firstCeckedColor = '';
                      @endphp
                      @foreach ($article->variations()->where('stock', '>=', '1')->get() as $variation)
                          @php
                              $varCount++;
                              $color = $variation->attributes()->where('name', '=', 'fee-color')->first();
                              $colorText = $variation->attributes()->where('name', '=', 'fee-info1')->first();
                              if(!$color || in_array($color->value, $uniqueColors) || $color->value == "") { continue; }
                              $uniqueColors[] = $color->value;
                              $possibleColors[$color->id] = $color;

                              if($article->variations()->where('stock', '>=', '1')->first()->id == $variation->id) {
                                $firstCeckedColor = $color->value;
                              }
                          @endphp
                          <div class="custom-control custom-control-inline custom-control-img">
                            <input type="radio" class="custom-control-input" id="colorRadio{{ $varCount }}" name="colorRadio" data-toggle="form-caption" data-target="#colorCaption" data-value="{{$color->id}}" value="{{ ($colorText) ? $colorText->value : 'Farbe-'.$varCount }}" {{ ($varCount == 1) ? 'checked' : '' }}>
                            <label class="custom-control-label" for="colorRadio{{ $varCount }}">
                              @if ($variation->getThumbnailSmallImg('is_preview',2)->first())
                              <span class="embed-responsive embed-responsive-1by1 bg-cover" style="background-image: url({{ env('VSTCL_DOMAIN', 'https://visticle.online').'/storage'.$variation->getThumbnailSmallImg('is_preview',2)->first()->location }});"></span>
                              @else
                              @if ($article->getThumbnailSmallImg('is_preview',2)->first())
                              <span class="embed-responsive embed-responsive-1by1 bg-cover" style="background-image: url({{ env('VSTCL_DOMAIN', 'https://visticle.online').'/storage'.$article->getThumbnailSmallImg('is_preview',2)->first()->location }});"></span>
                              @endif
                              <span>{{ ($colorText) ? $colorText->value : 'Farbe-'.$varCount }}</span>
                              @endif
                            </label>
                          </div>
                      @endforeach
                    </div>

                  </div>
                     

                    @php
                     $counter=0; $hiddenelem = 0;
                     foreach ($possibleColors as $possibleColor)
                     {$SizeForColors = $article->variations()->where('stock', '>=', '1')->whereHas('attributes', function($query) use ($possibleColor){$query->where('name' ,'=', 'fee-color')->where('value', '=', $possibleColor->value);})->get();
                      foreach ($SizeForColors as $variation)
                      { $size = $variation->attributes()->where('name', '=', 'fee-size')->first(); if (!$size){continue;} $counter++; }
                     }                     
                     if($counter == 0){$hiddenelem = 1;}
                    @endphp
                    <div class="form-group ">
  
                      <!-- Label -->
                      <p class="mb-4 {{ (($hiddenelem==1)? 'd-none' : '' ) }} {{ (($ArticleCat_of_fashionbox)? 'd-none' : '' ) }}">
                        Größe: <strong><span id="sizeCaption">
                          @php
                              $size = $article->variations()->where('stock', '>', 0)->first()->attributes()->where('name', '=', 'fee-size')->first();
                              $length = $article->variations()->where('stock', '>', 0)->first()->attributes()->where('name', '=', 'fee-formLaenge')->where('value','!=','')->first();
                          @endphp
                          {{ (($size && $length)? $size->value.(($length) ? '/'.$length->value : '') : "") }}
                        </span></strong>
                      </p>
                      @foreach ($possibleColors as $possibleColor)
                      
                        <!-- Radio -->
                        <div class="mb-2 sizesForColors {{ (($hiddenelem==1)? 'd-none' : '' ) }} {{ (($ArticleCat_of_fashionbox)? 'd-none' : '' ) }}" id="sizesFor{{ $possibleColor->id }}" style="{{ ($possibleColor->value == $firstCeckedColor) ? '' : 'display: none;' }}">
                          @php
                              $varCount = 0;
                              $SizeForColors = $article->variations()->where('stock', '>=', '1')->whereHas('attributes', function($query) use ($possibleColor){$query->where('name' ,'=', 'fee-color')->where('value', '=', $possibleColor->value);})->get();
                          @endphp
                        @foreach ($SizeForColors as $variation)
                            @php
                                $size = $variation->attributes()->where('name', '=', 'fee-size')->first();
                                $length = $variation->attributes()->where('name', '=', 'fee-formLaenge')->where('value','!=','')->first();
                            @endphp
                            @if (!$size)
                                @continue;
                            @endif
                            @php
                                $varCount++;
                            @endphp
                            <div class="custom-control custom-control-inline custom-control-size mb-2">
                              <input type="radio" class="custom-control-input" name="sizeRadio" id="{{ $possibleColor->id }}sizeRadio{{ $varCount }}" value="{{ $size->value.(($length) ? '/'.$length->value : '') }}" data-id="{{ $variation->id }}" data-toggle="form-caption" data-target="#sizeCaption" {{ ($variation->stock < 1) ? 'disabled' : '' }} {{ ($varCount == 1) ? 'checked' : '' }}>
                              <label class="custom-control-label" for="{{ $possibleColor->id }}sizeRadio{{ $varCount }}">{{ $size->value.(($length) ? '/'.$length->value : '') }}</label>
                            </div>
                        @endforeach
                          </div>
                      @endforeach

                      @php
                        //$ArticleCat_of_fashionbox = $article->categories()->where('slug','=','fashionbox')->first(); // fashionbox
                        //$Select_Herren = ['48/S','50/M','52/L','54/XL','56/XXL'];
                        //$Select_Damen = ['34/XS','36/S','38/M','40/L','42/XL','44/XXL'];
                        //$Select_Kinder = ['116','128','140','152','164'];
                      @endphp
                      @if($ArticleCat_of_fashionbox)
                        <div class="form-row mb-2">
                          <div class="col-auto col-lg-4 col-xl-3 mb-3">
                            <p class="mb-2 ">Größe für Herren:</p>
                            <select name="Herren-Groesse" class="custom-select custom-select-xs w-100 bg-white font-weight-normal h-auto pl-2 pr-6  ajax-field" >
                                <option value="">- wählen -</option>
                                @foreach ($Select_Herren as $option_value)
                                  <option value="{{$option_value}}">{{$option_value}}</option>
                                @endforeach
                            </select>
                          </div>
                          <div class="col-auto col-lg-4 col-xl-3 mb-3">
                            <p class="mb-2 ">Größe für Damen:</p>
                            <select name="Damen-Groesse" class="custom-select custom-select-xs w-100 bg-white font-weight-normal h-auto pl-2 pr-6  ajax-field" >
                                <option value="">- wählen -</option>
                                @foreach ($Select_Damen as $option_value)
                                  <option value="{{$option_value}}">{{$option_value}}</option>
                                @endforeach
                            </select>
                          </div>
                          <div class="col-auto col-lg-4 col-xl-3 mb-3">
                            <p class="mb-2 ">Größe für Kinder:</p>
                            <select name="Kinder-Groesse" class="custom-select custom-select-xs w-100 bg-white font-weight-normal h-auto pl-2 pr-6  ajax-field" >
                                <option value="">- wählen -</option>
                                @foreach ($Select_Kinder as $option_value)
                                  <option value="{{$option_value}}">{{$option_value}}</option>
                                @endforeach
                            </select>
                          </div>
                        </div>
                        <div class="form-row mb-2">
                          <div class="col-12 col-lg-10 col-xl-9">
                            <div class="input-group">
                              <input name="freitext" placeholder="Freitext für Wunschfarbe etc." type="text" class="form-control ajax-field"  value="" >
                            </div>
                          </div>
                        </div>
                      @endif
  
                      <div class="form-row mb-7">
                        <div class="col-12 col-lg-auto">
  
                          <!-- Submit -->
                          <button class="btn btn-block btn-primary mb-2 ajax-submit ajax-form" id="addToCartBtn" data-toggle="button" data-action="cart_item_addbyid" data-id="{{ $article->id }}" data-id2="{{ $article->variations()->where('stock', '>=', '1')->first()->id }}">
                            <i class="fe fe-shopping-cart mr-2"></i> In den Warenkorb
                          </button>
  
                        </div>
                        <div class="col-12 col-lg-auto">
                          @php
                          /* <!-- Wishlist                           
                          <button class="btn btn-outline-primary btn-block mb-2 ajax-submit ajax-toggle" id="addToWishlistBtn" data-id="{{ $article->id }}" data-id2="{{ $article->variations()->first()->id }}" data-action="wishlist_add">
                            <span class="ajax_toggle default">Auf den Wunschzettel <i class="fe fe-heart ml-2"></i></span>
                            <span class="ajax_toggle hidden text-success" style="display:none;">Auf dem Wunschzettel <i class="fe fe-heart text-success ml-2"></i></span>
                          </button>--> */
                          @endphp
  
                        </div>
                      </div>

                      <div class="form-row mb-7">
                        <div class="col-12">
                            <p class="text-gray-500">
                              {!! $article->short_description !!}
                            </p>
                        </div>
                      </div>

  
                    </div>

                  </form>
                  <div class="row">
                    <p>Haben Sie Fragen zum Produkt oder zur Bestellung oder möchten Sie Ihre Bestellung telefonisch aufgeben, rufen Sie uns gerne unter {!! env('ARTICLE_DETAIL_TEL','') !!} an. Wir freuen uns auf Sie!</p>
                  </div>

  
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

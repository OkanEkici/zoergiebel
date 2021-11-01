    <!-- CATEGORIES -->
    <section class="{{ $sectionCssClasses ?? '' }}">
        <div class="container pb-12">
            <h1 class="text-primary text-center">EIN HERZLICHES WILLKOMMEN!</h1>
            <h4 class="text-body text-center">Du bist einzigartig und Du suchst das passende Outfit für einen einzigartigen Wow-Auftritt? Oder einfach endlich mal die perfekt sitzende Lieblingshose! Ein It-Piece, das die Blicke auf sich zieht. Dein ganz persönlicher Stil? Was immer Du in Sachen Fashion suchst, wir helfen Dir beim Finden.
                </h4>
        </div>
        <div class="container-fluid px-3 px-md-6">
          <div class="row mx-n3">
              
            <!-- Slider <div class="col-12"><div class="flickity-buttons-lg flickity-buttons-offset px-lg-12" data-flickity='{"prevNextButtons": true, "pageDots": false, "wrapAround" : true, "autoPlay": 1500}'> -->
            
              
            @foreach ($cats as $optionTitle => $optionData)
            <div class="col-xs-12 col-md-6 col-xl-4 mx-auto my-2  shadow shadow-hover lift">
                <div class="card card-xl mb-3 mb-sm-0" style="min-height: 300px">    
                    <!-- Background -->
                    <a title="{{ $optionTitle }}" class="btn btn-white text-dark" href="{{ (($optionData['slug2']!='')? route('category.index.secondary', [$optionData['slug'], $optionData['slug2']]) : route('category.index', $optionData['slug']) ) }}">
                    <div class="card-bg">
                        <div class="card-bg-img bg-cover" style="background-image: url({{ $optionData['img'] }});"></div>
                    </div>     
                    </a>  
                </div>
            </div>
            @endforeach
              
            <!--</div></div>-->
        
          </div>
        </div>
      </section>
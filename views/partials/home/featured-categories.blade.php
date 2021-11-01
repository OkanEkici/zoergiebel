    <!-- NEW ARRIVALS -->
    <section class="{{ $sectionCssClasses ?? '' }}">
        <div class="container">
          <div class="row">
            <div class="col-12">
  
              <!-- Heading -->
              <h2 class="mb-10 text-center">{{ $title ?? '' }}</h2>
  
            </div>

              <div class="col-12">
            <!-- Slider-->
            @php
                $initalIndex = round(count($featuredCategories) / 2);
            @endphp
            <div class="flickity-buttons-lg flickity-buttons-offset px-lg-12" data-flickity='{"prevNextButtons": true, "imagesLoaded": true, "pageDots": false, "wrapAround" : true, "initialIndex": {{ $initalIndex }}}'>
            @foreach ($featuredCategories as $featuredCategory)
            
              <div class="card col-12 col-md-2 mb-10 bg-light">

                    <!-- Image TODO: SET CORRECT IMAGE -->
                    <a href="{{ route('category.index', $featuredCategory->slug)  }}">
                        <img src="images/categories/{{ $featuredCategory->slug }}.png" alt="..." class="card-img-top">
                    </a>


                        <!-- Body -->
                        <div class="card-body px-0 {{ $bgCssClass ?? bg-white }} text-center">
                            <!-- Heading TODO: HREF TO RIGHT PRODUCT PAGE -->
                            <div class="mb-1 font-weight-bold">
                                <a class="text-body" href="{{ route('category.index', $featuredCategory->slug) }}">{{ $featuredCategory->name }}</a>
                            </div>
                    </div>   
                    
               
              </div>
            @endforeach
          </div>
              </div>
          </div>
        </div>
      </section>
     
     
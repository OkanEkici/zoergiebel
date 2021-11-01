 <!-- SLIDER -->
 <section class="p-6">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-sm-4 d-flex flex-column">
                            <!-- Card -->
            <div class="card card-lg">

                <!-- Circle -->
                <div class="card-circle card-circle-lg card-circle-right">
                @if ($articles->first()->price()->where('name','=','sale')->first())
                        <strong class="font-size-xs text-decoration-line-through opacity-80">{{ $articles->first()->price()->where('name','=','standard')->first()->presentPrice() }}</strong>
                        <span class="font-size-h6 font-weight-bold">{{ $articles->first()->price()->where('name','=','sale')->first()->presentPrice() }}</span>
                @else
                    <span class="font-size-h6 font-weight-bold">{{ $articles->first()->price()->where('name','=','standard')->first()->presentPrice() }}</span>
                @endif
                </div>
  
                <!-- Image -->
                <img class="card-img-top" src="assets/img/products/product-30.jpg" alt="...">
  
                <!-- Body -->
                <div class="card-body position-relative mx-6 mx-lg-11 mt-n11 bg-white text-center">
  
                  <!-- Heading -->
                  <h4 class="mb-0">{{ $articles->first()->webname ?? $articles->first()->name }}</h4>
  
                  <!-- Link -->
                  <a class="btn btn-link stretched-link px-0 text-reset" href="{{ route('shop.show', $articles->first()->ean ) }}">
                    Entdecken <i class="fe fe-arrow-right ml-2"></i>
                  </a>
  
                </div>
  
              </div>

            </div>
            <div class="col-12 col-sm-8 d-flex flex-column">
    <div data-flickity='{"prevNextButtons": true, "fade": true}'>

      <!-- Item -->
      <div class="w-100 bg-cover" style="background-image: url(assets/img/covers/cover-5.jpg);">
        <div class="container d-flex flex-column">
          <div class="row align-items-center py-12" style="min-height: 617px;">
            <div class="col-12 col-md-6 col-lg-5 col-xl-4 offset-md-1">

              <!-- Heading -->
              <h1>Sommer Sale</h1>

              <!-- Heading -->
              <h2 class="display-1 text-primary">-70%</h2>

              <!-- Heading -->
              <h5 class="mt-n4 mb-8">mit dem Code CN67EW*</h5>

              <!-- Button -->
              <a class="btn btn-dark" href="shop.html">
                Entdecken <i class="fe fe-arrow-right ml-2"></i>
              </a>

            </div>
          </div>
        </div>
      </div>

      <!-- Item -->
      <div class="w-100 bg-cover" style="background-image: url(assets/img/covers/cover-23.jpg);">
        <div class="container d-flex flex-column">
          <div class="row align-items-center justify-content-end py-12" style="min-height: 617px;">
            <div class="col-12 col-md-6 col-lg-5 col-xl-4 offset-md-n1">

              <!-- Heading -->
              <h1 class="mb-5">Sommerkollektion</h1>

              <!-- Text -->
              <p class="mb-8 font-size-lg text-gray-500">
                Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt.
              </p>

              <!-- Button -->
              <a class="btn btn-dark" href="shop.html">
                Entdecken <i class="fe fe-arrow-right ml-2"></i>
              </a>

            </div>
          </div>
        </div>
      </div>

      <!-- Item -->
      <div class="w-100 bg-cover" style="background-image: url(assets/img/covers/cover-16.jpg);">
        <div class="bg-dark-20">
          <div class="container d-flex flex-column">
            <div class="row align-items-center justify-content-end" style="min-height: 617px;">
              <div class="col-12 text-center text-white">

                <!-- Preheading -->
                <h4 class="mb-0">Sommer Styles</h4>

                <!-- Heading -->
                <h1 class="display-1">
                  50% Reduziert
                </h1>

                <!-- Links -->
                <p class="mb-0">
                  <a href="shop.html" class="link-underline text-reset mx-4 my-4">Shop Hosen</a>
                  <a href="shop.html" class="link-underline text-reset mx-4 my-4">Shop Blusen</a>
                </p>

              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
            </div>
        </div>
    </div>
  </section>
    <!-- FEATURES -->
    <section class="py-9 {{ $bgClass ?? 'bg-primary' }}">
        <div class="container">
          <div class="row">
              @foreach ($details as $detail)
              <div class="col-12 col-md-6 col-lg-4">
  
                <!-- Item -->
                <div class="d-flex mb-6 mb-lg-0">
    
                  <!-- Icon -->
                  <i style="font-size: 50px!important;" class="{{ $detail['icon'] ?? '' }} font-size-lg text-white"></i>
    
                  <!-- Body -->
                  <div class="ml-6">
    
                    <!-- Heading -->
                    <h6 class="heading-lg mb-1 text-white">
                      {{ $detail['title'] ?? '' }}
                    </h6>
    
                    <!-- Text TODO: SHOP_CONFIG_SHIPMENT FREE FROM-->
                    <p class="mb-0 font-size-lg text-white">
                      {{ $detail['text'] ?? '' }}
                    </p>
    
                  </div>
    
                </div>
    
              </div>
              @endforeach
          </div>
        </div>
      </section>
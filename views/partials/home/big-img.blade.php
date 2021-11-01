<!-- WELCOME -->
    <section class="{{ $sectionCss ?? '' }}">
      <div class="{{ (isset($container) ? $container : 'container-fluid') }}">
        <div class="row justify-content-center py-14 bg-cover" style="background-image: url({{ (isset($bigImgPath) ? $bigImgPath : 'images/slider/main/slider_1.png') }});">
          <div class="col-12 col-md-8 col-lg-6 col-xl-5">

            @if (isset($bigImgText))
            <!-- Heading -->
            <h2 class="mb-0 text-center text-white bg-secondary p-2">
              {{ $bigImgText }}
            </h1>
            @endif
            @if (isset($subImgText))
              <br>
                <h4 class="mb-0 text-center text-white bg-secondary p-2">{{ $subImgText }}</h3>
            @endif

          </div>
        </div>
      </div>
    </section>
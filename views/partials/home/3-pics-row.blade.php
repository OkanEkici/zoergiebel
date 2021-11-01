<div class="row">

        @foreach ($pics as $pic)
        <div class="col-12 col-md-4">

            <!-- Card -->
            <div class="card mb-7 shadow shadow-hover lift">
      
              <!-- Image -->
                <img src="{{ $pic['url'] }}" alt="..." class="card-img-top">
      
              <!-- Body -->
              <div class="card-body px-8 py-7">
      
                <!-- Heading -->
                <h6 class="mb-0 text-center">
                    {{ $pic['text'] ?? '' }}
                </h6>
      
              </div>
      
            </div>
      
          </div>
        @endforeach
</div>
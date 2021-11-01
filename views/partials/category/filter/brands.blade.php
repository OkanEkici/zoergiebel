@if(isset($header) && $header!='Marken')
<li class="nav-item">

    <!-- Toggle -->
    <a class="nav-link dropdown-toggle font-size-lg text-reset border-bottom mb-6" data-toggle="collapse" href="#brandCollapse">
      Marke
    </a>

    <!-- Collapse data-toggle="simplebar" -->
    <div class="collapse show" id="brandCollapse"  data-target="#brandGroup">

      <!-- Search data-toggle="lists" data-options='{"valueNames": ["name"]}' -->
      <div >

        <!-- Form group -->
        <div class="form-group mb-6" id="brandGroup">
          <div class="list">
              @php
                  $brandCount = 0;
              @endphp
              @foreach ($brands as $brand)
                <div class="custom-control custom-checkbox mb-3">
                    <input class="custom-control-input brandFilter" value="{{ $brand }}" id="brand{{ $brandCount }}" type="checkbox">
                    <label class="custom-control-label name" for="brand{{ $brandCount }}">{{ $brand }}</label>
                </div>
                @php
                    $brandCount++;
                @endphp
              @endforeach
          </div>
        </div>

      </div>

    </div>

  </li>
@endif

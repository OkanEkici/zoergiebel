<li class="nav-item">

    <!-- Toggle -->
    <a class="nav-link dropdown-toggle font-size-lg text-reset border-bottom mb-6" data-toggle="collapse" href="#sizeCollapse">
      Größe
    </a>

    <!-- Collapse -->
    <div class="collapse" id="sizeCollapse" data-toggle="simplebar" data-target="#sizeGroup">
      <div class="form-group form-group-overlow mb-6" id="sizeGroup">
          @php
              $sizesCount = 0;
          @endphp
          @foreach ($sizes as $size)
            <div class="custom-control custom-control-inline custom-control-size mb-2">
                <input class="custom-control-input sizesFilter" value="{{ $size }}" id="size{{ $sizesCount }}" type="checkbox">
                <label class="custom-control-label" for="size{{ $sizesCount }}">
                {{ $size }}
                </label>
            </div>
            @php
                $sizesCount++;
            @endphp
          @endforeach

      </div>
    </div>

  </li>
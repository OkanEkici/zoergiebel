<li class="nav-item">

    <!-- Toggle -->
    <a class="nav-link dropdown-toggle font-size-lg text-reset border-bottom mb-6" data-toggle="collapse" href="#colorCollapse">
      Farbe
    </a>

    <!-- Collapse -->
    <div class="collapse" id="colorCollapse" data-toggle="simplebar" data-target="#colorGroup">
      <div class="form-group form-group-overflow mb-6" id="colorGroup">
        @php
            $colorCount = 0;
        @endphp
        @foreach ($colors as $color)
            <div class="custom-control custom-control-color mb-3">
                <input class="custom-control-input colorFilter" value="{{ $color }}" id="colorOne{{ $colorCount }}" type="checkbox">
                <label class="custom-control-label text-grey-300" for="colorOne{{ $colorCount }}">
                <span class="text-body">{{ $color }}</span>
                </label>
            </div>
            @php
                $colorCount++;
            @endphp
        @endforeach
      </div>
    </div>

  </li>
<li class="nav-item">

    <!-- Toggle -->
    <a class="nav-link dropdown-toggle font-size-lg text-reset border-bottom mb-6" data-toggle="collapse" href="#lengthCollapse">
      Länge
    </a>

    <!-- Collapse -->
    <div class="collapse" id="lengthCollapse" data-toggle="simplebar" data-target="#lengthGroup">
      <div class="form-group form-group-overlow mb-6" id="lengthGroup">
          @php
              $lengthsCount = 0;
          @endphp
          @foreach ($lengths as $length)
            @php
            if($length == ""){continue;}
            @endphp
            <div class="custom-control custom-control-inline custom-control-length mb-2">
                <input class="custom-control-input lengthsFilter" value="{{ $length }}" id="length{{ $lengthsCount }}" type="checkbox">
                <label class="custom-control-label" for="length{{ $lengthsCount }}">
                {{ $length }}
                </label>
            </div>
            @php
                $lengthsCount++;
            @endphp
          @endforeach

      </div>
    </div>

  </li>
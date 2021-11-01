  <!-- Header -->
  <div class="row align-items-center mb-7">
    <div class="col-12 col-md">

      <!-- Heading -->
      <h3 class="mb-1">{{ $header }}</h3>

      <!-- Breadcrumb -->
      <ol class="breadcrumb mb-md-0 font-size-xs text-gray-400">
        <li class="breadcrumb-item">
          <a class="text-gray-400" href="{{ route('shop.index') }}">Home</a>
        </li>
        <li class="breadcrumb-item active">
          {{ $header }}
        </li>
      </ol>

    </div>

    <!--
    <div class="col-12 col-md-auto">
      <select class="custom-select custom-select-xs">
        <option selected>Marken</option>
        <option>Preis aufsteigend</option>
        <option>Preis absteigend</option>
        <option>Farbe</option>
        <option>Größe</option>
      </select>
    </div>
    -->
  </div>
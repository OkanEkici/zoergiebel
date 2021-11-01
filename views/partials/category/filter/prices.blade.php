<li class="nav-item">

    <!-- Toggle -->
    <a class="nav-link dropdown-toggle font-size-lg text-reset border-bottom mb-6" data-toggle="collapse" href="#priceCollapse">
      Preis
    </a>

    <!-- Collapse -->
    <div class="collapse" id="priceCollapse" data-toggle="simplebar" data-target="#priceGroup">

      <!-- Form group-->
      <div class="form-group form-group-overflow mb-6" id="priceGroup">
        <div class="custom-control custom-checkbox mb-3">
          <input class="custom-control-input" id="priceOne" type="checkbox" checked>
          <label class="custom-control-label" for="priceOne">
            $10.00 - $49.00
          </label>
        </div>
        <div class="custom-control custom-checkbox mb-3">
          <input class="custom-control-input" id="priceTwo" type="checkbox" checked>
          <label class="custom-control-label" for="priceTwo">
            $50.00 - $99.00
          </label>
        </div>
        <div class="custom-control custom-checkbox mb-3">
          <input class="custom-control-input" id="priceThree" type="checkbox">
          <label class="custom-control-label" for="priceThree">
            $100.00 - $199.00
          </label>
        </div>
        <div class="custom-control custom-checkbox">
          <input class="custom-control-input" id="priceFour" type="checkbox">
          <label class="custom-control-label" for="priceFour">
            $200.00 and Up
          </label>
        </div>
      </div>

      <!-- Range -->
      <div class="d-flex align-items-center">

        <!-- Input -->
        <input type="number" class="form-control form-control-xs" placeholder="$10.00" min="10">

        <!-- Divider -->
        <div class="text-gray-350 mx-2">‒</div>

        <!-- Input -->
        <input type="number" class="form-control form-control-xs" placeholder="$350.00" max="350">

      </div>

    </div>

  </li>
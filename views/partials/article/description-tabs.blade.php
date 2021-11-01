<!-- DESCRIPTION -->
<section class="pt-11">
    <div class="container">
      <div class="row">
        <div class="col-12">

          <!-- Nav -->
          <div class="nav nav-tabs nav-overflow justify-content-start justify-content-md-center border-bottom">
            <a class="nav-link active" data-toggle="tab" href="#descriptionTab">
              Beschreibung
            </a>
            <a class="nav-link" data-toggle="tab" href="#shippingTab">
              Versand & Rückgabe
            </a>
          </div>

          <!-- Content -->
          <div class="tab-content">
            <div class="tab-pane fade show active" id="descriptionTab">
              <div class="row justify-content-center py-9">
                <div class="col-12 col-lg-10 col-xl-8">
                  <div class="row">
                    <div class="col-12">

                      <!-- Text -->
                      <p class="text-gray-500">
                        {!! $article->description !!}
                      </p>
                      <p class="text-gray-400" style="font-size: 14px;">
                        EAN: {{ str_replace('vstcl-','',$article->vstcl_identifier) }}
                      </p>

                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="tab-pane fade" id="shippingTab">
              <div class="row justify-content-center py-9">
                <div class="col-12 col-lg-10 col-xl-8">

                  <!-- Table -->
                  <div class="table-responsive">
                    <table class="table table-bordered table-sm table-hover">
                      <thead>
                        <tr>
                          <th>Versandarten</th>
                          <th>Lieferzeit</th>
                          <th>Preis</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>Standard Versand</td>
                          <td>Lieferung in 3 - 4 Werktagen</td>
                          <td>3.99€</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </section>
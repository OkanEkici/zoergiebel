
    <!-- CONTENT -->
    <section class="pt-7 pb-12">
      <div class="container">
        <div class="row">
          <div class="col-12 text-center">

            <!-- Heading -->
            <h3 class="mb-10">Herzlich Willkommen {{ Auth::user()->name }}</h3>

          </div>
        </div>
        <div class="row">
          <div class="col-12 col-md-3">

						@include('partials.account.include.loggedin_sidenav')

          </div>
          <div class="col-12 col-md-9 col-lg-8">

						@if (session('status'))
								<div class="alert alert-success" role="alert">
										{{ session('status') }}
								</div>
						@endif

            <!-- Form -->
            <form method="post" action="">
							@csrf
              <div class="row">
                <div class="col-12">
                  
									Übersicht
									
								</div>
              </div>
            </form>

          </div>
        </div>
      </div>
    </section>


    <!-- CONTENT -->
    <section class="pt-7 pb-12 bg-light">
      <div class="container">
        <div class="row">
          <div class="col-12 text-center">

            <!-- Heading -->
            <h3 class="mb-10">Wunschliste</h3>

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
            <div class="form_replace">
								
							<!-- Products -->
							<div class="row">

								@forelse ($wishlist as $wishlist_item)
									
									<!-- Item -->
									<div class="col-6 col-md-4">
										<div class="card mb-7">
											
											<!-- Image -->
											<div class="card-img">

												<!-- Action -->
												<button class="btn btn-xs btn-circle btn-white-primary card-action card-action-right ajax-submit" data-action="wishlist_delete" data-id="{{ $wishlist_item->id }}">
													<i class="fe fe-x"></i>
												</button>

												<!-- Button -->
												<a href="/shop/{{ $wishlist_item->slug }}" class="btn btn-xs btn-block btn-dark card-btn">
													<i class="fe fe-eye mr-2 mb-1"></i> Quick View
												</a>

												<!-- Image -->
												<img class="card-img-top" src="/assets/img/products/product-6.jpg" alt="{{ $wishlist_item->name }}">

											</div>

											<!-- Body -->
											<div class="card-body font-weight-bold text-center">
												<a class="text-body" href="{{ route('shop.index').'/'.$wishlist_item->slug }}">{{ $wishlist_item->name }}</a>
											</div>

										</div>
									</div>

								@empty
								
									<p>Sie haben noch keine Einträge</p>
								
								@endforelse
								
							</div>

							@if (count($wishlist))
								
								<!-- Pagination -->
								<nav class="d-flex justify-content-center justify-content-md-end mt-10">
									
									{{ $wishlist->links() }}
									
								</nav>
								
							@endif
							
            </div>
						
          </div>
        </div>
      </div>
    </section>
		
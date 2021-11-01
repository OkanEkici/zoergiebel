
		<!-- REVIEWS -->
    <section class="pt-9 pb-11" id="reviews">
      <div class="container">
        <div class="row">
          <div class="col-12">

            <!-- Heading -->
            <h4 class="mb-10 text-center">Kundenbewertungen</h4>

            <!-- Header -->
            <div class="row align-items-center">
            @if (isset($reviews_meta[$article->id]))
              @if ($reviews_meta[$article->id]['amount'] > 0)
              <div class="col-12 col-md-auto">
								
                  &nbsp;
                  
                </div>

                <div class="col-12 col-md text-md-center">
  
                  <!-- Rating -->
                  <div class="rating text-dark h6 mb-4 mb-md-0" data-value="{{ $reviews_meta[$article->id]['score'] }}">
                    <div class="rating-item">
                      <i class="fas fa-star"></i>
                    </div>
                    <div class="rating-item">
                      <i class="fas fa-star"></i>
                    </div>
                    <div class="rating-item">
                      <i class="fas fa-star"></i>
                    </div>
                    <div class="rating-item">
                      <i class="fas fa-star"></i>
                    </div>
                    <div class="rating-item">
                      <i class="fas fa-star"></i>
                    </div>
                  </div>
  
                  <!-- Count -->
                  <strong class="font-size-sm ml-2">Bewertungen ({{ $reviews_meta[$article->id]['amount'] }})</strong>
  
                </div>
              @endif
              @endif
              <div class="col-12 col-md-auto mx-auto">

                <!-- Button -->
                <a class="btn btn-sm btn-primary" data-toggle="collapse" href="#reviewForm">
                  Bewertung schreiben
                </a>

              </div>
            </div>

            <!-- New Review -->
            <div class="collapse" id="reviewForm">

              <!-- Divider -->
              <hr class="my-8">

              @if (Auth::user())
							
							<!-- Form -->
              <form>
                <div class="row">
                  <div class="col-12 text-center">
                    <div class="form-group">
											{{ Auth::user()->name }}
										</div>
									</div>
                  <div class="col-12 mb-6 text-center">

                    <!-- Text -->
                    <p class="mb-1 font-size-xs">
                      Bewertung:
                    </p>

                    <!-- Rating form -->
                    <div class="rating-form">

                      <!-- Input -->
                      <input class="rating-input ajax-field" name="stars" type="range" min="1" max="5" value="5">

                      <!-- Rating -->
                      <div class="rating h5 text-dark" data-value="5">
                        <div class="rating-item">
                          <i class="fas fa-star"></i>
                        </div>
                        <div class="rating-item">
                          <i class="fas fa-star"></i>
                        </div>
                        <div class="rating-item">
                          <i class="fas fa-star"></i>
                        </div>
                        <div class="rating-item">
                          <i class="fas fa-star"></i>
                        </div>
                        <div class="rating-item">
                          <i class="fas fa-star"></i>
                        </div>
                      </div>

                    </div>

                  </div>
                  <div class="col-12">

                    <!-- Name -->
                    <div class="form-group">
                      <label class="sr-only" for="reviewTitle">Titel:</label>
                      <input class="form-control form-control-sm ajax-field" id="reviewTitle" name="title" type="text" placeholder="Titel *" required>
                    </div>

                  </div>
                  <div class="col-12">

                    <!-- Name -->
                    <div class="form-group">
                      <label class="sr-only" for="reviewText">Beschreibung:</label>
                      <textarea class="form-control form-control-sm ajax-field" id="reviewText" name="text" rows="5" placeholder="Beschreibung *" required></textarea>
                    </div>

                  </div>
                  <div class="col-12">
                    <div class="form-group mb-7">
                      <div class="g-recaptcha" id="feedback-recaptcha" data-sitekey="{{ env('GOOGLE_RECAPTCHA_KEY')  }}"></div>
                    </div>
                  </div>
                  <div class="col-12 text-center">

                    <!-- Button -->
                    <button class="btn btn-outline-primary ajax-submit ajax-form" type="submit" data-action="review_add" data-id="{{ $article->id }}">
                      Senden
                    </button>

                  </div>
                </div>
              </form>
							
							@else
							
							<div class="row">
								<div class="col-12 mb-6 text-center">

									<!-- Text -->
									<p class="mb-1 font-size-xs">
										Sie müssen sich anmelden, um eine Bewertung zu schreiben: <a href="{{ route('login') }}">Login</a>
									</p>
									
								</div>
							</div>
							
							@endif

            </div>

            <!-- Reviews -->
            <div class="mt-8">

              @forelse ($reviews as $review_item)
							@if (isset($review_item[$article->id]))
							<!-- Review -->
              <div class="review">
                <div class="review-body">
                  <div class="row">
                    <div class="col-12 col-md-auto">

                      <!-- Avatar -->
                      <div class="avatar avatar-xxl mb-6 mb-md-0">
                        <span class="avatar-title rounded-circle">
                          <i class="fa fa-user"></i>
                        </span>
                      </div>

                    </div>
                    <div class="col-12 col-md">

                      <!-- Header -->
                      <div class="row mb-6">
                        <div class="col-12">

                          <!-- Rating -->
                          <div class="rating font-size-sm text-dark" data-value="{{ $review_item[$article->id]->stars }}">
                            <div class="rating-item">
                              <i class="fas fa-star"></i>
                            </div>
                            <div class="rating-item">
                              <i class="fas fa-star"></i>
                            </div>
                            <div class="rating-item">
                              <i class="fas fa-star"></i>
                            </div>
                            <div class="rating-item">
                              <i class="fas fa-star"></i>
                            </div>
                            <div class="rating-item">
                              <i class="fas fa-star"></i>
                            </div>
                          </div>

                        </div>
                        <div class="col-12">

                          <!-- Time -->
                          <span class="font-size-xs text-muted">
                            {{ $review_item[$article->id]->name }}, <time datetime="{{ $review_item[$article->id]->created_at }}">{{ $review_item[$article->id]->created_at }}</time>
                          </span>

                        </div>
                      </div>

                      <!-- Title -->
                      <p class="mb-2 font-size-lg font-weight-bold">
											{{ $review_item[$article->id]->title }}
                      </p>

                      <!-- Text -->
                      <p class="text-gray-500">
                        {{ $review_item[$article->id]->text }}
                      </p>

                    </div>
                  </div>
                </div>
              </div>
              @endif

							@empty
							
							
							@endforelse
							
            </div>
            @if(isset($reviews[$article->id]))
						@if (count($reviews[$article->id]))
							
							<!-- Pagination -->
							<nav class="d-flex justify-content-center justify-content-md-end mt-10">
								
								{{ $reviews[$article->id]->links() }}
								
							</nav>
            @endif	
						@endif
						
          </div>
        </div>
      </div>
    </section>

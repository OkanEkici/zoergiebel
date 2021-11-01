<div class="dropdown-menu w-100">
        <div class="card card-lg">
          <div class="card-body">
              <div class="container">
            <div class="row">
                @foreach ($allSubCategories as $subcategory)

                <div class="col-6 col-md">
                    
                    @if (isset($subcategory->allSubCategories) && count($subcategory->allSubCategories) > 0)
                        <!-- Heading -->
                        <div class="mb-5 font-weight-bold"><a href="{{ route('category.index', $subcategory->slug) }}">{{ $subcategory->name }}</a></div>

                        <!-- Links -->
                        <ul class="list-styled mb-6 mb-md-0 font-size-sm">
                        @foreach ($subcategory->allSubCategories as $subsubcategory)
                            <li class="list-styled-item">
                                <a class="list-styled-link" href="{{ route('category.index', $subcategory->slug) }}">{{ $subsubcategory->name }}</a>
                            </li>
                        @endforeach
                        </ul>
                        
                    @else
                    <div class="mb-5 font-weight-bold"><a href="{{ route('category.index', $subcategory->slug) }}">{{ $subcategory->name }}</a></div>
                    @endif
                </div>
                @endforeach
                <div class="col-4 d-none d-lg-block">
                </div>
            </div>
              </div>
          </div>
        </div>
      </div>
      
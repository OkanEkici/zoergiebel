<div class="navbar navbar-fashion navbar-expand-lg navbar-dark {{ $classList }}">
        <div class="container p-2">
      
          <!-- Toggler -->
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarFashionBottomCollapse" aria-controls="navbarFashionBottomCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
      
          <!-- Collapse -->
          <div class="collapse navbar-collapse" id="navbarFashionBottomCollapse">
            <ul class="navbar-nav">
                    @foreach ($categories as $category)
                    <li class="nav-item dropdown position-static">
                        <!-- Toggle -->
                    <a class="nav-link" data-toggle="dropdown"  href="{{ route('category.index', $category->slug) }}">{{ $category->name }}</a>
                    
                    @if (isset($category->allSubCategories) && count($category->allSubCategories) > 0)
                        @include('layout.partials.dropdown-category', ['allSubCategories' => $category->allSubCategories])
                    @endif
              
                    </li>
                @endforeach
            </ul>
          </div>
      
        </div>
      </div>
      
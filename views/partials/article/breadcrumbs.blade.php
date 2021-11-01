    <!-- BREADCRUMB -->
    <nav class="py-5">
        <div class="container">
          <div class="row">
            <div class="col-12">
  
              <!-- Breadcrumb -->
              <ol class="breadcrumb mb-0 font-size-xs text-gray-400">
                <li class="breadcrumb-item">
                  <a class="text-gray-400" href="{{ route('shop.index') }}">Home</a>
                </li>

                @foreach ($article->categories()->with('allParentCategories')->get() as $category)
                  @if ($category->allParentCategories)
                  @if ($category->allParentCategories->allParentCategories()->first())
                  <li class="breadcrumb-item">
                    <a class="text-gray-400" href="{{ route('category.index', $category->allParentCategories->allParentCategories()->first()->slug ) }}">{{ $category->allParentCategories->allParentCategories()->first()->name }}</a>
                </li>
                  @endif
                    <li class="breadcrumb-item">
                        <a class="text-gray-400" href="{{ route('category.index', $category->allParentCategories->slug) }}">{{ $category->allParentCategories->name }}</a>
                    </li>
                  @endif

                <li class="breadcrumb-item">
                <a class="text-gray-400" href="{{ route('category.index', $category->slug) }}">{{ $category->name }}</a>
                  </li>

                @endforeach
                <li class="breadcrumb-item active">
                  {{ $article->webname ?? $article->name }}
                </li>
              </ol>
  
            </div>
          </div>
        </div>
      </nav>
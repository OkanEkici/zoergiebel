<div class="dropdown-menu w-100 position-md-fixed" style="top: auto;">
    <div class="card card-lg bg-white">
      <div class="card-body">
          <div class="container">
          
            <div class="row">
            
            <div class="flex-column col-md">

            <ul class="list-styled mb-2 mb-md-0 font-size-sm float-left">
                @php
                    $categoriesCount = 0;
                @endphp
            @foreach ($categories as $category)
                @php
                    $categoriesCount++;
                @endphp
                @if ($categoriesCount >= 6)
                    </ul>
                    <ul class="list-styled mb-2 ml-6 mb-md-0 font-size-sm float-left">
                        @php
                            $categoriesCount = 0;
                        @endphp
                @endif
                @php
                    $hasSubCats = $category->allSubCategories()->first();
                    $CatProducts_count = $category->products_count();

                    $ThisSubsCatProducts_count=$CatProducts_count;
                @endphp
                @foreach ($category->allSubCategories()->get() as $subcategory)
                    @php                                      
                    $ThisSubsCatProducts_count += $subcategory->products_count();
                    @endphp
                    @foreach ($subcategory->allSubCategories()->get() as $subsubcategory)
                        @php                                      
                            $ThisSubsCatProducts_count += $subsubcategory->products_count();
                        @endphp
                        @foreach ($subsubcategory->allSubCategories()->get() as $subsubsubcategory)
                            @php                                      
                            $ThisSubsCatProducts_count += $subsubsubcategory->products_count();
                            @endphp
                            @foreach ($subsubsubcategory->allSubCategories()->get() as $subsubsubsubcategory)
                                @php                                      
                                $ThisSubsCatProducts_count += $subsubsubsubcategory->products_count();
                                @endphp
                            @endforeach
                        @endforeach
                    @endforeach
                @endforeach
        <!--<div class="col-6 col-md mb-2">-->
            
                @if (isset($category->allSubCategories) && count($category->allSubCategories) > 0)
                    @if($ThisSubsCatProducts_count > 0)
                    <!-- Heading -->
                    <div class="mb-0 mt-0 text-body">
                            <a class="text-primary font-weight-bolder" href="{{ route('category.index', $category->slug) }}">
                            {{ $category->name }}
                            </a>
                    </div>
                    @endif
                    <!-- Links -->
                    <ul class="list-styled mb-2 mb-2 font-size-sm">

                    @foreach ($category->allSubCategories as $subcategory)
                        
                        @php
                            $hasSubCats = $category->allSubCategories()->first();
                            $SubCatProducts_count = $subcategory->products_count();

                        @endphp
                        @foreach ($subcategory->allSubCategories()->get() as $subsubcategory)
                            @php                                      
                            $SubCatProducts_count += $subsubcategory->products_count();
                            @endphp
                            @foreach ($subsubcategory->allSubCategories()->get() as $subsubsubcategory)
                                @php                                      
                                    $SubCatProducts_count += $subsubsubcategory->products_count();
                                @endphp
                                @foreach ($subsubsubcategory->allSubCategories()->get() as $subsubsubsubcategory)
                                    @php                                      
                                    $SubCatProducts_count += $subsubsubsubcategory->products_count();
                                    @endphp
                                @endforeach
                            @endforeach
                        @endforeach

                        @if($SubCatProducts_count > 0)
                            <li class="list-styled-item mt-0">
                                <a class="list-styled-link ml-2 mb-0 mt-0" href="{{ route('category.index.secondary', [$category->slug, $subcategory->slug]) }}">{{ $subcategory->name }}</a>
                            </li>
                            @php
                                $categoriesCount++;
                            @endphp
                        @endif
                    @endforeach

                    </ul>
                @else
                    @if($ThisSubsCatProducts_count > 0)
                <div class="mb-2 mt-0 font-weight-bold">
                    <a class="list-styled-link text-body" href="{{ route('category.index.secondary', [$category_parent->slug, $category->slug])  }}">{{ $category->name }}</a>
                </div>
                    @endif
                @endif

            <!--</div>-->
            @endforeach
            </ul>
            </div>

            @if (isset($Contents))    

                    @if (isset($Contents['banner_links_oben_text'])) 

                    <div class="col-4 d-none d-lg-block">
                            
                            <!-- Card -->
                            <div class="card mb-2 bg-cover" style="min-height: 200px;">
                            
                                <!-- Background -->
                                @if (isset($Contents['banner_links_oben_img'])) 
                                <div class="card-bg">
                                    <div class="card-bg-img bg-cover" style="{{$links_oben_cardBG_style??''}} background-image: url({!! $Contents['banner_links_oben_img'] ?? '' !!});{{ $IMG1_CSS ?? '' }}">
                                    <div class="h-100 w-100 position-absolute" style="{!! ((isset($Contents['banner_links_oben_milcheffekt']) && $Contents['banner_links_oben_milcheffekt']==1)? 'background: rgba(255, 255, 255, 0.75);':'') !!}"></div>
                                    </div>
                                </div>
                                @endif 
                                <!-- Body -->                                
                                @if (isset($Contents['banner_links_oben_text'])) 
                                    <div class="card-body {{$links_oben_cardBody_class??'my-auto px-auto text-center'}}">
                                        @if (isset($Contents['banner_links_oben_prozent'])) 
                                            <h1 class="mb-1 font-weight-bolder text-uppercase text-black font-size-h1">{!! $Contents['banner_links_oben_prozent'] ?? '' !!}</h1>
                                        @endif
                                        <a class="stretched-link font-weight-normal font-size-h5 text-black" href="{!! $Contents['banner_links_oben_href'] ?? '#' !!}">
                                        <span class="text-white">{!! $Contents['banner_links_oben_text'] ?? '' !!}</span>
                                        </a>
                                    </div>
                                @endif
                                

                            </div>

                            <!-- Card -->
                            <div class="card bg-cover" style="min-height: 200px;">

                                <!-- Background -->
                                @if (isset($Contents['banner_links_unten_img'])) 
                                <div class="card-bg">
                                    <div class="card-bg-img bg-cover" style="{{$links_unten_cardBG_style??''}} background-image: url({!! $Contents['banner_links_unten_img'] ?? '' !!});">
                                        <div class="h-100 w-100 position-absolute" style="{!! ((isset($Contents['banner_links_unten_milcheffekt']) && $Contents['banner_links_unten_milcheffekt']==1)? 'background: rgba(255, 255, 255, 0.75);':'') !!}"></div>
                                    </div>
                                </div>
                                @endif
                                <!-- Body -->
                                @if (isset($Contents['banner_links_unten_text'])) 
                                <div class="card-body my-auto px-0 text-center">
                                    <a class="stretched-link text-black" href="{!! $Contents['banner_links_unten_href'] ?? '' !!}">
                                        <h6 class="font-weight-normal text-black font-size-h5"><span class="text-white">{!! $Contents['banner_links_unten_text'] ?? '' !!}</span></h6>
                                    </a>
                                </div>
                                @endif
                            </div>

                    </div>
                    @endif
                    @if (isset($Contents['banner_right_text'])) 
                    <div class="col-4 d-none d-lg-block">                            
                            <!-- Card -->
                            <div class="card mb-2 bg-cover" style="min-height: 410px;">
                                @if (isset($Contents['banner_right_img'])) 
                                <!-- Background -->
                                <div class="card-bg">
                                    <div class="card-bg-img bg-cover" style="background-image: url({!! $Contents['banner_right_img'] ?? '' !!});">
                                    <div class="h-100 w-100 position-absolute" style="{!! ((isset($Contents['banner_right_milcheffekt']) && $Contents['banner_right_milcheffekt']==1)? 'background: rgba(255, 255, 255, 0.75);':'') !!}"></div>
                                    </div>
                                </div>
                                @endif
                                <!-- Body -->
                                @if (isset($Contents['banner_right_text'])) 
                                <div class="card-body my-auto px-auto text-center">
                                    <a class="stretched-link text-black" href="{!! $Contents['banner_right_href'] ?? '' !!}">
                                        @if (isset($Contents['banner_right_prozent'])) 
                                            <h1 class="mb-1 font-weight-bolder text-uppercase text-black font-size-h1"><span class="text-black">{!! $Contents['banner_right_prozent'] ?? '' !!}</span></h1>
                                        @endif
                                        <h6 class="font-weight-normal  font-size-h5"><span class="text-black">{!! $Contents['banner_right_text'] ?? '' !!}</span></h6>
                                    </a>
                                </div>
                                @endif
                            </div>
                    </div>
                    @endif

                    @endif

            </div>
          </div>
      </div>
    </div>
  </div>
  
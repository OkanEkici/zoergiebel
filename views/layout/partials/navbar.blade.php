@php
    use App\Category;
@endphp
@include('layout.partials.navbar-topbar',['classList'=>'bg-primary'])

<nav class="navbar navbar-expand-lg navbar-light {{ $classList??'' }} p-2 bg-light">
        <div class="container mx-auto">

          <!-- Brand -->
          <a class="navbar-brand" href="{{ route('shop.index') }}">
            <img src="/images/logo.jpg" height="90px"/>
          </a>

          <!-- Toggler -->
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>


          <!-- Collapse -->
          <div class="collapse navbar-collapse justify-content-lg-start"  id="navbarCollapse" >

            <!-- Nav justify-content-lg-start style="flex-flow: wrap;"-->
            <style>
                @media (min-width: 992px){
                  .flex-bugfix{ flex-flow: wrap;}
              }
            </style>
            <ul class="flex-bugfix navbar-nav ml-lg-3 mt-auto mb-n2 text-center text-lg-left w-100" style="">
                <li class="nav-item "><a href="{{ route('home') }}" class="{{(isset($selectedTab) && $selectedTab == 'home') ? 'text-secondary' : 'text-dark'}} nav-link">Home</a></li>
                @php
                    $Contents =
                                ['banner_links_oben_prozent'=>''
                                    ,'IMG1_CSS' => 'background-position:center 40% !important;'
                                    ,'banner_links_oben_text'=>'Herren'
                                    ,'banner_links_oben_img'=> route('home').'/images/home/Herren_v2.jpg'
                                    ,'banner_links_oben_href'=> route('category.index.secondary', ['herren', 'hosen-jeans'])
                                    ,'banner_links_oben_milcheffekt'=> 0
                                    ,'banner_links_unten_prozent'=>''
                                    ,'banner_links_unten_text'=>'Kinder'
                                    ,'banner_links_unten_img'=> route('home').'/images/home/Kinder.jpg'
                                    ,'banner_links_unten_href'=> route('category.index', ['kinder'])
                                    ,'banner_links_unten_milcheffekt'=> 0
                                    ,'banner_right_prozent'=>''
                                    ,'banner_right_text'=>'Damen'
                                    ,'banner_right_img'=> route('home').'/images/home/Damen.jpg'
                                    ,'banner_right_href'=> route('category.index.secondary', ['damen', 'mantel-jacken'])
                                    ,'banner_right_milcheffekt'=> 0
                                    ];
                    //Hier cachen wir unsere besondere Liste. Diese Liste führt zu jeder Kategorieid die Anzahl
                    //der mit ihr verbundenen Artikel
                    $category_article_sum=
                    cache()->remember('Category_getCategoryArticleSumTree', env('MAINMENUE_CACHE_DAUER', 43200),function(){
                        return serialize( Category::getCategoryArticleSumTree());
                    });
                    $category_article_sum=unserialize($category_article_sum);
                    $categories=$categories->where('parent_category_id','=',0);
                @endphp
                @foreach ($categories as $category)
                    @php
                        if(!isset($category_article_sum[$category->id]))
                        {
                            cache()->forget('Category_getCategoryArticleSumTree');
                          $category_article_sum=
                            cache()->remember('Category_getCategoryArticleSumTree', env('MAINMENUE_CACHE_DAUER', 43200),function(){
                                return serialize( Category::getCategoryArticleSumTree());
                            });
                            $category_article_sum=unserialize($category_article_sum);
                            $ThisSubsCatProducts_count=$category_article_sum[$category->id];
                            /*
                            $ThisSubsCatProducts_count = 0;
                             $hasSubCats = $category->allSubCategories()->first();
                            $CatProducts_count = $category->products_count();
                            $ThisSubsCatProducts_count+=$CatProducts_count;

                            $ThisSubsCatProducts_count = $category_article_sum[$category->id];
                            foreach ($category->allSubCategories()->get() as $subcategory)
                            {
                                $ThisSubsCatProducts_count += $subcategory->products_count();

                                foreach ($subcategory->allSubCategories()->get() as $subsubcategory)
                                {
                                    $ThisSubsCatProducts_count += $subsubcategory->products_count();

                                    foreach ($subsubcategory->allSubCategories()->get() as $subsubsubcategory)
                                    {
                                        $ThisSubsCatProducts_count += $subsubsubcategory->products_count();

                                        foreach ($subsubsubcategory->allSubCategories()->get() as $subsubsubsubcategory)
                                        {
                                            $ThisSubsCatProducts_count += $subsubsubsubcategory->products_count();
                                        }
                                    }
                                }
                            }
                            */
                        }
                        else{
                          $ThisSubsCatProducts_count=$category_article_sum[$category->id];
                        }


                    @endphp
                {{-- @if( $category->parent_category_id == 0) --}}

                  @if( 1==1)


                        {{--
                        @php
                          $ThisSubsCatProducts_count = 0;
                          $hasSubCats = $category->allSubCategories()->first();
                          $CatProducts_count = $category->products_count();
                          $ThisSubsCatProducts_count+=$CatProducts_count;
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

                        --}}
                      @if( $ThisSubsCatProducts_count > 0)
                      <li class="nav-item dropdown position-static ">
                        {{-- @if (isset($category->allSubCategories) && count($category->allSubCategories) > 0) --}}
                        {{-- Fashioinbox ausschliessen --}}
                        @php
                            if($category->slug=='fashionbox'){
                                continue;
                            }
                        @endphp
                        @if ($category->allSubCategories()->count()>0 )
                            @if ($category->name == "Bekleidung")
                              <div class="nav-link triangle" href="#" data-toggle="dropdown" >{{ $category->name }}</div>
                            @else
                              <a class="nav-link triangle" data-toggle="dropdown"  href="{{ route('category.index', $category->slug) }}">{{ $category->name }}</a>
                            @endif
                            @php
                            //Wir cachen jetzt für jede Kategorie ein Dropdown
                            $key='layout.partials.dropdown-categories_'.$category->id;
                            $drop_down=cache()->remember($key, env('MAINMENUE_CACHE_DAUER', 43200),function()use($category,$Contents){
                                $view=view('layout.partials.dropdown-categories',
                                  ['categories' => $category->allSubCategories
                                    ,'Contents' => $Contents
                                    ,'category_parent' => $category
                                    ,'links_oben_cardBG_style' => 'background-position-y: 0%!important;'
                                    ,'links_oben_cardBody_class' => 'my-auto pt-9 pb-0 text-center'
                            ]);
                            return $view->toHtml();
                            });

                            echo $drop_down;
                        @endphp
                            {{--
                                 @include('layout.partials.dropdown-categories'
                                , ['categories' => $category->allSubCategories
                                ,'Contents' => $Contents
                                ,'category_parent' => $category
                                ,'links_oben_cardBG_style' => 'background-position-y: 0%!important;'
                                ,'links_oben_cardBody_class' => 'my-auto pt-9 pb-0 text-center'
                              ])

                                --}}



                        @endif
                          {{-- @if (count($category->allSubCategories) == 0) --}}
                          @if ($category->allSubCategories()->count() == 0)
                            @if ($category->name == "Bekleidung")
                              <div class="nav-link" data-toggle="dropdown" >{{ $category->name }}</div>
                            @else
                              <a class="nav-link" data-toggle="dropdown"  href="{{ route('category.index', $category->slug) }}">{{ $category->name }}</a>
                            @endif
                          @endif
                      </li>
                      @endif

                  @endif
              @endforeach
                <li class="nav-item "><a href="{{ route('category.brands') }}" class="text-dark nav-link">Marken</a></li>
                <li class="nav-item "><a href="{{ route('category.sale') }}" class="nav-link" style="color: red;">SALE</a></li>
                <!-- <li class="nav-item "><a href="#" onclick='window.open("https://httpswwwzoergiebelde.simplybook.it/v2/#");return false;' class="nav-link" >TERMINSHOPPEN</a></li> -->
                <li class="nav-item "><a href="{{ route('cms.about') }}" class="{{(isset($selectedTab) && $selectedTab == 'about-us') ? 'text-secondary' : 'text-dark'}} nav-link">Wir</a></li>
                <li class="nav-item "><a href="{{ route('cms.service') }}" class="{{(isset($selectedTab) && $selectedTab == 'service') ? 'text-secondary' : 'text-dark'}} nav-link">Service</a></li>
                <li class="nav-item "><a href="{{ route('cms.contact') }}" class="{{(isset($selectedTab) && $selectedTab == 'contact') ? 'text-secondary' : 'text-dark'}} nav-link">Kontakt</a></li>

            </ul>

            <ul class="navbar-nav flex-row  justify-content-end">

              <li class="nav-item dropdown position-static hovered">
                <a href="#" onclick="return false;" class="nav-link text-secondary" data-toggle="dropdown" aria-expanded="true">
                    <i class="fe fe-search" aria-expanded="true"></i>
                  </a>
                  <div class="dropdown-menu w-100">
                      <div class="card card-lg bg-secondary">
                          <div class="card-body">
                              <div class="container">
                            <div class="row" style="display: block !important">
                    <!-- Search-->
                    <form  action="/search" method="GET" role="search">
                      {{ csrf_field() }}
                        <div class="input-group">
                          <input type="search" name="q" class="form-control" placeholder="Suche nach Artikeln" />
                          <div class="input-group-append">
                            <button type="submit" class="btn btn-dark">
                              <i class="fe fe-search"></i>
                            </button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
                  </div>

              </li>
                <li class="nav-item ml-lg-n2">
                    <a class="nav-link text-secondary" href="{{ route('login') }}">
                      <i class="fe fe-user"></i>
                    </a>
                  </li>
                <li class="nav-item ml-lg-n2">
                    <a class="nav-link text-secondary" data-toggle="modal" href="{{ route('cart') }}">
                        @if($the_cart->amount())
												<span data-cart-items="{{ $the_cart->amount() }}">
                            <i class="fe fe-shopping-cart"></i>
                        </span>
												@else
												<span>
                            <i class="fe fe-shopping-cart"></i>
                        </span>
												@endif
                    </a>
                </li>
            </ul>
          </div>
        </div>
      </nav>

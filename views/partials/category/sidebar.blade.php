@php
use App\Category;
@endphp

  <!-- Filters -->
  <form id="filter-category-form" method="GET" action="{{ $formAction ?? '' }}" class="mb-10 mb-md-0">
              @csrf

              @php

                  $filter_brands_string = '';
                  $filter_colors_string = '';
                  $filter_sizes_string = '';
                  if(isset($activeFilters))
                  {
                    foreach($activeFilters as $thisfilter)
                    {
                      switch($thisfilter['type'])
                      {
                          case 'brand' :
                            $filter_brands_string .= ($filter_brands_string=='')? $thisfilter['value'] : "%7C".$thisfilter['value'];
                          break;
                          case 'color' :
                            $filter_colors_string .= ($filter_colors_string=='')? $thisfilter['value'] : "%7C".$thisfilter['value'];
                          break;
                          case 'size' :
                            $filter_sizes_string .= ($filter_sizes_string=='')? $thisfilter['value'] : "%7C".$thisfilter['value'];
                          break;
                      }
                    }
                  }

              @endphp

              <input id="filter-form-sorting-inp" type="hidden" name="srule" value="">
              <input id="filter-form-sizes-inp" type="hidden" name="prefS" value="{{ $filter_sizes_string ?? '' }}">
              <input id="filter-form-colors-inp" type="hidden" name="prefC" value="{{ $filter_colors_string ?? '' }}">
              <input id="filter-form-brands-inp" type="hidden" name="prefB" value="{{ ((!isset($nobrands) && $header != 'Marken')? $header : ($filter_brands_string ?? '')  ) }}">
              <input id="filter-form-cats-inp" type="hidden" name="prefCg" value="">
                <ul class="nav nav-vertical" id="filterNav">
                @if (   (!isset($nobrands) || (isset($nobrands) && $nobrands==false) ) && $header != 'Marken')

                  <li class="nav-item">

                    <!-- Toggle -->
                    <a class="nav-link dropdown-toggle font-size-lg text-reset border-bottom mb-6" data-toggle="collapse" href="#brandCollapse">
                      Marke
                    </a>
                    <!-- Collapse -->
                    <div class="collapse show" id="brandCollapse" data-toggle="simplebar" data-target="#brandGroup">

                      <!-- Search -->
                      <div data-toggle="lists" data-options='{"valueNames": ["name"]}'>

                        <!-- Form group -->
                        <div class="form-group mb-6" id="brandGroup">
                          <ul class="list-styled mb-0">
                            @php
                                $brandCount = 0;
                            @endphp
                            @foreach ($brands as $brand)
                            @php
                                $brandCount++;
                            @endphp
                                <li class="list-styled-item">
                                  <a class="list-styled-link"
                                  onclick="$('#filter-form-brands-inp').val('{{ $brand }}');this.href={{ ((isset($selectedTab) && $selectedTab=='sale')?'\'/sale/'.$category->slug.'/\'':'this.href=$(this).data(\'href\')' ) }}
                                  +'?prefS='+encodeURIComponent($('#filter-form-sizes-inp').val())
                                  +'&prefC='+encodeURIComponent($('#filter-form-colors-inp').val())
                                  +'&prefB='+encodeURIComponent($('#filter-form-brands-inp').val())
                                  +'&srule='+encodeURIComponent($('#filter-form-sorting-inp').val())"
                                  data-href="{{ route('category.brands.name', [$brand]) }}"
                                  href="{{ route('category.brands.name', [$brand]) }}"><b>
                                    {{ $brand }} h</b>
                                  </a>
                                </li>
                            @endforeach
                              </ul>
                        </div>

                      </div>

                    </div>

                  </li>
                  @endif
                  @if($header == 'Marken')

                  <li class="nav-item">

                    <!-- Toggle -->
                    <a class="nav-link dropdown-toggle font-size-lg text-reset border-bottom mb-6" data-toggle="collapse" href="#brandCollapse">
                      Marke
                    </a>
                    <!-- Collapse -->
                    <div class="collapse show" id="brandCollapse" data-toggle="simplebar" data-target="#brandGroup">

                      <!-- Search -->
                      <div data-toggle="lists" data-options='{"valueNames": ["name"]}'>

                        <!-- Form group -->
                        <div class="form-group mb-6" id="brandGroup">
                          <ul class="list-styled mb-0">
                            @php
                                $brandCount = 0;
                            @endphp
                            @foreach ($brands as $brand)
                            @php
                                $brandCount++;
                            @endphp
                                <li class="list-styled-item">
                                  <a class="list-styled-link"
                                  onclick="$('#filter-form-brands-inp').val('{{ $brand }}');this.href={{ ((isset($selectedTab) && $selectedTab=='sale')?'\'/sale/'.$category->slug.'/\'':'this.href=$(this).data(\'href\')' ) }}
                                  +'?prefS='+encodeURIComponent($('#filter-form-sizes-inp').val())
                                  +'&prefC='+encodeURIComponent($('#filter-form-colors-inp').val())
                                  +'&prefB='+encodeURIComponent($('#filter-form-brands-inp').val())
                                  +'&srule='+encodeURIComponent($('#filter-form-sorting-inp').val())"
                                  data-href="{{ route('category.brands.name', [$brand]) }}"
                                  href="{{ route('category.brands.name', [$brand]) }}"><b>
                                    {{ $brand }}</b>
                                  </a>
                                </li>
                            @endforeach
                              </ul>
                        </div>

                      </div>

                    </div>

                  </li>

                  @endif
                  @if (!isset($nocategories) || (isset($nocategories) && $nocategories==false))

                  <li class="nav-item">

                    <!-- Toggle -->
                    <a class="nav-link dropdown-toggle font-size-lg text-reset border-bottom mb-6" data-toggle="collapse" href="#categoryCollapse">
                      Kategorien
                    </a>

                    <!-- aktive Kategorien -->
                    @php
                            $except_slug = '';
                            $mark_slug = '';
                    @endphp
                    @if(!empty($category))

                      @php
                              $except_slug = $category->slug;

                              $hasParent = $category->parent_category_id;
                              if($hasParent)
                              {
                                $mark_slug = $except_slug;
                                $parentCat = Category::where('id', '=', $hasParent)->first();

                                while($parentCat->parent_category_id > 0)
                                {
                                  $hasParent = $parentCat->parent_category_id;
                                  $parentCat = Category::where('id', '=', $hasParent)->first();
                                }
                                $except_slug = $parentCat->slug;
                                $category = $parentCat;
                              }
                      @endphp
                      <div class="form-group">
                        <ul class="list-styled mb-0" id="productsNav">

                            @php
                              $hasSubCats = $category->allSubCategories()->first();
                              $CatProducts_count = $category->products_count(((isset($selectedTab) && $selectedTab=='sale')? true : false),$filter_brands_string,$filter_sizes_string,$filter_colors_string);

                              $ThisSubsCatProducts_count=0;
                            @endphp
                            @foreach ($category->allSubCategories()->get() as $subcategory)
                              @php
                                $ThisSubsCatProducts_count += $subcategory->products_count(((isset($selectedTab) && $selectedTab=='sale')? true : false),$filter_brands_string,$filter_sizes_string,$filter_colors_string);
                              @endphp
                              @foreach ($subcategory->allSubCategories()->get() as $subsubcategory)
                                @php
                                  $ThisSubsCatProducts_count += $subsubcategory->products_count(((isset($selectedTab) && $selectedTab=='sale')? true : false),$filter_brands_string,$filter_sizes_string,$filter_colors_string);
                                @endphp
                                @foreach ($subsubcategory->allSubCategories()->get() as $subsubsubcategory)
                                  @php
                                    $ThisSubsCatProducts_count += $subsubsubcategory->products_count(((isset($selectedTab) && $selectedTab=='sale')? true : false),$filter_brands_string,$filter_sizes_string,$filter_colors_string);
                                  @endphp
                                    @foreach ($subsubsubcategory->allSubCategories()->get() as $subsubsubsubcategory)
                                      @php
                                      $ThisSubsCatProducts_count += $subsubsubsubcategory->products_count(((isset($selectedTab) && $selectedTab=='sale')? true : false),$filter_brands_string,$filter_sizes_string,$filter_colors_string);
                                      @endphp
                                    @endforeach
                                @endforeach
                              @endforeach
                            @endforeach
                            @if ($CatProducts_count>0)
                              <li class="list-styled-item">
                                @if ($hasSubCats && $ThisSubsCatProducts_count>0)
                                  <div class="w-100 list-styled-link dropdown-toggle" data-toggle="collapse" href="#{{ $category->slug }}Collapse">
                                @endif
                                <a class="list-styled-link d-inline-block"
                                onclick="this.href={{ ((isset($selectedTab) && $selectedTab=='sale')?'\'/sale/'.$category->slug.'/\'':'this.href=$(this).data(\'href\')' ) }}
                                +'?prefS='+encodeURIComponent($('#filter-form-sizes-inp').val())
                                +'&prefC='+encodeURIComponent($('#filter-form-colors-inp').val())
                                +'&prefB='+encodeURIComponent($('#filter-form-brands-inp').val())
                                  +'&srule='+encodeURIComponent($('#filter-form-sorting-inp').val())"
                                data-href="{{ route('category.index', $category->slug) }}"
                                href="{{ route('category.index', $category->slug) }}">
                                  <b>{{ $category->name }} </b>
                                </a>
                                @if ($hasSubCats && $ThisSubsCatProducts_count>0)
                                  </div>
                                @endif
                              </li>
                            @else
								@if ($hasSubCats && $ThisSubsCatProducts_count>0)
                              <li class="list-styled-item">

                                  <div class="w-100 list-styled-link dropdown-toggle" data-toggle="collapse" href="#{{ $category->slug }}Collapse">
                                    <a class="list-styled-link d-inline-block"
                                    onclick="this.href={{ ((isset($selectedTab) && $selectedTab=='sale')?'\'/sale/'.$category->slug.'/\'':'this.href=$(this).data(\'href\')' ) }}
                                    +'?prefS='+encodeURIComponent($('#filter-form-sizes-inp').val())
                                    +'&prefC='+encodeURIComponent($('#filter-form-colors-inp').val())
                                    +'&prefB='+encodeURIComponent($('#filter-form-brands-inp').val())
                                  +'&srule='+encodeURIComponent($('#filter-form-sorting-inp').val())"
                                    data-href="{{ route('category.index', $category->slug) }}"
                                    href="{{ route('category.index', $category->slug) }}">
                                      <b>{{ $category->name }} </b>
                                    </a>
                                  </div>

                              </li>
							  @endif
                            @endif
                              @if ($hasSubCats)
                              <div class="my-2 collapse show" id="{{ $category->slug }}Collapse" data-parent="" style="">
                                  @foreach ($category->allSubCategories()->get() as $subcategory)
                                      @php
                                        $hasSubsubCats = $subcategory->allSubCategories()->first();
                                        $SubCatProducts_count = $subcategory->products_count(((isset($selectedTab) && $selectedTab=='sale')? true : false),$filter_brands_string,$filter_sizes_string,$filter_colors_string);

                                        $ThisSubsubCatProducts_count = 0;
                                      @endphp
                                      @foreach ($subcategory->allSubCategories()->get() as $subsubcategory)
                                        @php
                                          $ThisSubsubCatProducts_count += $subsubcategory->products_count(((isset($selectedTab) && $selectedTab=='sale')? true : false),$filter_brands_string,$filter_sizes_string,$filter_colors_string);
                                        @endphp
                                        @foreach ($subsubcategory->allSubCategories()->get() as $subsubsubcategory)
                                          @php
                                            $ThisSubsubCatProducts_count += $subsubsubcategory->products_count(((isset($selectedTab) && $selectedTab=='sale')? true : false),$filter_brands_string,$filter_sizes_string,$filter_colors_string);
                                          @endphp
                                          @foreach ($subsubsubcategory->allSubCategories()->get() as $subsubsubsubcategory)
                                            @php
                                              $ThisSubsubCatProducts_count += $subsubsubsubcategory->products_count(((isset($selectedTab) && $selectedTab=='sale')? true : false),$filter_brands_string,$filter_sizes_string,$filter_colors_string);
                                            @endphp
                                          @endforeach
                                        @endforeach
                                      @endforeach

                                    @if ($SubCatProducts_count>0)
                                      <li class="pl-2 list-styled-item">
                                        @if ($hasSubsubCats && $ThisSubsubCatProducts_count > 0)
                                          <div class="w-100 list-styled-link dropdown-toggle" data-toggle="collapse" href="#{{ $subcategory->slug }}Collapse">
                                        @endif
                                        <a class="list-styled-link d-inline-block {{ (($subcategory->slug == $mark_slug)? 'font-weight-bold' : '' ) }}"
                                          onclick="this.href={{ ((isset($selectedTab) && $selectedTab=='sale')?'\'/sale/'.$subcategory->slug.'/\'':'this.href=$(this).data(\'href\')' ) }}
                                          +'?prefS='+encodeURIComponent($('#filter-form-sizes-inp').val())
                                          +'&prefC='+encodeURIComponent($('#filter-form-colors-inp').val())
                                          +'&prefB='+encodeURIComponent($('#filter-form-brands-inp').val())
                                  +'&srule='+encodeURIComponent($('#filter-form-sorting-inp').val())"
                                          data-href="{{ route('category.index.secondary', [$category->slug, $subcategory->slug]) }}"
                                          href="{{ route('category.index.secondary', [$category->slug, $subcategory->slug]) }}">
                                          {{ $subcategory->name }}
                                        </a>
                                        @if ($hasSubsubCats && $ThisSubsubCatProducts_count > 0)
                                          </div>
                                        @endif
                                      </li>
                                    @else
                                      @if ($hasSubsubCats && $ThisSubsubCatProducts_count > 0)
                                      <li class="pl-2 mb-2 list-styled-item ">
                                        <div class="mt-4 w-100 list-styled-link dropdown-toggle" data-toggle="collapse" href="#{{ $subcategory->slug }}Collapse">
                                        <a class="list-styled-link d-inline-block {{ (($subcategory->slug == $mark_slug)? 'font-weight-bold' : '' ) }}"
                                          onclick="this.href={{ ((isset($selectedTab) && $selectedTab=='sale')?'\'/sale/'.$subcategory->slug.'/\'':'this.href=$(this).data(\'href\')' ) }}
                                          +'?prefS='+encodeURIComponent($('#filter-form-sizes-inp').val())
                                          +'&prefC='+encodeURIComponent($('#filter-form-colors-inp').val())
                                          +'&prefB='+encodeURIComponent($('#filter-form-brands-inp').val())
                                  +'&srule='+encodeURIComponent($('#filter-form-sorting-inp').val())"
                                          data-href="{{ route('category.index.secondary', [$category->slug, $subcategory->slug]) }}"
                                          href="{{ route('category.index.secondary', [$category->slug, $subcategory->slug]) }}">
                                        {{ $subcategory->name }}
                                        </a>
                                        </div>
                                      </li>
                                      @endif
                                    @endif

                                    @if ($hasSubsubCats && $ThisSubsubCatProducts_count > 0)
                                    <div class="my-2 collapse show" id="{{ $subcategory->slug }}Collapse" data-parent="" style="">
                                      @foreach ($subcategory->allSubCategories()->get() as $subsubcategory)
                                          @php
                                            $hasSubsubsubCats = $subsubcategory->allSubCategories()->first();
                                            $SubsubCatProducts_count = $subsubcategory->products_count(((isset($selectedTab) && $selectedTab=='sale')? true : false),$filter_brands_string,$filter_sizes_string,$filter_colors_string);
                                          @endphp
                                          @php
                                            $ThisSubsubsubCatProducts_count = 0;
                                          @endphp
                                          @foreach ($subsubcategory->allSubCategories()->get() as $subsubsubcategory)
                                            @php
                                              $ThisSubsubsubCatProducts_count += $subsubsubcategory->products_count(((isset($selectedTab) && $selectedTab=='sale')? true : false),$filter_brands_string,$filter_sizes_string,$filter_colors_string);
                                            @endphp
                                            @foreach ($subsubsubcategory->allSubCategories()->get() as $subsubsubsubcategory)
                                              @php
                                                $ThisSubsubsubCatProducts_count += $subsubsubsubcategory->products_count(((isset($selectedTab) && $selectedTab=='sale')? true : false),$filter_brands_string,$filter_sizes_string,$filter_colors_string);
                                              @endphp
                                              @foreach ($subsubsubsubcategory->allSubCategories()->get() as $subsubsubsubsubcategory)
                                                @php
                                                  $ThisSubsubsubCatProducts_count += $subsubsubsubsubcategory->products_count(((isset($selectedTab) && $selectedTab=='sale')? true : false),$filter_brands_string,$filter_sizes_string,$filter_colors_string);
                                                @endphp
                                              @endforeach
                                            @endforeach
                                          @endforeach

                                        @if ($SubsubCatProducts_count>0)
                                          <li class="pl-4 list-styled-item ">
                                            @if ($hasSubsubsubCats && $ThisSubsubsubCatProducts_count > 0)
                                              <div class="w-100 list-styled-link dropdown-toggle" data-toggle="collapse" href="#{{ $subsubcategory->slug }}Collapse">
                                            @endif
                                            <a class="pb-0 list-styled-link d-inline-block {{ (($subsubcategory->slug == $mark_slug)? 'font-weight-bold' : '' ) }}"
                                              onclick="this.href={{ ((isset($selectedTab) && $selectedTab=='sale')?'\'/sale/'.$subsubcategory->slug.'/\'':'this.href=$(this).data(\'href\')' ) }}
                                              +'?prefS='+encodeURIComponent($('#filter-form-sizes-inp').val())
                                              +'&prefC='+encodeURIComponent($('#filter-form-colors-inp').val())
                                              +'&prefB='+encodeURIComponent($('#filter-form-brands-inp').val())
                                  +'&srule='+encodeURIComponent($('#filter-form-sorting-inp').val())"
                                              data-href="{{ route('category.index.third', [$category->slug, $subcategory->slug,$subsubcategory->slug]) }}"
                                              href="{{ route('category.index.third', [$category->slug, $subcategory->slug,$subsubcategory->slug]) }}">
                                              {{ $subsubcategory->name }}
                                            </a>
                                            @if ($hasSubsubsubCats && $ThisSubsubsubCatProducts_count > 0)
                                              </div>
                                            @endif
                                          </li>
                                        @else

                                          @if ($hasSubsubsubCats && $ThisSubsubsubCatProducts_count > 0)
                                          <li class="pl-4 list-styled-item d-inline-block">
                                              <div class="mt-2 w-100 list-styled-link dropdown-toggle" data-toggle="collapse" href="#{{ $subsubcategory->slug }}Collapse">
                                              <a class="pb-0 list-styled-link d-inline-block {{ (($subsubcategory->slug == $mark_slug)? 'font-weight-bold' : '' ) }}"
                                                onclick="this.href={{ ((isset($selectedTab) && $selectedTab=='sale')?'\'/sale/'.$subsubcategory->slug.'/\'':'this.href=$(this).data(\'href\')' ) }}
                                                +'?prefS='+encodeURIComponent($('#filter-form-sizes-inp').val())
                                                +'&prefC='+encodeURIComponent($('#filter-form-colors-inp').val())
                                                +'&prefB='+encodeURIComponent($('#filter-form-brands-inp').val())
                                  +'&srule='+encodeURIComponent($('#filter-form-sorting-inp').val())"
                                                data-href="{{ route('category.index.third', [$category->slug, $subcategory->slug,$subsubcategory->slug]) }}"
                                                href="{{ route('category.index.third', [$category->slug, $subcategory->slug,$subsubcategory->slug]) }}">
                                              {{ $subsubcategory->name }}
                                              </a>
                                              </div>
                                          </li>
                                          @endif
                                        @endif

                                        @if ($hasSubsubsubCats && $ThisSubsubsubCatProducts_count > 0)
                                        <div class="my-2 collapse show" id="{{ $subsubcategory->slug }}Collapse" data-parent="" style="">
                                          @foreach ($subsubcategory->allSubCategories()->get() as $subsubsubcategory)

                                              @php
                                                $hasSubsubsubsubCats = $subsubsubcategory->allSubCategories()->first();
                                                $SubsubsubCatProducts_count = $subsubsubcategory->products_count(((isset($selectedTab) && $selectedTab=='sale')? true : false),$filter_brands_string,$filter_sizes_string,$filter_colors_string);
                                              @endphp
                                            @if ($SubsubsubCatProducts_count>0)
                                              <li class="mt-0 mb-2 pl-6 list-styled-item">
                                                <a class="list-styled-link {{ (($subsubsubcategory->slug == $mark_slug)? 'font-weight-bold' : '' ) }}"
                                                onclick="this.href={{ ((isset($selectedTab) && $selectedTab=='sale')?'\'/sale/'.$subsubsubcategory->slug.'/\'':'this.href=$(this).data(\'href\')' ) }}
                                                    +'?prefS='+encodeURIComponent($('#filter-form-sizes-inp').val())
                                                    +'&prefC='+encodeURIComponent($('#filter-form-colors-inp').val())
                                                    +'&prefB='+encodeURIComponent($('#filter-form-brands-inp').val())
                                  +'&srule='+encodeURIComponent($('#filter-form-sorting-inp').val())"
                                                    data-href="{{ route('category.index.fourth', [$category->slug, $subcategory->slug,$subsubcategory->slug,$subsubsubcategory->slug]) }}"

                                                  href="{{ route('category.index.fourth', [$category->slug, $subcategory->slug,$subsubcategory->slug,$subsubsubcategory->slug]) }}">
                                                  {{ $subsubsubcategory->name }}
                                                </a>
                                              </li>
                                            @endif
                                          @endforeach
                                        </div>
                                        @endif
                                      @endforeach
                                    </div>
                                    @endif
                                  @endforeach
                                  </div>
                            @endif

                        </ul>
                      </div>
                    @endif
                    <!-- ende aktive Kategorien -->

                    <!-- Collapse -->
                    <div class="collapse {{ ((isset($selectedTab) && $selectedTab=='sale')?'show':'') }}" id="categoryCollapse">
                      <div class="form-group">
                        <ul class="list-styled mb-0" id="productsNav">

                          @foreach ($categories as $category)
                            @if($except_slug != $category->slug)
                            @php
                              $hasSubCats = $category->allSubCategories()->first();
                              $CatProducts_count = $category->products_count(((isset($selectedTab) && $selectedTab=='sale')? true : false),$filter_brands_string,$filter_sizes_string,$filter_colors_string);
                              $ThisSubsCatProducts_count=0;
                            @endphp
                            @foreach ($category->allSubCategories()->get() as $subcategory)
                              @php
                                $ThisSubsCatProducts_count += $subcategory->products_count(((isset($selectedTab) && $selectedTab=='sale')? true : false),$filter_brands_string,$filter_sizes_string,$filter_colors_string);
                              @endphp
                              @foreach ($subcategory->allSubCategories()->get() as $subsubcategory)
                                @php
                                  $ThisSubsCatProducts_count += $subsubcategory->products_count(((isset($selectedTab) && $selectedTab=='sale')? true : false),$filter_brands_string,$filter_sizes_string,$filter_colors_string);
                                @endphp
                                @foreach ($subsubcategory->allSubCategories()->get() as $subsubsubcategory)
                                  @php
                                    $ThisSubsCatProducts_count += $subsubsubcategory->products_count(((isset($selectedTab) && $selectedTab=='sale')? true : false),$filter_brands_string,$filter_sizes_string,$filter_colors_string);
                                  @endphp
                                @endforeach
                              @endforeach
                            @endforeach
                            @if ($CatProducts_count>0)
                              <li class="list-styled-item">
                                @if ($hasSubCats && $ThisSubsCatProducts_count>0)
                                  <div class="w-100 list-styled-link dropdown-toggle" data-toggle="collapse" href="#{{ $category->slug }}Collapse">
                                @endif
                                <a class="list-styled-link d-inline-block"
                                onclick="this.href={{ ((isset($selectedTab) && $selectedTab=='sale')?'\'/sale/'.$category->slug.'/\'':'this.href=$(this).data(\'href\')' ) }}
                                +'?prefS='+encodeURIComponent($('#filter-form-sizes-inp').val())
                                +'&prefC='+encodeURIComponent($('#filter-form-colors-inp').val())
                                +'&prefB='+encodeURIComponent($('#filter-form-brands-inp').val())
                                  +'&srule='+encodeURIComponent($('#filter-form-sorting-inp').val())"
                                data-href="{{ route('category.index', $category->slug) }}"
                                href="{{ route('category.index', $category->slug) }}">
                                  <b>{{ $category->name }} </b>
                                </a>
                                @if ($hasSubCats && $ThisSubsCatProducts_count>0)
                                  </div>
                                @endif
                              </li>
                            @else
								@if ($hasSubCats && $ThisSubsCatProducts_count>0)
                              <li class="list-styled-item">

                                  <div class="w-100 list-styled-link dropdown-toggle" data-toggle="collapse" href="#{{ $category->slug }}Collapse">
                                    <a class="list-styled-link d-inline-block"
                                    onclick="this.href={{ ((isset($selectedTab) && $selectedTab=='sale')?'\'/sale/'.$category->slug.'/\'':'this.href=$(this).data(\'href\')' ) }}
                                    +'?prefS='+encodeURIComponent($('#filter-form-sizes-inp').val())
                                    +'&prefC='+encodeURIComponent($('#filter-form-colors-inp').val())
                                    +'&prefB='+encodeURIComponent($('#filter-form-brands-inp').val())
                                  +'&srule='+encodeURIComponent($('#filter-form-sorting-inp').val())"
                                    data-href="{{ route('category.index', $category->slug) }}"
                                    href="{{ route('category.index', $category->slug) }}">
                                      <b>{{ $category->name }} </b>
                                    </a>
                                  </div>

                              </li>
							  @endif
                            @endif
                              @if ($hasSubCats && $ThisSubsCatProducts_count>0)
                              <div class="my-2 collapse show" id="{{ $category->slug }}Collapse" data-parent="" style="">
                                  @foreach ($category->allSubCategories()->get() as $subcategory)
                                      @php
                                        $hasSubsubCats = $subcategory->allSubCategories()->first();
                                        $SubCatProducts_count = $subcategory->products_count(((isset($selectedTab) && $selectedTab=='sale')? true : false),$filter_brands_string,$filter_sizes_string,$filter_colors_string);
                                      @endphp

                                      @php
                                        $ThisSubsubCatProducts_count = 0;
                                      @endphp
                                      @foreach ($subcategory->allSubCategories()->get() as $subsubcategory)
                                        @php
                                          $ThisSubsubCatProducts_count += $subsubcategory->products_count(((isset($selectedTab) && $selectedTab=='sale')? true : false),$filter_brands_string,$filter_sizes_string,$filter_colors_string);
                                        @endphp
                                        @foreach ($subsubcategory->allSubCategories()->get() as $subsubsubcategory)
                                          @php
                                            $ThisSubsubCatProducts_count += $subsubsubcategory->products_count(((isset($selectedTab) && $selectedTab=='sale')? true : false),$filter_brands_string,$filter_sizes_string,$filter_colors_string);
                                          @endphp
                                          @foreach ($subsubsubcategory->allSubCategories()->get() as $subsubsubsubcategory)
                                            @php
                                              $ThisSubsubCatProducts_count += $subsubsubsubcategory->products_count(((isset($selectedTab) && $selectedTab=='sale')? true : false),$filter_brands_string,$filter_sizes_string,$filter_colors_string);
                                            @endphp
                                          @endforeach
                                        @endforeach
                                      @endforeach

                                    @if ($SubCatProducts_count>0)
                                      <li class="pl-2 list-styled-item">
                                        @if ($hasSubsubCats && $ThisSubsubCatProducts_count > 0)
                                          <div class="w-100 list-styled-link dropdown-toggle" data-toggle="collapse" href="#{{ $subcategory->slug }}Collapse">
                                        @endif
                                        <a class="list-styled-link d-inline-block {{ (($subcategory->slug == $mark_slug)? 'font-weight-bold' : '' ) }}"
                                          onclick="this.href={{ ((isset($selectedTab) && $selectedTab=='sale')?'\'/sale/'.$subcategory->slug.'/\'':'this.href=$(this).data(\'href\')' ) }}
                                          +'?prefS='+encodeURIComponent($('#filter-form-sizes-inp').val())
                                          +'&prefC='+encodeURIComponent($('#filter-form-colors-inp').val())
                                          +'&prefB='+encodeURIComponent($('#filter-form-brands-inp').val())
                                  +'&srule='+encodeURIComponent($('#filter-form-sorting-inp').val())"
                                          data-href="{{ route('category.index.secondary', [$category->slug, $subcategory->slug]) }}"
                                          href="{{ route('category.index.secondary', [$category->slug, $subcategory->slug]) }}">
                                          {{ $subcategory->name }}
                                        </a>
                                        @if ($hasSubsubCats && $ThisSubsubCatProducts_count > 0)
                                          </div>
                                        @endif
                                      </li>
                                    @else
                                      @if ($hasSubsubCats && $ThisSubsubCatProducts_count > 0)
                                      <li class="pl-2 mb-2 list-styled-item">
                                        <div class="mt-4 w-100 list-styled-link dropdown-toggle" data-toggle="collapse" href="#{{ $subcategory->slug }}Collapse">
                                        <a class="list-styled-link d-inline-block {{ (($subcategory->slug == $mark_slug)? 'font-weight-bold' : '' ) }}"
                                          onclick="this.href={{ ((isset($selectedTab) && $selectedTab=='sale')?'\'/sale/'.$subcategory->slug.'/\'':'this.href=$(this).data(\'href\')' ) }}
                                          +'?prefS='+encodeURIComponent($('#filter-form-sizes-inp').val())
                                          +'&prefC='+encodeURIComponent($('#filter-form-colors-inp').val())
                                          +'&prefB='+encodeURIComponent($('#filter-form-brands-inp').val())
                                  +'&srule='+encodeURIComponent($('#filter-form-sorting-inp').val())"
                                          data-href="{{ route('category.index.secondary', [$category->slug, $subcategory->slug]) }}"
                                          href="{{ route('category.index.secondary', [$category->slug, $subcategory->slug]) }}">
                                        {{ $subcategory->name }}
                                        </a>
                                        </div>
                                      </li>
                                      @endif
                                    @endif

                                    @if ($hasSubsubCats && $ThisSubsubCatProducts_count > 0)
                                    <div class="my-2 collapse show" id="{{ $subcategory->slug }}Collapse" data-parent="" style="">
                                      @foreach ($subcategory->allSubCategories()->get() as $subsubcategory)
                                          @php
                                            $hasSubsubsubCats = $subsubcategory->allSubCategories()->first();
                                            $SubsubCatProducts_count = $subsubcategory->products_count(((isset($selectedTab) && $selectedTab=='sale')? true : false),$filter_brands_string,$filter_sizes_string,$filter_colors_string);
                                          @endphp
                                          @php
                                            $ThisSubsubsubCatProducts_count = 0;
                                          @endphp
                                          @foreach ($subsubcategory->allSubCategories()->get() as $subsubsubcategory)
                                            @php
                                              $ThisSubsubsubCatProducts_count += $subsubsubcategory->products_count(((isset($selectedTab) && $selectedTab=='sale')? true : false),$filter_brands_string,$filter_sizes_string,$filter_colors_string);
                                            @endphp
                                            @foreach ($subsubsubcategory->allSubCategories()->get() as $subsubsubsubcategory)
                                              @php
                                                $ThisSubsubsubCatProducts_count += $subsubsubsubcategory->products_count(((isset($selectedTab) && $selectedTab=='sale')? true : false),$filter_brands_string,$filter_sizes_string,$filter_colors_string);
                                              @endphp
                                              @foreach ($subsubsubsubcategory->allSubCategories()->get() as $subsubsubsubsubcategory)
                                                @php
                                                  $ThisSubsubsubCatProducts_count += $subsubsubsubsubcategory->products_count(((isset($selectedTab) && $selectedTab=='sale')? true : false),$filter_brands_string,$filter_sizes_string,$filter_colors_string);
                                                @endphp
                                              @endforeach
                                            @endforeach
                                          @endforeach

                                        @if ($SubsubCatProducts_count>0)
                                          <li class="pl-4 list-styled-item ">
                                            @if ($hasSubsubsubCats && $ThisSubsubsubCatProducts_count > 0)
                                              <div class="w-100 list-styled-link dropdown-toggle" data-toggle="collapse" href="#{{ $subsubcategory->slug }}Collapse">
                                            @endif
                                            <a class="pb-0 list-styled-link d-inline-block {{ (($subsubcategory->slug == $mark_slug)? 'font-weight-bold' : '' ) }}"
                                              onclick="this.href={{ ((isset($selectedTab) && $selectedTab=='sale')?'\'/sale/'.$subsubcategory->slug.'/\'':'this.href=$(this).data(\'href\')' ) }}
                                              +'?prefS='+encodeURIComponent($('#filter-form-sizes-inp').val())
                                              +'&prefC='+encodeURIComponent($('#filter-form-colors-inp').val())
                                              +'&prefB='+encodeURIComponent($('#filter-form-brands-inp').val())
                                  +'&srule='+encodeURIComponent($('#filter-form-sorting-inp').val())"
                                              data-href="{{ route('category.index.third', [$category->slug, $subcategory->slug,$subsubcategory->slug]) }}"
                                              href="{{ route('category.index.third', [$category->slug, $subcategory->slug,$subsubcategory->slug]) }}">
                                              {{ $subsubcategory->name }}
                                            </a>
                                            @if ($hasSubsubsubCats && $ThisSubsubsubCatProducts_count > 0)
                                              </div>
                                            @endif
                                          </li>
                                        @else

                                          @if ($hasSubsubsubCats && $ThisSubsubsubCatProducts_count > 0)
                                          <li class="pl-4 list-styled-item ">
                                              <div class="mt-2 w-100 list-styled-link dropdown-toggle" data-toggle="collapse" href="#{{ $subsubcategory->slug }}Collapse">
                                                <a class="pb-0 list-styled-link d-inline-block {{ (($subsubcategory->slug == $mark_slug)? 'font-weight-bold' : '' ) }}"
                                                  onclick="this.href={{ ((isset($selectedTab) && $selectedTab=='sale')?'\'/sale/'.$subsubcategory->slug.'/\'':'this.href=$(this).data(\'href\')' ) }}
                                                  +'?prefS='+encodeURIComponent($('#filter-form-sizes-inp').val())
                                                  +'&prefC='+encodeURIComponent($('#filter-form-colors-inp').val())
                                                  +'&prefB='+encodeURIComponent($('#filter-form-brands-inp').val())
                                  +'&srule='+encodeURIComponent($('#filter-form-sorting-inp').val())"
                                                  data-href="{{ route('category.index.third', [$category->slug, $subcategory->slug,$subsubcategory->slug]) }}"
                                                  href="{{ route('category.index.third', [$category->slug, $subcategory->slug,$subsubcategory->slug]) }}">
                                                {{ $subsubcategory->name }}
                                                </a>
                                              </div>
                                          </li>
                                          @endif
                                        @endif

                                        @if ($hasSubsubsubCats && $ThisSubsubsubCatProducts_count > 0)
                                        <div class="mt-2 collapse show" id="{{ $subsubcategory->slug }}Collapse" data-parent="" style="">
                                          @foreach ($subsubcategory->allSubCategories()->get() as $subsubsubcategory)

                                              @php
                                                $hasSubsubsubsubCats = $subsubsubcategory->allSubCategories()->first();
                                                $SubsubsubCatProducts_count = $subsubsubcategory->products_count(((isset($selectedTab) && $selectedTab=='sale')? true : false),$filter_brands_string,$filter_sizes_string,$filter_colors_string);
                                              @endphp
                                            @if ($SubsubsubCatProducts_count>0)
                                              <li class="mt-0 mb-2 pl-6 list-styled-item">
                                                <a class="list-styled-link {{ (($subsubsubcategory->slug == $mark_slug)? 'font-weight-bold' : '' ) }}"
                                                onclick="this.href={{ ((isset($selectedTab) && $selectedTab=='sale')?'\'/sale/'.$subsubsubcategory->slug.'/\'':'this.href=$(this).data(\'href\')' ) }}
                                                    +'?prefS='+encodeURIComponent($('#filter-form-sizes-inp').val())
                                                    +'&prefC='+encodeURIComponent($('#filter-form-colors-inp').val())
                                                    +'&prefB='+encodeURIComponent($('#filter-form-brands-inp').val())
                                  +'&srule='+encodeURIComponent($('#filter-form-sorting-inp').val())"
                                                    data-href="{{ route('category.index.fourth', [$category->slug, $subcategory->slug,$subsubcategory->slug,$subsubsubcategory->slug]) }}"

                                                  href="{{ route('category.index.fourth', [$category->slug, $subcategory->slug,$subsubcategory->slug,$subsubsubcategory->slug]) }}">
                                                  {{ $subsubsubcategory->name }}
                                                </a>
                                              </li>
                                            @endif
                                          @endforeach
                                        </div>
                                        @endif
                                      @endforeach
                                    </div>
                                    @endif
                                  @endforeach
                                  </div>
                            @endif
                            @endif
                          @endforeach
                        </ul>
                      </div>
                    </div>

                  </li>
                  @endif
                  <li class="nav-item">



                  @if (isset($filter))
                  @php
                    /*<!--


                   @if (isset($filter['colors']) && !$filter['colors']->isEmpty())
                      @include('partials.category.filter.colors', ['colors' => $filter['colors']])
                    @endif


                    -->
                    */@endphp
                    @if (isset($filter['brands']) && !$filter['brands']->isEmpty())
                      @include('partials.category.filter.brands', ['brands' => $filter['brands']])
                    @endif



                    @if (isset($filter['sizes']) && !$filter['sizes']->isEmpty())
                      @include('partials.category.filter.sizes', ['sizes' => $filter['sizes']])
                    @endif



                    @if (isset($filter['prices']) && !$filter['prices']->isEmpty())
                      @include('partials.category.filter.prices', ['prices' => $filter['prices']])
                    @endif

                  @endif

                </ul>
              </form>

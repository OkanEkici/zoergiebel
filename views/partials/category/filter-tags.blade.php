<!-- Tags -->
<div class="row mb-7">
    <div class="col-12">
      @foreach ($activeFilters as $activeFilter)
        <span class="btn btn-xs btn-light font-weight-normal text-muted mr-3 mb-3">
          {{ urldecode($activeFilter['value']) ?? '' }} <a class="text-reset ml-2 activeFilter" data-ovfilter-type="{{ $activeFilter['type'] }}" data-ovfilter-value="{{ urldecode($activeFilter['value']) ?? '' }}" href="#!" role="button">
            <i class="fe fe-x"></i>
          </a>
        </span>
      @endforeach
    </div>
  </div>

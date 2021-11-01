@extends('layout.mainlayout')

@section('content')
@include('partials.home.promo-banner-small')
<!-- CONTENT -->
<section class="py-11">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-4 col-lg-3">
                @yield('sidebar-content')
            </div>
            <div class="col-12 col-md-8 col-lg-9">
                @yield('right-content')
            </div>
        </div>
    </div>
</section>
@endsection
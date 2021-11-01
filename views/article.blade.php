@extends('layout.mainlayout')

@section('content')
@include('partials.home.promo-banner-small')
@include('partials.article.breadcrumbs')
@include('partials.article.article-details')
@include('partials.article.description-tabs')
@include('partials.home.features')
@include('partials.home.featured-products', ['title' => 'Kunden kauften auch', 'sectionCssClasses' => 'pt-12 pb-12', 'articles' => $featuredProducts])
@php
//@include('partials.article.article-reviews')
@endphp

@endsection

@section('custom-scripts')
    <script src="{{ asset('assets/js/libs/@fancyapps/fancybox/dist/jquery.fancybox.min.js') }}"></script>
    <script src="{{ asset('assets/js/libs/flickity/dist/flickity.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/js/libs/flickity-fade/flickity-fade.js') }}"></script>
    <script src="{{ asset('js/article/article.js') }}"></script>
@endsection


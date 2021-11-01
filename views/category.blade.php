@extends('layout.sidebarcategory')

@section('sidebar-content')
@include('partials.category.sidebar')
@endsection

@section('right-content')
@include('partials.category.table-header')
    @include('partials.category.article-table')
@endsection

@section('custom-styles')
    <link href="{{ asset('assets/js/libs/simplebar/dist/simplebar.min.css') }}" rel="stylesheet" type="text/css" >
@endsection

@section('custom-scripts')
    <script src="{{ asset('assets/js/libs/@fancyapps/fancybox/dist/jquery.fancybox.min.js') }}"></script>
    <script src="{{ asset('assets/js/libs/flickity/dist/flickity.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/js/libs/flickity-fade/flickity-fade.js') }}"></script>
    <script src="{{ asset('assets/js/libs/simplebar/dist/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets/js/libs/smooth-scroll/dist/smooth-scroll.min.js') }}"></script>
    <script src="{{ asset('js/categories/categorypage.js') }}"></script>
@endsection

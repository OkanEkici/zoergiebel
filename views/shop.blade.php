@extends('layout.mainlayout')

@section('content')
@include('partials.home.promo-banner-small')
@include('partials.home.full-slider')
@include('partials.home.featured-3-categories', [ 
'cats'=>[
  "Damen"=>['img'=>'/images/categories/Mode_für_Damen.jpg','slug'=>'bekleidung', 'slug2'=>'damen']
, "Kindermode"=>['img'=>'/images/categories/Mode_für_Kinder.jpg','slug'=>'bekleidung', 'slug2'=>'kinder']
, "Herren"=>['img'=>'/images/categories/Mode_für_Herren.jpg','slug'=>'bekleidung', 'slug2'=>'herren']
, "Accessoires"=>['img'=>'/images/categories/Accessoires.jpg','slug'=>'accessoires', 'slug2'=>'']
, "Wäsche"=>['img'=>'/images/categories/waesche.jpg','slug'=>'wasche', 'slug2'=>'']
, "Schuhe"=>['img'=>'/images/categories/grafik.jpg','slug'=>'schuhe', 'slug2'=>'']

],
'sectionCssClasses' => 'pt-12 pb-12 bg-white'])
@include('partials.home.featured-products', ['title' => 'Unsere aktuellen Neuheiten','containerCssClasses'=>'w-100 p-6', 'sectionCssClasses' => 'bg-white pb-3','articles' => $newArticles])


@include('partials.home.video-bg', 
[
'sectionTopClasses' => 'pt-0'
,'sectionBottomClasses' => 'pb-12 bg-white'
,'Heading' => 'Das gibt es neues <br>bei Mode Zörgiebel' 
,'ButtonText' => 'zum Newsletter'
,'ButtonHref' => route('cms.contact')
,'YouTubeCode' => 'nc4Eq1zGMvs'
])

@include('partials.home.textbox-in-picture', ['sectionCss' => 'bg-white'])
@include('partials.home.featured-brands', ['sectionCss' => 'bg-white'])
@include('partials.home.features', ['sectionCss' => 'bg-white'])
@endsection

@section('custom-scripts')
    <script src="{{ asset('assets/js/libs/@fancyapps/fancybox/dist/jquery.fancybox.min.js') }}"></script>
    <script src="{{ asset('assets/js/libs/flickity/dist/flickity.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/js/libs/flickity-fade/flickity-fade.js') }}"></script>
@endsection

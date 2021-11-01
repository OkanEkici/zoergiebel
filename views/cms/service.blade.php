@extends('layout.mainlayout')

@section('content')
@include('partials.home.promo-banner-small')
@include('partials.home.video-bg', 
[
'sectionTopClasses' => 'pt-0'
,'sectionBottomClasses' => 'pb-0 bg-white'
,'Heading' => 'NEUES AUS DER FASHIONSZENE <br>BEI MODE ZÖRGIEBEL' 
,'ButtonText' => 'Kontaktiere uns'
,'ButtonHref' => route('cms.contact')
,'YouTubeCode' => 'r__rOHiFP2k'
])
@php
//@include('partials.home.big-img', ['bigImgText' => 'Das gewisse Etwas Mehr?', 'subImgText' => 'Gehört bei uns zum guten Ton'])
@endphp
@include('partials.home.features-detailed', [ 'bgClass'=>'bg-primary', 'details' => [
    ['icon' => 'fe fe-thumbs-up', 'title' => 'Mal überlegen?', 'text' => 'Gerne! Nimm Dir Fashion-Teile Deiner Wahl für 3 Tage mit nach Hause und entscheide in Ruhe, was zu Dir passt und bestens sitzt.'],
    ['icon' => 'fe fe-shopping-cart', 'title' => 'Bequem bestellen', 'text' => 'Mach Dir es sich einfach und nutze unseren Bestellservice – schon kommen die Lieblingsstücke Deiner Wahl direkt bei Dir zu Hause vorgefahren. (neu direkt per Lieferservice..)'],
    ['icon' => 'fe fe-scissors', 'title' => 'Lieber anders?', 'text' => 'Den Blazer einen Tick enger oder die Hose etwas kürzer? Wir erledigen Deine Änderungswünsche zuverlässig, schnell und fachgerecht.'],
]])
@include('layout.partials.header-with-text', ['heading' => 'Unser Service', 'text' => 'Service hat viele Seiten: Angefangen bei der sympathischen Verkäuferin, die gut zuhören kann und genau weiß, was Dir so passen könnte. Über besondere Extras, mit denen wir Dich gern immer wieder neu überraschen. Bis hin zu speziellen Dienstleistungen, die Dir das Shoppen weiter versüßen. Lass uns wissen, was wir sonst noch für Dich tun können, damit Du dich bestens bedient fühlst. Wir sind ganz Ohr!', 'sectionCss' => 'bg-white pt-12 pb-2'])

@include('partials.home.fading-teaser-boxen', ['sectionCss' => 'bg-white py-6 pb-12','boxContentCss' => 'min-height: 220px !important;', 'headerContentCss' => 'min-height:170px !important;'
,'options' => [ 
 [  'title'=>'Sortiment','img_front' => 'images/customer/service/front-sortiment.jpg', 'img_back' => 'images/customer/service/back-sortiment.jpg']
,[  'title'=>'Auswahlservice','img_front' => 'images/customer/service/front-auswahlservice.jpg', 'img_back' => 'images/customer/service/back-auswahlservice.jpg']
,[  'title'=>'Kaffeebar','img_front' => 'images/customer/service/front-kaffeebar.jpg', 'img_back' => 'images/customer/service/back-kaffeebar.jpg']
,[  'title'=>'Beratung nach Terminvereinbarung','img_front' => 'images/customer/service/front-terminvereinbarung.jpg', 'img_back' => 'images/customer/service/back-terminvereinbarung.jpg']
,[  'title'=>'Fashion Rabatt','img_front' => 'images/customer/service/front-fashionrabatt.jpg', 'img_back' => 'images/customer/service/back-fashionrabatt.jpg']
,[  'title'=>'Gratis Parken direkt am Geschäft','img_front' => 'images/customer/service/front-gratisparken.jpg', 'img_back' => 'images/customer/service/back-gratisparken.jpg']
,[  'title'=>'Events und Unterhaltung','img_front' => 'images/customer/service/front-eventsunterhaltung.jpg', 'img_back' => 'images/customer/service/back-eventsunterhaltung.jpg']
,[  'title'=>'Änderungen fachgerecht','img_front' => 'images/customer/service/front-aenderungenfachgerecht.jpg', 'img_back' => 'images/customer/service/back-aenderungenfachgerecht.jpg']
,[  'title'=>'Kinderunterhaltung im Tiger-Entenland','img_front' => 'images/customer/service/front-kinderunterhaltung.jpg', 'img_back' => 'images/customer/service/back-kinderunterhaltung.jpg']
,[  'title'=>'Geschenkgutscheine','img_front' => 'images/customer/service/front-geschenkgutscheine.jpg', 'img_back' => 'images/customer/service/back-geschenkgutscheine.jpg']
,[  'title'=>'Geschenkverpackung - gratis','img_front' => 'images/customer/service/front-geschenkverpackung.jpg', 'img_back' => 'images/customer/service/back-geschenkverpackung.jpg']
,[  'title'=>'Bestellservice','img_front' => 'images/customer/service/front-bestellservice.jpg', 'img_back' => 'images/customer/service/back-bestellservice.jpg']
]])

@endsection
@extends('layout.mainlayout')

@section('content')
@include('partials.home.promo-banner-small')
@php
//@include('partials.home.big-img', ['bigImgText' => 'Ganz unser Stil:', 'subImgText' => 'Fashion-Begeisterung trifft Beratungskompetenz'])
@endphp

@include('partials.home.video-bg', 
[
'sectionTopClasses' => 'pt-0'
,'sectionBottomClasses' => 'pb-0 bg-white'
,'Heading' => 'NEUES AUS DER FASHIONSZENE <br>BEI MODE ZÖRGIEBEL' 
,'ButtonText' => 'Kontaktiere uns'
,'ButtonHref' => route('cms.contact')
,'YouTubeCode' => '2SlBCmExZLs'
])

@include('partials.home.features-detailed', ['details' => [
    ['icon' => 'fe fe-users', 'title' => 'Wir wissen, wovon wir reden.', 'text' => 'Bei uns erwartet Dich ein perfekt eingespieltes Team an Fachkräften, mit deren Fachberatung Du Dein neues Lieblings-Outfit aufbauen kannst.'],
    ['icon' => 'fe fe-heart', 'title' => 'Wir leben & lieben Fashion.', 'text' => 'Was geht ab auf den Catwalks dieser Welt? Und was passt zu Dir davon am besten? Hier sind wir in unserem Element!'],
    ['icon' => 'fe fe-home', 'title' => 'Wir sind ganz in Deiner Nähe.', 'text' => 'Du kannst ohne Stress und Stau direkt vor unser Modehaus Fahren.Hier erwartet Dich immer ein freier Parkplatz – gratis! Einfacher gehts nicht: ebenerdig, kinderwagenfreundlich und generationengerecht. Wir sind für Dich da.'],
]])

@include('layout.partials.header-with-text', [ 'sectionCss' => 'bg-white pt-12 pb-2 w-100','heading' => 'Willkommen in Fränkisch-Crumbach<br>im schönen Odenwald!', 'text' => 'Unsere Kompetenz für Dich:</br>Mode für die ganze Familie auf einer Ebene, kinderwagenfreundlich, generationsfreundlich und behindertengerecht, Parken gratis vor Türe, Tiger-Entenland für Kinder, Kaffeebar zum Entspannen. Wir sind für Dich da. In angenehm entspannter Atmosphäre volle Shopping-Lust entfalten. Die volle Bandbreite eines markenstarken Multilabel-Stores ausschöpfen. Einen kompetenten persönlichen Berater an Deiner Seite haben und am Ende mit neuen Schätzen beglückt nach Hause kommen. Was könnte es schöneres geben?'])
<style>

iframe{max-width:100%}

</style>
<!-- WELCOME -->
<section class="bg-white">
    <div class="container">
        <div class="row justify-content-center py-14 bg-cover" style="background-image: url(images/store_aussen.jpg);">
        </div>
    </div>
</section>

@include('layout.partials.header-with-text', ['sectionCss' => 'bg-white pt-12 pb-2 w-100','heading' => 'Wir sind für Dich da:', 'text' => 'Sympathisch. Offen. Kompetent. Bei uns erwartet Dich ein eingespieltes Team an Fashion-Begeisterten. Wir freuen uns darauf, Dich kennen zu lernen! Und in einem neuen Outfit strahlen zu sehen...'])
<section class="pb-12 bg-white">
    <div class="container">
@include('partials.home.3-pics-row', ['pics' => [    
    ['url' => 'images/mitarbeiter/inge_zoergiebel.jpg', 'text' => 'Inge Zörgiebel'],
    ['url' => 'images/mitarbeiter/arnold_zoergiebel.jpg', 'text' => 'Arnold Zörgiebel'],
    ['url' => 'images/mitarbeiter/chiara_mittenzwei.jpg', 'text' => 'Chiara Mittenzwei'],
]])
@include('partials.home.3-pics-row', ['pics' => [
    ['url' => 'images/mitarbeiter/marion_korff.jpg', 'text' => 'Marion Korff'],
    ['url' => 'images/mitarbeiter/carola_engel-salzner.jpg', 'text' => 'Carola Engel-Salzner'],
    ['url' => 'images/mitarbeiter/tina_nicklas.jpg', 'text' => 'Tina Nicklas'],
]])
@include('partials.home.3-pics-row', ['pics' => [
    
    ['url' => 'images/mitarbeiter/erna_reiss.jpg', 'text' => 'Erna Reiss'],
    ['url' => 'images/mitarbeiter/nina_seibert.jpg', 'text' => 'Nina Seibert'],
    ['url' => 'images/mitarbeiter/gabi_vonderschmidt.jpg', 'text' => 'Gabi Vonderschmidt'],
]])
@include('partials.home.3-pics-row', ['pics' => [
    
    ['url' => 'images/mitarbeiter/bianca_frank.jpg', 'text' => 'Bianca Frank'],
    ['url' => 'images/mitarbeiter/anneliese_schmidt.jpg', 'text' => 'Anneliese Schmidt'],
    ['url' => 'images/mitarbeiter/gudrun_wilhelm.jpg', 'text' => 'Gudrun Wilhelm'],
]])
@include('partials.home.3-pics-row', ['pics' => [
    
    ['url' => 'images/mitarbeiter/marion_brand.jpg', 'text' => 'Marion Brand'],
    ['url' => 'images/mitarbeiter/nicole_mecky.jpg', 'text' => 'Nicole Mecky'],
]])

</div>
</section>
<!-- ABOUT -->
<section class="py-12 bg-primary">
    <div class="container">
        <div class="row">
        <div class="col-12 text-center">

            <!-- Heading -->
            <h2 class="mb-0 text-white">Wir stehen für gute Beratung und Kompetenz in Sachen Mode</h2>
        </div>
        </div>
    </div>
</section>

    <!-- OUR STORY -->
    <section class="py-12 bg-white">
        <div class="container">
          <div class="row align-items-top justify-content-between">
            <div class="col-12 col-md-6">
  
            <div class="text-right mt-6">
                  <div class="text-left mt-0 mb-n5 position-relative">
                    <img src="images/customer/wir/back2.jpg" alt="..." class="img-fluid w-75 mt-12">
                  </div>                  
              <img src="images/customer/wir/front2.jpg" alt="..." class="img-fluid w-75 mt-6 position-absolute" style="top: 0;right: 0;"></div>
             
  
            </div>
            <div class="col-12 col-md-6 col-lg-5 vertical-align-top">
  
              <!-- Heading -->
              <h2 class="mt-10 mb-7">125 Jahre - Die Zeiten ändern sich wie die Geschäfte, aber immer auf der Höhe der Zeit.</h2>
  
              <!-- Text -->
              <p class="font-size-lg text-muted">
              Stets im Lifestyle seiner Zeit und Kunden<br>
Alles begann 1895 mit Wilhelm Zörgiebel, der in Fränkisch-Crumbach im Odenwald das „Handelsgeschäft für Ellen-, Kurz- und Manufakturware“ gründete. Heute, nach mehreren Umzügen, Aus- und Neubauten präsentiert sich Mode Zörgiebel in der 4. Generation mit seinen nationalen und internationalen Modemarken für Damen, Herren, Business, Freizeit und Feste auf einer 1.200 qm großen Erlebnisfläche in einem architektonisch innovativen Gebäude. Der Neubau mitten im Ländlichen war für Inge und Arnold Zörgiebel vor 20 Jahren eine riskante Entscheidung. Aus heutiger Sicht haben die Kund*innen den Zörgiebels recht gegeben, denn sie haben die Idee mit dem zukunftsweisenden Geschäftsmodell mit Freude angenommen.
              </p>
              <div class="text-right  mt-md-9 mb-md-n1 mt-6 mb-12 mt-lg-5 mb-lg-10" >
                <div class="text-left  mt-md-12 mb-md-n10 mt-15 mb-n15 mt-lg-13 mb-lg-n13">
                <img src="images/customer/wir/back1.jpg" alt="..." class="img-fluid w-75">
              </div><img src="images/customer/wir/front1.jpg" alt="..." class="img-fluid w-75 mt-n15">
              </div>
              
  
            </div>
          </div>
        </div>
      </section>


@endsection
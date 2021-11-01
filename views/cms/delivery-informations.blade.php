@extends('layout.mainlayout')

@section('content')
@include('partials.home.promo-banner-small')
@include('layout.partials.page-title',['heading' => 'Versand- und Lieferinformationen', 'sectionCss' => 'pt-12 pb-2'])
<section class="pt-7 pb-12">
    <div class="container">
<h6 class="mt-8 mb-5 text-body">Wir liefern für Dich in folgende Länder:</h6>
<ul>
    <li>Deutschland</li>
</ul>
<p>Unsere Artikel werden grundsätzlich mit DHL versendet.  
    Aus diesen Voraussetzungen ergeben sich folgende Preise für den Versand: </p>
    <p>Zusätzlich zu den angegebenen Produktpreisen berechnen wir für den Versand</p>
    <p>innerhalb Deutschlands           =   4,50 EUR (ab einem Bestellwert von 49,00€ versandkostenfrei) </p>
    <p>Bei „Click & Collect“-Bestellungen entfallen die Versandkosten, da die Ware direkt im Geschäft abgeholt wird.</p>
    <p>Eine Bestellung, die nur Gutscheine enthält, versenden wir kostenlos per Brief/E-Mail.</p>
    <p>Die Lieferzeit beträgt - sofern nicht anders angegeben - 3-4 Werktage, in Ausnahmen bis zu 10 Werktagen. </p>
    <p>Fassung vom 17.07.2020</p>
    </div>
</section>
@endsection
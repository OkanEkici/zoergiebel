@extends('layout.mainlayout')

@section('content')
@include('partials.home.promo-banner-small')
@include('layout.partials.header-with-text', ['heading' => 'Impressum', 'text' => '', 'sectionCss' => 'pt-12 pb-2'])
<section class="pt-7 pb-12">
    <div class="container">

        <p>Inhaber</p>
        <p>Arnold Zörgiebel<br>
            Siedlerweg 18<br>
            64407 Fränkisch-Crumbach<br>
        </p>
        <p><a class="text-body" href="">Telefon: 06164 2099</a></p>
        <p><a class="text-body" href="">Telefax: 06164 4100</a></p>
        <p><a class="text-body" href="">E-Mail: mode[ad]zoergiebel.de</a></p>
        <p>Umsatzsteuer-Identifikationsnummer: DE 113418526</p>
        <strong>Online-Streitbeilegung</strong>
        <p>Die Europäische Kommission stellt eine Plattform zur Online-Streitbeilegung (OS) bereit, die Sie hier finden https://ec.europa.eu/consumers/odr/. Wir sind bereit, an einem außergerichtlichen Schlichtungsverfahren vor einer Verbraucherschlichtungsstelle teilzunehmen. Zuständig ist die Allgemeine Verbraucherschlichtungsstelle des Zentrums für Schlichtung e.V., Straßburger Straße 8, 77694 Kehl am Rhein, www.verbraucher-schlichter.de.</p>
        <strong>Ergänzender Hinweis</strong>
        <p>Das Landgericht Hamburg hat mit Urteil vom 12.05.1998 entschieden, dass man durch die Ausbringung eines Links die Inhalte der gelinkten Seite ggf. mit zu verantworten hat. Dies kann - so das LG - nur dadurch verhindert werden, dass man sich ausdrücklich von diesen Inhalten distanziert. Wir haben auf unseren Seiten Links zu anderen Seiten im Internet gelegt. Für all diese Links gilt: Wir möchten ausdücklich betonen, dass wir keinerlei Einfluss auf die Gestaltung und die Inhalte der verlinkten Seiten haben. Deshalb distanzieren wir uns hiermit ausdrücklich von allen Inhalten aller verlinkten Seiten auf dieser gesamten Website inkl. aller Unterseiten. Diese Erklärung gilt für alle auf dieser Homepage ausgebrachten Links und für alle Inhalte der Seiten, zu denen Links oder Banner führen.</p>
        <p>17.07.2020</p>
 
    </div>
</section>
@endsection

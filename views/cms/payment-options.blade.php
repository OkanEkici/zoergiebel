@extends('layout.mainlayout')

@section('content')
@include('partials.home.promo-banner-small')
@include('layout.partials.header-with-text', ['heading' => 'Zahlungsoptionen', 'text' => '', 'sectionCss' => 'pt-12 pb-2'])
<section class="pt-7 pb-12">
    <div class="container">

        
        <strong>Bankverbindung bei Vorkasse:</strong>
        <p>
            Zahlungsempfänger:<br>Mode Zörgiebel
            <br>IBAN DE47 5085 1952 0000 0307 00
            <br>Sparkasse Odenwaldkreis
        </p>
        <p>Verwendungszweck: -entnehmen sie bitte Ihrer Rechnung-</p>
        <strong>Zahlung per PayPal:</strong>
        <p>
            PayPal ist ein Online-Zahlungsservice, mit dem Du sicher, einfach und schnell bezahlen kannst. <br>
            Du wirst am Ende des Bestellvorgangs zur Zahlung direkt auf die Webseite von PayPal weitergeleitet. <br>
            Nach erfolgreichem Zahlvorgang bei PayPal wirst Du wieder zum Zörgiebel Online-Shop geleitet. <br>
            Wenn Du noch kein PayPal-Kunde bist, kannst Du während des Bestellprozesses ein PayPal-Konto eröffnen und anschließend die Zahlung bestätigen.<br>
            Im Gegensatz zur Vorkasse wird uns das Geld von PayPal sofort bereitgestellt und anschließend von dem Zahlungsdienst eingezogen. <br>
            Auf diese Weise können wir Dir deine Bestellung umgehend zuschicken. Weitere Informationen zu PayPal finden Sie unter <a class="text-body" href="www.paypal.com" target="_blank">www.paypal.com</a>.
        </p>
        <strong>Vorkasse</strong>
        <p>
            Du kannst als Zahlungsmodalität "Vorkasse" wählen. <br>
            Die Bankverbindung wird Dir per E-Mail mit der Bestellbestätigung übermittelt und findest Du zusätzlich unter dem Punkt Bankverbindung. <br>
            Nach Zahlungseingang wird die Ware unverzüglich an Dich versandt. Bei eventuellen Retouren erhältst Du dein Geld auf diesem Wege von uns unverzüglich zurück.
        </p>
        <strong>Click & Collect</strong>
        <p>
            Gern kannst Du deine Bestellung einfach bei uns im Geschäft abholen. Wähle für Deine Bestellung die direkte Abholung im Ladengeschäft. <br>
            Du kannst vor Ort bargeldlos oder mit EC- bzw. Kreditkarten bezahlen. Dieser Service steht Dir auch als Neukunde ab der ersten Bestellung zur Verfügung.
        </p>
    
    </div>
</section>
@endsection

@extends('layout.mainlayout')

@section('content')
@include('partials.home.promo-banner-small')
@include('layout.partials.header-with-text', ['heading' => 'Widerrufsbelehrung'
, 'text' => 'Als Verbraucher steht Dir nach Maßgabe der folgenden Hinweise ein gesetzliches Widerrufsrecht zu. Verbraucher ist jede natürliche Person; die ein Rechtsgeschäft zu Zwecken abschließt, die überwiegend weder ihrer gewerblichen noch ihrer selbstständigen beruflichen Tätigkeit zugerechnet werden können.', 'sectionCss' => 'pt-12 pb-2'])
<section class="pt-7 pb-12">
    <div class="container">

        <strong>Widerrufsrecht</strong>
        <p>Du hast das Recht, binnen vierzehn Tagen ohne Angabe von Gründen diesen Vertrag zu widerrufen.</p>
        <p>Die Widerrufsfrist beträgt vierzehn Tage ab dem Tag an dem Dich oder ein von Dir benannter Dritter, der nicht der Beförderer ist, die Waren in Besitz genommen haben bzw. hat.</p>
        <p>Um Dein Widerrufsrecht auszuüben, musst Du uns mittels einer eindeutigen Erklärung (z.B. ein mit der Post versandter Brief, Telefax oder E-Mail) über Deinen Entschluss, diesen Vertrag zu widerrufen, informieren. Du kannst dafür das beigefügte Muster-Widerrufsformular verwenden, das jedoch nicht vorgeschrieben ist.</p>
        <strong>Muster-Widerrufsformular</strong>
        <p> (Wenn Du den Vertrag widerrufen willst, dann fülle bitte dieses Formular aus und sende es zurück.)</p>
        <p>Formular</p>
        <p>Zur Wahrung der Widerrufsfrist reicht es aus, dass Du die Mitteilung über die Ausübung des Widerrufsrechts vor Ablauf der Widerrufsfrist absendest.</p>
        <strong>Folgen des Widerrufs</strong>
        <p>Wenn Du diesen Vertrag widerrufst, haben wir Dir alle Zahlungen, die wir von Dir erhalten haben, einschließlich der Lieferkosten (mit Ausnahme der zusätzlichen Kosten, die sich daraus ergeben, dass Du eine andere Art der Lieferung als die von uns angebotene, günstigste Standardlieferung gewählt hast), unverzüglich und spätestens binnen vierzehn Tagen ab dem Tag zurückzuzahlen, an dem die Mitteilung über Deinen Widerruf dieses Vertrags bei uns eingegangen ist. Für diese Rückzahlung verwenden wir dasselbe Zahlungsmittel, das Du bei der ursprünglichen Transaktion eingesetzt hast, es sei denn, mit Dir wurde ausdrücklich etwas anderes vereinbart; in keinem Fall werden Dir wegen dieser Rückzahlung Entgelte berechnet. Wir können die Rückzahlung verweigern, bis wir die Waren wieder zurückerhalten haben oder bis Du den Nachweis erbracht hast, dass Du die Waren zurückgesandt hast, je nachdem, welches der frühere Zeitpunkt ist.</p>
        <p>Du hast die Waren unverzüglich und in jedem Fall spätestens binnen vierzehn Tagen ab dem Tag, an dem Du uns über den Widerruf dieses Vertrages unterrichtest, an uns, Mode Zörgiebel, Siedlerweg 18, 64407 Fränkisch-Crumbach, zurückzusenden oder zu übergeben. Die Frist ist gewahrt, wenn Du die Waren vor Ablauf der Frist von vierzehn Tagen absendest.</p>
        <p>Du trägst die unmittelbaren Kosten der Rücksendung der Waren.</p>
        <p>Du musst für einen etwaigen Wertverlust der Waren nur aufkommen, wenn dieser Wertverlust auf einen zur Prüfung der Beschaffenheit, Eigenschaften und Funktionsweise der Waren nicht notwendigen Umgang mit dir zurückzuführen ist.</p>
        
    </div>
</section>
@endsection

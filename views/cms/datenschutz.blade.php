@extends('layout.mainlayout')

@section('content')
@include('partials.home.promo-banner-small')
@include('layout.partials.header-with-text', ['heading' => 'Datenschutzerklärung', 'text' => '', 'sectionCss' => 'pt-12 pb-2'])
<section class="pt-7">
    <div class="container">

        <p>
            Inhaber
        </p>

        <p>Wir freuen uns über Ihr Interesse an unserem Online-Shop. Der Schutz Ihrer Privatsphäre ist für uns sehr wichtig. Nachstehend informieren wir Sie ausführlich über den Umgang mit Ihren Daten.</p>
        <h6 class="mt-8 mb-5 text-body">1. Zugriffsdaten und Hosting</h6>
        <p>Sie können unsere Webseiten besuchen, ohne Angaben zu Ihrer Person zu machen. Bei jedem Aufruf einer Webseite speichert der Webserver lediglich automatisch ein sogenanntes Server-Logfile, das z.B. den Namen der angeforderten Datei, Ihre IP-Adresse, Datum und Uhrzeit des Abrufs, übertragene Datenmenge und den anfragenden Provider (Zugriffsdaten) enthält und den Abruf dokumentiert.</p>
        <p>Diese Zugriffsdaten werden ausschließlich zum Zwecke der Sicherstellung eines störungsfreien Betriebs der Seite sowie der Verbesserung unseres Angebots ausgewertet. Dies dient gemäß Art. 6 Abs. 1 S. 1 lit. f DSGVO der Wahrung unserer im Rahmen einer Interessensabwägung überwiegenden berechtigten Interessen an einer korrekten Darstellung unseres Angebots. Alle Zugriffsdaten werden spätestens sieben Tage nach Ende Ihres Seitenbesuchs gelöscht.</p>
        <strong>Hostingdienstleistungen durch einen Drittanbieter</strong>
        <p>Im Rahmen einer Verarbeitung in unserem Auftrag erbringt ein Drittanbieter für uns die Dienste zum Hosting und zur Darstellung der Webseite. Dies dient der Wahrung unserer im Rahmen einer Interessensabwägung überwiegenden berechtigten Interessen an einer korrekten Darstellung unseres Angebots. Alle Daten, die im Rahmen der Nutzung dieser Webseite oder in dafür vorgesehenen Formularen im Onlineshop wie folgend beschrieben erhoben werden, werden auf seinen Servern verarbeitet. Eine Verarbeitung auf anderen Servern findet nur in dem hier erläuterten Rahmen statt.</p>
        <p>Dieser Dienstleister sitzt innerhalb eines Landes der Europäischen Union oder des Europäischen Wirtschaftsraums.</p>
        <h6 class="mt-8 mb-5 text-body">2. Datenerhebung und -verwendung zur Vertragsabwicklung und bei Eröffnung eines Kundenkontos</h6>
        <p>Wir erheben personenbezogene Daten, wenn Sie uns diese im Rahmen Ihrer Bestellung, bei einer Kontaktaufnahme mit uns (z.B. per Kontaktformular oder E-Mail) oder bei Eröffnung eines Kundenkontos freiwillig mitteilen. Pflichtfelder werden als solche gekennzeichnet, da wir in diesen Fällen die Daten zwingend zur Vertragsabwicklung, bzw. zur Bearbeitung Ihrer Kontaktaufnahme oder Eröffnung des Kundenkontos benötigen und Sie ohne deren Angabe die Bestellung und/ oder die Kontoeröffnung nicht abschließen, bzw. die Kontaktaufnahme nicht versenden können. Welche Daten erhoben werden, ist aus den jeweiligen Eingabeformularen ersichtlich. Wir verwenden die von ihnen mitgeteilten Daten gemäß Art. 6 Abs. 1 S. 1 lit. b DSGVO zur Vertragsabwicklung und Bearbeitung Ihrer Anfragen. Nach vollständiger Abwicklung des Vertrages oder Löschung Ihres Kundenkontos werden Ihre Daten für die weitere Verarbeitung eingeschränkt und nach Ablauf der steuer- und handelsrechtlichen Aufbewahrungsfristen gelöscht, sofern Sie nicht ausdrücklich in eine weitere Nutzung Ihrer Daten eingewilligt haben oder wir uns eine darüber hinausgehende Datenverwendung vorbehalten, die gesetzlich erlaubt ist und über die wir Sie in dieser Erklärung informieren. Die Löschung Ihres Kundenkontos ist jederzeit möglich und kann entweder durch eine Nachricht an die unten beschriebene Kontaktmöglichkeit oder über eine dafür vorgesehene Funktion im Kundenkonto erfolgen.</p>
        <h6 class="mt-8 mb-5 text-body">3. Datenweitergabe</h6>
        <p>Zur Vertragserfüllung gemäß Art. 6 Abs. 1 S. 1 lit. b DSGVO geben wir Ihre Daten an das mit der Lieferung beauftragte Versandunternehmen weiter, soweit dies zur Lieferung bestellter Waren erforderlich ist. Je nach dem, welchen Zahlungsdienstleister Sie im Bestellprozess auswählen, geben wir zur Abwicklung von Zahlungen die hierfür erhobenen Zahlungsdaten an das mit der Zahlung beauftragte Kreditinstitut und ggf. von uns beauftragte Zahlungsdienstleister weiter bzw. an den ausgewählten Zahlungsdienst. Zum Teil erheben die ausgewählten Zahlungsdienstleister diese Daten auch selbst, soweit Sie dort ein Konto anlegen. In diesem Fall müssen Sie sich im Bestellprozess mit Ihren Zugangsdaten bei dem Zahlungsdienstleister anmelden. Es gilt insoweit die Datenschutzerklärung des jeweiligen Zahlungsdienstleisters.</p>
        <h6 class="mt-8 mb-5 text-body">4. E-Mail-Newsletter und Postwerbung</h6>
        <strong>E-Mail-Werbung mit Anmeldung zum Newsletter</strong>
        <p>Wenn Sie sich zu unserem Newsletter anmelden, verwenden wir die hierfür erforderlichen oder gesondert von Ihnen mitgeteilten Daten, um Ihnen regelmäßig unseren E-Mail-Newsletter aufgrund Ihrer Einwilligung gemäß Art. 6 Abs. 1 S. 1 lit. a DSGVO zuzusenden.</p>
        <p>Die Abmeldung vom Newsletter ist jederzeit möglich und kann entweder durch eine Nachricht an die unten beschriebene Kontaktmöglichkeit oder über einen dafür vorgesehenen Link im Newsletter erfolgen. Nach Abmeldung löschen wir Ihre E-Mail-Adresse, soweit Sie nicht ausdrücklich in eine weitere Nutzung Ihrer Daten eingewilligt haben oder wir uns eine darüber hinausgehende Datenverwendung vorbehalten, die gesetzlich erlaubt ist und über die wir Sie in dieser Erklärung informieren.</p>
        <strong>E-Mail-Werbung ohne Anmeldung zum Newsletter und Ihr Widerspruchsrecht</strong>
        <p>Wenn wir Ihre E-Mail-Adresse im Zusammenhang mit dem Verkauf einer Ware oder Dienstleistung erhalten und Sie dem nicht widersprochen haben, behalten wir uns vor, Ihnen auf Grundlage von § 7 Abs. 3 UWG regelmäßig Angebote zu ähnlichen Produkten, wie den bereits gekauften, aus unserem Sortiment per E-Mail zuzusenden. Dies dient der Wahrung unserer im Rahmen einer Interessensabwägung überwiegenden berechtigten Interessen an einer werblichen Ansprache unserer Kunden. Sie können dieser Verwendung Ihrer E-Mail-Adresse jederzeit durch eine Nachricht an die unten beschriebene Kontaktmöglichkeit oder über einen dafür vorgesehenen Link in der Werbemail widersprechen, ohne dass hierfür andere als die Übermittlungskosten nach den Basistarifen entstehen.</p>
        <p>Der Newsletter wird im Rahmen einer Verarbeitung in unserem Auftrag durch einen Dienstleister versendet, an den wir Ihre E-Mail-Adresse hierzu weitergeben.</p>
        <p>Dieser Dienstleister sitzt innerhalb eines Landes der Europäischen Union oder des Europäischen Wirtschaftsraums.</p>
        <strong>Postwerbung und Ihr Widerspruchsrecht</strong>
        <p>Darüber hinaus behalten wir uns vor, Ihren Vor- und Nachnamen sowie Ihre Postanschrift für eigene Werbezwecke zu nutzen, z.B. zur Zusendung von interessanten Angeboten und Informationen zu unseren Produkten per Briefpost. Dies dient der Wahrung unserer im Rahmen einer Interessensabwägung überwiegenden berechtigten Interessen an einer werblichen Ansprache unserer Kunden gemäß Art. 6 Abs. 1 S. 1 lit. f DSGVO.</p>
        <h6 class="mt-8 mb-5 text-body">5. Cookies</h6>
        <p>Um den Besuch unserer Website attraktiv zu gestalten und die Nutzung bestimmter Funktionen zu ermöglichen, um passende Produkte anzuzeigen oder zur Marktforschung verwenden wir auf verschiedenen Seiten sogenannte Cookies. Dies dient der Wahrung unserer im Rahmen einer Interessensabwägung überwiegenden berechtigten Interessen an einer optimierten Darstellung unseres Angebots gemäß Art. 6 Abs. 1 S. 1 lit. f DSGVO. Cookies sind kleine Textdateien, die automatisch auf Ihrem Endgerät gespeichert werden. Einige der von uns verwendeten Cookies werden nach Ende der Browser-Sitzung, also nach Schließen Ihres Browsers, wieder gelöscht (sog. Sitzungs-Cookies). Andere Cookies verbleiben auf Ihrem Endgerät und ermöglichen uns, Ihren Browser beim nächsten Besuch wiederzuerkennen (persistente Cookies). Die Dauer der Speicherung können Sie der Übersicht in den Cookie-Einstellungen Ihres Webbrowsers entnehmen. Sie können Ihren Browser so einstellen, dass Sie über das Setzen von Cookies informiert werden und einzeln über deren Annahme entscheiden oder die Annahme von Cookies für bestimmte Fälle oder generell ausschließen. Jeder Browser unterscheidet sich in der Art, wie er die Cookie-Einstellungen verwaltet. Diese ist in dem Hilfemenü jedes Browsers beschrieben, welches Ihnen erläutert, wie Sie Ihre Cookie-Einstellungen ändern können. Diese finden Sie für die jeweiligen Browser unter den folgenden Links:</p>
        <ul>
            <li>Internet Explorer™:<a target="_blank" href="http://windows.microsoft.com/de-DE/windows-vista/Block-or-allow-cookies">http://windows.microsoft.com/de-DE/windows-vista/Block-or-allow-cookies</a></li>
            <li>Safari™: <a target="_blank" href="https://support.apple.com/kb/ph21411?locale=de_DE">https://support.apple.com/kb/ph21411?locale=de_DE</a></li>
            <li>Chrome™: <a target="_blank" href="http://support.google.com/chrome/bin/answer.py?hl=de&hlrm=en&answer=95647">http://support.google.com/chrome/bin/answer.py?hl=de&hlrm=en&answer=95647</a></li>
            <li>Firefox™: <a target="_blank" href="https://support.mozilla.org/de/kb/cookies-erlauben-und-ablehnen">https://support.mozilla.org/de/kb/cookies-erlauben-und-ablehnen</a></li>
            <li>Opera™: <a target="_blank" href="http://help.opera.com/Windows/10.20/de/cookies.html">http://help.opera.com/Windows/10.20/de/cookies.html</a></li>
        </ul>
        <p>Bei der Nichtannahme von Cookies kann die Funktionalität unserer Website eingeschränkt sein.</p>
        <h6 class="mt-8 mb-5 text-body">6. Social Media PlugIns</h6>
        <p>Verwendung von Social Plugins von Pinterest unter Verwendung der Shariff-Lösung.</p>
        <p>Auf unserer Website werden Social Buttons von sozialen Netzwerken verwendet.</p>
        <p>Dies dient der Wahrung unserer im Rahmen einer Interessensabwägung überwiegenden berechtigten Interessen an einer optimalen Vermarktung unseres Angebots gemäß Art. 6 Abs. 1 S. 1 lit. f DSGVO. Um den Schutz Ihrer Daten beim Besuch unserer Website zu erhöhen, sind diese Buttons nicht uneingeschränkt als Plugins, sondern lediglich unter Verwendung eines HTML-Links in die Seite eingebunden. Diese Einbindung gewährleistet, dass beim Aufruf einer Seite unseres Webauftritts, die solche Buttons enthält, noch keine Verbindung mit den Servern des Anbieters des jeweiligen sozialen Netzwerks hergestellt wird.</p>
        <p>Klicken Sie auf einen der Buttons, öffnet sich ein neues Fenster Ihres Browsers und ruft die Seite des jeweiligen Diensteanbieters auf, auf der Sie (ggf. nach Eingabe Ihrer Login-Daten) z.B. den Like- oder Share-Button betätigen können.</p>
        <p>Zweck und Umfang der Datenerhebung und die weitere Verarbeitung und Nutzung der Daten durch die Anbieter auf deren Seiten sowie eine Kontaktmöglichkeit und Ihre diesbezüglichen Rechte und Einstellungsmöglichkeiten zum Schutz Ihrer Privatsphäre entnehmen Sie bitte den Datenschutzhinweisen der Anbieter. https://about.pinterest.com/de/privacy-policy</p>
        <h6 class="mt-8 mb-5 text-body">7. Versand von Bewertungserinnerungen per E-Mail</h6>
        <strong>Bewertungserinnerung durch Trusted Shops</strong>
        <p>Sofern Sie uns hierzu während oder nach Ihrer Bestellung Ihre ausdrückliche Einwilligung gemäß Art. 6 Abs. 1 S. 1 lit. a DSGVO erteilt haben, übermitteln wir Ihre E-Mail-Adresse an die Trusted Shops GmbH, Subbelrather Str. 15c, 50823 Köln (www.trustedshops.de), damit diese Ihnen eine Bewertungserinnerung per E-Mail zusendet.</p>
        <p>Diese Einwilligung kann jederzeit durch eine Nachricht an die unten beschriebene Kontaktmöglichkeit oder direkt gegenüber Trusted Shops widerrufen werden.</p>
        <h6 class="mt-8 mb-5 text-body">8. Kontaktmöglichkeiten und Ihre Rechte</h6>
        <p>Als Betroffener haben Sie folgende Rechte:</p>
        <ul>
            <li>gemäß Art. 15 DSGVO das Recht, in dem dort bezeichneten Umfang Auskunft über Ihre von uns verarbeiteten personenbezogenen Daten zu verlangen;</li>
            <li>gemäß Art. 16 DSGVO das Recht, unverzüglich die Berichtigung unrichtiger oder Vervollständigung Ihrer bei uns gespeicherten personenbezogenen Daten zu verlangen;</li>
            <li>gemäß Art. 17 DSGVO das Recht, die Löschung Ihrer bei uns gespeicherten personenbezogenen Daten zu verlangen, soweit nicht die weitere Verarbeitung
            <ul>
                <li>zur Ausübung des Rechts auf freie Meinungsäußerung und Information;</li>
                <li>zur Erfüllung einer rechtlichen Verpflichtung;</li>
                <li>aus Gründen des öffentlichen Interesses oder</li>
                <li>zur Geltendmachung, Ausübung oder Verteidigung von Rechtsansprüchen</li>
            </ul>
            erforderlich ist;
            </li>
            <li>gemäß Art. 18 DSGVO das Recht, die Einschränkung der Verarbeitung Ihrer personenbezogenen Daten zu verlangen, soweit
                <ul>
                    <li>die Richtigkeit der Daten von Ihnen bestritten wird;</li>
                    <li>die Verarbeitung unrechtmäßig ist, Sie aber deren Löschung ablehnen;</li>
                    <li>wir die Daten nicht mehr benötigen, Sie diese jedoch zur Geltendmachung, Ausübung oder Verteidigung von Rechtsansprüchen benötigen oder</li>
                    <li>Sie gemäß Art. 21 DSGVO Widerspruch gegen die Verarbeitung eingelegt haben;</li>
                </ul>
            </li>
            <li>gemäß Art. 20 DSGVO das Recht, Ihre personenbezogenen Daten, die Sie uns bereitgestellt haben, in einem strukturierten, gängigen und maschinenlesebaren Format zu erhalten oder die Übermittlung an einen anderen Verantwortlichen zu verlangen;</li>
            <li>gemäß Art. 77 DSGVO das Recht, sich bei einer Aufsichtsbehörde zu beschweren. In der Regel können Sie sich hierfür an die Aufsichtsbehörde Ihres üblichen Aufenthaltsortes oder Arbeitsplatzes oder unseres Unternehmenssitzes wenden.</li>
        </ul>
        <p>Bei Fragen zur Erhebung, Verarbeitung oder Nutzung Ihrer personenbezogenen Daten, bei Auskünften, Berichtigung, Sperrung oder Löschung von Daten sowie Widerruf erteilter Einwilligungen oder Widerspruch gegen eine bestimmte Datenverwendung wenden Sie sich bitte direkt an uns über die Kontaktdaten in unserem Impressum.</p>
    </div>
</section>
@include('layout.partials.page-title',['heading' => 'Widerspruchsrecht', 'sectionCss' => 'pb-2'])
<section class=" pb-12">
    <div class="container">
        <p>Soweit wir zur Wahrung unserer im Rahmen einer Interessensabwägung überwiegenden berechtigten Interessen personenbezogene Daten wie oben erläutert verarbeiten, können Sie dieser Verarbeitung mit Wirkung für die Zukunft widersprechen. Erfolgt die Verarbeitung zu Zwecken des Direktmarketings, können Sie dieses Recht jederzeit wie oben beschrieben ausüben. Soweit die Verarbeitung zu anderen Zwecken erfolgt, steht Ihnen ein Widerspruchsrecht nur bei Vorliegen von Gründen, die sich aus Ihrer besonderen Situation ergeben, zu.</p>
        <p>Nach Ausübung Ihres Widerspruchsrechts werden wir Ihre personenbezogenen Daten nicht weiter zu diesen Zwecken verarbeiten, es sei denn, wir können zwingende schutzwürdige Gründe für die Verarbeitung nachweisen, die Ihre Interessen, Rechte und Freiheiten überwiegen, oder wenn die Verarbeitung der Geltendmachung, Ausübung oder Verteidigung von Rechtsansprüchen dient.</p>
        <p>Dies gilt nicht, wenn die Verarbeitung zu Zwecken des Direktmarketings erfolgt. Dann werden wir Ihre personenbezogenen Daten nicht weiter zu diesem Zweck verarbeiten.</p>
        <p>Fassung vom 17.07.2020</p>
    </div>
</section>
@endsection
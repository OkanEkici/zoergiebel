@extends('layout.mainlayout')

@section('content')
@include('partials.home.promo-banner-small')

<!-- CONTENT -->
<section class="pt-7 pb-12 bg-white">
    <div class="container">
      <div class="row">
        <div class="col-12">

          <!-- Heading -->
          <h3 class="mb-10 text-center">Kontaktiere uns</h3>

        </div>
      </div>
      <div class="row justify-content-between">
        <div class="col-12 col-md-4 col-xl-3">
          <aside class="mb-9 mb-md-0">

            <!-- Heading -->
            <h6 class="mb-6">
              <i class="fe fe-phone text-primary mr-4"></i> Rufe uns an:
            </h6>

            <!-- Text -->
            <p class="text-gray-500">
              Wir sind für Dich von Montag bis Samstag von 09.30 bis 18.00 Uhr erreichbar
            </p>
            <p>
              <strong>Telefon: </strong>06164 2099<br>
              <a class="text-gray-500" href="tel:+4961642099"></a>
            </p>

            <!-- Divider -->
            <hr>

            <!-- Heading -->
            <h6 class="mb-6">
              <i class="fe fe-mail text-primary mr-4"></i> Schreibe uns:
            </h6>

            <!-- Text -->
            <p class="text-gray-500">
              Fülle unser Kontatkformular auf der rechten Seite aus oder schreibe uns eine E-Mail.
            </p>
            <p>
              <strong>E-Mail:</strong><br>
              <a class="text-gray-500" href="mailto:mode@zoergiebel.de">mode@zoergiebel.de</a>
            </p>

            <!-- Divider -->
            <hr>

            <!-- Heading -->
            <h6 class="mb-6">
              <i class="fe fe-mail text-primary mr-4"></i> Hier findest Du uns:
            </h6>

            <!-- Text -->
            <p class="mb-0 text-gray-500">
              Mode Zörgiebel<br>
              Siedlerweg 18<br>
              64407 Fränkisch-Crumbach
            </p>

            <!-- Button -->
            <p class="mb-0">
              <a class="btn btn-link px-0 text-body" target="_blank" href="https://goo.gl/maps/PhCmLEs48fvr3LSR6">
                Zu Google Maps <i class="fe fe-arrow-right ml-2"></i>
              </a>
            </p>

          </aside>
        </div>
        <div class="col-12 col-md-8">

          <!-- Form -->
          <form action="{{route('contact.form')}}" method="POST">
            @csrf
            <!-- Email -->
            <div class="form-group">
              <label class="sr-only" for="contactName">
                Dein Name *
              </label>
              <input name="name" class="form-control form-control-sm" id="contactName" type="text" 
              placeholder="Dein Name *" required>
            </div>

            <!-- Email -->
            <div class="form-group">
              <label class="sr-only" for="contactEmail">
                Deine Email *
              </label>
              <input name="email" class="form-control form-control-sm" id="contactEmail" type="email" 
              placeholder="Dein Email *" required>
            </div>

            <!-- Email -->
            <div class="form-group">
              <label class="sr-only" for="contactTitle">
                Titel *
              </label>
              <input name="title" class="form-control form-control-sm" id="contactTitle" type="text" placeholder="Titel *" required>
            </div>

            <!-- Email -->
            <div class="form-group mb-7">
              <label class="sr-only" for="contactMessage">
                Nachricht *
              </label>
              <textarea name="message" class="form-control form-control-sm" id="contactMessage" rows="5" placeholder="Nachricht *" required></textarea>
            </div>
            <div class="form-group mb-7">
              <div class="g-recaptcha" id="feedback-recaptcha" data-sitekey="{{ env('GOOGLE_RECAPTCHA_KEY')  }}"></div>
              <div class="mt-2">
                @php
                  $zahl1=rand(1,10);$zahl2=rand(1,10);
                  $Operatoren=['+','-','x'];shuffle ( $Operatoren );
                  $operator = $Operatoren[0];
                @endphp
                <input name="g-recaptcha-zahl1" value="{{ $zahl1 }}" type="hidden" >
                <input name="g-recaptcha-zahl2" value="{{ $zahl2 }}" type="hidden" >
                <input name="g-recaptcha-operator" value="{{ $operator }}" type="hidden" >

                <span>{{ $zahl1 }}</span><span> {{ $operator }} </span><span>{{ $zahl2 }} sind ?</span>
                <br>                    
                <input name="g-recaptcha-ergebnis" data-zahl1="{{ $zahl1 }}" data-zahl2="{{ $zahl2 }}" data-operator="{{ $operator }}" type="text" class="form-control form-control-white form-control-xs " placeholder="{{ $zahl1 }}{{ $operator }}{{ $zahl2 }}=Ergebnis*" required>
              </div>
            </div>
            
            <!-- Button -->
            <button class="btn btn-primary">
              Nachricht senden
            </button>

          </form>

        </div>
      </div>
    </div>
  </section>

@endsection
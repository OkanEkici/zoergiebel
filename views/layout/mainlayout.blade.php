<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('layout.partials.head')

    </head>
    <body>
        @include('layout.partials.navbar', ['selectedTab' => ($selectedTab) ?? ''
            , 'Subcategories'=>[]
            , 'Contents'=>[]
        ])
        @yield('content')
        @include('layout.partials.script')
        @yield('custom-scripts')
        <script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/functions.js') }}"></script>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
        @include('layout.partials.footer')
                @include('cookieConsent::index')
                @include('partials.account.include.ajax')

    </body>
</html>



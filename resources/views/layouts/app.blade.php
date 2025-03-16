<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- <link rel="shortcut icon" href="{{ Vite::asset('resources/images/favicongelecek') }}"> --}}
    @yield('meta')
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @yield('styles')
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id={{ env('GOOGLE_SITE_TAG') }}"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }

        gtag('js', new Date());
        gtag('config', '{{ env('GOOGLE_SITE_TAG') }}');
    </script>
    {{-- Csrf --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <script src="https://cdn.jsdelivr.net/npm/algoliasearch@4.23.3/dist/algoliasearch.umd.js"
        integrity="sha256-76mmfHsYYb491qbcs1Vd/iK80pdRqKCOEYJtPEy8dys=" crossorigin="anonymous"></script>

    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    {!! SEO::generate(true) !!}
    @turnstileScripts()
</head>

<body>
    {{-- @include('cookie-consent::index') --}}
    <div id="swup" class="transition-main w-full overflow-hidden" x-data="">
     
        {{-- Normal menü - Sadece masaüstü cihazlarda görünecek --}}
        @if (!isset($hideHeader) || !$hideHeader)

        <div class="">
            @include('includes._header', [
                'headerClasses' => isset($headerClasses) ? $headerClasses : null,
                'menuClasses' => isset($menuClasses) ? $menuClasses : '',
                'langRedirectionRoute' => $langRedirectionRoute ?? null,
            ])
        </div>
        @endif

        <main class="transition-fade ">
            @yield('content')

        </main>
        @if (!isset($hideFooter) || !$hideFooter)
        @include('includes._footer')
        @endif
        {{--    <div class="overlay transition-overlay"></div> --}}
    </div>

    @if (session()->has('success'))
        @include('components.simple-modal')
    @endif


    @yield('scripts')

    {{-- For algolia Search Integration --}}
    {{-- <script> --}}
    {{--    var globalBaseUrl ='<?php echo url('/'); ?>'; --}}
    {{--    window.appLang = '{{$l}}'; --}}
    {{--    window.searchPlaceholder = '{!!__("")!!}'; --}}
    {{--    window.noResultText = '{!!__("")!!}'; --}}
    {{--    window.searchText = ''; --}}
    {{--    window.searchDetailUrl = '{{route('search.keyword')}}' --}}
    {{-- </script> --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/algoliasearch@4/dist/algoliasearch-lite.umd.js"></script> --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/instantsearch.js@4"></script> --}}
    {{-- <script type="text/javascript" src="{{ asset('js/algolia.js') }}"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>

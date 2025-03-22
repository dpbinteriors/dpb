<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- <link rel="shortcut icon" href="{{ Vite::asset('resources/images/favicongelecek') }}"> --}}

    @yield('meta')

    {{-- Vite CSS and JS assets --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @yield('styles')

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id={{ env('GOOGLE_SITE_TAG') }}"></script>

    {{-- Bootstrap CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    {{-- Livewire Styles --}}
    @livewireStyles

    {{-- Google Analytics Script --}}
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', '{{ env('GOOGLE_SITE_TAG') }}');
    </script>

    {{-- CSRF Meta Tag --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    {!! SEO::generate(true) !!}

    @turnstileScripts()

    {{-- Livewire Scripts --}}

</head>

<body>

{{-- Cookie Consent --}}
{{-- @include('cookie-consent::index') --}}

<div id="swup" class="transition-main w-full overflow-hidden" x-data="">

    {{-- Header Section (Only visible on desktop devices) --}}
    @if (!isset($hideHeader) || !$hideHeader)
        <div>
            @include('includes._header', [
                'headerClasses' => isset($headerClasses) ? $headerClasses : null,
                'menuClasses' => isset($menuClasses) ? $menuClasses : '',
                'langRedirectionRoute' => $langRedirectionRoute ?? null,
            ])
        </div>
    @endif

    {{-- Main Content Section --}}
    <main class="transition-fade">
        @yield('content')
    </main>

    {{-- Footer Section --}}
    @if (!isset($hideFooter) || !$hideFooter)
        @include('includes._footer')
    @endif

</div>

{{-- Success Modal (If session has a success message) --}}
@if (session()->has('success'))
    @include('components.simple-modal')
@endif

{{-- Additional Scripts --}}
@yield('scripts')
@livewireScripts

{{-- Bootstrap JS --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script>
    $(document).ready(function(){
        var owl = $(".owl-carousel");

        owl.owlCarousel({
            loop: true,
            margin: 10,
            nav: false,
            dots: false,
            items: 1
        });

        $(".next-slide").click(function() {
            owl.trigger("next.owl.carousel");
            updateIndicators(1);
        });

        $(".prev-slide").click(function() {
            owl.trigger("prev.owl.carousel");
            updateIndicators(-1);
        });

        // El ile kaydırma sonrası çalışacak event listener
        owl.on("translated.owl.carousel", function(event) {
            updateIndicatorsByOwl(event);
        });

        function updateIndicators(direction) {
            let indicators = $(".indicator");
            let activeIndex = indicators.index($(".indicator.active"));
            let newIndex = (activeIndex + direction) % indicators.length;

            if (newIndex < 0) newIndex = indicators.length - 1;

            indicators.removeClass("active");
            indicators.eq(newIndex).addClass("active");
        }

        function updateIndicatorsByOwl(event) {
            let indicators = $(".indicator");
            let currentIndex = event.item.index - event.relatedTarget._clones.length / 2;

            if (currentIndex < 0) {
                currentIndex = indicators.length - 1;
            } else if (currentIndex >= indicators.length) {
                currentIndex = 0;
            }

            indicators.removeClass("active");
            indicators.eq(currentIndex).addClass("active");
        }
    });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>

<!-- Layout'unuzun en altında -->


</body>

</html>

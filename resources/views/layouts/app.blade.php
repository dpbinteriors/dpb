<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

     <link rel="shortcut icon" href="{{ Vite::asset('resources/images/dpb-fav.png') }}">

    @yield('meta')

    {{-- Vite CSS and JS assets --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @yield('styles')

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300..700&display=swap" rel="stylesheet">

    {{-- Bootstrap CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link rel="stylesheet" href="../../css/app.css"
          {{-- Livewire Styles --}}
          @livewireStyles

    {{-- Google Analytics Script --}}
    <script async src="https://www.googletagmanager.com/gtag/js?id={{ env('GOOGLE_SITE_TAG') }}"></script>

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
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
          rel="stylesheet">

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
    $(document).ready(function () {
        var owl = $(".owl-carousel");

        owl.owlCarousel({
            loop: true,
            margin: 10,
            nav: false,
            dots: false,
            items: 1
        });

        $(".next-slide").click(function () {
            owl.trigger("next.owl.carousel");
            updateIndicators(1);
        });

        $(".prev-slide").click(function () {
            owl.trigger("prev.owl.carousel");
            updateIndicators(-1);
        });

        // El ile kaydırma sonrası çalışacak event listener
        owl.on("translated.owl.carousel", function (event) {
            updateIndicatorsByOwl(event);
        });

        function updateIndicatorsByOwl(event) {
            let indicators = $(".indicator");
            let currentIndex = event.item.index % indicators.length;

            if (currentIndex < 0) {
                currentIndex = indicators.length - 1;
            }

            indicators.removeClass("active");
            indicators.eq(currentIndex).addClass("active");
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
<script>
    $(document).ready(function () {
        const items = $(".slide-list-area li");
        const video = $(".slide-list-video-box video")[0];
        const source = $(video).find("source");
        const image = $(".slide-list-video-box img");

        function updateSlide(index) {
            const currentItem = $(items[index]);

            // Başlık ve açıklama
            $("#slide-title").text(currentItem.data("title"));
            $("#slide-desc").text(currentItem.data("desc"));

            const newVideoSrc = currentItem.data("video");
            const newImageSrc = currentItem.data("image");

            if (newVideoSrc) {
                $(video).removeClass("d-none");
                image.addClass("d-none");

                source.attr("src", newVideoSrc);
                video.load();
                video.play();
            } else if (newImageSrc) {
                $(video).addClass("d-none");
                image.removeClass("d-none");
                image.attr("src", newImageSrc);
                video.pause();
            }

            items.removeClass("active");
            currentItem.addClass("active");

            $(".slide-list-area").animate({
                scrollTop: currentItem.position().top
            }, 500);
        }

        // 👉 Sayfa yüklendiğinde ilk slide'ı güncelle
        updateSlide(0);

        // Tıklama
        items.click(function () {
            const index = $(this).index();
            updateSlide(index);
        });

        // Otomatik geçiş
        setInterval(function () {
            const currentIndex = $(".slide-list-area li.active").index();
            const nextIndex = (currentIndex + 1) % items.length;
            updateSlide(nextIndex);
        }, 10000);
    });

</script>

<script>
    $(document).ready(function () {
        // Owl Carousel'ı başlat
        var owl = $('.commercial-slide').owlCarousel({
            items: 1,
            loop: true,
            margin: 0,
            nav: false,
            dots: false,
            autoplay: true,
            autoplayTimeout: 5000,
            smartSpeed: 800,
            animateIn: 'fadeIn',
            animateOut: 'fadeOut',
            // Başlangıçta active show sınıflarını kaldır
            onInitialized: function () {
                $('.carousel-item').removeClass('active show');
                // İlk öğeyi aktif yap
                $('.owl-item.active').find('.carousel-item').addClass('active show');
            }
        });

        // Slayt değiştikçe active show sınıflarını güncelle
        owl.on('changed.owl.carousel', function (event) {
            // Tüm slaytlardan active show sınıflarını kaldır
            $('.carousel-item').removeClass('active show');

            // Sadece aktif slayta active show sınıflarını ekle
            setTimeout(function () {
                $('.owl-item.active').find('.carousel-item').addClass('active show');
            }, 100);
        });

        // Özel navigasyon düğmeleri
        $('.next-slide').click(function () {
            owl.trigger('next.owl.carousel');
        });

        $('.prev-slide').click(function () {
            owl.trigger('prev.owl.carousel');
        });
    });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>
<script src="../../js/app.js"></script>
<!-- Layout'unuzun en altında -->


</body>

</html>

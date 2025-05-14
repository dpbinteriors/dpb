@extends('layouts.app', ['headerClasses' => '', 'menuClasses' => '', 'isMobile' => true])

@section('meta')
    <title>{{__('COMMERCIAL_PAGE_META_TITLE')}}</title>
    <meta name="description"
          content="{{__('COMMERCIAL_PAGE_META_DESCRIPTION')}}">
    <meta name="keywords"
          content="{{__('commercial, page, keywords')}}">
    <link rel="canonical" href="{{ url()->current() }}">

    <meta property="og:title" content="{{__('COMMERCIAL_PAGE_META_TITLE')}}">
    <meta property="og:description" content="{{__('COMMERCIAL_PAGE_META_DESCRIPTION')}}">

    <meta property="og:url" content="{{url()->current()}}">
    <meta property="og:type" content="website">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{__('COMMERCIAL_PAGE_META_TITLE')}}">
    <meta name="twitter:description" content="{{__('COMMERCIAL_PAGE_META_DESCRIPTION')}}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">



    <style>
        .custom-commercial-section {
            background: #025949 !important;
            padding-bottom: 20px;
            position: relative !important;
            margin-top: 120px !important;
        }

        /* Turuncu çizgi */
        .custom-commercial-section::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 15px;
            background-color: #FB8925;
        }

        .carousel-container {
            max-width: 1200px;
            margin: 0 auto;
        }

        /* Görsel ve yazı alanları */
        .carousel-item {
            display: flex !important;
            align-items: center;
            justify-content: space-evenly;
            gap: 30px;

        }

        /* Görsel içindeki başlık */
        .image-container-commercial {
            position: relative;
            overflow: hidden;
            background-color: #025949;
            padding: 20px;
            flex: 2.5;
            margin-top: -80px;
            margin-bottom: 20px !important;
        }

        .image-container-commercial::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 15px;
            background-color: #FB8925;
        }

        .image-container-commercial img {
            height: 450px !important;
            padding-top: 20px;
        }

        .image-text {
            position: absolute;
            bottom: 15px;
            left: 20px;
            background: #025949;
            padding: 10px 15px;
            font-weight: bold;
            color: #fff;
            border-left: 1px solid rgba(204, 204, 204, 0.25);
        }


        /* Yazı alanı */
        .text-container {
            color: white;
            flex: 1;
            max-width: 80%;
        }

        .text-container h3 {
            font-weight: bold;
        }

        /* Butonlar */
        .custom-nav {
            position: absolute;
            bottom: -21px;
            left: 25px;
            display: flex;
            justify-content: center;
            gap: 10px;
            background: #fff;
            width: 100%;
            max-width: 67%;

        }

        .custom-nav button {
            background: white;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
            margin: 0 !important;
        }

        .custom-section {
            background: linear-gradient(90deg, rgb(2, 89, 73) 37%, rgba(255, 255, 255, 1) 100%) !important;
        }


        .slide-list-area li:not(.active) {
            background-color: rgba(2, 89, 73, 0.11) !important;
        }

        .slide-list-area li.active {
            color: #fff !important;
            background: linear-gradient(90deg, rgb(251, 137, 37) 37%, rgba(255, 255, 255, 1) 100%) !important;

        }

        @media (max-width: 768px) {
            .carousel-item {
                display: block !important;
            }

            .image-container-commercial {
                margin-top: 0;

            }

            .custom-commercial-section {
                padding-bottom: 50px;
                margin-top: 0 !important;
            }

            .custom-nav {
                left: 0;
                bottom: -8%;
                max-width: 100%;
            }

            .text-container {
                padding: 20px;
            }

            .custom-section {
                background: linear-gradient(360deg, rgb(2, 89, 73) 37%, rgba(255, 255, 255, 1) 100%) !important;
            }
        }

        .owl-carousel {
            width: 70%;
            min-height: 445px;
        }

        .carousel-container {
            position: relative;

        }

        .commercial-slide .carousel-item {
            opacity: 0;
            transition: opacity 0.8s ease-in-out;
            position: absolute;
            width: 100%;
        }

        .commercial-slide .carousel-item.active {
            opacity: 1;
            position: relative;
        }

        /* Optional - you can add a fade effect */
        .owl-carousel .owl-item {
            transition: all 0.7s ease;
        }

        .packs-commercial img {
            height: 80px;
        }

        .packs-commercial p {
            font-size: 20px;
            text-wrap: nowrap;
        }

        .slide-list-area li {
            cursor: pointer;
            width: 400% !important;
        }

        .custom-section .content-box img {
            height: 462px;
        }

        @media (max-width: 768px) {
            .owl-carousel {
                width: 100%;

            }
        }

    </style>
@endsection


@section('content')

    <section class="custom-commercial-section  ">
        <div class="carousel-container flex-wrap d-flex align-items-center">
            <div class="owl-carousel commercial-slide">

                @foreach($banners as $banner)
                    <div class="carousel-item {{ $loop->first ? 'active show' : '' }}">
                        <div class="image-container-commercial">
                            <img src="{{ asset('storage/' . $banner->image) }}" alt="Project Image">
                            <div class="image-text">
                                {{ $banner->title }}<br>{{ $banner->tag }}
                            </div>
                        </div>
                    </div>
                @endforeach


            </div>
            <div class="custom-nav">
                <button class="prev-slide"></button>
                <button class="next-slide"></button>
            </div>
            <div class="text-container">
                <h3>{!! __('We transform spaces, elevate brands.') !!}</h3>
                <p>{!! __('If you are looking for a fresh look to your brand, or building a new one, we accompany
                    you with our holistic design services.') !!}</p>
            </div>
        </div>
    </section>

    <div class="packs-commercial mt-5 pt-2">
        <div class="container px-1 px-xl-5 pb-2">
            <div class="row  mt-5 gx-5 text-center">
                <div class="text-start">
                    <h2 class="explore-text">{!! __('Explore how <strong>Design Plan Build</strong> process works') !!}</h2>
                </div>
                <div class="col-12 col-sm-6 col-lg-3 my-5">
                    <img src="{{Vite::asset('resources/images/interior-icon.png')}}" alt="Survey Icon" class="mb-3">
                    <h4 class="fw-bold">{!! __('Interior') !!}</h4>
                    <p>Design</p>
                </div>
                <div class="col-12 col-sm-6 col-lg-3 my-5">
                    <img src="{{Vite::asset('resources/images/website-icon.png')}}" alt="AI Design Icon" class="mb-3">
                    <h4 class="fw-bold">{!! __('Brand') !!}</h4>
                    <p>{!! __('Consultation / Strategy / Design') !!}</p>

                </div>
                <div class="col-12 col-sm-6 col-lg-3 my-5">
                    <img src="{{Vite::asset('resources/images/branding-icon.png')}}" alt="3D Animation Icon"
                         class="mb-3">
                    <h4 class="fw-bold">{!! __('Graphic') !!}</h4>
                    <p>{!! __('Design') !!}</p>
                </div>
                <div class="col-12 col-sm-6 col-lg-3 my-5">
                    <img src="{{Vite::asset('resources/images/website-icon.png')}}" alt="Construction Icon"
                         class="mb-3">
                    <h4 class="fw-bold">{!! __('Website') !!}</h4>
                    <p>{!! __('Design') !!}</p>
                </div>
            </div>

        </div>
    </div>

    <div class="container-fluid custom-section my-5 py-5">
        <div class="container overflow-visible ">
            <div class="row gx-5 py-3">
                <div class="col-xxl-7 z-9 col-12">
                    <div class="content-box slide-list-video-box  mb-lg-0 mb-4"
                         style="max-width: 110%; margin-left: -5%;">
                        <video id="slide-video" class="w-100" autoplay playsinline loop muted>
                            <source src="" type="video/mp4">
                        </video>
                        <img class="w-100 d-none" src="" alt="Slide Image"/>
                    </div>
                </div>
                <div class="col-xxl-5 col-12 text-content">
                    <div class="content-box-2">
                        <h5 id="slide-title"></h5>
                        <p id="slide-desc">

                        </p>
                    </div>

                    <ul class="slide-list-area">
                        <li data-title="{!! __('Website Design') !!}"
                            data-image="{{ Vite::asset('resources/images/website-design.jpg') }}"
                            data-desc="{!! __('We create visually stunning and highly functional website designs that not only reflect your brand’s unique identity but also provide an exceptional user experience, driving engagement, conversions, and customer loyalty effectively.') !!}"
                            class="">
                            {!! __('Website Design') !!}
                        </li>
                        <li data-title="{!! __('Interior Design') !!}"
                            data-image="{{ Vite::asset('resources/images/interior-design.jpg') }}"
                            data-desc="{!! __('We specialize in creating innovative and aesthetically pleasing interior designs that reflect your unique style, enhance functionality, and create harmonious spaces, ensuring comfort and a lasting impression while elevating your brand’s identity.') !!}"
                        >
                            {!! __('Interior Design') !!}
                        </li>
                        <li data-title="{!! __('Brand Design & Strategy') !!}"
                            data-image="{{ Vite::asset('resources/images/brand-design.jpg') }}"
                            data-desc="{!! __('We provide comprehensive brand design and strategy services, crafting unique visual identities that resonate with your audience, strengthen your brand’s presence, and drive long-term success through effective positioning and thoughtful design.') !!}">
                            {!! __('Brand Design & Strategy') !!}
                        </li>
                    </ul>

                </div>
            </div>
        </div>
    </div>


    <div class="container rooms py-4">
        <h4 class="intro-text">
            {!! __('We are quite flexible on adapting on your preferences, new challenges are more than welcomed.<br>
            Classic, industrial, minimalist, mediterranean and more.') !!}
        </h4>

        <div class="row g-4 rooms-area rooms-area-commercial">
            @foreach($commercialrooms as $rooms)
                <div class="col-12 col-md-4 col-lg-12">
                    <div class="image-container">
                        <img src="{{ asset('storage/' . $rooms->image) }}" alt="Living Room">
                        <div class="image-title title-green">{{ $rooms->title }}</div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>


    <div class="container my-5">
        <div class="row  text-center">
            <h2 class="contact-title mb-4 pb-3">{!! __('Contact us<span class="contact-subtitle">for free consultation') !!}</span>
            </h2>
            <div class="col-lg-6 ">
                <p class="text-start fw-medium contact-desc">{!! __('We are always excited to talk about a new project. If you
                    have the
                    pictures of your
                    rooms with you,
                    we can even start to talk about the design ideas at our first online meeting.') !!}</p>
            </div>

            <div class="col-lg-5 offset-lg-1">
                <div class="contact-form">
                    <form action="{{ route('save-contact-form') }}" method="POST" class="contact-form-area">
                        @method('POST')
                        @csrf
                        <div class="row gap-4 mb-3">
                            <div class="col gap-4 text-start">
                                <label class="form-label text-start">First Name</label>
                                <input name="name" type="text" class="form-control" placeholder="">
                            </div>
                            <div class="col text-start">
                                <label class="form-label">Last Name</label>
                                <input name="last_name" type="text" class="form-control" placeholder="">
                            </div>
                        </div>
                        <div class="mb-5 text-start">
                            <label class="form-label text-start">Email</label>
                            <input name="email" type="email" class="form-control" placeholder="">
                        </div>
                        <div class="message-container text-start mb-4">
                            <label for="messageInput">Message</label>
                            <div class="input-wrapper">
                                <textarea id="messageInput" name="message"></textarea>
                                <div class="line line-top"></div>
                                <div class="line line-bottom"></div>
                            </div>
                        </div>
                        <div class="d-flex position-absolute contact-btn r-0 justify-content-end">
                            <button type="submit" class="btn btn-send">SEND</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')


@endsection

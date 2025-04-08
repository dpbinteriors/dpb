@extends('layouts.app', ['headerClasses' => '', 'menuClasses' => '', 'isMobile' => true])

@section('meta')
    <title>{{__('COMMERCIALMETA_TITLE')}}</title>
    <meta name="description"
          content="{{__('COMMERCIAL_DESCRIPTION')}}">
    <meta name="keywords"
          content="{{__('Commercial, keywords')}}">
    <link rel="canonical" href="{{ url()->current() }}">


    <meta property="og:title" content="{{__('COMMERCIAL_META_TITLE')}}">
    <meta property="og:description" content="{{__('BLOG_INDEX_META_DESCRIPTION')}}">

    <meta property="og:url" content="{{url()->current()}}">
    <meta property="og:type" content="website">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{__('COMMERCIAL_META_TITLE')}}">
    <meta name="twitter:description" content="{{__('COMMERCIAL_META_DESCRIPTION')}}">

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

        .rooms-area > div:nth-child(1) .image-title {
            font-size: 40px;
            letter-spacing: 0.85em !important;
            transform: translateX(3%) !important;
            font-weight: bold;
        }

        .rooms-area > div:nth-child(2) .image-title {
            font-size: 40px;
            letter-spacing: .95em !important;
            font-weight: bold;
        }

        .rooms-area > div:nth-child(3) .image-title {
            font-size: 24px;
            font-weight: bold;
        }

        .rooms-area > div:nth-child(4) .image-title {
            font-size: 26px;
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
    </style>
@endsection


@section('content')

    <section class="custom-commercial-section  ">
        <div class="carousel-container flex-wrap d-flex align-items-center">
            <div class="owl-carousel commercial-slide">

                @foreach($slides as $slide)
                    <div class="carousel-item {{ $loop->first ? 'active show' : '' }}">
                        <div class="image-container-commercial">
                            <img src="{{ asset('storage/' . $slide->image) }}" alt="Project Image">
                            <div class="image-text">
                                {{ $slide->title }}<br>{{ $slide->description }}
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
                <h3>We transform spaces, elevate brands.</h3>
                <p>If you are looking for a fresh look to your brand, or building a new one, we accompany
                    you with our holistic design services.</p>
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
                    <h4 class="fw-bold">Interior</h4>
                    <p>Design</p>
                </div>
                <div class="col-12 col-sm-6 col-lg-3 my-5">
                    <img src="{{Vite::asset('resources/images/website-icon.png')}}" alt="AI Design Icon" class="mb-3">
                    <h4 class="fw-bold">Brand </h4>
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
                    <h4 class="fw-bold">Website</h4>
                    <p>{!! __('Design') !!}</p>
                </div>
            </div>

        </div>
    </div>

    <div class="container-fluid custom-section mb-4">
        <div class="container overflow-visible ">
            <div class="row gx-5 py-3">
                <div class="col-xxl-7 z-9 col-12">
                    <div class="content-box  mb-lg-0 mb-4" style="max-width: 110%; margin-left: -5%;">
                        <img src="{{Vite::asset('resources/images/about-img.jpg')}}" alt="Animated GIF">
                    </div>
                </div>
                <div class="col-xxl-5 col-12 text-content">
                    <div class="content-box-2">
                        <h5 id="slide-title">Look at our catalogue and discuss with our designers.</h5>
                        <p id="slide-desc">
                            Our style catalogue is shaped by our designers to let you think by seeing the possibilities.<br>
                            We will listen to your needs and interests carefully to understand what would make you
                            happy.
                        </p>
                    </div>

                    <ul class="slide-list-area">
                        <li data-title="Look at our catalogue and discuss with our designers."
                            data-desc="Our style catalogue is shaped by our designers to let you think by seeing the possibilities. We will listen to your needs and interests carefully to understand what would make you happy."
                            class="active">
                            Look at our catalogue and discuss with our designers.
                        </li>
                        <li data-title="See various styles and finishes in a short time."
                            data-desc="We will bring you a moodboard and some quick renders to let youimagine the styles in your space.According to your selections, you will receive a concept designas we called `design pack`.">
                            See various styles and finishes in a short time.
                        </li>
                        <li data-title="Walk in the space, see details in 3D drawings."
                            data-desc="In the `Plan Pack`, we will give you the construction details of the projectand give you a virtual walk in the finished project. Also you will receive an estimated budget and a shopping list.">
                            Walk in the space, see details in 3D drawings.
                        </li>
                        <li data-title="Follow the construction without surprises."
                            data-desc="Our confidence is coming from 20 years in London construction industry.We work with realistic deadlines and seamless construction process throughcollaboration of our designers, engineers and builders.">
                            Follow the construction regularly, without unpleasant surprises.
                        </li>
                    </ul>


                </div>
            </div>
        </div>
    </div>


    <div class="container text-center  py-4">
        <p class="intro-text text-start">
            {!! __('We are quite flexible on adapting on your preferences, new challenges are more than welcomed.<br>
            Classic, industrial, minimalist, mediterranean and more.') !!}
        </p>
        <h2 style="color: #6c757d"
            class="text-start">{!! __("Check some of our scenes from our latest projects until we finish our 'works' section.") !!}</h2>
        <div class="d-flex rooms-area flex-lg-nowrap flex-wrap">
            <div class="w-300">
                <div class="image-container">
                    <img src="{{Vite::asset('resources/images/project-1.jpg')}}" alt="Living Room">
                    <div class="image-title title-green">{!! __('RETAIL') !!}</div>
                </div>
            </div>
            <div class="w-400">
                <div class="image-container">
                    <img src="{{Vite::asset('resources/images/project-2.jpg')}}" alt="Kitchen">
                    <div class="image-title title-orange">{!! __('OFFICE') !!}</div>
                </div>
            </div>
            <div class="w-310">
                <div class="image-container">
                    <img src="{{Vite::asset('resources/images/project-3.jpg')}}" alt="Bedroom">
                    <div class="image-title title-green">{!! __('HOSPITALITY') !!}</div>
                </div>
            </div>
            <div class="w-300">
                <div class="image-container">
                    <img src="{{Vite::asset('resources/images/project-4.jpg')}}" alt="Bathroom">
                    <div class="image-title title-orange">{!! __('EDUCATIONAL') !!}</div>
                </div>
            </div>
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
                    <form class="contact-form-area">
                        <div class="row gap-4 mb-3">
                            <div class="col gap-4 text-start">
                                <label class="form-label text-start">First Name</label>
                                <input type="text" class="form-control" placeholder="">
                            </div>
                            <div class="col text-start">
                                <label class="form-label">Last Name</label>
                                <input type="text" class="form-control" placeholder="">
                            </div>
                        </div>
                        <div class="mb-5 text-start">
                            <label class="form-label text-start">Email</label>
                            <input type="email" class="form-control" placeholder="">
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

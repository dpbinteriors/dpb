@extends('layouts.app', ['headerClasses' => 'bg-transparent border-t border-t-[3px] border-yellow-500', 'menuClasses' => '!bg-gray-25'])

@section('meta')

    <title>{{__('ABOUT_US_PAGE_META_TITLE')}}</title>
    <meta name="description"
          content="{{__('ABOUT_US_PAGE_META_DESCRIPTION')}}">
    <meta name="keywords"
          content="{{__('dpbinteriorabout, aboutkeywords')}}">
    <link rel="canonical" href="{{ url()->current() }}">


    <meta property="og:title" content="{{__('ABOUT_US_PAGE_META_TITLE')}}">
    <meta property="og:description" content="{{__('ABOUT_US_PAGE_META_DESCRIPTION')}}">

    <meta property="og:url" content="{{url()->current()}}">
    <meta property="og:type" content="website">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{__('ABOUT_US_PAGE_META_TITLE')}}">
    <meta name="twitter:description" content="{{__('ABOUT_US_PAGE_META_DESCRIPTION')}}">


    <style>
        .breadcrumb-area-bg {
            position: relative;
            background-image: url({{Vite::asset('resources/images/works-1.jpg')}});
            background-size: cover;
            background-position: center;
            z-index: 1;
        }

        .breadcrumb-area-bg::before {
            content: "";
            position: absolute;
            inset: 0;
            background-color: rgba(0, 0, 0, 0.6); /* Siyah ve %60 opaklık */
            z-index: 2;
        }

        .breadcrumb-area-bg .bread-crumb-area-inner {
            position: relative;
            z-index: 3;
            text-align: center;
            padding: 150px 0;
        }

        @media (max-width: 991px) {
            .breadcrumb-area-bg .bread-crumb-area-inner {
                padding: 130px 0;
            }
        }

        @media (max-width: 767px) {
            .breadcrumb-area-bg .bread-crumb-area-inner {
                padding: 100px 0;
            }
        }

        .breadcrumb-area-bg .bread-crumb-area-inner .breadcrumb-top {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .breadcrumb-area-bg .bread-crumb-area-inner .breadcrumb-top a {
            color: #fff;
        }

        .breadcrumb-area-bg .bread-crumb-area-inner .breadcrumb-top a.active {
            color: #ffffff;
        }

        .breadcrumb-area-bg .bread-crumb-area-inner .bottom-title .title {
            color: #fff;
            text-align: center;
            font-size: 60px;
            font-style: normal;
            font-weight: 600;
            line-height: 70px;
            text-transform: capitalize;
            margin-top: 10px;
        }

        @media (max-width: 767px) {
            .breadcrumb-area-bg .bread-crumb-area-inner .bottom-title .title {
                font-size: 26px;
                font-style: normal;
                font-weight: 600;
                line-height: 35px;
            }
        }

        .about-image-wrapper {
            position: relative;
            height: 400px;
            overflow: hidden;
            border-radius: 10px;
        }

        .about-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.4s ease;
        }

        /* Görsel hover efekti */
        .about-image-wrapper:hover .about-image {
            transform: scale(1.05);
        }

        /* Shine efekti */

        .about-image-wrapper::before {
            content: "";
            position: absolute;
            top: 0;
            left: -120%;
            width: 100%; /* 👈 Daha ince bir genişlik */
            height: 100%;
            background: linear-gradient(
                120deg,
                rgba(251, 137, 37, 0) 0%, /* Turuncu - şeffaf */ rgba(251, 137, 37, 0.6) 30%, /* Turuncu - parlak */ rgba(2, 89, 73, 0.6) 70%, /* Yeşil - parlak */ rgba(2, 89, 73, 0) 100% /* Yeşil - şeffaf */
            );
            transform: skewX(-25deg);
            z-index: 2;
            pointer-events: none;
            color: #025949;
        }

        .about-image-wrapper:hover::before {
            animation: shine 1s ease-in-out forwards;
        }


        @keyframes shine {
            0% {
                left: -100%;
            }
            100% {
                left: 150%;
            }
        }


    </style>
@endsection
@section('content')

    <div class="breadcrumb-area-bg bg_image">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="bread-crumb-area-inner">
                        <div class="breadcrumb-top">
                            <a href="#">Home </a> <span class="text-white px-2"> / </span>
                            <a class="active" href="#"> About</a>
                        </div>
                        <div class="bottom-title">
                            <h1 class="title">About Us</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <section class="container py-120">
        <div class="row align-items-center">
            <!-- Görsel Alanı -->
            <div class="col-md-6 mb-4 mb-md-0">
                <div class="about-image-wrapper">
                    <img src="{{Vite::asset('resources/images/residential.jpg')}}" alt="Mimarlık Görseli"
                         class="about-image">
                </div>
            </div>

            <!-- Metin Alanı -->
            <div class="col-md-6">
                <h2 class="mb-3">{!! __('Where Aesthetics and Functionality Meet in Architecture') !!}</h2>
                <p class="text-muted mb-4">
                    {!! __('With years of experience in the field, we are an innovative architectural studio dedicated to transforming your dreams into reality. Our team of passionate professionals works tirelessly to bring your vision to life, combining cutting-edge modern design lines with timeless aesthetics and seamless functionality. We believe in creating spaces that not only meet your needs but also inspire and elevate your everyday experiences.') !!}
                </p>

                <div class="row">
                    <div class="col-12 col-sm-4 mb-3">
                        <div class="d-flex align-items-start">
                            <i class="bi bi-brush fs-3 text-primary me-3"></i>
                            <div>
                                <h6 class="mb-1">Yaratıcılık</h6>
                                <small class="text-muted">Her projeye özgün bir bakış açısı.</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-4 mb-3">
                        <div class="d-flex align-items-start">
                            <i class="bi bi-shield-check fs-3 text-success me-3"></i>
                            <div>
                                <h6 class="mb-1">Güvenilirlik</h6>
                                <small class="text-muted">Zamanında ve kaliteli teslimat.</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-4 mb-3">
                        <div class="d-flex align-items-start">
                            <i class="bi bi-tree fs-3 text-warning me-3"></i>
                            <div>
                                <h6 class="mb-1">Sürdürülebilirlik</h6>
                                <small class="text-muted">Doğaya saygılı çözümler.</small>
                            </div>
                        </div>
                    </div>
                </div>
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


    <section class="team-section mt-5 pt-5">
        <div class="container">
            <div class="section-heading text-center mb-40">
                <span>Our Team</span>
                <h2>Speciallized team</h2>
            </div><!--/.section-heading-->
            <div class="row team-wrap">
                <div class="col-lg-3 col-sm-6 padding-15">
                    <div class="team-item">
                        <div class="overlay"></div>
                        <img src="https://html.dynamiclayers.net/dl/arkit/img/team-1.jpg" alt="team">
                        <div class="team-content">
                            <h3>Jhon Castellon</h3>
                            <span>Architect</span>
                        </div>
                        <ul class="team-social">
                            <li><a href="#"><i class="bi bi-facebook"></i></a></li>
                            <li><a href="#"><i class="bi bi-instagram"></i></a></li>
                            <li><a href="#"><i class="bi bi-twitter"></i></a></li>
                            <li><a href="#"><i class="bi bi-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </section>

@endsection
@section('scripts')
@endsection

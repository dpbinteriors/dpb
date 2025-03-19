@extends('layouts.app', ['headerClasses' => '', 'menuClasses' => '', 'isMobile' => true])

@section('meta')
    <title>{{__('BLOG_INDEX_PAGE_META_TITLE')}}</title>
    <meta name="description"
          content="{{__('BLOG_INDEX_META_DESCRIPTION')}}">
    <meta name="keywords"
          content="{{__('Alper Lojistik, Frigo Taşımacılık, Reefer Taşımacılık, Uluslararası Taşımacılık')}}">
    <link rel="canonical" href="{{ url()->current() }}">


    <meta property="og:title" content="{{__('BLOG_INDEX_PAGE_META_TITLE')}}">
    <meta property="og:description" content="{{__('BLOG_INDEX_META_DESCRIPTION')}}">
    <meta property="og:image" content="{{Vite::asset('resources/images/og.png')}}">
    <meta property="og:url" content="{{url()->current()}}">
    <meta property="og:type" content="website">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{__('BLOG_INDEX_PAGE_META_TITLE')}}">
    <meta name="twitter:description" content="{{__('BLOG_INDEX_META_DESCRIPTION')}}">
    <meta name="twitter:image" content="{{Vite::asset('resources/images/og.png')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">



    <style>
        .slide-item {
            position: relative;
            background: #025949;
            color: #FB8925;
        }

        .content {
            padding: 40px;
            text-align: end;
        }

        h2 {
            font-size: 24px;
            font-weight: bold;
        }

        .owl-carousel .owl-stage-outer {
            /* override */
            overflow: hidden;
        }

        .article-info {
            font-size: 14px;
            color: #ddd;
            margin-top: 10px;
        }


        .owl-carousel .owl-stage-outer {
            overflow: visible;
        }

        .owl-item {
            z-index: 1;
            overflow: hidden; /* Varsayılan olarak taşmaları gizle */
        }

        /* Aktif olan slaytı diğerlerinin üstüne çıkar ve taşan kısmı görünür yap */
        .owl-item.active {
            overflow: visible;
            z-index: 2;
        }

        .owl-item:not(.active) {
            opacity: 0;
            pointer-events: none; /* Tıklanamaz hale getir */
        }

        .owl-carousel .owl-stage-outer:before {
            content: "";
            background: #fff;
            position: absolute;
            width: 40%;
            height: 700px;
            left: -100%;
            margin-left: -20px;
            top: 0;
            z-index: 10;
        }

        .owl-carousel .owl-stage-outer:after {
            content: "";
            background: #fff;
            position: absolute;
            width: 100%;
            height: 700px;
            right: -100%;
            margin-left: -20px;
            top: 0;
            z-index: 10;
        }


        .highlight-box {
            position: absolute;
            bottom: 22%; /* Aşağı kaydır */
            left: -9%; /* Hafifçe dışa taşır */
            background: #FB8925;
            color: white;
            font-size: 14px;
            width: 50%;
            z-index: 10; /* Üstte kalmasını sağla */
            display: flex;

            justify-content: space-around;
        }

        .highlight-box p {

            color: #025949;
            text-align: end;
            margin-top: 10px;
        }

        /* Read More butonu */
        .read-more {
            color: white;
            font-weight: bold;
            margin-left: 10px;
            text-decoration: none;
            margin-top: 10px;
        }

        /* Görsellerin düzgün hizalanması */
        .img-fluid {
            height: 500px;
            object-fit: cover;
        }

        /* Özel navigasyon stilleri */
        .custom-nav {
            text-align: center;
            margin-top: 10px;
        }

        .custom-nav button {
            background: #fff;
            color: #025949;
            border: none;
            margin: 10px;
            cursor: pointer;
            font-size: 24px;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            transition: box-shadow 0.3s ease;
            position: relative;
        }

        .custom-nav button.prev-slide::before {
            content: "";
            position: absolute;
            width: 0;
            height: 0;
            border-style: solid;
            border-width: 15px 20px 15px 0;
            border-color: transparent #025949 transparent transparent;
            left: 50%;
            top: 50%;
            transform: translate(-60%, -50%);
        }

        /* Sağ üçgen (next/forward button) */
        .custom-nav button.next-slide::before {
            content: "";
            position: absolute;
            width: 0;
            height: 0;
            border-style: solid;
            border-width: 15px 0 15px 20px;
            border-color: transparent transparent transparent #025949;
            left: 50%;
            top: 50%;
            transform: translate(-40%, -50%);
        }

        .custom-nav button:hover {
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.15);
        }

        /* Slayt göstergeleri */
        .slide-indicators {
            display: flex;
            justify-content: center;
            margin-top: 10px;
        }

        .owl-carousel .owl-item img {
            height: 550px;
            object-fit: cover;
        }

        /* Göstergeler */
        .indicator {
            width: 70px;
            height: 4px;
            background: #ccc;
            margin: 0 5px;
            transition: background 0.3s;
        }

        .indicator.active {
            background: #025949;
            width: 200px;
        }

        @media (max-width: 1530px) {
            .highlight-box {
                left: 0;
                padding: 10px;
                bottom: 15%;
            }

        }

        @media (max-width: 992px) {
            .highlight-box {
                bottom: 0;
            }

            .slide-item .content {
                text-align: start;
            }

            .slide-item h2 {
                font-size: 20px;
                padding-left: 10px;
                padding-right: 10px;
            }

            .slide-item .article-info {
                padding-left: 10px;

            }
        }

        @media (max-width: 768px) {
            .highlight-box {
                position: relative;
                width: 100%;
            }
        }

    </style>
@endsection


@section('content')

    <section class="mt-5 pt-4 promoted-blogs">
        <div class="container ">
            <div class="row ">
                <div class="owl-carousel owl-theme">
                    @foreach($articles as $article)
                        @if($article->is_promoted==1)
                            <div class="slide-item">
                                <div class="row align-items-center">
                                    <div class="col-md-5 content ps-lg-5">
                                        <h2>How to Design Your Living Room, <br> If You Want to Emphasize Your Exposed Brick
                                            Walls</h2>
                                        <p class="article-info">ARTICLE <br> 4 min</p>
                                    </div>
                                    <div class="col-md-7">
                                        <img src="{{Vite::asset('resources/images/residential.jpg')}}" alt="Living Room"
                                             class="img-fluid">
                                    </div>
                                </div>

                                <!-- .highlight-box'ı buraya taşıdık -->
                                <div class="highlight-box">
                                    <p>In dPb interiors, we don’t design your place. We bring your dreams to life.</p>
                                    <a href="#" class="read-more">Read More</a>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>

            <div class="d-flex gap-5 align-items-center justify-content-end">

                <div class="slide-indicators">
                    <span class="indicator active"></span>
                    <span class="indicator"></span>
                    <span class="indicator"></span>
                </div>

                <div class="custom-nav">
                    <button class="prev-slide"></button>
                    <button class="next-slide"></button>
                </div>


            </div>
        </div>
    </section>

    <section class="blogs-area">
        <div class="container">
            <div class="row">

            </div>
        </div>
    </section>
@endsection

@section('scripts')

@endsection

@extends('layouts.app', ['hideHeader' => false],['hideFooter'=>false])

@section('meta')

    <title>{{__('RESIDENTIAL_PAGE_META_TITLE')}}</title>
    <meta name="description"
          content="{{__('RESIDENTIAL_PAGE_META_DESCRIPTION')}}">
    <meta name="keywords"
          content="{{__('resitdential, page, keywords')}}">
    <link rel="canonical" href="{{ url()->current() }}">

    <meta property="og:title" content="{{__('RESIDENTIAL_PAGE_META_TITLE')}}">
    <meta property="og:description" content="{{__('RESIDENTIAL_PAGE_META_DESCRIPTION')}}">

    <meta property="og:url" content="{{url()->current()}}">
    <meta property="og:type" content="website">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{__('RESIDENTIAL_PAGE_META_TITLE')}}">
    <meta name="twitter:description" content="{{__('RESIDENTIAL_PAGE_META_DESCRIPTION')}}">


    <style>
        /* Genel stil */
        .owl-carousel .item {
            padding: 10px 0;
            text-align: center;
            list-style-type: none;
            font-size: 18px;
            font-weight: bold;
        }

        /* Aktif öğe için stil */
        .owl-carousel .item.active {
            background-color: #025949;
            color: #FB8925;
        }

        /* Pasif öğe için varsayılan stil */
        .owl-carousel .item {
            background-color: #f0f0f0;
            color: #333;
            transition: all 0.3s ease;
        }

        .slide-list-area li {
            cursor: pointer;
        }
    </style>
@endsection

@section('content')

    <div class="slider-container">
        <div class="img-container">
            <img src="{{Vite::asset('resources/images/before-after-2.jpg')}}" alt="Bathroom before" id="before-img">
        </div>


        <div class="banner-info-area position-absolute">
            <!-- Turuncu Kutu -->
            <div class="orange-box   ">
                <p>interior design & construction services</p>
            </div>

            <!-- Yeşil Kutu -->
            <div class="green-box d-flex flex-wrap justify-content-between align-items-center">
                <h2>{!! __('We will bring your dream interior to life. <p>But first, we want you to dream more.</p>') !!}</h2>
                <h4 class="pe-3">{!! __('Design.Plan.Build <br> <span>London, UK <br>2025</span>') !!}</h4>
            </div>
        </div>
    </div>


    <div class="packs">
        <div class="container px-1 px-xl-5 pb-2">

            <div class="row  mt-5 gx-5 text-center">
                <div class="text-start">
                    <h2 class="explore-text">{!! __('Explore how <strong>Design Plan Build</strong> process works') !!}</h2>
                </div>
                <div class="col-12 col-sm-6 col-lg-3 my-5">
                    <img src="{{Vite::asset('resources/images/home-icon.svg')}}" alt="Survey Icon" class="mb-3">
                    <h4 class="py-3 fw-medium">{!! __('Detailed Survey of Your House') !!}</h4>
                    <p>{!! __('We measure your space with the little details, take notes for the areas to be fixed and
                        designed.') !!}</p>
                </div>
                <div class="col-12 col-sm-6 col-lg-3 my-5">
                    <img src="{{Vite::asset('resources/images/home-icon-2.svg')}}" alt="AI Design Icon" class="mb-3">
                    <h4 class="py-3 mt-4 fw-medium">{!! __('AI Supported Design Process') !!}</h4>
                    <p>{!! __('We make you decide by seeing various different options.') !!}</p>
                </div>
                <div class="col-12 col-sm-6 col-lg-3 my-5">
                    <img src="{{Vite::asset('resources/images/home-icon-3.svg')}}" alt="3D Animation Icon" class="mb-3">
                    <h4 class="py-3 mt-3 fw-medium">{!! __('3D Animation & Detail Drawings') !!}</h4>
                    <p>{!! __('We invite you to your space digitally. After you watch the tour video, you will receive the
                        details.') !!}</p>
                </div>
                <div class="col-12 col-sm-6 col-lg-3 my-5">
                    <img src="{{Vite::asset('resources/images/home-icon-4.svg')}}" alt="Construction Icon" class="mb-3">
                    <h4 class="py-3 mt-3 fw-medium">{!! __('Construction & Installation') !!}</h4>
                    <p>{!! __('Our construction team provides transparent & clean construction process.') !!}</p>
                </div>
            </div>

        </div>
    </div>


    <div class="container-fluid custom-section mb-4">
        <div class="container overflow-visible ">
            <div class="row gx-5 py-3">
                <div class="col-lg-7 col-12">
                    <div class="content-box  mb-lg-0 mb-4" style="max-width: 110%; margin-left: -5%;">
                        <img src="{{Vite::asset('resources/images/about-img.jpg')}}" alt="Animated GIF">
                    </div>
                </div>
                <div class="col-lg-5 col-12 text-content">
                    <div class="content-box-2">
                        <h5 id="slide-title">{!! __('Look at our catalogue and discuss with our designers.') !!}</h5>
                        <p id="slide-desc">
                            {!! __('Our style catalogue is shaped by our designers to let you think by seeing the possibilities.<br>
                            We will listen to your needs and interests carefully to understand what would make you
                            happy.') !!}
                        </p>
                    </div>

                    <ul class="slide-list-area">
                        <li data-title="{!! __('Look at our catalogue and discuss with our designers.') !!}"
                            data-desc="Our style catalogue is shaped by our designers to let you think by seeing the possibilities. We will listen to your needs and interests carefully to understand what would make you happy."
                            class="active">
                            {!! __('Look at our catalogue and discuss with our designers.') !!}
                        </li>
                        <li data-title="{!! __('See various styles and finishes in a short time.') !!}"
                            data-desc="{!! __('We will bring you a moodboard and some quick renders to let youimagine the styles in your space.According to your selections, you will receive a concept designas we called `design pack`.') !!}">
                            {!! __('See various styles and finishes in a short time.') !!}
                        </li>
                        <li data-title="{!! __('Walk in the space, see details in 3D drawings.') !!}"
                            data-desc="{!! __('In the `Plan Pack`, we will give you the construction details of the projectand give you a virtual walk in the finished project. Also you will receive an estimated budget and a shopping list.') !!}">
                            {!! __('Walk in the space, see details in 3D drawings.') !!}
                        </li>
                        <li data-title="{!! __('Follow the construction without surprises.') !!}"
                            data-desc="{!! __('Our confidence is coming from 20 years in London construction industry.We work with realistic deadlines and seamless construction process throughcollaboration of our designers, engineers and builders.') !!}">
                            {!! __('Follow the construction regularly, without unpleasant surprises.') !!}
                        </li>
                    </ul>


                </div>
            </div>
        </div>
    </div>

    <div class="container rooms  py-4">
        <h4 class="intro-text">
            {!! __('        We are quite flexible on adapting on your preferences, new challenges are more than welcomed.<br>
                    Classic, industrial, minimalist, mediterranean and more.') !!}
        </h4>
        <div class="d-flex rooms-area flex-lg-nowrap flex-wrap">
            <div class="w-300">
                <div class="image-container">
                    <img src="{{Vite::asset('resources/images/project-1.jpg')}}" alt="Living Room">
                    <div class="image-title title-green">{!! __('LIVING ROOMS') !!}</div>
                </div>
            </div>
            <div class="w-400">
                <div class="image-container">
                    <img src="{{Vite::asset('resources/images/project-2.jpg')}}" alt="Kitchen">
                    <div class="image-title title-orange">{!! __('KITCHENS') !!}</div>
                </div>
            </div>
            <div class="w-310">
                <div class="image-container">
                    <img src="{{Vite::asset('resources/images/project-3.jpg')}}" alt="Bedroom">
                    <div class="image-title title-green">{!! __('BEDROOMS') !!}</div>
                </div>
            </div>
            <div class="w-300">
                <div class="image-container">
                    <img src="{{Vite::asset('resources/images/project-4.jpg')}}" alt="Bathroom">
                    <div class="image-title title-orange">{!! __('BATHROOMS') !!}</div>
                </div>
            </div>
        </div>

    </div>



    <div class="container my-5">
        <div class="row  text-center">
            <h2 class="contact-title mb-4 pb-3">{!! __('Contact us<span class="contact-subtitle">for free consultation') !!}</span>
            </h2>
            <div class="col-lg-6 ">
                <p class="text-start fw-medium contact-desc">
                    {!! __('We are always excited to talk about a new project. If you
                    have the
                    pictures of your
                    rooms with you,
                    we can even start to talk about the design ideas at our first online meeting.') !!}
                </p>
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

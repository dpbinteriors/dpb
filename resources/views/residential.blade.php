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

        .slide-list-video-box video {
            width: 100%;
            height: 550px;
            object-fit: cover;
        }

        .max-w-15 {
            max-width: 15%;
        }
        .main-slider-container {
            position: relative;
            overflow: hidden;
            width: 100%;
        }

        .slider-wrapper {
            display: flex;
            transition: transform 0.5s ease;
        }

        .slider-item {
            flex: 0 0 100%;
            position: relative;
        }

        .slider-nav {
            position: absolute;
            bottom: 20px;
            left: 0;
            right: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 10px;
        }

        .slider-prev, .slider-next {
            background: rgba(255, 255, 255, 0.5);
            border: none;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            cursor: pointer;
            font-size: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .slider-dots {
            display: flex;
            gap: 8px;
        }

        .slider-dot {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background-color: rgba(255, 255, 255, 0.5);
            cursor: pointer;
        }

        .slider-dot.active {
            background-color: white;
        }

        @media (max-width: 992px) {
            .max-w-15 {
                max-width: 100%;
            }

            .main-slider-container img,video{
                height: 100vh;
                object-fit: cover;
            }
        }
    </style>
@endsection

@section('content')

    <!-- Slider Container -->
    <div class="main-slider-container">
        <div class="slider-wrapper">
            @foreach($slides as $slide)
                <div class="slider-item">
                    @if($slide->video)
                        <div class="w-100 h-100">
                            <video class="w-100" autoplay playsinline loop muted>
                                <source class="w-100 h-100" src="{{ asset('storage/' . $slide->video) }}" type="video/mp4">
                            </video>
                        </div>
                    @elseif($slide->second_image)
                        <div class="w-100 h-100">
                            <img class="w-100 h-100" src="{{ asset('storage/' . $slide->second_image) }}" alt="{{ $slide->title }}">
                        </div>
                    @endif

                    <div class="banner-info-area position-absolute">
                        <!-- Orange Box -->
                        <div class="orange-box">
                            <p>{{$slide->type}}</p>
                        </div>

                        <!-- Green Box -->
                        <div class="green-box d-flex flex-wrap justify-content-between align-items-center">
                            <h2 class="m-0">{{$slide->title}}<p class="m-0">{{$slide->slogan}}</p></h2>
                            <h4 class="pe-3 max-w-15">{{$slide->description}}</h4>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Navigation Controls -->
        <div class="slider-nav">
            <button class="slider-prev">&lt;</button>
            <div class="slider-dots">
                @foreach($slides as $index => $slide)
                    <span class="slider-dot {{ $index === 0 ? 'active' : '' }}" data-index="{{ $index }}"></span>
                @endforeach
            </div>
            <button class="slider-next">&gt;</button>
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
            <div class="row gx-5 py-3 position-relative">
                <div class="col-xxl-7 col-12 z-9">
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
                        <li data-title="{!! __('Look at our catalogue and discuss with our designers.') !!}"
                            data-desc="Our style catalogue is shaped by our designers to let you think by seeing the possibilities. We will listen to your needs and interests carefully to understand what would make you happy."
                            data-image="{{ Vite::asset('resources/images/about-img.jpg') }}"
                            class="">
                            {!! __('Look at our catalogue and discuss with our designers.') !!}
                        </li>
                        <li data-title="{!! __('See various styles and finishes in a short time.') !!}"
                            data-desc="'We will bring you a mood board and some quick renders to let youimagine the styles in your space.According to your selections, you will receive a concept design as we called design pack"
                            data-video="{{ Vite::asset('resources/images/see2.mp4') }}">
                            {!! __('See various styles and finishes in a short time.') !!}
                        </li>
                        <li data-title="{!! __('Walk in the space, see details in 3D drawings.') !!}"
                            data-desc="In the `Plan Pack`, we will give you the construction details of the projectand give you a virtual walk in the finished project. Also you will receive an estimated budget and a shopping list."
                            data-image="{{ Vite::asset('resources/images/walk.jpg') }}">
                            {!! __('Walk in the space, see details in 3D drawings.') !!}
                        </li>

                        <li data-title="{!! __('Follow the construction without surprises.') !!}"
                            data-desc="Our confidence is coming from 20 years in London construction industry.We work with realistic deadlines and seamless construction process through collaboration of our designers, engineers and builders."
                            data-image="{{ Vite::asset('resources/images/follow.jpg') }}">
                            {!! __('Follow the construction regularly, without unpleasant surprises.') !!}
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

        <div class="row g-4 rooms-area">
            @foreach($residentialrooms as $rooms)
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
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const sliderWrapper = document.querySelector('.slider-wrapper');
            const sliderItems = document.querySelectorAll('.slider-item');
            const prevBtn = document.querySelector('.slider-prev');
            const nextBtn = document.querySelector('.slider-next');
            const dots = document.querySelectorAll('.slider-dot');

            let currentIndex = 0;
            const totalSlides = sliderItems.length;

            // Initialize
            updateSlider();

            // Previous slide
            prevBtn.addEventListener('click', function() {
                currentIndex = (currentIndex - 1 + totalSlides) % totalSlides;
                updateSlider();
            });

            // Next slide
            nextBtn.addEventListener('click', function() {
                currentIndex = (currentIndex + 1) % totalSlides;
                updateSlider();
            });

            // Dot navigation
            dots.forEach((dot, index) => {
                dot.addEventListener('click', function() {
                    currentIndex = index;
                    updateSlider();
                });
            });

            // Auto play - optional
            let slideInterval = setInterval(() => {
                currentIndex = (currentIndex + 1) % totalSlides;
                updateSlider();
            }, 15000); // Change slide every 5 seconds

            // Pause on hover - optional
            sliderWrapper.addEventListener('mouseenter', () => {
                clearInterval(slideInterval);
            });

            sliderWrapper.addEventListener('mouseleave', () => {
                slideInterval = setInterval(() => {
                    currentIndex = (currentIndex + 1) % totalSlides;
                    updateSlider();
                }, 15000);
            });

            // Update slider position and active states
            function updateSlider() {
                sliderWrapper.style.transform = `translateX(-${currentIndex * 100}%)`;

                // Update active dot
                dots.forEach((dot, index) => {
                    dot.classList.toggle('active', index === currentIndex);
                });
            }
        });
    </script>
@endsection

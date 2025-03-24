@extends('layouts.app', ['hideHeader' => false],['hideFooter'=>false])

@section('meta')

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
            <h2>We will bring your dream interior to life. <p>But first, we want you to dream more.</p></h2>
            <h4 class="pe-3">Design.Plan.Build <br> <span>London, UK <br>2025</span></h4>
        </div>
    </div>
</div>


<div class="packs">
    <div class="container px-1 px-xl-5 pb-2">

        <div class="row  mt-5 gx-5 text-center">
            <div class="text-start">
                <h2 class="explore-text">Explore how <strong>Design Plan Build</strong> process works</h2>
            </div>
            <div class="col-12 col-sm-6 col-lg-3 mb-4">
                <img src="{{Vite::asset('resources/images/home-icon.svg')}}" alt="Survey Icon" class="mb-3">
                <h4 class="py-3">Detailed Survey of Your House</h4>
                <p>We measure your space with the little details, take notes for the areas to be fixed and designed.</p>
            </div>
            <div class="col-12 col-sm-6 col-lg-3 mb-4">
                <img src="{{Vite::asset('resources/images/home-icon-2.svg')}}" alt="AI Design Icon" class="mb-3">
                <h4 class="py-3">AI Supported Design Process</h4>
                <p>We make you decide by seeing various different options.</p>
            </div>
            <div class="col-12 col-sm-6 col-lg-3 mb-4">
                <img src="{{Vite::asset('resources/images/home-icon-3.svg')}}" alt="3D Animation Icon" class="mb-3">
                <h4 class="py-3">3D Animation & Detail Drawings</h4>
                <p>We invite you to your space digitally. After you watch the tour video, you will receive the
                    details.</p>
            </div>
            <div class="col-12 col-sm-6 col-lg-3 mb-4">
                <img src="{{Vite::asset('resources/images/home-icon-4.svg')}}" alt="Construction Icon" class="mb-3">
                <h4 class="py-3">Construction & Installation</h4>
                <p>Our construction team provides transparent & clean construction process.</p>
            </div>
        </div>

    </div>
</div>


<div class="container-fluid custom-section mb-4">
    <div class="container ">
        <div class="row gx-5 py-3">
            <div class="col-lg-6 col-12">
                <div class="content-box">
                    <img src="{{Vite::asset('resources/images/about-img.jpg')}}" alt="Animated GIF">
                </div>
            </div>
            <div class="col-lg-6 col-12 text-content">
                <div class="content-box-2">
                    <h5>Look at our catalogue and discuss with our designers.</h5>
                    <p>Our style catalogue is shaped by our designers to let you think by
                        seeing the possibilities. <br>
                        We will listen your needs and interests carefully to understand
                        what would make you happy.</p>
                    <ul class="slide-list-area">
                        <li>Look at our catalogue and discuss with our
                            designers.
                        </li>
                        <li>
                            See various styles and finishes in a short time.
                        </li>
                        <li>
                            Walk in the space, see details in 3D drawings,
                            be aware every detail of your project.
                        </li>
                        <li>
                            Follow the construction regularly, without
                            unpleasant surprises.

                        </li>
                    </ul>
                </div>

            </div>
        </div>
    </div>
</div>



<div class="container text-center  py-4">
    <p class="intro-text">
        We are quite flexible on adapting on your preferences, new challenges are more than welcomed.<br>
        Classic, industrial, minimalist, mediterranean and more.
    </p>
    <div class="d-flex rooms-area flex-lg-nowrap flex-wrap">
        <div class="w-300">
            <div class="image-container">
                <img src="{{Vite::asset('resources/images/project-1.jpg')}}" alt="Living Room">
                <div class="image-title title-green">LIVING ROOMS</div>
            </div>
        </div>
        <div class="w-400">
            <div class="image-container">
                <img src="{{Vite::asset('resources/images/project-2.jpg')}}" alt="Kitchen">
                <div class="image-title title-orange">KITCHENS</div>
            </div>
        </div>
        <div class="w-310">
            <div class="image-container">
                <img src="{{Vite::asset('resources/images/project-3.jpg')}}" alt="Bedroom">
                <div class="image-title title-green">BEDROOMS</div>
            </div>
        </div>
        <div class="w-300">
            <div class="image-container">
                <img src="{{Vite::asset('resources/images/project-4.jpg')}}" alt="Bathroom">
                <div class="image-title title-orange">BATHROOMS</div>
            </div>
        </div>
    </div>

</div>



<div class="container my-5">
    <div class="row  text-center">
        <h2 class="contact-title mb-4 pb-3">Contact us<span class="contact-subtitle">for free consultation</span></h2>
        <div class="col-lg-6 ">
            <p class="text-start contact-desc">We are always excited to talk about a new project. If you have the
                pictures of your
                rooms with you,
                we can even start to talk about the design ideas at our first online meeting.</p>
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
                    <div class="message-container mb-4">
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

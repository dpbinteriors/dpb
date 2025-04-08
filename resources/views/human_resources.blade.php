@extends('layouts.app', ['headerClasses' => 'bg-transparent border-t border-t-[3px] border-yellow-500', 'menuClasses' => '!bg-gray-25'])

@section('meta')

    <title>{{__('CAREER_PAGE_META_TITLE')}}</title>
    <meta name="description"
          content="{{__('CAREER_PAGE_META_DESCRIPTION')}}">
    <meta name="keywords"
          content="{{__('dpbcareer, careerkeywords')}}">
    <link rel="canonical" href="{{ url()->current() }}">


    <meta property="og:title" content="{{__('CAREER_PAGE_META_TITLE')}}">
    <meta property="og:description" content="{{__('CAREER_PAGE_META_DESCRIPTION')}}">

    <meta property="og:url" content="{{url()->current()}}">
    <meta property="og:type" content="website">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{__('CAREER_PAGE_META_TITLE')}}">
    <meta name="twitter:description" content="{{__('CAREER_PAGE_META_DESCRIPTION')}}">

    <style>
        .breadcrumb-area-bg {
            position: relative;
            background-image: url({{Vite::asset('resources/images/works-1.jpg')}});
            background-size: cover;
            background-position: center;
            z-index: 1;
        }

        .careers-section {
            padding: 60px 0;
        }

        .careers-description {
            margin-bottom: 30px;
        }

        .careers-description .row {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .careers-description .col-lg-6 {
            padding: 15px;
        }

        .careers-description img {
            width: 100%;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .careers-description p {
            font-size: 1.1rem;
            line-height: 1.8;
            color: #333;
        }

        .no-open-positions {
            background-color: #f8f9fa;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .no-open-positions h3 {
            font-size: 2rem;
            color: #FB8925;
            margin-bottom: 20px;
        }

        .no-open-positions p {
            font-size: 1.2rem;
            color: #555;
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
                            <a class="active" href="#">{!! __('Careers') !!}</a>
                        </div>
                        <div class="bottom-title">
                            <h1 class="title">{!! __('Careers') !!}</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="careers-section">
        <div class="container">
            <div class="row careers-description">
                <div class="col-lg-12">
                    <h2>Join Our Creative Team</h2>
                    <p>
                        We are a forward-thinking architectural studio with a passion for transforming ideas into reality. Our mission is to create innovative and inspiring spaces that connect people, enhance functionality, and reflect beauty. We are always on the lookout for individuals who share our vision and have the drive to contribute to impactful projects.
                    </p>
                    <p>
                        If you're looking for a dynamic and collaborative environment where creativity and expertise are highly valued, you’ve come to the right place. We foster growth and offer ample opportunities for career advancement while working on exciting projects.
                    </p>
                </div>

            </div>

            <div class="no-open-positions">
                <h3>No Open Positions at the Moment</h3>
                <p>Currently, we do not have any open positions. However, we encourage you to check back in the future or send us your resume for consideration for upcoming opportunities.</p>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
@endsection

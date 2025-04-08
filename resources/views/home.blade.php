@extends('layouts.app', ['hideHeader' => true],['hideFooter'=>true])

@section('meta')
    <title>{{__('HOME_PAGE_META_TITLE')}}</title>
    <meta name="description"
          content="{{__('HOME_PAGE_META_DESCRIPTION')}}">
    <meta name="keywords"
          content="{{__('Key, Words')}}">
    <link rel="canonical" href="{{ url()->current() }}">

    <meta property="og:title" content="{{__('HOME_PAGE_META_TITLE')}}">
    <meta property="og:description" content="{{__('HOME_PAGE_META_DESCRIPTION')}}">
    <meta property="og:image" content="{{Vite::asset('resources/images/og.png')}}">
    <meta property="og:url" content="{{url()->current()}}">
    <meta property="og:type" content="website">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{__('HOME_PAGE_META_TITLE')}}">
    <meta name="twitter:description" content="{{__('HOME_PAGE_META_DESCRIPTION')}}">


<style>
    .container-fluid {
        display: flex;
        height: 100vh;
        padding: 0 !important;
    }

    .section {
        position: relative;
        width: 50%;
        height: 100vh;
        overflow: hidden;
        transition: all 0.3s ease;
        filter: drop-shadow(2px 4px 6px black);
    }

    .section a {
        display: block;
        height: 100%;
        position: relative;
        text-decoration: none;
        color: #025949;
        text-transform: uppercase;
        font-size: 2rem;
        font-weight: bold;
        display: flex;
        align-items: flex-end;
        justify-content: center;
        padding-bottom: 2rem;
        border-bottom: 4px solid #025949;
        transition: all 0.3s ease;
    }

    .section a:hover {
        background-color: #025949;
        color: #FB8925;
        border-bottom: 4px solid #FB8925;
    }

    .section img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        position: absolute;
        top: 0;
        left: 0;
        transition: opacity 0.3s ease;
    }



    .overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: #fff;
        opacity: .38;
        transition: background 0.3s ease;
    }

    .section a:hover .overlay {
        background: unset;
    }

    .title{
        z-index: 9;
        background-color: #fff;
        width: 100%;
        font-size: 80px;
        border-bottom: 4px solid #025949;
        padding-top: 10px;
        margin-bottom: 40px;
        box-shadow: 0 4px 6px 1px rgba(0, 0, 0, 0.4);

    }

    .title .orange{
        font-size: 90px;
        margin-bottom: -25px;
        color: #FB8925;
        letter-spacing: -5px;
    }

    .title .green{
        font-size: 90px;
        margin-bottom: -25px;
        color: #025949;
        letter-spacing: -5px;
    }

    .title.orange{
        border-color: #FB8925;
    }

    .section a:hover .title.orange{
        background-color: #025949;
        color: #FB8925;
    }

    .section a:hover .title.green{
        background-color: #FB8925;
        color: #025949;
    }

    .logo{
        width: 250px;
    }

    @media (max-width: 1400px) {

        .title .orange{
            font-size: 70px;
        }
        .title .green{
            font-size: 70px;
        }
    }


    @media (max-width: 992px) {

        .title .orange{
            font-size: 60px;
        }
        .title .green{
            font-size: 60px;
        }
    }



    @media (max-width: 768px) {
        .container-fluid {
            flex-direction: column;
            height: auto;
        }

        .section {
            width: 100%;
            height: 50vh; /* Ekranın yarısını kaplasın */
        }

        .logo {
            position: absolute;
            top: 50%;
            left: 0;
            width: 100%;
            background: white;
            text-align: center;
            z-index: 10;

        }


        .title .orange{
            font-size: 50px;
            margin-bottom: 0;
        }

        .title.green{
            position: absolute;
            bottom: 0;
            margin-bottom: 0;
        }

        .title.orange{
            position: absolute;
            bottom: 0;
            margin-bottom: 0;
        }

        .title .green{
            font-size: 50px;
            margin-bottom: 0;
            text-align: start;
        }

    }


</style>
@endsection

@section('content')

<div class="container-fluid">
    <div class="section">
        <a href="{{ route('residential') }}" class="orange">
            <img  src="{{Vite::asset('resources/images/residential.jpg')}}" alt="Residential">
            <div class="overlay"></div>
            <div class="title orange">
                <h2 class="orange fw-normal">{!! __('Residential') !!}</h2>
            </div>
        </a>
    </div>
    <div class="logo text-center" ><img src="{{Vite::asset('resources/images/logo.svg')}}" alt=""></div>
    <div class="section">
        <a href="{{route('commercial')}}">
            <img  src="{{Vite::asset('resources/images/commercial.png')}}" alt="Commercial">
            <div class="overlay"></div>
            <div class="title green text-end">
                <h2 class="green fw-normal">{!! __('Commercial') !!}</h2>
            </div>
        </a>
    </div>
</div>

@endsection

@section('scripts')

@endsection

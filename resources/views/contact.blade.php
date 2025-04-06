@extends('layouts.app', ['headerClasses' => 'bg-transparent border-t border-t-[3px] border-yellow-500', 'menuClasses' => '!bg-gray-25'])

@section('meta')

    <title>{{__('CONTACT_PAGE_META_TITLE')}}</title>
    <meta name="description"
          content="{{__('CONTACT_PAGE_META_DESCRIPTION')}}">
    <meta name="keywords"
          content="{{__('CONTACT, page, keywords')}}">
    <link rel="canonical" href="{{ url()->current() }}">

    <meta property="og:title" content="{{__('CONTACT_PAGE_META_TITLE')}}">
    <meta property="og:description" content="{{__('CONTACT_PAGE_META_DESCRIPTION')}}">

    <meta property="og:url" content="{{url()->current()}}">
    <meta property="og:type" content="website">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{__('CONTACT_PAGE_META_TITLE')}}">
    <meta name="twitter:description" content="{{__('CONTACT_PAGE_META_DESCRIPTION')}}">

    <style>
        .contact-card {
            border-radius: 24px;
            background-color: #fff;
            border: 1px solid #eee;
            box-shadow: 0 0 0 rgba(0, 0, 0, 0);
            transition: all 0.3s ease-in-out;
            height: 180px;
            text-align: start;
        }

        .contact-card:hover {
            box-shadow: 0 12px 25px rgba(0, 0, 0, 0.1);
        }

        .contact-icon {
            color: #FB8925;
            transition: color 0.3s ease;
            margin-bottom: 10px;
        }

        .contact-card:hover .contact-icon {
            color: #025949;

        }

       .contact-us-area a{
            text-decoration: none;
            color: #4b5563;
           text-align: start;
        }

    </style>
@endsection
@section('content')

    <section class="contact-us-area gap">
        <div class="container">
            <div class="text-start mb-4">
                <h2>{!! __('Our Informations') !!}</h2>
            </div>
            <div class="row g-4">
                <!-- Mail Kartı -->
                <div class="col-md-4">
                    <a href="mailto:{{$featuredAddress?->mail}}" class="text-decoration-none d-block">
                        <div class="contact-card p-4 text-center">
                            <i class="bi bi-envelope-fill contact-icon fs-1 mb-4"></i>
                            <h5 class="mb-2 mt-2">{!! __('E-mail') !!}</h5>
                            <p class="fs-5 mb-0">{{$featuredAddress?->mail}}</p>
                        </div>
                    </a>
                </div>

                <!-- Telefon Kartı -->
                <div class="col-md-4">
                    <a href="tel:{{$featuredAddress?->phone}}" class="text-decoration-none d-block">
                        <div class="contact-card p-4 text-center">
                            <i class="bi bi-telephone-fill contact-icon fs-1 mb-4"></i>
                            <h5 class="mb-2 mt-2">{!! __('Phone Number') !!}</h5>
                            <p class="fs-5 mb-0">{{$featuredAddress?->phone}}</p>
                        </div>
                    </a>
                </div>

                <!-- Adres Kartı -->
                <div class="col-md-4">
                    <a href="{{$featuredAddress?->url}}" target="_blank" class="text-decoration-none d-block">
                        <div class="contact-card p-4 text-center">
                            <i class="bi bi-geo-alt-fill contact-icon fs-1 mb-4"></i>
                            <h5 class="mb-2 mt-2">{!! __('Address') !!}</h5>
                            <p class="fs-5 mb-0">{{$featuredAddress?->address}}</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>



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
                        <div class="message-container mb-4 text-start">
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

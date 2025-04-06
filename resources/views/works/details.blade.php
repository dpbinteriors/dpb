@extends('layouts.app', ['headerClasses' => '', 'menuClasses' => '', 'isMobile' => true])

@section('meta')
    <title>{{$work->title}}</title>
    <meta name="description"
          content="{{strip_tags($work->description)}}">
    <meta name="keywords"
          content="{{__('wokrs, detail, keywords')}}">
    <link rel="canonical" href="{{ url()->current() }}">


    <meta property="og:title" content="{{$work->title}}">
    <meta property="og:description" content="{{strip_tags($work->description)}}">
    <meta property="og:image" content="{{ asset('uploads/' . $work->image_path) }}">
    <meta property="og:url" content="{{url()->current()}}">
    <meta property="og:type" content="website">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{$work->title}}">
    <meta name="twitter:description" content="{{strip_tags($work->description)}}">
    <meta name="twitter:image" content="{{ asset('uploads/' . $work->image_path) }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css">
@endsection

@section('content')

    <section class="breadcrumb-image works-detail position-relative text-center w-100 d-flex align-items-center"
             style="background-image: url('{{ asset('uploads/' . $work->image_path) }}');">

    </section>

    <section class="works-content-area gap">
        <div class="container">
            <div class="content-header">
                <h2>{{$work->title}}</h2>
                <span class="sub-text">{{$work->caption}}</span>
            </div>

            <ul class="info-list mt-5 pt-5">
                <li><strong><i class="bi bi-folder icon"></i>Category</strong> <span
                        class="sub-text">{{$work->category->title}}</span></li>
                <li><strong><i class="bi bi-palette icon"></i>Style</strong> <span
                        class="sub-text">{{$work->style}}</span></li>
                <li><strong><i class="bi bi-tags icon"></i>Tag</strong> <span class="sub-text">{{$work->tag}}</span>
                </li>
            </ul>

            <div class="content p-0 text-start mt-5">
                {!! $work->description !!}
            </div>

        </div>
    </section>

    <section class="works-gallery pb-5 pt-4">
        <div class="container">
            <h2 class="fw-bold">Project <span class="fw-normal">Gallery</span></h2>
            <div class="row g-3">
                @foreach ($work->gallery as $galleryImage)
                    <div class="col-md-4">
                        <div class="gallery-item">
                            <a href="{{ asset('uploads/' . $galleryImage) }}" data-lightbox="gallery">
                                <img class="img-fluid rounded-0" src="{{ asset('uploads/' . $galleryImage) }}"
                                     alt="Project Image">
                                <div class="overlay">
                                    <i class="bi bi-zoom-in"></i>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>

    <section class="other-works pt-5 mt-4 ">

        <div class="container">
            <h2>Other Works</h2>
            <div class="row">
                @foreach($otherWorks as $work)
                    <div class="col-md-4 pt-2">
                        <a href="{{ route('works-detail', ['slug' => $work->slug]) }}" class="">
                            <div class="card works-card h-100">
                                <img src="{{ asset('uploads/' . $work->image_path) }}" class="card-img-top" alt="Interior">
                                <div class="card-body">
                                    <p class="category">{{ $work->category->title }}</p>
                                    <h5 class="card-title">{{ $work->title }}</h5>
                                    <p class="card-text">{{ $work->caption }}</p>
                                </div>
                                <div class="card-footer">
                                    <span class="style">{{ $work->style }}</span>
                                    <span class="type">{{$work->tag}}</span>
                                </div>
                            </div>
                        </a>

                    </div>
                @endforeach
            </div>
        </div>
    </section>

@endsection

@section('scripts')


@endsection

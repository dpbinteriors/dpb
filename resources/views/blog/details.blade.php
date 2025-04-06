@extends('layouts.app', ['headerClasses' => '', 'menuClasses' => '', 'isMobile' => true])

@section('meta')
    <title>{{$currentBlog->title}}</title>
    <meta name="description"
          content="{{strip_tags($currentBlog->description)}}">
    <meta name="keywords"
          content="{{__('blogdetail, keywords')}}">
    <link rel="canonical" href="{{ url()->current() }}">


    <meta property="og:title" content="{{$currentBlog->title}}">
    <meta property="og:description" content="{{strip_tags($currentBlog->description)}}">
    <meta property="og:image" content="{{ asset('uploads/' . $currentBlog->image_path) }}">
    <meta property="og:url" content="{{url()->current()}}">
    <meta property="og:type" content="website">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{$currentBlog->title}}">
    <meta name="twitter:description" content="{{strip_tags($currentBlog->description)}}">
    <meta name="twitter:image" content="{{ asset('uploads/' . $currentBlog->image_path) }}">
@endsection


@section('content')

    <section class="breadcrumb-image position-relative text-center w-100 d-flex align-items-center"
             style="background-image: url('{{ asset('uploads/' . $currentBlog->image_path) }}');">
        <div class="blog-overlay"></div>
        <div class="container relative">
            <div class="container-2 ">
                <div class="content-area absolute left-0 right-0">
                    <h1 class="   font-bold  ">
                        {{$currentBlog->title}}
                    </h1>
                    <p class="text-white ">
                        <span
                            class=" pr-8text-white ">{!! __('Published on:') !!}</span>
                        {{ $currentBlog->created_at->translatedFormat('d F Y') }}
                        <span
                            class="pr-8 pl-16 text-white ">{!! __('Published in:') !!}</span>
                        {{ $currentBlog->created_at->translatedFormat('d F Y') }} , {!! __('News') !!}
                    </p>
                </div>
            </div>
        </div>
    </section>


    <section class="blog-content-area gap ">
        <div class="container">
            <h2>{{$currentBlog->title}}</h2>
            <div class="row">
            {!! $currentBlog->description !!}
            </div>
        </div>
    </section>


    <section class="blogs-area">
        <div class="container">
            <h2 class="blogs-title">Other Blogs</h2>
            <div class="row mt-3">
                @foreach($otherArticles as $article )
                    <div class="col-md-4 mb-4">
                        <a href="{{ route('blog-detail', ['slug' => $article->slug]) }}" class="">
                            <div class="card works-card h-100">
                                <img src="{{ asset('uploads/' . $article->image_path) }}" class="card-img-top"
                                     alt="Interior">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <p class="category">{{$article->tag}}</p>
                                        <p class="time">{{ ($article->created_at)->diffForHumans() }}</p>
                                    </div>
                                    <h5 class="card-title">{{ $article->title }}</h5>
                                    <p class="card-text">{{ $article->caption }}</p>
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

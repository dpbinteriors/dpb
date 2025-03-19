@extends('layouts.app', ['headerClasses' => '', 'menuClasses' => '', 'isMobile' => true])

@section('meta')
    <title>{{$currentBlog->title}}</title>
    <meta name="description"
          content="{{strip_tags($currentBlog->description)}}">
    <meta name="keywords"
          content="{{__('Alper Lojistik, Frigo Taşımacılık, Reefer Taşımacılık, Uluslararası Taşımacılık')}}">
    <link rel="canonical" href="{{ url()->current() }}">


    <meta property="og:title" content="{{$currentBlog->title}}">
    <meta property="og:description" content="{{strip_tags($currentBlog->description)}}">
    <meta property="og:image" content="{{ asset('storage/' . $currentBlog->image_path) }}">
    <meta property="og:url" content="{{url()->current()}}">
    <meta property="og:type" content="website">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{$currentBlog->title}}">
    <meta name="twitter:description" content="{{strip_tags($currentBlog->description)}}">
    <meta name="twitter:image" content="{{ asset('storage/' . $currentBlog->image_path) }}">
@endsection


@section('content')

    <section
        class="about-image bg-cover bg-center relative text-center w-full min-h-[350px] md:min-h-[500px] md:pb-0 pb-48 flex items-center before:absolute before:top-0 before:left-0 before:w-full before:h-full before:bg-[linear-gradient(11deg,_rgba(9,_76,_105,_0.63)_10.79%,_rgba(13,_112,_155,_0)_91.78%)] before:z-0"
        style="background-image: url('{{ asset('storage/' . $currentBlog->image_path) }}');">
        <div class="container relative">
            <div class="container-2 ">
                <div class="content-area absolute left-0 right-0">
                    <h1 class="text-white text-5xl  font-bold  ">
                        {{$currentBlog->title}}
                    </h1>
                    <p class="text-white text-base font-medium leading-normal pt-24">
                        <span
                            class=" pr-8text-white text-base font-normal leading-normal">{!! __('Published on:') !!}</span>
                        {{ $currentBlog->created_at->translatedFormat('d F Y') }}
                        <span
                            class="pr-8 pl-16 text-white text-base font-normal leading-normal">{!! __('Published in:') !!}</span>
                        {{ $currentBlog->created_at->translatedFormat('d F Y') }} , {!! __('News') !!}
                    </p>
                </div>
            </div>
        </div>
    </section>


    <section class="blog-content-area md:pt-[100px] py-48 md:pb-64">
        <div class="container">
            <div class="container-2">
                {!! $currentBlog->description !!}
                <div class="socials pt-64 max-w-none md:max-w-[50%] lg:max-w-[220px]">
                    <div class=" flex gap-16 items-center border-t border-b border-gray-300 py-8 px-16">
                        <span class="text-sm font-bold uppercase leading-tight text-main-textGreen">SHARE ON</span>
                        <div class="flex gap-4">
                            <a href="#" class="text-gray-600 hover:text-gray-800">
                                <img src="{{Vite::asset('resources/images/icons/wp-blog-detail.svg')}}" alt="">
                            </a>
                            <a href="#" class="text-gray-600 hover:text-gray-800">
                                <img src="{{Vite::asset('resources/images/icons/facebook-blog-detail.svg')}}"
                                     alt="">
                            </a>
                            <a href="#" class="text-gray-600 hover:text-gray-800">
                                <img src="{{Vite::asset('resources/images/icons/twitter-blog-detail.svg')}}" alt="">
                            </a>
                            <a href="#" class="text-gray-600 hover:text-gray-800">
                                <img src="{{Vite::asset('resources/images/icons/linkedIn.svg')}}" alt="">
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>


    <section class="other-news bg-brand-bg py-[100px]">
        <div class="container">
            <div class="container-2">
                <h2 class="w-full text-center text-brand-text text-2xl font-bold leading-loose ">{!! __('Diğer Haberler') !!}</h2>
                <div class="blog-area mt-48 relative">
                    <div
                        class="blog-card-wrapper grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 md:gap-16 lg:gap-32">
                        <!-- Blog Card 1 -->
                        @foreach($otherArticles as $article )
                            <a href="{{ route('blog-detail', ['slug' => $article?->slug]) }}"
                               class="blog-card group relative block">
                                <div class="blog-card-im relative overflow-hidden">
                                    <img
                                        class="w-full h-[250px] object-cover rounded-lg transition duration-300 ease-in-out group-hover:brightness-50"
                                        src="{{ asset('storage/' . $article->image_path) }}" alt="">
                                    <div
                                        class="absolute bottom-5 left-3.5 text-sm font-medium text-main-text bg-white bg-opacity-50 px-2 py-1 rounded">
                                        {{ $article->created_at->translatedFormat('d F Y') }}
                                    </div>
                                    <!-- Hover'da ortaya çıkan buton -->
                                    <div
                                        class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                     <span class="bg-brand-light py-10 pl-24 px-[18px] flex items-center gap-3 text-brand-text text-base font-bold rounded-full
                  transition-all duration-300 ease-in-out hover:bg-brand-light hover:text-black hover:shadow-lg">
                  {!! __('Read More') !!}
                                      <svg xmlns="http://www.w3.org/2000/svg" class="w-24 h-24" fill="none"
                                           viewBox="0 0 24 24"
                                           stroke="currentColor">
                                             <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                   d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                                       </svg>
                                            </span>
                                    </div>
                                </div>
                                <div class="blog-card-content">
                                    <h1 class="my-24 text-xl font-semibold leading-relaxed text-main-text group-hover:text-brand-dark">{{$article->title}}</h1>
                                    <p class="text-main-text text-base font-normal leading-normal">{{$article->title}}</p>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('scripts')
@endsection

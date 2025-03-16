@extends('layouts.app', ['headerClasses' => '', 'menuClasses' => '', 'isMobile' => true])

@section('meta')
@endsection

@section('content')
    <section class="about-image">
        <img src="{{ Vite::asset('resources/images/about-img.jpeg') }}" class="w-full h-full lg:h-[500px] object-cover"
            alt="">
    </section>



    <section class="pb-[80px]">
        <div class="container">
            <div class="container-2 text-left">
                <div class="py-10 px-4">
                    <div class="relative">
                        <img src="{{ asset('storage/' . $campaign->campaign_image) }}" alt="{{ $campaign->title }}"
                            class="w-full rounded-lg shadow-lg object-cover h-auto lg:h-[450px]">
                    </div>
                    <div class="mt-6  mx-auto text-left">
                        <h2 class="text-4xl font-bold text-dark-500">
                            {{ $campaign->title }} <span
                                class="block font-normal text-sm pt-2">{{ $campaign->campaign_start_date }} -
                                {{ $campaign->campaign_end_date }} </span>
                        </h2>
                    </div>
                    <div class="mt-3  text-left">
                        <p class="text-lg text-gray-700 font-normal leading-relaxed">
                            {{ $campaign->description }}
                        </p>
                    </div>
                    <a href="{{ $campaign->button_url }}"
                        class="py-4 inline-flex items-center gap-2 px-6 bg-green-500 rounded-md text-white mt-4 hover:bg-green-400 transition-all">
                        <img src="{{ Vite::asset('resources/images/icons/wp.svg') }}" class="w-5 h-5" alt="">
                        <span class="text-[14px] font-normal leading-[14px]">{{ $campaign->button_text }}</span>
                    </a>
                </div>

            </div>
        </div>
    </section>
@endsection

@section('scripts')
@endsection

<div class="container relative home-slider">
    <div class="max-w-[1920px] mx-auto home-slider-image overflow-hidden">
        <!-- Additional required wrapper -->
        <div class="swiper-wrapper h-[640px] lg:h-[700px] xl:h-[800px]">
            <!-- Slides -->
            @foreach($slides as $slide)
                <div class="swiper-slide">
                    <img src="{{asset('storage/'.$slide->image)}}" alt="{{$slide->title}}"
                         class="w-full h-[640px] lg:h-[800px] object-cover" loading="lazy">
                    <div class="swiper-lazy-preloader swiper-lazy-preloader-white"></div>
                    <div class="container-2">
                        <div class="absolute top-[40%]">
                            <div class="md:w-[680px] h-[252px] flex-col justify-start items-start gap-10 inline-flex">
                                <div class="flex-col justify-start items-start gap-6 flex">
                                    <div class="w-[266px] h-[52px]">
                                        @if($slide->second_image)
                                            <div class="h-full object-cover relative"><img
                                                    src="{{asset('storage/'.$slide->second_image)}}"
                                                    alt="{{$slide->title}}">
                                            </div>
                                        @endif
                                    </div>

                                    <h1
                                        class="w-full leading-[130%] lg:w-[680px] text-stone-100 text-[24px] md:text-[44px] font-semibold ">
                                        {{$slide->title}}
                                    </h1>
                                </div>
                                @if($slide->button_text)
                                    <a href="{{$slide->button_url}}"
                                       class="button button-primary">{{$slide->button_text}}</a>
                                @endif
                            </div>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="container-2">
            <div
                class="w-[57px] h-[7px] justify-start items-start gap-1 inline-flex absolute bottom-[75px] z-[5] swiper-pagination pl-[10px]">

            </div>
            @if($slides->count() > 1)
                <button class="absolute top-[40%] left-[25px] z-[5] hidden md:block" id="home-slider-arrow-left">
                    <img src="{{Vite::asset('resources/images/icons/slider_arrow_icon.svg')}}" alt="">
                </button>
                <button class="absolute top-[40%] right-[25px] rotate-180 z-[5] hidden md:block"
                        id="home-slider-arrow-right">
                    <img src="{{Vite::asset('resources/images/icons/slider_arrow_icon.svg')}}" alt="">
                </button>
            @endif

        </div>

    </div>

</div>

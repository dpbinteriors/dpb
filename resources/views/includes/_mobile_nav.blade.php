<nav class="flex py-[24px] justify-between items-center">
    <a href="#">
        <img src="{{ Vite::asset('resources/images/logo.svg') }}" alt="">
    </a>
    <div class="flex items-center gap-[15px]">
        <a href="#" class="h3">TR</a>

        <div x-data="{open:false}">
            <img src="{{ Vite::asset('resources/images/search.svg') }}" alt="" @click="open=true">
            <div class="fixed h-[100%] w-[100%] z-10 left-0 top-0 bg-yellow-500 py-[40px] px-[24px] "
                 x-cloak
                 x-show="open">
                <img src="{{ Vite::asset('resources/images/close_icon.svg') }}" alt=""
                     class="float-right blockright-0 top-0" @click="open=false"/>
                <div class="mt-[50px]">
                    @include('components._search')
                </div>
            </div>
        </div>


        <div x-data="{open:false}">
            <img src="{{ Vite::asset('resources/images/hamburger_menu_icon.svg') }}" alt="" @click="open=true">

            <div class="fixed h-[100%] w-[100%] z-10 left-0 top-0 bg-yellow-500 py-[40px] px-[24px] " x-cloak
                 x-show="open">

                <img src="{{ Vite::asset('resources/images/close_icon.svg') }}" alt=""
                     class="float-right blockright-0 top-0" @click="open=false"/>

                <div class="w-full block mt-[32px]">
                    <a href="" class="h3 py-4 block border-dashed border-b-[1px] border-dark-500">{!! __('Hakkımızda') !!} ?</a>
                    <a href="" class="h3 py-4 border-dashed border-b-[1px] border-dark-500 flex flex-row">{!! __('Ürünler') !!}
                        <img src="{{ Vite::asset('resources/images/slider_arrow.svg') }}" alt=""
                             class="rotate-180 w-[10px] ml-3"/>
                    </a>
                    <a href="" class="h3 py-4 block border-dashed border-b-[1px]  border-dark-500">{!! __('İletişim') !!}</a>

                    <div
                        class="p-4 mt-[35px] bg-neutral-900 justify-center items-center gap-1 flex text-center bottom-[0px] right-[0px] z-20">
                        <img src="{{ Vite::asset('resources/images/4.svg') }}" alt=""/>
                        <span class="text-white ml-1 leading-tight ">{!! __('Adımda Sipariş') !!}</span>
                    </div>
                </div>
            </div>

        </div>
    </div>
</nav>

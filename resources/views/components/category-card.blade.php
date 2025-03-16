<div class="w-full flex-row md:flex-row bg-gray-50 md:items-center ">
    <div class="px-[40px] py-[35px] w-full">
        <h3 class="text-yellow-500 text-14 ">{{$title}}</h3>
        <h4 class="h2 text-[24px] mt-2">{{$subTitle}}</h4>
        <div class="h-[220px] w-full mt-[64px]">
            <img src="{{$image}}" alt="Arrow Icon"
                 class="h-full self-center mx-auto">
        </div>
    </div>
    <div class="bg-dark-500 px-[40px] py-[10px] border-t-[2px] border-yellow-500 group">
        <a class="h7 flex justify-between" href="{{$url}}" >
            <h4 class="h5 self-center text-yellow-500">{!! __('Hemen Keşfet') !!}</h4>
            <img src="{{ Vite::asset('resources/images/button_arrow_2.svg') }}" alt="Arrow Icon"
                 class="ml-2 group-hover:rotate-45 transition">
        </a>
    </div>
</div>

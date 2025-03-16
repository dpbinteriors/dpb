<a href="{{$url}}"
    class="min-w-[245px] h-[170px] p-[24px] border border-dashed border-cyan-600 flex-col justify-start flex-grow flex-shrink items-start gap-2.5 inline-flex hover:border-blue-300 hover:bg-blue-300 transition ease-in-out">
    <div class="self-stretch h-[122px] flex-col justify-start items-start gap-2.5 flex">
        <div class="self-stretch justify-between items-center inline-flex">
            <div class="h-[50px] relative">
                <div class="w-[31.44px] h-[22.47px] left-[4.35px] top-[8.70px] absolute">
                    <img src="{{$image}}" alt="{{$title}}" class="h-[50px] w-auto">
                </div>
            </div>
            <div class="w-[30px] h-[30px] relative">
                <div class="w-[30px] h-[30px] left-0 top-0 absolute bg-teal-50 rounded-full"></div>
                <div
                    class="origin-top-left -rotate-90 w-[12.18px] h-[13.53px] left-[8.04px] top-[21px] absolute">
                    <img src="{{Vite::asset('resources/images/icons/arrow_right.svg')}}"
                         alt="Arrow Right Icon" class="rotate-90">
                </div>
            </div>
        </div>
        <div class="self-stretch h4  max-w-[150px] lg:line-clamp-2 mt-[12px]">
            {{$title}}
        </div>
    </div>
</a>

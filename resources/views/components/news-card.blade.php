<a class="flex flex-col py-[15px] border-dashed border-t-[1px] border-gray-500 w-full item text-left group hover:bg-blue-300" href="{{$url}}" >
    <h4 class="text-gray-500">{{$date}}</h4>
    <div class="flex flex-col lg:flex-row justify-around items-start mt-3 lg:   gap-[75px]">
        <h2 class="h5 w-full font-semibold  lg:w-[400px] whitespace-pre-wrap overflow-hidden line-clamp-3 flex-shrink-0">{{$title}}</h2>
        <p class="body text-gray-500 flex-grow line-clamp-3">{{$content}}</p>
        <div class="w-[30px] h-[30px] relative hidden lg:block">
            <div class="w-[30px] h-[30px] left-0 top-0 absolute bg-blue-300 rounded-full"></div>
            <div
                class="origin-top-left -rotate-90 w-[12.18px] h-[13.53px] left-[8.04px] top-[21px] absolute">
                <img src="{{Vite::asset('resources/images/icons/arrow_right.svg')}}"
                     alt="Arrow Right Icon" class="rotate-90">
            </div>
        </div>

    </div>

</a>


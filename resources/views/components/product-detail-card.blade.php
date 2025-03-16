<a href="{{$link}}" class="w-full flex-col lg:flex-row flex border-dotted border-[1px] border-blue-400">
    <div class="w-full lg:w-[290px] h-[161px] bg-gray-200 inline-flex items-center justify-center flex-shrink-0 flex-grow-0">
        <img src="{{$image}}" alt="{{$title}}" class="max-w-full w-full object-cover p-[18px]">
    </div>
    <div class="inline-flex p-[16px] gap-[12px] pb-[40px] lg:pb-[16px] flex-col lg:flex-col flex-grow-0 overflow-hidden lg:h-[161px] w-full relative justify-normal">
        <h1 class="h3 text-blue-400 w-full">{{$title}}</h1>
        <p class="text-gray-500 w-full line-clamp-2" >{{$caption}}</p>
        <div class="w-full text-right mt-[24px] absolute right-[15px] bottom-[15px] ">
            <button class="items-center rounded-full bg-blue-300 inline-flex w-[30px] h-[30px] justify-center ">
                <img src="{{Vite::asset('resources/images/icons/arrow_right.svg')}}" alt="">
            </button>
        </div>
    </div>
</a>

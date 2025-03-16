<div
    class="w-full xl:min-w-[300px] flex flex-col items-start gap-[41px] flex-grow flex-shrink-0 basis-0 bg-white hover:border-blue-300 hover:bg-blue-300 transition ease-in-out rounded-md border border-blue-400">
    <a href="{{$url}}"
       class="w-full h-[171px] p-6  flex-col justify-start items-start gap-[41px] inline-flex  ">
        <div class="self-stretch justify-between items-start inline-flex">
            <div
                class="lg:w-[300px] h-[30px] text-blue-400 text-2xl font-semibold font-['JUST Sans'] leading-[31.20px]">
                {{$title}}
            </div>
            <div class="w-[30px] h-[30px] relative">
                <div class="w-[30px] h-[30px] left-0 top-0 absolute bg-blue-300 rounded-full"></div>
                <div
                    class="origin-top-left -rotate-90 w-[12.18px] h-[13.53px] left-[8.04px] top-[21px] absolute">
                    <img src="{{Vite::asset('resources/images/icons/arrow_right.svg')}}"
                         alt="Arrow Right Icon" class="rotate-90 ">
                </div>
            </div>
        </div>
        <div class="lg:w-[351.33px] h-[52px] relative">
            <img src="{{$image}}"
                 alt="{{$title}}" class="h-[40px] object-cover ">
        </div>
    </a>
</div>

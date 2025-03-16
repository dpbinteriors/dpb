<div
    class="w-full mt-4 min-w-full md:min-w-[250px] flex flex-col items-start gap-[41px] flex-grow flex-shrink-0 basis-0 bg-white transition ease-in-out rounded-md ">
    <a href="{{$url}}"
       class="w-full flex-col justify-start items-start inline-flex rounded-[12px] overflow-hidden relative bg-gray-200">
        <img src="{{$image}}" alt="{{$title}}"
             class="h-[190px] w-full object-cover rounded-t-[12px]">
        <div class="p-[16px]">
            <h2 class="h6 text-dark-400 line-clamp-1">{{$title}}</h2>
            <p class="body pt-[8px] line-clamp-3 min-h-[65px]">
                {{$caption}}
            </p>
            <div class="bg-blue-300 rounded-full inline-flex mt-[25px]">
                <img src="{{Vite::asset('resources/images/icons/arrow_right.svg')}}"
                     alt="Arrow Right Icon" class=" z-[5] p-2">
            </div>

        </div>
    </a>
</div>

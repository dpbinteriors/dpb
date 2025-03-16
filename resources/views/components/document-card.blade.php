<div class="w-full">
    <img src="@if($document->image_path) {{asset('storage/'.$document->image_path)}} @else  {{asset('storage/'.$document->category->image_path)}} @endif" alt="Sample Catalogue"
         class="w-full">
    <h5 class="text-center text-[12px] lg:text-[14px] line-clamp-3 mt-[10px]">{{$document->title}}</h5>
    <div class="inline-flex justify-center items-center gap-[24px] justify-start w-full mt-[12px]"
         @if($document->files->count())
             x-data="{documentLink:'{{asset('storage/'.$document->files->first()?->path )}}'}"
         @endif
         >
        <a class="inline-flex mt-[10px]" href="#" :href="documentLink" download>
            <h3 class="h6 text-blue-400 ">{!! __('İndir') !!}</h3>
            <img src=" {{Vite::asset('resources/images/icons/download_icon_blue.svg')}}" alt="Download Icon"
                 class="ml-2">
        </a>
        <select name="" class="outline-0 mt-2"
                x-on:change="documentLink = $event.target.options[$event.target.selectedIndex].getAttribute('data-link')">
            @foreach($document->files->sortBy('position') as $file)
                <option value="{{$file->lang}}" data-link="{{asset('storage'.$file->path)}}">{{$file->lang}}</option>
            @endforeach
        </select>

    </div>
</div>

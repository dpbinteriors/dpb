@extends('layouts.app' , ['headerClasses'=>'bg-white-500 border-t-[3px]'])

@section('meta')
@endsection
@section('content')
    <section class="pt-[120px] md:pt-[200px] lg:pt-[184px]">
        <div class="container">
            <div class="container-2">
                <h1 class="h2 lg:max-w-[714px] font-semibold">
                    {{$legalPageDetail->title}}
                </h1>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="container-2 py-[70px] grid grid-cols-12 gap-[34px]">
                <div class="col-span-12 lg:col-span-4">
                    @foreach($legalPages as $legalPage)
                        <a href="{{route('legal-page',['slug'=>$legalPage->slug])}}"
                           class="h4 block font-semibold @if($legalPage->id !== $legalPageDetail->id ) opacity-70 @endif @if($loop->first) @else mt-6 @endif">
                            {{$legalPage->title}}
                        </a>
                    @endforeach
                </div>
                <div class="rich-text-box col-span-12 lg:col-span-8">
                    @if($legalPageDetail->file_path)
                        <iframe
                            src="{{asset('storage/'.$legalPageDetail->file_path)}}"
                            frameBorder="0"
                            scrolling="auto"
                            height="800px"
                            width="100%"
                        ></iframe>

                    @endif
                    <div class="mb-[24px]">

                    </div>
                    {!! $legalPageDetail->description !!}
                </div>
                {{--                <h1 class="h1  max-w-[700px] text-[44px]">{{$legalPage->title}}</h1>--}}
            </div>
        </div>
    </section>

    <section class="pb-[80px]">
        <div class="container">
            <div class="container-2">
                {{--                {!! $legalPage->description !!}--}}
            </div>
        </div>
    </section>

@endsection
@section('scripts')
@endsection

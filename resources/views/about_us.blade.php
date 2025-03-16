@extends('layouts.app', ['headerClasses' => 'bg-transparent border-t border-t-[3px] border-yellow-500', 'menuClasses' => '!bg-gray-25'])

@section('meta')
@endsection
@section('content')
    <section class="about-image">
        <img src="{{ Vite::asset('resources/images/about-img.jpg') }}" class="w-full h-full lg:h-[650px] object-cover"
            alt="{!! __('About Us') !!}">
    </section>

    <section class="bg-dark-500 container">
        <div class="container-2 py-[80px] md:py-[175px] gap-[45px] justify-between text-white flex flex-col lg:flex-row">
            <h2 class="text-[24px] md:text-[40px] font-[600]">
                {!! __('Hakkımızda') !!}
            </h2>
            <p class="text-[24px] md:text-[40px] max-w-[810px]">
                {!! __('Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.') !!}
                <span class="text-blue-500 text-[24px] md:text-[40px]">
                    {!! __('Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy') !!}
                </span>
            </p>
        </div>
    </section>

    {{--    <section class="about-content bg-dark-500 w-full lg:p-0 lg:pb-120 container h-full flex items-center py-[]"> --}}
    {{--        <div --}}
    {{--            class="flex flex-col lg:my-0 my-10 md:flex-row items-start md:items-center  container-2   w-full h-auto md:h-[500px] text-white p-6 "> --}}
    {{--            <div class="w-full  mb-6 md:mb-0"> --}}
    {{--                <h2 class="text-3xl md:text-4xl font-bold  text-left">{!! __('Hakkımızda') !!}</h2> --}}
    {{--            </div> --}}

    {{--            <div class="w-full  text-base md:text-lg leading-relaxed"> --}}
    {{--                <p class="text-[20px] md:text-[32px] leading-[28px] md:leading-[40px] text-white font-normal  md:text-left"> --}}
    {{--                    {!! __('    Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.') !!} --}}
    {{--                    <span class="text-blue-500 text-[20px] md:text-[32px]"> --}}
    {{--                        {!! __('Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy') !!} --}}
    {{--                    </span> --}}
    {{--                </p> --}}
    {{--            </div> --}}
    {{--        </div> --}}
    {{--    </section> --}}

    <section class="container py-120">
        <div class="container-2 flex flex-wrap flex-col md:flex-row items-center justify-between">
            <div class="w-full lg:w-[60%] space-y-6">
                <h2
                    class="text-dark-200 mb-10 lg:pb-80 text-[32px] lg:max-w-[50%]  max-w-full  font-semibold leading-[40px]">
                    {!! __('Yollarda geçen 80 yılı aşkın tecrübemizle, müşterilerimize güvenilir ve kaliteli çözümler sunuyoruz.') !!}

                </h2>
                <p class="text-[16px] leading-6  text-dark-400 lg:max-w-[50%] max-w-full">

                    {!! __("İlk Volvo kamyon 1928'de üretilmiştir. O tarihten beri büyüyerek Avrupa'nın en büyük ağır kamyon üreticisi olduk. Güvenilirliğimizle ünlüyüz. Kalite, güvenlik ve çevreye saygı bu ürünün dayandığı üç temel değerimizdir.Tüm faaliyetlerimizde bu temel değerlerimizi hayata geçiriyoruz.") !!}
                </p>
            </div>

            <div class="w-full lg:w-[40%] mt-8 md:mt-0">
                <div class="rounded-lg overflow-hidden">
                    <img src="{{ Vite::asset('resources/images/contact-bg.jpg') }}"
                        class="lg:w-[530px] mt-10 lg:mt-0 lg:h-[500px] object-cover object-right" alt="">
                </div>
            </div>
        </div>

    </section>

    <section class="bg-gray-200 container flex items-center justify-center ">
        <div class="flex container-2   py-80  flex-col lg:flex-row  justify-between  w-full items-start lg:gap-[130px]">

            <div class="flex-1">
                <h2 class="text-gray-40 text-[16px] leading-[20px] font-semibold pb-6 ">{!! __('Çekirdeğimiz') !!}</h2>
                <p class="text-dark-200  text-[28px] leading-[36px] font-semibold pb-10 lg:pb-0">
                    {!! __('About 3.1') !!}
                </p>
            </div>

            <div class="flex-1 flex flex-col gap-8 ">

                <div class="pb-6 lg:pb-10">
                    <h3 class="text-dark-100 text-[24px] leading-[24px] font-semibold">
                        {!! __('About 3.1.1') !!}
                    </h3>
                    <p class="text-dark-300 text-sm leadin-5 font-normal pt-6">
                        {!! __('About 3.1.2') !!}
                    </p>
                </div>

                <div class="pb-6 lg:pb-10">
                    <h3 class="text-dark-100 text-[24px] leading-[24px] font-semibold">
                        {!! __('About 3.2.1') !!}
                    </h3>
                    <p class="text-dark-300 text-sm leadin-5 font-normal pt-6">
                        {!! __('About 3.2.2') !!}
                    </p>
                </div>
                <div class="pb-6 lg:pb-10">
                    <h3 class="text-dark-100 text-[24px] leading-[24px] font-semibold">
                        {!! __('About 3.3.1') !!}
                    </h3>
                    <p class="text-dark-300 text-sm leadin-5 font-normal pt-6">
                        {!! __('About 3.3.2') !!}
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="container  py-80 lg:py-140 ">
        <div class=" container-2 ">
            <div class="text-start mb-12">
                <h2 class="text-blue-500 text-[16px] font-semibold pb-[30px]">{!! __('Kazaların önlenmesi') !!}</h2>
                <p class="text-dark-200 text-[28px] font-semibold leading-[36px] pb-10 font-titillium">
                    {!! __(" Aktif güvenlik girişimlerimiz, trafik kazalarının yaklaşık %90'ına sebep olan hataları önlemek için tasarlanıyor. Bu nedenle sürücülerimizin daha iyi bir görüş elde etmesine yardımcı oluyoruz. Rahatlarını ve konsantrasyonlarını koruyoruz. Ayrıca, kamyonlarımızı güvenliği bir üst seviyeye taşıyan sistemler ve teknolojilerledonatıyoruz.") !!}
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="flex flex-col items-start text-start">
                    <img src="{{ Vite::asset('resources/images/icons/why-choose-truck.svg') }}" class="w-[45px] h-[45px] "
                        alt="">
                    <h3 class="py-[15px] text-dark-200 text-[24px] font-semibold leading-[24px]">{!! __('Size en uygun Volvo Trucks') !!}
                    </h3>
                    <p class="text-gray-500 text-[16px] leading-[24px] lg:max-w-md max-w-full">
                        {!! __('Size en uygun Volvo Trucks modelleriyle iş gücünüzü güçlendirin.') !!}
                    </p>
                </div>

                <div class="flex flex-col items-start text-start">
                    <img src="{{ Vite::asset('resources/images/icons/security.svg') }}" class="w-[45px] h-[45px] "
                        alt="">

                    <h3 class="py-[15px] text-dark-200 text-[24px] font-semibold leading-[24px]">{!! __('Orijinal yedek parçalar') !!}
                    </h3>
                    <p class="text-gray-500 text-[16px] leading-[24px] lg:max-w-md max-w-full">
                        {!! __('Araçlarınızın dayanıklılığını artıran orijinal yedek parçalar sunuyoruz.') !!}
                    </p>
                </div>

                <div class="flex flex-col items-start text-start">
                    <img src="{{ Vite::asset('resources/images/icons/why-choose-tool.svg') }}" class="w-[45px] h-[45px] "
                        alt="">

                    <h3 class="py-[15px] text-dark-200 text-[24px] font-semibold leading-[24px]">{!! __('Hızlı, Güvenilir Servis') !!}
                    </h3>
                    <p class="text-gray-500 text-[16px] leading-[24px] lg:max-w-md max-w-full">
                        {!! __('Hızlı, Güvenilir Servis Profesyonel bakım ve onarım hizmetleri sunuyoruz.') !!}
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="lg:pt-80">
        <div class="relative h-[85vh] lg:h-screen bg-cover bg-center border-image-gradient-bottom"
            style="background-image: url('{{ Vite::asset('resources/images/about-bottom-image.jpg') }}');">
            <div class="absolute inset-0 flex items-center container  px-4 lg:px-[80px] ">
                <div class="max-w-3xl text-white">
                    <h1 class="md:text-[48px] text-[36px] pb-[40px] font-semibold leading-[52px] max-w-full lg:max-w-xl">
                        {!! __('Yarınlara yol alırken, sürdürülebilirliği daima rotamızda tutuyoruz.') !!}
                    </h1>
                    <p class="text-[16px] text-[#A6E53E] font-500 leading-6 ">
                        {!! __("Çevresel sorumluluk, işimizin ayrılmaz bir parçasıdır. 70'lerden bu yana, sürdürülebilir ulaşım çözümlerinin önemine inanıyor ve bu doğrultuda çalışmalarımıza yön veriyoruz. Araçlarımızın satış ve servis süreçlerinde çevreye duyarlı performansları destekleyerek, daha temiz bir gelecek için adımlar atıyoruz. Biz, sürdürülebilirliğin her yolculuğun vazgeçilmez bir parçası olduğuna inanıyoruz.") !!}
                    </p>
                </div>
            </div>
        </div>

    </section>
@endsection
@section('scripts')
@endsection

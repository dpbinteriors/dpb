@extends('layouts.app', ['headerClasses' => 'bg-transparent border-t border-t-[3px] border-yellow-500', 'menuClasses' => '!bg-gray-25'])

@section('meta')
@endsection
@section('content')
    <section class="contact-image">
        <img src="{{ Vite::asset('resources/images/contact-breadcrumb.jpg') }}"
            class="w-full h-full lg:h-[400px] object-cover object-bottom" alt="">
    </section>


    <section class="informations py-80 container">
        <div class="flex flex-wrap items-start gap-8 lg:gap-0 container-2">
            <!-- Başlık -->
            <div class="title flex-[1_1_100%] lg:flex-1">
                <h1 class="text-blue-400 text-[32px] lg:text-[44px] font-semibold leading-[40px] lg:leading-[57px]">
                    {!! __('Bize ulaşın') !!}
                </h1>
            </div>
            <!-- İletişim Bilgileri -->
            <div class="contact-infos flex-[1_1_100%] lg:flex-1">
                <h2 class="text-dark-50 text-[24px] lg:text-[32px] font-semibold leading-[30px] lg:leading-[41px]">
                    {!! __('Bizimle iletişime geçin, çözüm ortağınız olarak yanınızda olalım, başarıyı birlikte yakalayalım.*') !!}
                </h2>
                <h4
                    class="font-sans text-blue-400 text-[18px] lg:text-[20px] font-500 mt-8 lg:mt-12 leading-[24px] lg:leading-[26px] border-b border-blue-400 border-dashed pb-2">
                    {!! __('Ofis') !!}</h4>
                @foreach ($addresses as $address)
                    <p
                        class="text-dark-40 font-justSans font-500 leading-[24px] lg:leading-[26px] mb-5 text-[18px] lg:text-[20px] mt-4 lg:mt-5">
                        {{ $address->address }}
                    </p>
                    <a href="{{ $address?->url }}" target="_blank"
                        class="text-[14px] font-justSans lg:text-[16px] flex items-center gap-4 font-500 leading-[18px] lg:leading-[20px] text-dark-40">
                        {!! __('Yol Tarifi Al') !!}
                        <span><img src="{{ Vite::asset('resources/images/icons/arrow_right_blue.svg') }}"
                                alt=""></span>
                    </a>
                    <a href="tel:{{ $address->phone }}" target="_blank"
                        class="text-[18px] font-justSans lg:text-[20px] mt-4 lg:mt-5 leading-[24px] lg:leading-[26px] font-500 text-dark-40 block">{{ $address->phone }}</a>
                    <a href="{{ $address->mail }}" target="_blank"
                        class="text-[18px] font-justSans lg:text-[20px] mt-4 lg:mt-5 leading-[24px] lg:leading-[26px] font-500 text-dark-40 block">{{ $address->mail }}</a>
                @endforeach
            </div>
        </div>
    </section>



    <section class="contact-form container bg-gray-200 w-full ">
        <div class="container-2">
            <div class="flex  py-20 md:py-40 flex-col md:flex-row items-start">
                <div class="title-area w-full md:w-1/2 mb-10 md:mb-0">
                    <h1
                        class="text-dark-200  text-[30px] leading-7 lg:text-[40px] lg:max-w-2xl lg:leading-[40px] font-semibold">
                        {!! __('Contact Sub Title') !!}
                    </h1>
                    <p class="text-dark-30 text-[24px] leading-[30px] font-400 mt-5 lg:max-w-lg ">{!! __('Contact Sub Text') !!}
                    </p>
                </div>

                <form class="w-full md:w-1/2 space-y-6" action="{{ route('save-contact-form') }}" method="POST">

                    @method('POST')
                    @csrf
                    <!-- Adınız -->
                    <div class="relative">
                        <input type="text" id="ad" name="name"
                            class="form-input peer bg-transparent w-full border border-gray-300 rounded-md py-[10px] px-[16px] text-dark-300 text-[16px] font-normal leading-normal focus:outline-none focus:ring-2 focus:ring-blue-500 placeholder-transparent"
                            placeholder="Adınız" required/>
                        <label for="ad"
                            class="floating-label">
                            {!!__('Adınız*')!!}
                        </label>
                    </div>


                    <!-- E-Posta -->
                    <div class="relative">
                        <input type="email" id="email" name="email"
                            class="form-input peer bg-transparent w-full border border-gray-300 rounded-md py-[10px] px-[16px] text-dark-300 text-[16px] font-normal leading-normal focus:outline-none focus:ring-2 focus:ring-blue-500 placeholder-transparent"
                            placeholder="E-Posta" required/>
                        <label for="email"
                            class="floating-label">
                            {!!__('E-Posta*')!!}
                        </label>
                    </div>

                    <!-- Telefon -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div class="relative">
                            <input type="text" id="ulke-kodu" name="country_code"
                                class="form-input bg-transparent peer w-full border border-gray-300 rounded-md py-[10px] px-[16px] text-dark-300 text-[16px] font-normal leading-normal focus:outline-none focus:ring-2 focus:ring-blue-500 placeholder-transparent"
                                placeholder="Ülke Kodu" required/>
                            <label for="ulke-kodu"
                                class="floating-label">
                                {!!__('Ülke Kodu*')!!}
                            </label>
                        </div>
                        <div class="col-span-2 relative">
                            <input type="text" id="telefon-numarasi" name="phone_number"
                                class="form-input bg-transparent peer w-full border border-gray-300 rounded-md py-[10px] px-[16px] text-dark-300 text-[16px] font-normal leading-normal focus:outline-none focus:ring-2 focus:ring-blue-500 placeholder-transparent"
                                placeholder="Telefon Numarası" required/>
                            <label for="telefon-numarasi"
                                class="floating-label">
                                {!!__('Telefon Numarası*')!!}
                            </label>
                        </div>
                    </div>

                    <div class="mt-6 relative">
                        <textarea id="mesaj" rows="4" name="message"
                                  required
                            class="form-input peer bg-transparent w-full border border-gray-300 rounded-md py-[10px] px-[16px] text-dark-300 text-[16px] font-normal leading-normal focus:outline-none focus:ring-2 focus:ring-blue-500 placeholder-white-20"
                            placeholder="{!! __('Mesaj') !!}"></textarea>
                    </div>
                    
                    
                    <div class="mt-4 flex flex-col items-start gap-2">
                        <div class="flex items-center gap-2">
                            <input type="checkbox" id="onay"
                                   class="h-4 w-4 text-blue-500 border-gray-300 rounded focus:ring-2 focus:ring-blue-500"/>
                            <label for="onay"
                                   class="text-sm text-dark-500">{!! __('İletişim, kişisel verilerin saklanması ve işlenmesi onayı*') !!}</label>
                        </div>
                        <p class="text-sm text-dark-300 font-normal">
                            {!! __(
								'* Taşın Group A.Ş., Yetkili Satıcıları, Yetkili Servisleri, Volvo Kamyon Şirketleri tarafından, Elektronik Ticaretin Düzenlenmesi Hakkındaki Kanun ve 6698 sayılı Kişisel Verilerin Korunması Kanunu uyarınca, her türlü ticari elektronik ileti gönderilmek suretiyle, tüm iletişim araçları ile tarafınızla iletişime geçilmesine, bu amaçla paylaşmış olduğunuz bilgilerin Renault gizlilik politikası ile kişisel verilerin korunması ve saklanması yasal düzenlemelerine uygun olarak saklanmasına ve işlenmesine muvafakat edersiniz.',
							) !!}
                        </p>
                    </div>
                    
                    <x-turnstile/>

                    <!-- Gönder Butonu -->
                    <div class="flex justify-start">
                        <button type="submit"
                            class="flex items-center gap-2 bg-transparent border border-blue-500 text-blue-500 py-[12px] px-[20px] rounded-md hover:bg-blue-500 hover:text-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition">
                            {!!__('Gönder')!!} <img src="{{ Vite::asset('resources/images/icons/arrow_right.svg') }}" alt="">
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <section>
        <div class="container-fluid">
            <div class="max-w-[1920px] mx-auto h-[496px]" id="map" >
            </div>
        </div>
    </section>
@endsection
@section('scripts')
@endsection

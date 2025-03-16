@extends('layouts.app', ['headerClasses' => 'bg-transparent border-t border-t-[3px] border-yellow-500', 'menuClasses' => '!bg-gray-25'])

@section('meta')
@endsection
@section('content')
    <section class="hr-content overflow-hidden bg-dark-500 container w-full flex items-center lg:h-[500px]">
        <div class="flex flex-col lg:flex-row items-start container-2  lg:items-center w-full text-white lg:pt-0 pt-10 ">
            <div class="w-full mt-10 lg:mt-0 mb-6">
                <h2 class="text-[30px] lg:text-[40px] font-semibold leading-9 lg:leading-[64px] text-left">
                    {!! __('İnsan Kaynakları') !!}
                </h2>
                <p class="text-gray-30 text-[16px] leading-6 pt-6 md:max-w-xl">
                    {!! __('HR 1.2') !!}
                </p>
            </div>
            <div class="w-full h-full">
                <img src="{{ Vite::asset('resources/images/hr-image.jpeg') }}" alt=""
                    class="lg:absolute lg:h-[500px] top-0 right-0">
            </div>
        </div>
    </section>


    <section class=" container py-80 lg:py-120">
        <div class="w-full container-2">
            <h2
                class="text-dark-50 text-[20px]  md:text-[32px] lg:max-w-[50%] leading-5  md:leading-10 font-normal font-sans ">
                {!! __('Şirket kültürümüz, çalışanlarımızın yeteneklerini geliştirmek ve kariyer hedeflerine ulaşmalarını desteklemek üzerine kuruludur. <span class="text-blue-400 text-[20px] md:text-[32px] leading-5 md:leading-10 font-normal">Dinamik bir ekip içinde büyümek ve öğrenmek için birlikte çalışmaya davet ediyoruz. Sizi aramıza katılmaya bekliyoruz!</span>') !!}</h2>
            <p class=" text-dark-400 text-[16px] leading-6  pt-6 lg:pt-[50px]   lg:max-w-[50%] max-w-full">
                {!! __(
                    'İnsan Kaynakları Departmanı olarak, çalışanlarımızın gelişimini ön planda tutuyoruz. Yetenekli bireyleri keşfetmek, kariyer fırsatları sunmak ve takım ruhunu güçlendirmek için çeşitli eğitim ve gelişim programları düzenliyoruz. Bizimle birlikte büyümek ve başarılı bir kariyere adım atmak için fırsatlarınızı keşfedin.',
                ) !!}
            </p>
        </div>
    </section>

    <div class="border-t border-gray-50  lg:mx-80"></div>

    <section class="container  py-80 ">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 container-2">
            <div class="flex flex-col items-start text-start">
                <img src="{{ Vite::asset('resources/images/icons/why-choose-truck.svg') }}" class="w-[45px] h-[45px] "
                    alt="">
                <h3 class="py-[15px] text-dark-200 text-[24px] font-semibold leading-[24px]">{!! __('Kariyer Fırsatları') !!}
                </h3>
                <p class="text-gray-500 text-[16px] leading-[24px] lg:max-w-md max-w-full">
                    {!! __('Çalışanlarımıza kariyerlerinde ilerlemek için çeşitli pozisyonlar sunuyoruz ve büyümelerine destek
                                                                                oluyoruz.') !!}
                </p>
            </div>

            <div class="flex flex-col items-start text-start">
                <img src="{{ Vite::asset('resources/images/icons/security.svg') }}" class="w-[45px] h-[45px] "
                    alt="">

                <h3 class="py-[15px] text-dark-200 text-[24px] font-semibold leading-[24px]">{!! __('Takım Ruhu ve İşbirliği') !!}
                </h3>
                <p class="text-gray-500 text-[16px] leading-[24px] lg:max-w-md max-w-full">

                    {!! __(' Destekleyici bir çalışma ortamı oluşturarak, ekip üyeleri arasında güçlü bir işbirliği ve dayanışma
                                                                                sağlıyoruz.') !!}
                </p>
            </div>

            <div class="flex flex-col items-start text-start">
                <img src="{{ Vite::asset('resources/images/icons/why-choose-tool.svg') }}" class="w-[45px] h-[45px] "
                    alt="">

                <h3 class="py-[15px] text-dark-200 text-[24px] font-semibold leading-[24px]">{!! __('İş Ahlakı ve Değerler') !!}
                </h3>
                <p class="text-gray-500 text-[16px] leading-[24px] lg:max-w-md max-w-full">
                    {!! __('İş ahlakımız ve değerlerimiz doğrultusunda, tüm çalışanlarımızı eşit şekilde destekliyor ve başarılarını
                                                            kutluyoruz.') !!}
                </p>
            </div>
        </div>
    </section>

    <section class="w-full ">
        <img src="{{ Vite::asset('resources/images/hr-bottom-image.jpg') }}" class=" w-full" alt="">
    </section>

    <section class="hr-form  bg-gray-200 w-full ">
        <div class="container">
            <div class="flex container-2 py-20 md:py-40 flex-col md:flex-row items-start">
                <div class="title-area w-full md:w-1/2 mb-10 md:mb-0">
                    <h1
                        class="text-blue-500 text-[30px] leading-7 lg:text-[48px] lg:leading-[52px] font-semibold max-w-full lg:max-w-sm">
                        {!! __('Start your journey with Taşın today') !!}
                    </h1>
                </div>

                <form class="w-full md:w-1/2 space-y-6"  action="{{ route('save-hr-form') }}" method="POST">

                    @method('POST')
                    @csrf
                    <!-- Adınız -->
                    <div class="relative">
                        <input type="text" id="ad" name="name"
                            class="form-input peer bg-transparent w-full border border-gray-300 rounded-md py-[10px] px-[16px] text-dark-300 text-[16px] font-normal leading-normal focus:outline-none focus:ring-2 focus:ring-blue-500 placeholder-transparent"
                            placeholder="Adınız" />
                        <label for="ad"
                            class="floating-label">
                            {!! __('Adınız*') !!}
                        </label>
                    </div>

                    <!-- Soyadınız -->
                    <div class="relative">
                        <input type="text" id="soyad" name="surname"
                            class="form-input peer bg-transparent w-full border border-gray-300 rounded-md py-[10px] px-[16px] text-dark-300 text-[16px] font-normal leading-normal focus:outline-none focus:ring-2 focus:ring-blue-500 placeholder-transparent"
                            placeholder="Soyadınız" />
                        <label for="soyad"
                            class="floating-label">
                            {!! __('Soyadınız*') !!}
                        </label>
                    </div>

                    <!-- E-Posta -->
                    <div class="relative">
                        <input type="email" id="email" name="email"
                            class="form-input peer bg-transparent w-full border border-gray-300 rounded-md py-[10px] px-[16px] text-dark-300 text-[16px] font-normal leading-normal focus:outline-none focus:ring-2 focus:ring-blue-500 placeholder-transparent"
                            placeholder="E-Posta" />
                        <label for="email"
                            class="floating-label">
                            {!! __('E-Posta*') !!}
                        </label>
                    </div>

                    <!-- Telefon -->
                    <div class="grid grid-cols-3 md:grid-cols-3 gap-4">
                        <div class="relative">
                            <input type="text" id="ulke-kodu" name="country_code"
                                class="form-input peer bg-transparent w-full border border-gray-300 rounded-md py-[10px] px-[16px] text-dark-300 text-[16px] font-normal leading-normal focus:outline-none focus:ring-2 focus:ring-blue-500 placeholder-transparent"
                                placeholder="Ülke Kodu" />
                            <label for="ulke-kodu"
                                class="floating-label">
                                {!! __('Ülke Kodu*') !!}
                            </label>
                        </div>
                        <div class="col-span-2 relative">
                            <input type="text" id="telefon-numarasi" name="phone_number"
                                class="form-input peer bg-transparent w-full border border-gray-300 rounded-md py-[10px] px-[16px] text-dark-300 text-[16px] font-normal leading-normal focus:outline-none focus:ring-2 focus:ring-blue-500 placeholder-transparent"
                                placeholder="Telefon Numarası" />
                            <label for="telefon-numarasi"
                                class="floating-label">
                                {!! __('Telefon Numarası*') !!}
                            </label>
                        </div>
                    </div>
                    
                    <div class="mt-6 w-full">
                            <textarea id="mesaj" rows="4" name="message"
                                      class="form-input peer bg-transparent w-full border border-gray-300 rounded-md py-[10px] px-[16px] text-dark-300 text-[16px] font-normal leading-normal focus:outline-none focus:ring-2 focus:ring-blue-500 placeholder-white-20"
                                      placeholder="{!! __('Mesaj') !!}"></textarea>
                    </div>

                    <!-- Araç Modeli 
                    <div class="relative">
                        <select id="arac-modeli" name="vehicle_model"
                            class="bg-transparent w-full border border-gray-300 rounded-md py-[10px] px-[16px] text-dark-300 text-[16px] font-normal leading-normal focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option value="" disabled selected>{!! __('Araç Modeli*') !!}</option>
                            <option>{!! __('Model 1') !!}</option>
                            <option>{!! __('Model 2') !!}</option>
                        </select>
                    </div>-->

                    <!-- Yetkili Satış 
                    <div class="relative">
                        <select id="hizmet-noktasi" name="service_place"
                            class="w-full border border-gray-300 rounded-md py-[10px] px-[16px] text-dark-300 text-[16px] font-normal leading-normal bg-transparent focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option value="" disabled selected>{!! __('Yetkili Satış Hizmet Noktası*') !!}</option>
                            <option>{!! __('Nokta 1') !!}</option>
                            <option>{!! __('Nokta 2') !!}</option>
                        </select>
                    </div>-->

                    <!-- Gönder Butonu -->
                    <x-turnstile/>
                    <div class="flex justify-start">
                        <button type="submit"
                            class="flex items-center gap-2 bg-transparent border border-blue-400 text-blue-500 py-[12px] px-[20px] rounded-md hover:bg-blue-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition">
                            {!! __('Gönder*') !!} <img src="{{ Vite::asset('resources/images/icons/arrow_right.svg') }}"
                                alt="">
                        </button>
                    </div>
                </form>
            </div>
        </div>

    </section>
@endsection
@section('scripts')
@endsection

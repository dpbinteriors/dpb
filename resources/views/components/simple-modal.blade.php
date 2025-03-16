<!-- Modal toggle -->

<!-- Main modal -->
    <div id="generic-modal" tabindex="-1" aria-hidden="false"
         class=" overflow-y-auto overflow-x-hidden fixed left-0 top-0   z-50 justify-center items-center w-full md:inset-0  max-h-full h-full  bg-opacity-[50%] bg-black ">
        <div class="relative p-4 w-full max-w-2xl max-h-full absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow py-[36px]">
                <!-- Modal header -->
                <!-- Modal body -->
                <div class="p-4 space-y-4 text-center">
                    <h1 class="h2 text-blue-400">{!! __('İletişime Geçtiğiniz İçin Teşekkür Ederiz') !!}</h1>
                    <p>{!! __('En kısa sürede tarafınıza geri dönüş yapılacaktır') !!}</p>
                </div>
                <!-- Modal footer -->
                <div class="inline-flex justify-center w-full mt-[35px]">
                    <button class="btn button-secondary px-[24px] py-[14px]" onclick="document.getElementById('generic-modal').style.display = 'none'">{!! __('Siteye Devam Et') !!}</button>
                </div>
            </div>
        </div>
    </div>



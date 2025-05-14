<footer class="footer">
    <div class="container">
        <div class="row text-md-start text-center">
            <div class="col-md-3 mb-4 mb-md-0 text-center">
                <img src="{{Vite::asset('resources/images/footer-logo.svg')}}" alt="">
                <p class="footer-web text-lg-center text-start"><a href="https://www.dpbinteriors.com" target="_blank">www.dpbinteriors.com</a>
                </p>
                <p class="footer-text text-lg-center text-start">{!! __('DPB interiors is a branch of dPb Construction ltd.<br>-designed by dPb') !!}</p>
            </div>
            <div class="col-md-4 text-start ps-lg-3  footer-texts">
                <h5 >Location</h5>
                @foreach($addresses as $index => $address)
                <a style="font-size: 22px; margin-bottom: 20px; display: block;" href="{{$address?->url}}">{{$address?->address}}</a>
                @endforeach
            </div>
            <div class="col-md-5 text-start ps-lg-5 footer-links">
                <h5 >Contact</h5>
                @foreach($addresses as $index => $address)
                    <div class="infos-area d-flex gap-2 ">
                        <a class="d-block mb-3" href="mailto:{{$address?->mail}}">{{$address?->mail}} </a>
                        <a class="d-block mb-3" href="tel:{{$address?->phone}}">{{$address?->phone}} </a>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
</footer>

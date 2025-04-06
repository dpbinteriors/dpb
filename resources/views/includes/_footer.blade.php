<footer class="footer">
    <div class="container">
        <div class="row text-md-start text-center">
            <div class="col-md-4 mb-4 mb-md-0 text-center">
                <img src="{{Vite::asset('resources/images/footer-logo.svg')}}" alt="">
                <p class="footer-web text-lg-center text-start"><a href="https://www.dpbinteriors.com" target="_blank">www.dpbinteriors.com</a>
                </p>
                <p class="footer-text text-lg-center text-start">{!! __('DPB interiors is a branch of dPb Construction ltd.<br>-designed by dPb') !!}</p>
            </div>
            <div class="col-md-4 text-start ps-lg-3  footer-texts">
                <h5 >Location</h5>
                <a style="font-size: 22px;" href="{{$featuredAddress?->url}}">{{$featuredAddress?->address}}</a>
            </div>
            <div class="col-md-4 text-start ps-lg-5 footer-links">
                <h5 >Contact</h5>
                <p><a href="mailto:{{$featuredAddress?->mail}}">{{$featuredAddress?->mail}}</a></p>
            </div>
        </div>
    </div>
</footer>

<div class="header-container">
    <div class="container-fluid px-lg-0 px-xl-5 px-md-6">
        <div class="row align-items-end">
            <!-- Left side - Residential/Commercial text -->
            <div class="col-lg-4 col-md-12 d-flex align-items-end ps-lg-0 ps-xl-5 mb-3 mb-lg-0">
                <!-- Added margin bottom for mobile -->
                <div class="title-container">
                    <div class="residential">
                        <a href="{{ route('residential') }}" class="fw-normal"
                           @if(request()->is('residential')) style="color: #FB8925;" @else style="color: #111111; opacity: .2" @endif>
                            RESIDENTIAL
                        </a>
                    </div>

                    <div class="commercial">
                        <a href="{{ route('commercial') }}" class="fw-normal"
                           @if(request()->is('commercial')) style="color: #025949; opacity: 1" @else style="color: #111111;" @endif>
                            COMMERCIAL
                        </a>
                    </div>

                </div>
            </div>

            <!-- Center - Logo -->
            <div class="col-lg-4 col-md-12 logo-container mb-3 mb-lg-0"> <!-- Added margin bottom for mobile -->
                <img src="{{Vite::asset('resources/images/logo.svg')}}" alt="APB Interiors Logo" class="logo">
                <button class="hamburger-toggle d-lg-none" id="hamburgerToggle">
                    <i class="bi bi-list"></i>
                </button>
            </div>

            <!-- Hamburger menu button -->


            <!-- Mobile menu overlay -->
            <div class="menu-overlay" id="menuOverlay"></div>

            <!-- Right side - Navigation menu -->
            <div class="col-lg-4 col-md-12 d-flex align-items-end">
                <div class="nav-menu" id="navMenu">
                    <div class="nav-wrapper"> <!-- Added wrapper for better control -->
                        <a href="{{route('works-index')}}" class="nav-item">Works</a>
                        <a href="{{route('blog')}}" class="nav-item">Blog</a>
                        <a href="#" class="nav-item">About</a>
                        <a href="#" class="nav-item">Contact us</a>
                        <a href="#" class="nav-item">Careers</a>
                        <a href="#" class="nav-item"><i class="bi bi-instagram"></i></a>
                        <a href="#" class="nav-item"><i class="bi bi-youtube"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

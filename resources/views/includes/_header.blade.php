<div class="header-container">
    <div class="container-fluid px-lg-0 px-xl-5 px-md-6">
        <div class="row align-items-end">
            <!-- Left side - Residential/Commercial text -->
            <div class="col-lg-4 col-md-12 d-flex align-items-end ps-lg-0 ps-xl-5 mb-3 mb-lg-0">
                <!-- Added margin bottom for mobile -->
                <div class="title-container">
                    <div class="residential">
                        <a href="{{ route('residential') }}" class="fw-normal"
                           @if(request()->is('residential')) style="color: #FB8925;  opacity: 1;"
                           @else style="color: #FB8925; opacity: .2" @endif>
                            RESIDENTIAL
                        </a>
                    </div>

                    <div class="commercial">
                        <a href="{{ route('commercial') }}" class="fw-normal"
                           @if(request()->is('commercial')) style="color: #025949; opacity: 1"
                           @else style="color: #025949;" @endif>
                            COMMERCIAL
                        </a>
                    </div>

                </div>
            </div>

            <!-- Center - Logo -->
            <div class="col-lg-4 col-md-12 logo-container mb-3 mb-lg-0">
                <!-- Added margin bottom for mobile -->
                <a href="{{route('home')}}"> <img src="{{Vite::asset('resources/images/logo.svg')}}" alt="APB Interiors Logo"
                                 class="logo">
                </a>
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
                        <a class="hidden-desktop" href="{{route('home')}}"> <img src="{{Vite::asset('resources/images/logo.svg')}}" alt="APB Interiors Logo"
                                                          class="logo">
                        </a>
                        <a href="{{route('residential')}}" class="hidden-desktop nav-item mt-5 pt-2">Residential</a>
                        <a href="{{route('commercial')}}" class=" hidden-desktop nav-item">Commercial</a>
                        <a href="{{route('works-index')}}" class="nav-item">Works</a>
                        <a href="{{route('blog')}}" class="nav-item">Blog</a>
                        <a href="{{route('about-us')}}" class="nav-item">About</a>
                        <a href="{{route('contact')}}" class="nav-item">Contact us</a>
                        <a href="{{route('human-resources')}}" class="nav-item">Careers</a>
                        @foreach ($socialMediaLinks as $socialMediaLink)
                            <a href="{{ $socialMediaLink->url }}" target="_blank" class="nav-item mb-1" title="{{ $socialMediaLink->title }}">
                                <img style="height: 20px; object-fit: cover" src="{{ asset('uploads/' . $socialMediaLink->image_path) }}"
                                     alt="{{ $socialMediaLink->title }}">
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const hamburgerToggle = document.getElementById('hamburgerToggle');
        const navMenu = document.getElementById('navMenu');
        const menuOverlay = document.getElementById('menuOverlay');

        hamburgerToggle.addEventListener('click', function () {
            navMenu.classList.toggle('show');
            menuOverlay.classList.toggle('show');

            // Change hamburger icon
            const icon = hamburgerToggle.querySelector('i');
            if (icon.classList.contains('bi-list')) {
                icon.classList.remove('bi-list');
                icon.classList.add('bi-x-lg');
            } else {
                icon.classList.remove('bi-x-lg');
                icon.classList.add('bi-list');
            }
        });

        // Close menu when clicking outside
        menuOverlay.addEventListener('click', function () {
            navMenu.classList.remove('show');
            menuOverlay.classList.remove('show');
            const icon = hamburgerToggle.querySelector('i');
            icon.classList.remove('bi-x-lg');
            icon.classList.add('bi-list');
        });
    });
</script>


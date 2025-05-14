import "./bootstrap";

import {Loader} from "@googlemaps/js-api-loader";

// Plugins

import Swiper from "swiper/bundle";
import "swiper/css";

import.meta.glob(["../images/**", "../fonts/**"]);

const init = () => {
    const homeSwiper = new Swiper(".home-slider-image", {
        loop: true,
        lazy: true,
        navigation: {
            nextEl: "#home-slider-arrow-right",
            prevEl: "#home-slider-arrow-left",
        },
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
            renderBullet: function (index, className) {
                return `<div class="w-[7px] h-[7px] opacity-50 bg-gray-400 rounded-full home-slide-paginate ${className}"></div>`;
            },
        },
    });

    const aboutSwiper = new Swiper("#environment-policy-slider", {
        loop: true,
        effect: "coverflow",
        slidesPerView: 3,
    });

    // Check is there any element with id name map
    if (document.querySelector("#map")) {
        initMap();
    }


    const swiper = new Swiper('.main-slider', {
        // Enable loop mode
        loop: true,

        // Auto play settings
        autoplay: {
            delay: 5000,
            disableOnInteraction: false,
        },

        // Smooth transition effect
        effect: 'fade',
        fadeEffect: {
            crossFade: true
        },

        // Navigation arrows
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },

        // Pagination
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },

        // Responsive breakpoints
        breakpoints: {
            // Mobile
            320: {
                // Settings for mobile
            },
            // Tablet
            768: {
                // Settings for tablet
            },
            // Desktop
            1024: {
                // Settings for desktop
            },
        }
    });


};

function initMap() {
    const loader = new Loader({
        apiKey: "AIzaSyAq8oDSUHzkAbx7JT9nY6hQ8wiPrbjvc4M",
        version: "weekly",
    });


    loader.load().then(async () => {
        const {Map} = await google.maps.importLibrary("maps");
        const {AdvancedMarkerElement} = await google.maps.importLibrary(
            "marker"
        );

        const position = {lat: 40.7818229, lng: 29.9752745};
        const map = new Map(document.getElementById("map"), {
            center: position,
            mapId: "DEMO_MAP_ID",
            zoom: 10,
        });

        const customMarker = document.createElement("img");

        customMarker.src = "/map_marker_icon.svg";

        const marker = new AdvancedMarkerElement({
            map: map,
            position: position,
            content: customMarker,
            title: "Uluru",
        });
    });
}

init();

// listen body scroll event
//document.addEventListener('scroll', function (e) {
//  let header = document.querySelector('.header-inline');
//if (window.scrollY > 0) {
//  header.classList.add('!top-0');
//} else {
//  header.classList.remove('!top-0');
// }
//});

const FORM_ID = {
    SERVIS: 1,
    YEDEK: 2,
};

const formId = {
    [FORM_ID.SERVIS]: "servis-form",
    [FORM_ID.YEDEK]: "yedek-form",
};

window.toggleActiveForm = (formId) => {
    // Formlar
    const $serviceForm = document.getElementById('servis-form');
    const $yedekForm = document.getElementById('yedek-form');

    // Başlıklar
    const $serviceTitle = document.getElementById('title-servis');
    const $yedekTitle = document.getElementById('title-yedek');

    // Butonlar
    const $serviceButton = document.getElementById('btn-servis');
    const $yedekButton = document.getElementById('btn-yedek');

    if (formId === 'servis-form') {
        // Form ve başlık görünürlüğü
        $serviceForm.classList.remove("hidden");
        $yedekForm.classList.add("hidden");

        $serviceTitle.classList.remove("hidden");
        $yedekTitle.classList.add("hidden");

        // Buton sınıfları
        $serviceButton.classList.add("border-blue-500", "text-blue-500");
        $serviceButton.classList.remove("text-dark-500");

        $yedekButton.classList.remove("border-blue-500", "text-blue-500");
        $yedekButton.classList.add("text-dark-500");
    } else if (formId === 'yedek-form') {
        // Form ve başlık görünürlüğü
        $serviceForm.classList.add("hidden");
        $yedekForm.classList.remove("hidden");

        $serviceTitle.classList.add("hidden");
        $yedekTitle.classList.remove("hidden");

        // Buton sınıfları
        $yedekButton.classList.add("border-blue-500", "text-blue-500");
        $yedekButton.classList.remove("text-dark-500");

        $serviceButton.classList.remove("border-blue-500", "text-blue-500");
        $serviceButton.classList.add("text-dark-500");
    }
};

window.scrollIntoForm = (formId) => {
    const $form = document.getElementById(formId);
    $form.scrollIntoView({
        behavior: "smooth",
    });
};

const checkUrl = (url) => {
    if (url.includes("servis-form")) {
        toggleActiveForm("servis-form");
        scrollIntoForm("servis-form");
    } else if (url.includes("yedek-form")) {
        toggleActiveForm("yedek-form");
        scrollIntoForm("yedek-form");
    }
};

checkUrl(window.location.href);

window.navigation.addEventListener("navigate", (event) => {
    const url = event.destination.url;
    checkUrl(url);
});

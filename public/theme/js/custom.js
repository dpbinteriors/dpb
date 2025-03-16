import './bootstrap';
import 'alpinejs';
import Swup from 'swup';
import SwupProgressPlugin from "@swup/progress-plugin";
import SwupPreloadPlugin from "@swup/preload-plugin";
import SwupScriptsPlugin from '@swup/scripts-plugin';
import {Loader} from "@googlemaps/js-api-loader"


// Plugins



import Swiper from 'swiper/bundle';
import 'swiper/css';


import.meta.glob([
    '../images/**',
    '../fonts/**',
]);

let contactTurnstileId = null;
let newsletterTurnstileId = null;

window.swup = new Swup({
    plugins: [
        new SwupScriptsPlugin(),
        new SwupPreloadPlugin(
            {preloadVisibleLinks: true}
        ), new SwupProgressPlugin()
    ]
});

const init = () => {

    if (document.querySelector('.home-slider-image')) {
        const homeSwiper = new Swiper('.home-slider-image', {
            loop: true,
            autoplay: {
                delay: 5500,
                disableOnInteraction: false,
            },
            navigation: {
                nextEl: "#home-slider-arrow-right",
                prevEl: "#home-slider-arrow-left",
            },
        });

        homeSwiper.on('slideChange', function (e) {
            //hide home-slide-text class
            let slideText = document.querySelectorAll('.home-slide-text');
            slideText.forEach((el) => {
                el.classList.add('hidden');
            });

            //get index from event
            let index = e.realIndex;
            //show home-slide-text class with fade in
            slideText[index].classList.remove('hidden');
            slideText[index].classList.add('animate-fade-in');
        });
    }


    if (document.querySelector('#environment-policy-slider')){
        const aboutSwiper = new Swiper('#environment-policy-slider', {
            loop: true,
            // margin
            spaceBetween: 30,
            slidesPerView: 2,

        });
    }

    // Check is there any element with id name map
    if (document.querySelector('#map'))
    {
        initMap();
    }
}

const mapLoader = new Loader({
    apiKey: "AIzaSyAq8oDSUHzkAbx7JT9nY6hQ8wiPrbjvc4M",
    version: "weekly",
});



function initMap() {

    mapLoader.load().then(async () => {
        const {Map} = await google.maps.importLibrary("maps");
        const {AdvancedMarkerElement} = await google.maps.importLibrary("marker");

        const position = {lat: 40.735171, lng: 29.986005};

        // const map = new Map(document.getElementById("map"), {
        //     center: position,
        //     mapId: "DEMO_MAP_ID",
        //     zoom: 13,
        // });

        const map = new google.maps.Map(document.getElementById("map"), {
            zoom: 13,
            center: position,
            styles: styles.silver,
        });


        const image = "/map_marker_icon.svg";


        const beachMarker = new google.maps.Marker({
            position: position,
            map,
            icon: image,
        });

        // const customMarker = document.createElement("img");
        //
        // customMarker.src = '/map_marker_icon.svg';
        //
        // const marker = new AdvancedMarkerElement({
        //     map: map,
        //     position: position,
        //     content: customMarker,
        //     title: "Uluru",
        // });
    });
}

// Run after every additional navigation by swup
swup.hooks.on('page:view', () => {
    init();
});


let turnstileWidgetIds = [];

function initTurnstile(containerIds) {
    turnstileWidgetIds = [];
    containerIds.map((containerId) => {
        if (document.querySelector(containerId)) {
            const widgetId = turnstile.render(containerId, {
                sitekey: window.turnstileSiteKey,
                callback: function (token) {
                    // console.log(`Challenge Success ${token}`);
                },
            });
            turnstileWidgetIds.push(widgetId);
        }
    });
}

const styles = {
    default: [],
    silver: [
        {
            elementType: "geometry",
            stylers: [{color: "#f5f5f5"}],
        },
        {
            elementType: "labels.icon",
            stylers: [{visibility: "off"}],
        },
        {
            elementType: "labels.text.fill",
            stylers: [{color: "#616161"}],
        },
        {
            elementType: "labels.text.stroke",
            stylers: [{color: "#f5f5f5"}],
        },
        {
            featureType: "administrative.land_parcel",
            elementType: "labels.text.fill",
            stylers: [{color: "#bdbdbd"}],
        },
        {
            featureType: "poi",
            elementType: "geometry",
            stylers: [{color: "#eeeeee"}],
        },
        {
            featureType: "poi",
            elementType: "labels.text.fill",
            stylers: [{color: "#757575"}],
        },
        {
            featureType: "poi.park",
            elementType: "geometry",
            stylers: [{color: "#e5e5e5"}],
        },
        {
            featureType: "poi.park",
            elementType: "labels.text.fill",
            stylers: [{color: "#9e9e9e"}],
        },
        {
            featureType: "road",
            elementType: "geometry",
            stylers: [{color: "#ffffff"}],
        },
        {
            featureType: "road.arterial",
            elementType: "labels.text.fill",
            stylers: [{color: "#757575"}],
        },
        {
            featureType: "road.highway",
            elementType: "geometry",
            stylers: [{color: "#dadada"}],
        },
        {
            featureType: "road.highway",
            elementType: "labels.text.fill",
            stylers: [{color: "#616161"}],
        },
        {
            featureType: "road.local",
            elementType: "labels.text.fill",
            stylers: [{color: "#9e9e9e"}],
        },
        {
            featureType: "transit.line",
            elementType: "geometry",
            stylers: [{color: "#e5e5e5"}],
        },
        {
            featureType: "transit.station",
            elementType: "geometry",
            stylers: [{color: "#eeeeee"}],
        },
        {
            featureType: "water",
            elementType: "geometry",
            stylers: [{color: "#c9c9c9"}],
        },
        {
            featureType: "water",
            elementType: "labels.text.fill",
            stylers: [{color: "#9e9e9e"}],
        },
    ],
    night: [
        {elementType: "geometry", stylers: [{color: "#242f3e"}]},
        {elementType: "labels.text.stroke", stylers: [{color: "#242f3e"}]},
        {elementType: "labels.text.fill", stylers: [{color: "#746855"}]},
        {
            featureType: "administrative.locality",
            elementType: "labels.text.fill",
            stylers: [{color: "#d59563"}],
        },
        {
            featureType: "poi",
            elementType: "labels.text.fill",
            stylers: [{color: "#d59563"}],
        },
        {
            featureType: "poi.park",
            elementType: "geometry",
            stylers: [{color: "#263c3f"}],
        },
        {
            featureType: "poi.park",
            elementType: "labels.text.fill",
            stylers: [{color: "#6b9a76"}],
        },
        {
            featureType: "road",
            elementType: "geometry",
            stylers: [{color: "#38414e"}],
        },
        {
            featureType: "road",
            elementType: "geometry.stroke",
            stylers: [{color: "#212a37"}],
        },
        {
            featureType: "road",
            elementType: "labels.text.fill",
            stylers: [{color: "#9ca5b3"}],
        },
        {
            featureType: "road.highway",
            elementType: "geometry",
            stylers: [{color: "#746855"}],
        },
        {
            featureType: "road.highway",
            elementType: "geometry.stroke",
            stylers: [{color: "#1f2835"}],
        },
        {
            featureType: "road.highway",
            elementType: "labels.text.fill",
            stylers: [{color: "#f3d19c"}],
        },
        {
            featureType: "transit",
            elementType: "geometry",
            stylers: [{color: "#2f3948"}],
        },
        {
            featureType: "transit.station",
            elementType: "labels.text.fill",
            stylers: [{color: "#d59563"}],
        },
        {
            featureType: "water",
            elementType: "geometry",
            stylers: [{color: "#17263c"}],
        },
        {
            featureType: "water",
            elementType: "labels.text.fill",
            stylers: [{color: "#515c6d"}],
        },
        {
            featureType: "water",
            elementType: "labels.text.stroke",
            stylers: [{color: "#17263c"}],
        },
    ],
    retro: [
        {elementType: "geometry", stylers: [{color: "#ebe3cd"}]},
        {elementType: "labels.text.fill", stylers: [{color: "#523735"}]},
        {elementType: "labels.text.stroke", stylers: [{color: "#f5f1e6"}]},
        {
            featureType: "administrative",
            elementType: "geometry.stroke",
            stylers: [{color: "#c9b2a6"}],
        },
        {
            featureType: "administrative.land_parcel",
            elementType: "geometry.stroke",
            stylers: [{color: "#dcd2be"}],
        },
        {
            featureType: "administrative.land_parcel",
            elementType: "labels.text.fill",
            stylers: [{color: "#ae9e90"}],
        },
        {
            featureType: "landscape.natural",
            elementType: "geometry",
            stylers: [{color: "#dfd2ae"}],
        },
        {
            featureType: "poi",
            elementType: "geometry",
            stylers: [{color: "#dfd2ae"}],
        },
        {
            featureType: "poi",
            elementType: "labels.text.fill",
            stylers: [{color: "#93817c"}],
        },
        {
            featureType: "poi.park",
            elementType: "geometry.fill",
            stylers: [{color: "#a5b076"}],
        },
        {
            featureType: "poi.park",
            elementType: "labels.text.fill",
            stylers: [{color: "#447530"}],
        },
        {
            featureType: "road",
            elementType: "geometry",
            stylers: [{color: "#f5f1e6"}],
        },
        {
            featureType: "road.arterial",
            elementType: "geometry",
            stylers: [{color: "#fdfcf8"}],
        },
        {
            featureType: "road.highway",
            elementType: "geometry",
            stylers: [{color: "#f8c967"}],
        },
        {
            featureType: "road.highway",
            elementType: "geometry.stroke",
            stylers: [{color: "#e9bc62"}],
        },
        {
            featureType: "road.highway.controlled_access",
            elementType: "geometry",
            stylers: [{color: "#e98d58"}],
        },
        {
            featureType: "road.highway.controlled_access",
            elementType: "geometry.stroke",
            stylers: [{color: "#db8555"}],
        },
        {
            featureType: "road.local",
            elementType: "labels.text.fill",
            stylers: [{color: "#806b63"}],
        },
        {
            featureType: "transit.line",
            elementType: "geometry",
            stylers: [{color: "#dfd2ae"}],
        },
        {
            featureType: "transit.line",
            elementType: "labels.text.fill",
            stylers: [{color: "#8f7d77"}],
        },
        {
            featureType: "transit.line",
            elementType: "labels.text.stroke",
            stylers: [{color: "#ebe3cd"}],
        },
        {
            featureType: "transit.station",
            elementType: "geometry",
            stylers: [{color: "#dfd2ae"}],
        },
        {
            featureType: "water",
            elementType: "geometry.fill",
            stylers: [{color: "#b9d3c2"}],
        },
        {
            featureType: "water",
            elementType: "labels.text.fill",
            stylers: [{color: "#92998d"}],
        },
    ],
    hiding: [
        {
            featureType: "poi.business",
            stylers: [{visibility: "off"}],
        },
        {
            featureType: "transit",
            elementType: "labels.icon",
            stylers: [{visibility: "off"}],
        },
    ],
};

window.onloadTurnstileCallback = function () {
    initTurnstile(['#turnstile-container', '#turnstile-container-newsletter']);
};

init();
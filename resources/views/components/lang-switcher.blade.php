@props(['classes' => null])
@foreach(LocaleConfig::getLocales() as $locale)
    @if ( ! App::isLocale($locale))
        @isset($langRedirectionRoute)
            <a href="{{$langRedirectionRoute}}" class="{{$classes}}" data-no-swup>
                {{ strtoupper($locale) }}
            </a>
        @else
            <a href="{{Route::localizedUrl($locale)}}" class="{{$classes}}" data-no-swup>
                {{ strtoupper($locale) }}
            </a>
        @endisset

    @endif
@endforeach

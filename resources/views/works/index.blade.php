@extends('layouts.app', ['headerClasses' => '', 'menuClasses' => '', 'isMobile' => true])

@section('meta')
    <title>{{__('WORKS_PAGE_META_TITLE')}}</title>
    <meta name="description"
          content="{{__('WORKS_PAGE_META_DESCRIPTION')}}">
    <meta name="keywords"
          content="{{__('Key, Words')}}">
    <link rel="canonical" href="{{ url()->current() }}">

    <meta property="og:title" content="{{__('WORKS_PAGE_META_TITLE')}}">
    <meta property="og:description" content="{{__('WORKS_PAGE_META_DESCRIPTION')}}">
    <meta property="og:url" content="{{url()->current()}}">
    <meta property="og:type" content="website">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{__('WORKS_PAGE_META_TITLE')}}">
    <meta name="twitter:description" content="{{__('WORKS_PAGE_META_DESCRIPTION')}}">
    <meta name="twitter:image" content="{{Vite::asset('resources/images/og.png')}}">
    <style>
        .card-img-top {
            height: 270px;
            object-fit: cover;
        }

        .card {
            border: none !important;

        }

        .category {
            color: #ccc;
            font-size: 14px;
            font-weight: bold;
            text-transform: uppercase;
        }

        .card-title {
            font-size: 20px;
            font-weight: bold;
            color: #222;
            padding-top: 0px !important;
        }

        .card-text {
            font-size: 14px;
            color: #666;
        }

        .card-footer {
            display: flex;
            justify-content: space-between;
            font-size: 14px;
            font-weight: bold;
            background:unset !important;
        }

        .style {
            color: #FB8925;
        }

        .type {
            color: #222;
        }

        .card-footer {
            background-color: unset;
        }
    </style>
@endsection

@section('content')

    <div>
        <livewire:works-filter :works-categories="$worksCategories" />

    </div>
@endsection

@section('scripts')
@endsection

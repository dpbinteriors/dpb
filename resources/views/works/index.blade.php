@extends('layouts.app', ['headerClasses' => '', 'menuClasses' => '', 'isMobile' => true])

@section('meta')
    <style>
        .card-img-top {
            height: 270px;
            object-fit: cover;
        }

        .card {
            border: none !important;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
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
        }

        .style {
            color: #E57373;
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

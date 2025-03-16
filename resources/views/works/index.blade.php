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
    .card-footer{
        background-color: unset;
    }
</style>
@endsection

@section('content')



    <section class="gap">
        <div class="container">
            <div class="container-2">
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                    
                    <div class="col-md-4">
                        <a href="">
                            <div class="card h-100">
                                <img src="{{Vite::asset('resources/images/works-1.jpg')}}" class="card-img-top"
                                     alt="Interior">
                                <div class="card-body">
                                    <p class="category">Residential</p>
                                    <h5 class="card-title">Pindock Mews Interior Design</h5>
                                    <p class="card-text">3 floored apartment in hearth of London.<br>
                                        We highlighted the brick walls and give it the warmth of wood.</p>
                                </div>
                                <div class="card-footer">
                                    <span class="style">Industrial</span>
                                    <span class="type">Interior</span>
                                </div>
                            </div>
                        </a>
                    </div>
                    
                </div>

            </div>
        </div>
    </section>
@endsection

@section('scripts')
@endsection

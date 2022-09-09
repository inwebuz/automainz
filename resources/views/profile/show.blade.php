@extends('layouts.app')
@section('seo_title', __('main.profile'))
@section('page_class', 'page--profile')

@section('content')

@include('partials.alerts')

<section class="profile">

    @include('partials.sidebar_profile')

    <main class="field">
        <h2 class="field__welcome">
            {{ __('Welcome back') }}, <br />
            <b>{{ $user->name }}</b>
        </h2>

        <h1 class="field__title">{{ __('Profile') }}</h1>

        <div class="recommend recommend--profile">
            <h2 class="recommend__head">{{ __('Recomended for you') }}</h2>
            <div class="recommend__slider">
                <div class="swiper recommend-swiper">
                    <div class="swiper-wrapper">
                        @foreach ($latestCars as $car)
                        <div class="swiper-slide">
                            @include('partials.car_one')
                        </div>
                        @endforeach
                    </div>
                    <div class="arrows prev">
                        <div class="arrow swiper-button-prev">
                            <svg>
                                <use xlink:href="#icon-arrow-right"></use>
                            </svg>
                        </div>
                    </div>
                    <div class="arrows next">
                        <div class="arrow swiper-button-next">
                            <svg>
                                <use xlink:href="#icon-arrow-right"></use>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="recommend recommend--profile">
            <h2 class="recommend__head">{{ __('Cars with less than 60,000 miles') }}</h2>
            <div class="recommend__slider">
                <div class="swiper recommend-swiper">
                    <div class="swiper-wrapper">
                        @foreach ($littleMileageCars as $car)
                        <div class="swiper-slide">
                            @include('partials.car_one')
                        </div>
                        @endforeach
                    </div>
                    <div class="arrows prev">
                        <div class="arrow swiper-button-prev">
                            <svg>
                                <use xlink:href="#icon-arrow-right"></use>
                            </svg>
                        </div>
                    </div>
                    <div class="arrows next">
                        <div class="arrow swiper-button-next">
                            <svg>
                                <use xlink:href="#icon-arrow-right"></use>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="recommend recommend--profile">
            <h2 class="recommend__head">{{ __('Cars around $20,000') }}</h2>
            <div class="recommend__slider">
                <div class="swiper recommend-swiper">
                    <div class="swiper-wrapper">
                        @foreach ($notExpensiveCars as $car)
                        <div class="swiper-slide">
                            @include('partials.car_one')
                        </div>
                        @endforeach
                    </div>
                    <div class="arrows prev">
                        <div class="arrow swiper-button-prev">
                            <svg>
                                <use xlink:href="#icon-arrow-right"></use>
                            </svg>
                        </div>
                    </div>
                    <div class="arrows next">
                        <div class="arrow swiper-button-next">
                            <svg>
                                <use xlink:href="#icon-arrow-right"></use>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</section>

@endsection

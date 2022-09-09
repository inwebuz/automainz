@extends('layouts.app')

@section('seo_title', $page->getTranslatedAttribute('seo_title') ?: $page->getTranslatedAttribute('name'))
@section('meta_description', $page->getTranslatedAttribute('meta_description'))
@section('meta_keywords', $page->getTranslatedAttribute('meta_keywords'))

@php
    $phone = Helper::setting('contact.phone');
    $phone2 = Helper::setting('contact.phone2');
    $email = Helper::setting('contact.email');
@endphp

@section('content')

<section class="hero" style="background-image: url({{ asset('img/hero.jpg') }})">
    <div class="container">
        <div class="hero__in">
            <div class="action">
                <h2 class="action__title">{{ __('Get a real offer in minutes') }}</h2>
                <p class="action__text">
                    {{ __('Most cars qualify; some we\'ll ask to see in person.') }}
                </p>
                <ul class="action__switch tab">
                    <li class="btn btn--outlined btn--block" data-tab="license">{{ __('LISENCE PLATE') }}</li>
                    <li class="btn btn--outlined btn--block" data-tab="vin">{{ __('VIN') }}</li>
                </ul>
                <form action="{{ route('sell-trade') }}" method="POST" class="sell-trade-form action__form form" id="tab-license">
                    @csrf
                    <div class="form-result"></div>
                    <div class="input__box input__box--100">
                        <input type="text" name="licence_plate_number" class="input" required />
                        <p class="input__placeholder">{{ __('License plate number') }}</p>
                    </div>
                    <div class="input__box input__box--100">
                        <input type="text" name="car_registered_place" class="input" required />
                        <p class="input__placeholder">{{ __('Where’s your car registered?') }}</p>
                    </div>
                    <div class="input__box input__box--100">
                        <input type="text" name="zip_code" class="input" required />
                        <p class="input__placeholder">{{ __('What’s your zip code?') }}</p>
                    </div>
                    <button type="submit" class="btn btn--main btn--block" disabled>
                        {{ __('Get started') }}
                    </button>
                </form>
                <form action="{{ route('sell-trade') }}" class="sell-trade-form action__form form" id="tab-vin">
                    @csrf
                    <div class="form-result"></div>
                    <div class="input__box input__box--100">
                        <input type="text"  name="vin"class="input" required />
                        <p class="input__placeholder">{{ __('VIN') }}</p>
                    </div>
                    <div class="input__box input__box--100">
                        <input type="text" name="zip_code" class="input" placeholder="" required />
                        <p class="input__placeholder">{{ __('What’s your zip code?') }}</p>
                    </div>
                    <button type="submit" class="btn btn--main btn--block" disabled>
                        {{ __('Get started') }}
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>

<div class="container">
    <!-- how -->
    <section class="section how">
        <h2 class="how__title">{{ __('HOW IT WORKS') }}</h2>
        <div class="how__in">
            <div class="how__col">
                <div class="how__item">
                    <img src="/img/icons/how.svg" alt="" />
                    <h3>{{ __('Get your offer') }}</h3>
                    <span>{{ __('It takes 2 minutes') }}.</span>
                </div>
            </div>
            <div class="how__col">
                <div class="how__item">
                    <img src="/img/icons/how.svg" alt="" />
                    <h3>{{ __('Make an appointment') }}</h3>
                    <span>{{ __('Redeem it or compare your options for 7 days') }}.</span>
                </div>
            </div>
            <div class="how__col">
                <div class="how__item">
                    <img src="/img/icons/how.svg" alt="" />
                    <h3>{{ __('Come get paid') }}</h3>
                    <span>{{ __('We\'ll verify your offer and pay you on the spot') }}.</span>
                </div>
            </div>
        </div>
        {{-- <a href="#" class="btn btn--main" data-btn="more">{{ __('Learn more') }}</a> --}}
    </section>

</div>

@endsection

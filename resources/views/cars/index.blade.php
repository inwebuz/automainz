@extends('layouts.app')

@section('seo_title', $page->getTranslatedAttribute('seo_title') ?: $page->getTranslatedAttribute('name'))
@section('meta_description', $page->getTranslatedAttribute('meta_description'))
@section('meta_keywords', $page->getTranslatedAttribute('meta_keywords'))
@section('body_class', 'cars-page')

@section('content')


    <section class="catalog">
        <div class="container">
            <div class="catalog__in">
                <aside class="aside">
                    <button class="filter__btn">
                        <svg>
                            <use xlink:href="#icon-settings"></use>
                        </svg>
                        <span>{{ __('Filters') }}</span>
                    </button>
                    <div class="filter">
                        <form action="{{ route('cars.index') }}">
                            @foreach ($specificationTypes as $specificationType)
                                <div class="filter__col active">
                                    <div class="filter__head drawer-btn">
                                        <span>{{ $specificationType->getTranslatedAttribute('name') }}</span>
                                        <i class="bx bx-chevron-down"></i>
                                    </div>
                                    <div class="filter__body">
                                        <div class="filter__in">
                                            {{-- <div class="input__box input__box-100">
                                        <input type="text" class="input" placeholder="Find type" />
                                        <button class="input__btn">
                                            <i class="bx bx-search"></i>
                                        </button>
                                    </div> --}}
                                            <ul class="filter__list">
                                                @foreach ($specificationType->specifications as $specification)
                                                    <li class="filter__check">
                                                        <input type="checkbox" id="specification->{{ $specification->id }}" class="checkbox"
                                                            name="specifications[{{ $specificationType->id }}][{{ $specification->id }}]" />
                                                        <label for="specification->{{ $specification->id }}">{{ $specification->getTranslatedAttribute('name') }}</label>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                            <div class="filter__col active">
                                <div class="filter__head drawer-btn">
                                    <span>{{ __('Price') }}</span>
                                    <i class="bx bx-chevron-down"></i>
                                </div>
                                <div class="filter__body">
                                    <div class="filter__in">
                                        <div class="filter__range">
                                            <ul class="filter__fields">
                                                <li>
                                                    <div class="input__box input__box--100">
                                                        <input
                                                            id="price-min"
                                                            name="price_from"
                                                            type="number"
                                                            class="input"
                                                            readonly
                                                            value="{{ $params['price_from'] != '-1' ? $params['price_from'] : $prices['min'] }}" />
                                                        <p class="input__placeholder">{{ __('from') }}</p>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="input__box input__box-100">
                                                        <input
                                                            id="price-max"
                                                            name="price_to"
                                                            type="number"
                                                            class="input"
                                                            readonly
                                                            value="{{ $params['price_to'] != '-1' ? $params['price_to'] : $prices['max'] }}" />
                                                        <p class="input__placeholder">{{ __('to') }}</p>
                                                    </div>
                                                </li>
                                            </ul>
                                            <div class="range">
                                                <input
                                                    id="from-range"
                                                    type="range"
                                                    step="1000"
                                                    value="{{ $params['price_from'] != '-1' ? $params['price_from'] : $prices['min'] }}"
                                                    min="{{ $prices['min'] }}"
                                                    max="{{ $prices['max'] }}" />
                                                <input
                                                    id="to-range"
                                                    type="range"
                                                    step="1000"
                                                    value="{{ $params['price_to'] != '-1' ? $params['price_to'] : $prices['max'] }}"
                                                    min="{{ $prices['min'] }}"
                                                    max="{{ $prices['max'] }}" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="filter__col active">
                                <div class="filter__head drawer-btn">
                                    <span>{{ __('Year') }}</span>
                                    <i class="bx bx-chevron-down"></i>
                                </div>
                                <div class="filter__body">
                                    <div class="filter__in">
                                        <div class="filter__range">
                                            <ul class="filter__fields">
                                                <li>
                                                    <div class="input__box input__box--100">
                                                        <input
                                                            id="year-min"
                                                            name="year_from"
                                                            type="number"
                                                            min="{{ $years['min'] }}"
                                                            max="{{ $years['max'] }}"
                                                            class="input"
                                                            value="{{ $params['year_from'] != '-1' ? $params['year_from'] : $years['min'] }}" />
                                                        <p class="input__placeholder">{{ __('from') }}</p>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="input__box input__box-100">
                                                        <input
                                                            id="year-max"
                                                            name="year_to"
                                                            type="number"
                                                            min="{{ $years['min'] }}"
                                                            max="{{ $years['max'] }}"
                                                            class="input"
                                                            value="{{ $params['year_to'] != '-1' ? $params['year_to'] : $years['max'] }}" />
                                                        <p class="input__placeholder">{{ __('to') }}</p>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="filter__col active">
                                <div class="filter__head drawer-btn">
                                    <span>{{ __('Features') }}</span>
                                    <i class="bx bx-chevron-down"></i>
                                </div>
                                <div class="filter__body">
                                    <div class="filter__in">
                                        <ul class="filter__list">
                                            @foreach ($features as $feature)
                                            <li>
                                                <label for="feature-{{ $feature->id }}" class="filter__toggle">
                                                    <span>{{ $feature->getTranslatedAttribute('name') }}</span>
                                                    <input
                                                        type="checkbox"
                                                        @if(in_array($feature->id, $params['features'])) checked @endif
                                                        name="features[{{ $feature->id }}]"
                                                        id="feature-{{ $feature->id }}"
                                                        class="toggle" />
                                                </label>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <a href="{{ route('cars.index') }}" class="btn btn--outlined" id="clear-filter-btn" style="margin-top: 15px">
                                {{ __('Clear') }}
                            </a>
                            <button type="submit" class="btn btn--main" style="margin-top: 15px">
                                {{ __('Apply') }}
                            </button>
                        </form>
                    </div>
                </aside>

                <main class="main">
                    <div class="items">
                        @foreach ($cars as $car)
                        <div class="item__box">
                            @include('partials.car_one')
                        </div>
                        @endforeach
                    </div>
                    <a class="btn btn--outlined btn--block" style="margin: 10px 0 0">Show more</a>
                </main>
            </div>
        </div>
    </section>


@endsection

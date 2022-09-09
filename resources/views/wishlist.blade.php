@extends('layouts.app')

@section('seo_title', __('main.wishlist'))
@section('meta_description', '')
@section('meta_keywords', '')

@section('content')

    <section class="profile">
        @include('partials.sidebar_profile')

        <main class="field">
            <h1 class="field__title">{{ __('My favorites') }}</h1>
            @if (!$wishlist->isEmpty())
                <div class="items">
                    @foreach ($wishlistItems as $wishlistItem)
                        @php
                            $car = $wishlistItem->associatedModel;
                        @endphp
                        <div class="item__box">
                            @include('partials.car_one')
                        </div>
                    @endforeach
                </div>
            @else
                <div class="empty">
                    <img src="{{ asset('img/icons/heart.svg') }}" class="empty__img" />
                    <h2 class="empty__title">{{ __('Nothing to show') }}</h2>
                    <p class="empty__text">{{ __('You can add cars to favorites by clicking on the heart next to the product') }}</p>
                    <a href="{{ route('cars.index') }}" class="btn btn--main">{{ __('Find your car') }}</a>
                </div>
            @endif
        </main>

    </section>

@endsection

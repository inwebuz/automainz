@extends('layouts.app')

@section('seo_title', $page->getTranslatedAttribute('seo_title') ?: $page->getTranslatedAttribute('name'))
@section('meta_description', $page->getTranslatedAttribute('meta_description'))
@section('meta_keywords', $page->getTranslatedAttribute('meta_keywords'))
@section('body_class', 'home-page')

@php
$instagram = Helper::setting('contact.instagram');
@endphp

@section('content')

@include('partials.alerts')

@if ($slide)
<!-- hero -->
<section class="hero" style="background-image: url({{ $slide->img }})">
    <div class="container">
        <div class="hero__in">
            <div class="hero__content">
                <h1 class="hero__title">{{ $slide->getTranslatedAttribute('name') }}</h1>
                @if ($slide->getTranslatedAttribute('url') && $slide->getTranslatedAttribute('button_text'))
                <a href="{{ $slide->getTranslatedAttribute('url') }}" class="btn btn--main">{{ $slide->getTranslatedAttribute('button_text') }}</a>
                @endif
            </div>
        </div>
    </div>
</section>
@endif

@if (!$articles->isEmpty())
<section class="section">
    <div class="container">
        <div class="card__wrapper">
            @foreach ($articles as $publication)
            <div class="card__box">
                <a href="{{ $publication->url }}" class="card">
                    <div class="card__photo">
                        <img src="{{ $publication->small_img }}" alt="{{ $publication->getTranslatedAttribute('name') }}" />
                    </div>
                    <div class="card__content">
                        <h3>{{ $publication->getTranslatedAttribute('name') }}</h3>
                        <p>{{ $publication->getTranslatedAttribute('description') }}</p>
                        <button class="btn btn--outlined">{{ __('More') }}</button>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

@if (!$photos->isEmpty())
<section class="photo__wrapper section pt-0">
    <div class="container">
        <div class="photo__head">
            <h2>{{ __('A hassle-free kind of happy') }}</h2>
            <a href="{{ $instagram }}" target="_blank" rel="nofollow">#SHOWYOURBOW</a>
        </div>
    </div>
    <div class="photo__slide">
        <div class="swiper photo-swiper">
            <div class="swiper-wrapper">
                @foreach ($photos as $photo)
                <div class="swiper-slide">
                    <div class="photo__box">
                        <div
                            class="photo"
                            data-fancybox="photos"
                            data-src="{{ $photo->img }}"
                            data-caption="{{ $photo->instagram_username }}"
                        >
                            <img src="{{ $photo->medium_img }}" alt="{{ $photo->getTranslatedAttribute('name') }}" />
                            <div class="photo__content">
                                <i class="bx bxl-instagram"></i>
                                <span>{{ $photo->instagram_username }}</span>
                            </div>
                        </div>
                    </div>
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
</section>
@endif


@endsection

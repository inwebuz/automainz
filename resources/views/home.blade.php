@extends('layouts.app')

@section('seo_title', $page->getTranslatedAttribute('seo_title') ?: $page->getTranslatedAttribute('name'))
@section('meta_description', $page->getTranslatedAttribute('meta_description'))
@section('meta_keywords', $page->getTranslatedAttribute('meta_keywords'))
@section('body_class', 'home-page')

@section('content')

@if (session()->has('alert') || session()->has('success') || session()->has('status') || session()->has('error') || session()->has('message'))
<div class="content-block">
    @include('partials.alerts')
</div>
@endif

<!-- hero -->
<section class="hero" style="background-image: url(./assets/img/hero.jpg)">
    <div class="container">
        <div class="hero__in">
            <div class="hero__content">
                <h1 class="hero__title">Everything you want. Nothing you don’t.</h1>
                <a href="catalog.html" class="btn btn--main">find your car</a>
            </div>
        </div>
    </div>
</section>

<!-- features and advantages cards -->
<section class="section">
    <div class="container">
        <div class="card__wrapper">
            <div class="card__box">
                <a href="#" class="card">
                    <div class="card__photo">
                        <img src="./assets/img/hero.jpg" alt="" />
                    </div>
                    <div class="card__content">
                        <h3>Get Pre-Qualified</h3>
                        <p>See your actual monthly payment</p>
                        <button class="btn btn--outlined">Get Pre-Qualified</button>
                    </div>
                </a>
            </div>
            <div class="card__box">
                <a href="#" class="card">
                    <div class="card__photo">
                        <img src="./assets/img/photo-1.jpg" alt="" />
                    </div>
                    <div class="card__content">
                        <h3>Get Pre-Qualified</h3>
                        <p>See your actual monthly payment</p>
                        <button class="btn btn--outlined">Get Pre-Qualified</button>
                    </div>
                </a>
            </div>
            <div class="card__box">
                <a href="#" class="card">
                    <div class="card__photo">
                        <img src="./assets/img/photo-1.jpg" alt="" />
                    </div>
                    <div class="card__content">
                        <h3>Get Pre-Qualified</h3>
                        <p>See your actual monthly payment</p>
                        <button class="btn btn--outlined">Get Pre-Qualified</button>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- photos -->
<section class="photo__wrapper section pt-0">
    <div class="container">
        <div class="photo__head">
            <h2>A hassle-free kind of happy</h2>
            <a href="#">#SHOWYOURBOW</a>
        </div>
    </div>
    <div class="photo__slide">
        <div class="swiper photo-swiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="photo__box">
                        <div
                            class="photo"
                            data-fancybox="photos"
                            data-src="./assets/img/photo.jpg"
                            data-caption="@happylovepeacekeeper"
                        >
                            <img src="./assets/img/photo.jpg" alt="" />
                            <div class="photo__content">
                                <i class="bx bxl-instagram"></i>
                                <span>@happylovepeacekeeper</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="photo__box">
                        <div
                            class="photo"
                            data-fancybox="photos"
                            data-src="./assets/img/photo.jpg"
                            data-caption="@happylovepeacekeeper"
                        >
                            <img src="./assets/img/photo.jpg" alt="" />
                            <div class="photo__content">
                                <i class="bx bxl-instagram"></i>
                                <span>@happylovepeacekeeper</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="photo__box">
                        <div
                            class="photo"
                            data-fancybox="photos"
                            data-src="./assets/img/photo.jpg"
                            data-caption="@happylovepeacekeeper"
                        >
                            <img src="./assets/img/photo.jpg" alt="" />
                            <div class="photo__content">
                                <i class="bx bxl-instagram"></i>
                                <span>@happylovepeacekeeper</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="photo__box">
                        <div
                            class="photo"
                            data-fancybox="photos"
                            data-src="./assets/img/photo.jpg"
                            data-caption="@happylovepeacekeeper"
                        >
                            <img src="./assets/img/photo.jpg" alt="" />
                            <div class="photo__content">
                                <i class="bx bxl-instagram"></i>
                                <span>@happylovepeacekeeper</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="photo__box">
                        <div
                            class="photo"
                            data-fancybox="photos"
                            data-src="./assets/img/photo.jpg"
                            data-caption="@happylovepeacekeeper"
                        >
                            <img src="./assets/img/photo.jpg" alt="" />
                            <div class="photo__content">
                                <i class="bx bxl-instagram"></i>
                                <span>@happylovepeacekeeper</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="photo__box">
                        <div
                            class="photo"
                            data-fancybox="photos"
                            data-src="./assets/img/photo.jpg"
                            data-caption="@happylovepeacekeeper"
                        >
                            <img src="./assets/img/photo.jpg" alt="" />
                            <div class="photo__content">
                                <i class="bx bxl-instagram"></i>
                                <span>@happylovepeacekeeper</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="photo__box">
                        <div
                            class="photo"
                            data-fancybox="photos"
                            data-src="./assets/img/photo.jpg"
                            data-caption="@happylovepeacekeeper"
                        >
                            <img src="./assets/img/photo.jpg" alt="" />
                            <div class="photo__content">
                                <i class="bx bxl-instagram"></i>
                                <span>@happylovepeacekeeper</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="photo__box">
                        <div
                            class="photo"
                            data-fancybox="photos"
                            data-src="./assets/img/photo.jpg"
                            data-caption="@happylovepeacekeeper"
                        >
                            <img src="./assets/img/photo.jpg" alt="" />
                            <div class="photo__content">
                                <i class="bx bxl-instagram"></i>
                                <span>@happylovepeacekeeper</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="photo__box">
                        <div
                            class="photo"
                            data-fancybox="photos"
                            data-src="./assets/img/photo.jpg"
                            data-caption="@happylovepeacekeeper"
                        >
                            <img src="./assets/img/photo.jpg" alt="" />
                            <div class="photo__content">
                                <i class="bx bxl-instagram"></i>
                                <span>@happylovepeacekeeper</span>
                            </div>
                        </div>
                    </div>
                </div>
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


@endsection

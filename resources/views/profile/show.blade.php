@extends('layouts.app')
@section('seo_title', __('main.profile'))
@section('page_class', 'page--profile')

@section('content')

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
                        <div class="swiper-slide">
                            <div class="item">
                                <ul class="item__action">
                                    <li>
                                        <i class="bx bx-share-alt"></i>
                                    </li>
                                    <li class="active">
                                        <i class="bx bxs-heart"></i>
                                    </li>
                                </ul>
                                <a href="product.html" class="item__photo">
                                    <img src="{{ asset('img/item.jpg') }}" alt="" />
                                </a>
                                <div class="item__content">
                                    <a href="product.html" class="item__name"
                                        >Volkswagen Golf GTI (2022)</a
                                    >
                                    <p class="item__price">
                                        <b>$25,245</b>
                                        <i class="bx bxs-circle"></i>
                                        <span>61 786 miles</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="item">
                                <ul class="item__action">
                                    <li>
                                        <i class="bx bx-share-alt"></i>
                                    </li>
                                    <li>
                                        <i class="bx bx-heart"></i>
                                    </li>
                                </ul>
                                <a href="product.html" class="item__photo">
                                    <img src="{{ asset('img/item.jpg') }}" alt="" />
                                </a>
                                <div class="item__content">
                                    <a href="product.html" class="item__name"
                                        >Volkswagen Golf GTI (2022)</a
                                    >
                                    <p class="item__price">
                                        <b>$25,245</b>
                                        <i class="bx bxs-circle"></i>
                                        <span>61 786 miles</span>
                                    </p>

                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="item">
                                <ul class="item__action">
                                    <li>
                                        <i class="bx bx-share-alt"></i>
                                    </li>
                                    <li>
                                        <i class="bx bx-heart"></i>
                                    </li>
                                </ul>
                                <a href="product.html" class="item__photo">
                                    <img src="{{ asset('img/item.jpg') }}" alt="" />
                                </a>
                                <div class="item__content">
                                    <a href="product.html" class="item__name"
                                        >Volkswagen Golf GTI (2022)</a
                                    >
                                    <p class="item__price">
                                        <b>$25,245</b>
                                        <i class="bx bxs-circle"></i>
                                        <span>61 786 miles</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="item">
                                <ul class="item__action">
                                    <li>
                                        <i class="bx bx-share-alt"></i>
                                    </li>
                                    <li>
                                        <i class="bx bx-heart"></i>
                                    </li>
                                </ul>
                                <a href="product.html" class="item__photo">
                                    <img src="{{ asset('img/item.jpg') }}" alt="" />
                                </a>
                                <div class="item__content">
                                    <a href="product.html" class="item__name"
                                        >Volkswagen Golf GTI (2022)</a
                                    >
                                    <p class="item__price">
                                        <b>$25,245</b>
                                        <i class="bx bxs-circle"></i>
                                        <span>61 786 miles</span>
                                    </p>

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
        </div>
        <div class="recommend recommend--profile">
            <h2 class="recommend__head">Cars with less than 60,000 miles</h2>
            <div class="recommend__slider">
                <div class="swiper recommend-swiper">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="item">
                                <ul class="item__action">
                                    <li>
                                        <i class="bx bx-share-alt"></i>
                                    </li>
                                    <li class="active">
                                        <i class="bx bxs-heart"></i>
                                    </li>
                                </ul>
                                <a href="product.html" class="item__photo">
                                    <img src="{{ asset('img/item.jpg') }}" alt="" />
                                </a>
                                <div class="item__content">
                                    <a href="product.html" class="item__name"
                                        >Volkswagen Golf GTI (2022)</a
                                    >
                                    <p class="item__price">
                                        <b>$25,245</b>
                                        <i class="bx bxs-circle"></i>
                                        <span>61 786 miles</span>
                                    </p>

                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="item">
                                <ul class="item__action">
                                    <li>
                                        <i class="bx bx-share-alt"></i>
                                    </li>
                                    <li>
                                        <i class="bx bx-heart"></i>
                                    </li>
                                </ul>
                                <a href="product.html" class="item__photo">
                                    <img src="{{ asset('img/item.jpg') }}" alt="" />
                                </a>
                                <div class="item__content">
                                    <a href="product.html" class="item__name"
                                        >Volkswagen Golf GTI (2022)</a
                                    >
                                    <p class="item__price">
                                        <b>$25,245</b>
                                        <i class="bx bxs-circle"></i>
                                        <span>61 786 miles</span>
                                    </p>

                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="item">
                                <ul class="item__action">
                                    <li>
                                        <i class="bx bx-share-alt"></i>
                                    </li>
                                    <li>
                                        <i class="bx bx-heart"></i>
                                    </li>
                                </ul>
                                <a href="product.html" class="item__photo">
                                    <img src="{{ asset('img/item.jpg') }}" alt="" />
                                </a>
                                <div class="item__content">
                                    <a href="product.html" class="item__name"
                                        >Volkswagen Golf GTI (2022)</a
                                    >
                                    <p class="item__price">
                                        <b>$25,245</b>
                                        <i class="bx bxs-circle"></i>
                                        <span>61 786 miles</span>
                                    </p>

                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="item">
                                <ul class="item__action">
                                    <li>
                                        <i class="bx bx-share-alt"></i>
                                    </li>
                                    <li>
                                        <i class="bx bx-heart"></i>
                                    </li>
                                </ul>
                                <a href="product.html" class="item__photo">
                                    <img src="{{ asset('img/item.jpg') }}" alt="" />
                                </a>
                                <div class="item__content">
                                    <a href="product.html" class="item__name"
                                        >Volkswagen Golf GTI (2022)</a
                                    >
                                    <p class="item__price">
                                        <b>$25,245</b>
                                        <i class="bx bxs-circle"></i>
                                        <span>61 786 miles</span>
                                    </p>

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
        </div>
        <div class="recommend recommend--profile">
            <h2 class="recommend__head">Cars around $20,000</h2>
            <div class="recommend__slider">
                <div class="swiper recommend-swiper">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="item">
                                <ul class="item__action">
                                    <li>
                                        <i class="bx bx-share-alt"></i>
                                    </li>
                                    <li class="active">
                                        <i class="bx bxs-heart"></i>
                                    </li>
                                </ul>
                                <a href="product.html" class="item__photo">
                                    <img src="{{ asset('img/item.jpg') }}" alt="" />
                                </a>
                                <div class="item__content">
                                    <a href="product.html" class="item__name"
                                        >Volkswagen Golf GTI (2022)</a
                                    >
                                    <p class="item__price">
                                        <b>$25,245</b>
                                        <i class="bx bxs-circle"></i>
                                        <span>61 786 miles</span>
                                    </p>

                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="item">
                                <ul class="item__action">
                                    <li>
                                        <i class="bx bx-share-alt"></i>
                                    </li>
                                    <li>
                                        <i class="bx bx-heart"></i>
                                    </li>
                                </ul>
                                <a href="product.html" class="item__photo">
                                    <img src="{{ asset('img/item.jpg') }}" alt="" />
                                </a>
                                <div class="item__content">
                                    <a href="product.html" class="item__name"
                                        >Volkswagen Golf GTI (2022)</a
                                    >
                                    <p class="item__price">
                                        <b>$25,245</b>
                                        <i class="bx bxs-circle"></i>
                                        <span>61 786 miles</span>
                                    </p>

                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="item">
                                <ul class="item__action">
                                    <li>
                                        <i class="bx bx-share-alt"></i>
                                    </li>
                                    <li>
                                        <i class="bx bx-heart"></i>
                                    </li>
                                </ul>
                                <a href="product.html" class="item__photo">
                                    <img src="{{ asset('img/item.jpg') }}" alt="" />
                                </a>
                                <div class="item__content">
                                    <a href="product.html" class="item__name"
                                        >Volkswagen Golf GTI (2022)</a
                                    >
                                    <p class="item__price">
                                        <b>$25,245</b>
                                        <i class="bx bxs-circle"></i>
                                        <span>61 786 miles</span>
                                    </p>

                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="item">
                                <ul class="item__action">
                                    <li>
                                        <i class="bx bx-share-alt"></i>
                                    </li>
                                    <li>
                                        <i class="bx bx-heart"></i>
                                    </li>
                                </ul>
                                <a href="product.html" class="item__photo">
                                    <img src="{{ asset('img/item.jpg') }}" alt="" />
                                </a>
                                <div class="item__content">
                                    <a href="product.html" class="item__name"
                                        >Volkswagen Golf GTI (2022)</a
                                    >
                                    <p class="item__price">
                                        <b>$25,245</b>
                                        <i class="bx bxs-circle"></i>
                                        <span>61 786 miles</span>
                                    </p>

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
        </div>
    </main>
</section>

@endsection

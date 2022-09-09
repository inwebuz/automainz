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
                    {{-- @foreach ($wishlistItems as $wishlistItem)
                    @php
                        $product = $wishlistItem->associatedModel;
                    @endphp
                    <div class="wishlist-box wishlist_item_line d-flex flex-column flex-lg-row flex-lg-nowrap align-items-lg-center border p-2 p-lg-4 radius-6 mb-3 text-center text-lg-left">
                        <div class="wishlist-box__delete d-none d-lg-block mr-lg-3">
                            <a href="javascript:;" data-remove-url="{{ route('wishlist.delete', $wishlistItem->id) }}" class="remove-from-wishlist-btn only-icon">
                                <strong class="text-danger">&times;</strong>
                            </a>
                        </div>
                        <div class="wishlist-box__img mr-lg-3">
                            <a href="{{ $product->url }}">
                                <img src="{{ $product->micro_img }}" alt="{{ $wishlistItem->name }}">
                            </a>
                        </div>
                        <div class="wishlist-box__about mr-lg-3">
                            <h4>
                                <a href="{{ $product->url }}" class="text-dark">{{ $wishlistItem->name }}</a>
                            </h4>
                        </div>
                        <div class="wishlist-box__price-m ml-lg-auto">
                            <ul class="price-info__list">
                                <li class="text-nowrap">
                                    <strong>{{ Helper::formatPrice($wishlistItem->price) }}</strong>
                                </li>
                            </ul>
                        </div>
                        <div class="wishlist-box__delete d-lg-none mt-2">
                            <a href="javascript:;" data-remove-url="{{ route('wishlist.delete', $wishlistItem->id) }}" class="remove-from-wishlist-btn only-icon">
                                <strong class="text-danger">&times;</strong>
                            </a>
                        </div>
                    </div>
                    @endforeach --}}
                    <div class="item__box">
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
                                <a href="product.html" class="item__name">Volkswagen Golf GTI (2022)</a>
                                <p class="item__price">
                                    <b>$25,245</b>
                                    <i class="bx bxs-circle"></i>
                                    <span>61 786 miles</span>
                                </p>

                            </div>
                        </div>
                    </div>
                    <div class="item__box">
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
                                <a href="product.html" class="item__name">Volkswagen Golf GTI (2022)</a>
                                <p class="item__price">
                                    <b>$25,245</b>
                                    <i class="bx bxs-circle"></i>
                                    <span>61 786 miles</span>
                                </p>

                            </div>
                        </div>
                    </div>
                    <div class="item__box">
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
                                <a href="product.html" class="item__name">Volkswagen Golf GTI (2022)</a>
                                <p class="item__price">
                                    <b>$25,245</b>
                                    <i class="bx bxs-circle"></i>
                                    <span>61 786 miles</span>
                                </p>

                            </div>
                        </div>
                    </div>
                    <div class="item__box">
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
                                <a href="product.html" class="item__name">Volkswagen Golf GTI (2022)</a>
                                <p class="item__price">
                                    <b>$25,245</b>
                                    <i class="bx bxs-circle"></i>
                                    <span>61 786 miles</span>
                                </p>

                            </div>
                        </div>
                    </div>
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

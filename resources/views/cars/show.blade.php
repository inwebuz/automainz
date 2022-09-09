@extends('layouts.app')

@section('seo_title', $car->full_name)
@section('meta_description', '')
@section('meta_keywords', '')
@section('body_class', 'car-single-page')

@section('content')

<section class="show">
    <div class="gallery">
        @if ($car->exterior_images_360 && $car->exterior_images_360_quantity)
            <div class="cloudimage-360" id="gurkha-suv" data-folder="{{ $car->exterior_images_360 }}" data-filename-x="{index}.{{ $car->exterior_images_360_format }}" data-amount-x="{{ $car->exterior_images_360_quantity }}"></div>
        @else
            <div class="gallery-main" data-fancybox="gallery" data-src="{{ $car->img }}">
                <img src="{{ $car->img }}" alt="" />
            </div>
        @endif
        <div class="gallery-features">
            <div class="gallery-features__summary">
                <h3>
                    {{ __('Feature Summary') }}
                    {{-- <i class='bx bx-info-circle' data-btn="#features-summary"></i> --}}
                </h3>
                <img src="{{ $car->feature_summary_img }}" alt="">
                <p>{{ __('More potential savings with more basic features') }}</p>
            </div>
            <ul class="gallery-features__photos">
                @foreach ($car->imgs as $key => $img)
                <li>
                    <div class="gallery-features__photo" data-fancybox="gallery" data-src="{{ $img }}">
                        <img src="{{ $car->small_imgs[$key] }}" alt="">
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
        {{-- <div class="gallery-grid">
            <ul>
                <li>
                    <div class="gallery-grid__photo" data-fancybox="gallery" data-src="{{ asset('img/product.jpg') }}">
                        <img src="{{ asset('img/product.jpg') }}" alt="">
                    </div>
                </li>
                <li>
                    <div class="gallery-grid__photo" data-fancybox="gallery" data-src="{{ asset('img/product.jpg') }}">
                        <img src="{{ asset('img/product.jpg') }}" alt="">
                    </div>
                </li>
            </ul>
        </div> --}}
        <div class="gallery-slider">
            <div class="swiper gallery-swiper">
                <div class="swiper-wrapper">
                    @foreach ($car->imgs as $key => $img)
                    <div class="swiper-slide">
                        <div class="gallery__photo" data-fancybox="gallery-mobile" data-src="{{ $img }}">
                            <img src="{{ $car->small_imgs[$key] }}" alt="">
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="swiper-scrollbar"></div>
            </div>
        </div>
    </div>

    <div class="info">
        <div class="info-head">
            <div class="info-head__top">
                <div class="info-head__car">
                    <p class="info-head__model">{{ $car->getTranslatedAttribute('name') }}</p>
                    <p class="info-head__brand">{{ $car->carModel->make->name ?? '' }}</p>
                </div>
                <div class="info-head__fav active">
                    <div
                        class="@if(!app('wishlist')->get($car->id)) add-to-wishlist-btn @else remove-from-wishlist-btn active @endif only-icon"
                        data-id="{{ $car->id }}"
                        data-add-url="{{ route('wishlist.add') }}"
                        data-remove-url="{{ route('wishlist.delete', $car->id) }}"
                        data-name="{{ $car->getTranslatedAttribute('name') }}"
                        data-price="{{ $car->price }}"
                        data-add-text="<i class='bx bx-heart'></i>"
                        data-delete-text="<i class='bx bxs-heart'></i>"
                    >
                        @if(!app('wishlist')->get($car->id))
                        <i class="bx bx-heart"></i>
                        @else
                        <i class="bx bxs-heart"></i>
                        @endif
                    </div>
                </div>
            </div>
            <ul class="info-head__bottom">
                <li>{{ Helper::formatPrice($car->price) }}</li>
                <li>{{ round($car->mileage / 1000) }}K {{ __('miles') }}</li>
            </ul>
        </div>
        <div class="info-intro">
            <ul>
                @foreach ($car->specifications as $specification)
                @if(!empty($specification->specificationType) && $specification->specificationType->is_main)
                <li>
                    <p>{{ $specification->specificationType->getTranslatedAttribute('name') }}</p>
                    <div style="display: flex; align-items: center; max-width: 120px; height: 100%;">
                        <img src="{{ $specification->specificationType->micro_img }}" alt="" />
                        <span>{{ $specification->getTranslatedAttribute('name') }}</span>
                    </div>
                </li>
                @endif
                @endforeach
            </ul>
        </div>
        <div class="info-chars">
            <div class="info__head">
                <p>{{ __('Specifications') }}</p>
            </div>
            <ul class="char">
                @foreach ($car->specifications as $specification)
                @if(!empty($specification->specificationType) && !$specification->specificationType->is_main)
                <li class="char__item">
                    <span class="char__type">{{ $specification->specificationType->getTranslatedAttribute('name') }}</span>
                    <p class="char__dots"></p>
                    <span class="char__value">{{ $specification->getTranslatedAttribute('name') }}</span>
                </li>
                @endif
                @endforeach
            </ul>
            </table>
        </div>
        <div class="info-features">
            <div class="info__head">
                <p>{{ __('Features') }}</p>
            </div>
            <ul class="info-features__list">
                @foreach ($car->features as $feature)
                <li><span>{{ $feature->getTranslatedAttribute('name') }}</span></li>
                @endforeach
            </ul>
        </div>
        <div class="info-comments">
            <div class="info__head">
                <p>{{ __('Description') }}</p>
            </div>
            <p class="info-comments__text">
                {{ $car->getTranslatedAttribute('description') }}
            </p>
        </div>
        <div class="info-summary">
            <h3>{{ __('Total Price') }} {{ Helper::formatPrice($car->price) }}</h3>
            <ul>
                <li>
                    <span>{{ __('Vehicle Price') }}</span>
                    <b>{{ Helper::formatPrice($car->price) }}</b>
                </li>
                {{-- <li>
                    <span>Tax, Title, Registration</span>
                    <b>$1 772</b>
                </li>
                <li>
                    <span>Shipping</span>
                    <b>$1 490</b>
                </li> --}}
                <li>
                    <span>{{ __('Bogus Fees') }}</span>
                    <b>{{ __('NEVER') }}</b>
                </li>
            </ul>

            <a href="javascript:;" class="btn btn--main btn--block" onclick="$(this).hide();$('#product-enquire-form-container').show();$('[name=name]').trigger('focus')">{{ __('Enquire now') }}</a>

            <div id="product-enquire-form-container" style="display: none;">
                <br>
                <form class="form contact-form" method="post"  action="{{ route('contacts.send') }}">

                    @csrf

                    <input type="hidden" name="car_id" value="{{ $car->id }}">

                    <div class="form-result"></div>

                    <div class="input__box input__box--100">
                        <input type="text" name="name" class="input" required />
                        <p class="input__placeholder">{{ __('main.form.your_name') }}</p>
                    </div>
                    <div class="input__box input__box--100">
                        <input type="text" name="phone" class="input" required />
                        <p class="input__placeholder">{{ __('main.form.phone') }}</p>
                    </div>
                    <div class="input__box input__box--100">
                        <input type="text" name="message" class="input">
                        <p class="input__placeholder">{{ __('main.form.message') }}</p>
                    </div>

                    <div>
                        <button type="submit" class="btn btn--main btn--block">{{ __('main.form.send') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="recommend">
        <h2 class="recommend__head">{{ __('Recomended for you') }}</h2>
        <div class="recommend__slider">
            <div class="swiper recommend-swiper">
                <div class="swiper-wrapper">
                    @foreach ($recommendedCars as $recommendedCar)
                    <div class="swiper-slide">
                        @include('partials.car_one', ['car' => $recommendedCar])
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
</section>

@endsection

@section('scripts')
    <script src="{{ asset('js/js-cloudimage-360-view.min.js') }}"></script>
@endsection

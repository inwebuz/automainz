@php
$phone = Helper::setting('contact.phone');
$email = Helper::setting('contact.email');
$siteTitle = Helper::setting('site.title')
@endphp
{{-- @if (auth()->check() && auth()->user()->isAdmin())
<div class="py-3 px-3 text-light position-fixed"
    style="top: 0; left: 0; z-index: 10000;width: 220px;background-color: #000;">
    <div class="container-fluid">
        <a href="{{ url('admin') }}" class="text-light">Панель управления</a>
    </div>
</div>
@endif --}}

<div class="header">
    <div class="container">
        <div class="header__in">
            <a href="{{ route('home') }}" class="header__logo">
                <img src="{{ $logo }}" alt="{{ $siteTitle }}" />
                {{-- {!! $logo !!} --}}
            </a>
            <ul class="header__nav">
                @foreach ($headerMenuItems as $item)
                <li><a href="{{ $item->url }}">{{ $item->name }}</a></li>
                @endforeach
            </ul>
            <div class="header__controls">
                <div class="location">
                    <div class="location__btn">
                        <i class="bx bx-map"></i>
                        <span>{{ __('main.nav.contacts') }}</span>
                        <i class="bx bx-chevron-down"></i>
                    </div>
                    <div class="location__box">
                        <div class="location__in">
                            <h3 class="location__title">{{ $siteTitle }}</h3>
                            <a href="{{ route('contacts') }}" class="location__show">
                                <i class="bx bxs-map"></i>
                                <span>{{ __('Show on map') }}</span>
                            </a>
                            <p class="location__text">
                                {{ $address }}
                            </p>
                            <a href="tel:{{ Helper::phone($phone) }}" class="location__number">{{ $phone }}</a>
                        </div>
                    </div>
                </div>
                <div class="header__fav">
                    <i class="bx bx-heart"></i>
                    <!-- filled heard -->
                    <!-- <i class="bx bxs-heart"></i> -->
                </div>
                <div class="header-acc">
                    <div class="header-acc__btn">
                        <i class="bx bx-user"></i>
                    </div>

                    <!-- if not authenticated -->
                    <div class="select-box">
                        <div class="select-box__in">
                            @guest
                            <a href="{{ route('login') }}" class="select-box__link">
                                <span>{{ __('Sign in') }}</span>
                            </a>
                            <a href="{{ route('register') }}" class="select-box__link">
                                <span>{{ __('Register') }}</span>
                            </a>
                            @else
                            <a href="profile.html" class="select-box__link">
                                <svg>
                                    <use xlink:href="#icon-home"></use>
                                </svg>
                                <span>My Automainz</span>
                            </a>
                            <a href="profile-favorites.html" class="select-box__link">
                                <svg>
                                    <use xlink:href="#icon-heart"></use>
                                </svg>
                                <span>My Favorites</span>
                            </a>
                            <a href="profile-searchs.html" class="select-box__link">
                                <svg>
                                    <use xlink:href="#icon-loop"></use>
                                </svg>
                                <span>My Saved Cars</span>
                            </a>
                            <hr />
                            <a href="#" class="select-box__link">
                                <span>My Orders</span>
                            </a>
                            <a href="settings.html" class="select-box__link">
                                <span>Profile Settings</span>
                            </a>
                            <a href="#" class="select-box__link" style="color: #e95050">
                                <span>Sign Out</span>
                            </a>
                            @endguest

                        </div>
                    </div>

                </div>
                <div class="lang">
                    <div class="lang__btn">
                        <img src="{{ asset('img/icons/flag-' . $switcher->getActive()->key . '.svg') }}" alt="{{ $switcher->getActive()->key }}" />
                        <span>{{ $switcher->getActive()->key }}</span>
                        <i class="bx bx-chevron-down"></i>
                    </div>
                    <div class="select-box">
                        <div class="select-box__in">
                            @foreach ($switcher->getValues() as $value)
                            <a href="{{ $value->url }}" class="select-box__link">
                                <img src="{{ asset('img/icons/flag-' . $value->key . '.svg') }}" alt="{{ $value->key }}" />
                                <span class="text-uppercase ">{{ $value->key }}</span>
                            </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header__search">
            <form>
                <div class="input__box input__box--100">
                    <input
                        type="text"
                        class="input"
                        placeholder="{{ __('Search by Model or Keyword') }}"
                        required
                    />
                    <button type="submit" class="input__btn">
                        <i class="bx bx-search"></i>
                    </button>
                </div>
            </form>
        </div>
        <div class="header__bottom">
            <ul class="header__nav">
                @foreach ($headerMenuItems as $item)
                <li><a href="{{ $item->url }}">{{ $item->name }}</a></li>
                @endforeach
            </ul>
        </div>
    </div>
</div>

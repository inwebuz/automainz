{{-- @if (auth()->check() && auth()->user()->isAdmin())
<div class="py-3 px-3 text-light position-fixed"
    style="top: 0; left: 0; z-index: 10000;width: 220px;background-color: #000;">
    <div class="container-fluid">
        <a href="{{ url('admin') }}" class="text-light">Панель управления</a>
    </div>
</div>
@endif --}}

<div class="header {{ $headerClass }}">
    <div class="container">
        <div class="header__in">
            <a href="{{ route('home') }}" class="header__logo">
                <img src="{{ Helper::logo() }}" alt="{{ Helper::siteTitle() }}" />
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
                            <h3 class="location__title">{{ Helper::siteTitle() }}</h3>
                            <a href="{{ Helper::setting('contact.map_link') }}" class="location__show" target="_blank">
                                <i class="bx bxs-map"></i>
                                <span>{{ __('Show on map') }}</span>
                            </a>
                            <p class="location__text">
                                {{ Helper::address() }}
                            </p>
                            <a href="tel:{{ Helper::phoneFormat(Helper::phone()) }}" class="location__number">{{ Helper::phone() }}</a>
                        </div>
                    </div>
                </div>
                <div class="header__fav">
                    <a href="{{ route('wishlist.index') }}">
                        <i class="bx bx-heart"></i>
                    </a>
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
                            <a href="{{ route('profile.show') }}" class="select-box__link">
                                <svg>
                                    <use xlink:href="#icon-home"></use>
                                </svg>
                                <span>{{ __('My Automainz') }}</span>
                            </a>
                            <a href="{{ route('wishlist.index') }}" class="select-box__link">
                                <svg>
                                    <use xlink:href="#icon-heart"></use>
                                </svg>
                                <span>{{ __('My Favorites') }}</span>
                            </a>
                            {{-- <a href="profile-searchs.html" class="select-box__link">
                                <svg>
                                    <use xlink:href="#icon-loop"></use>
                                </svg>
                                <span>My Saved Cars</span>
                            </a> --}}
                            <hr />
                            {{-- <a href="#" class="select-box__link">
                                <span>My Orders</span>
                            </a> --}}
                            <a href="{{ route('profile.edit') }}" class="select-box__link">
                                <span>{{ __('Profile Settings') }}</span>
                            </a>
                            <a href="javascript:;" class="select-box__link" style="color: #e95050" onclick="document.getElementById('logout-form').submit()">
                                <span>{{ __('Sign Out') }}</span>
                            </a>
                            <form action="{{ route('logout') }}" method="POST" style="display: none" id="logout-form">
                                @csrf
                            </form>
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

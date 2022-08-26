@php
$phone = setting('contact.phone');
$email = setting('contact.email');
$siteTitle = setting('site.title')
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
            <a href="index.html" class="header__logo">
                <img src="assets/img/logo-automainz-blue.svg" alt="" />
            </a>
            <ul class="header__nav">
                <li><a href="catalog.html">Shop</a></li>
                <li><a href="sell-trade.html">Sell/Trade</a></li>
                <li><a href="financing-overview.html">Finance</a></li>
            </ul>
            <div class="header__controls">
                <div class="location">
                    <div class="location__btn">
                        <i class="bx bx-map"></i>
                        <span>Tashkent</span>
                        <i class="bx bx-chevron-down"></i>
                    </div>
                    <div class="location__box">
                        <div class="location__in">
                            <h3 class="location__title">Automainz Tashkent</h3>
                            <a href="#" class="location__show">
                                <i class="bx bxs-map"></i>
                                <span>Show on map</span>
                            </a>
                            <p class="location__text">
                                14442 Northampton Dr Granger, Indiana(IN), 46530
                            </p>
                            <a href="tel:9133846697" class="location__number"
                                >(913) 384–6697</a
                            >
                            <a href="#" class="btn btn--outlined btn--block"
                                >View cars at this store</a
                            >
                            <div class="location__search">
                                <div class="input__box input__box--100">
                                    <input
                                        type="text"
                                        class="input"
                                        placeholder="Enter ZIP or State"
                                    />
                                    <button type="submit" class="input__btn">
                                        <i class="bx bx-search"></i>
                                    </button>
                                </div>
                            </div>
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
                            <a href="login.html" class="select-box__link">
                                <span>Sign in</span>
                            </a>
                            <a href="register.html" class="select-box__link">
                                <span>Register</span>
                            </a>
                        </div>
                    </div>

                    <!-- if authenticated -->
                    <!-- <div class="select-box">
                        <div class="select-box__in">
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
                        </div>
                    </div> -->
                </div>
                <div class="lang">
                    <div class="lang__btn">
                        <img src="assets/img/icons/flag-gb.svg" alt="" />
                        <span>En</span>
                        <i class="bx bx-chevron-down"></i>
                    </div>
                    <div class="select-box">
                        <div class="select-box__in">
                            <a href="#" class="select-box__link">
                                <img src="assets/img/icons/flag-gb.svg" alt="" />
                                <span>EN</span>
                            </a>
                            <a href="#" class="select-box__link">
                                <img src="assets/img/icons/flag-es.svg" alt="" />
                                <span>ES</span>
                            </a>
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
                        placeholder="Search by Model or Keyword"
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
                <li><a href="catalog.html">Shop</a></li>
                <li><a href="sell-trade.html">Sell/Trade</a></li>
                <li><a href="financing-overview.html">Finance</a></li>
            </ul>
        </div>
    </div>
</div>

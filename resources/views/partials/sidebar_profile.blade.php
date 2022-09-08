@php
    $user = auth()->user();
@endphp
<aside class="side">
    <div class="side__in">
        <h2 class="side__welcome">
            {{ __('Welcome back') }}, <br />
            <b>{{ $user->first_name }}</b>
        </h2>
        <ul class="side-nav">
            <li>
                <a href="{{ route('profile.show') }}" class="side-nav__link @if(Route::currentRouteName() == 'profile.show') active @endif">
                    <svg>
                        <use xlink:href="#icon-home"></use>
                    </svg>
                    <span>{{ __('My Automainz') }}</span>
                </a>
            </li>
            <li>
                <a href="{{ route('wishlist.index') }}" class="side-nav__link @if(Route::currentRouteName() == 'wishlist.index') active @endif">
                    <svg>
                        <use xlink:href="#icon-heart"></use>
                    </svg>
                    <span>{{ __('My Favorites') }}</span>
                </a>
            </li>
        </ul>
        <div class="side__usefull">
            <h3>{{ __('Useful links') }}:</h3>
            <a href="{{ route('profile.edit') }}" class="@if(Route::currentRouteName() == 'profile.edit') active @endif">
                <svg>
                    <use xlink:href="#icon-arrow-top-right"></use>
                </svg>
                <span>{{ __('Profile settings') }}</span>
            </a>
            <a href="javascript:;" class="log-out" onclick="document.getElementById('logout-form').submit()">
                <svg>
                    <use xlink:href="#icon-arrow-top-right"></use>
                </svg>
                <span>{{ __('Log out') }}</span>
            </a>
        </div>
        <div class="location__in location__in--side">
            <h3 class="location__title">{{ __('Contacts') }}</h3>
            <a href="{{ Helper::setting('contact.map_link') }}" class="location__show" target="_blank">
                <i class="bx bxs-map"></i>
                <span>{{ __('Show on map') }}</span>
            </a>
            <p class="location__text">
                {{ Helper::address(); }}
            </p>
            <a href="tel:{{ Helper::phoneFormat(Helper::phone()) }}" class="location__number">{{ Helper::phone() }}</a>
        </div>
    </div>

    <!-- mobile menu -->
    <div class="menu">
        <a href="{{ route('profile.show') }}" class="menu__item active">
            <svg>
                <use xlink:href="#icon-home"></use>
            </svg>
            <span>{{ __('My Automainz') }}</span>
        </a>
        <a href="{{ route('wishlist.index') }}" class="menu__item">
            <svg>
                <use xlink:href="#icon-heart"></use>
            </svg>
            <span>{{ __('My Favorites') }}</span>
        </a>
        <a href="{{ route('profile.edit') }}" class="menu__item">
            <svg>
                <use xlink:href="#icon-user"></use>
            </svg>
            <span>{{ __('Profile settings') }}</span>
        </a>
    </div>
</aside>

@php
$telegram = Helper::setting('contact.telegram');
$facebook = Helper::setting('contact.facebook');
$twitter = Helper::setting('contact.twitter');
@endphp

<footer class="footer">
    <div class="container">
        <div class="footer__head">
            <a href="{{ route('home') }}" class="footer__logo">
                <img src="{{ Helper::logoLight() }}" alt="{{ Helper::siteTitle() }}">
                {{-- {!! $logoLight !!} --}}
            </a>

            @if ($facebook)
            <a href="{{ $facebook }}" class="footer__social" target="_blank" rel="nofollow">
                <img src="{{ asset('img/icons/social-facebook.svg') }}" alt="Facebook" />
            </a>
            @endif
            @if ($twitter)
            <a href="{{ $twitter }}" class="footer__social" target="_blank" rel="nofollow">
                <img src="{{ asset('img/icons/social-twitter.svg') }}" alt="Twitter" />
            </a>
            @endif

            <div class="location location--footer">
                <div class="location__btn">
                    <i class="bx bxs-map"></i>
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

            <a href="tel:{{ Helper::phoneFormat(Helper::phone()) }}" class="footer__number">
                <i class="bx bxs-phone"></i>
                {{ Helper::phone() }}
            </a>

        </div>
        <div class="footer__in">
            @foreach ($footerMenus as $menu)
            <div class="footer__col">
                <h3 class="drawer-btn">
                    <span>{{ __($menu['name']) }}</span> <i class="bx bx-chevron-down"></i>
                </h3>
                <ul>
                    @foreach ($menu['items'] as $item)
                    <li><a href="{{ $item->getTranslatedAttribute('url') }}">{{ $item->getTranslatedAttribute('title') }}</a></li>
                    @endforeach
                </ul>
            </div>
            @endforeach
        </div>
        <div class="footer__social--bottom">
            @if ($facebook)
            <a href="{{ $facebook }}" class="footer__social" target="_blank" rel="nofollow">
                <img src="{{ asset('img/icons/social-facebook.svg') }}" alt="Facebook" />
            </a>
            @endif
            @if ($twitter)
            <a href="{{ $twitter }}" class="footer__social" target="_blank" rel="nofollow">
                <img src="{{ asset('img/icons/social-twitter.svg') }}" alt="Twitter" />
            </a>
            @endif
        </div>
    </div>
    <div class="footer__bottom">
        <div class="container">
            <div class="footer__bottom--in">
                <p class="footer__copy">
                    {{ date('Y') }}
                    &copy;
                    {{ __('main.all_rights_reserved') }}.
                    {{ Helper::siteTitle() }}
                </p>
                <a href="https://inweb.uz" class="footer__author" target="_blank">
                    <p>{{ __('main.developer') }}</p>
                    <span>-</span>
                    <img src="{{ asset('img/logo-inweb.svg') }}" alt="Inweb" />
                </a>
            </div>
        </div>
    </div>
</footer>

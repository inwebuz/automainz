@php
$siteTitle = Helper::setting('site.title');
$phone = Helper::setting('contact.phone');
$email = Helper::setting('contact.email');
$map = Helper::setting('contact.map');
$telegram = Helper::setting('contact.telegram');
$facebook = Helper::setting('contact.facebook');
$twitter = Helper::setting('contact.twitter');
@endphp

<footer class="footer">
    <div class="container">
        <div class="footer__head">
            <a href="{{ route('home') }}" class="footer__logo">
                <img src="{{ $logoLight }}" alt="{{ $siteTitle }}">
                {{-- {!! $logoLight !!} --}}
            </a>

            @if ($facebook)
            <a href="{{ $facebook }}" class="footer__social">
                <img src="{{ asset('img/icons/social-facebook.svg') }}" alt="Facebook" />
            </a>
            @endif
            @if ($twitter)
            <a href="{{ $twitter }}" class="footer__social">
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
            <a href="tel:9133846697" class="footer__number"
                ><i class="bx bxs-phone"></i> (913) 384–6697</a
            >
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
            <a href="{{ $facebook }}" class="footer__social">
                <img src="{{ asset('img/icons/social-facebook.svg') }}" alt="Facebook" />
            </a>
            @endif
            @if ($twitter)
            <a href="{{ $twitter }}" class="footer__social">
                <img src="{{ asset('img/icons/social-twitter.svg') }}" alt="Twitter" />
            </a>
            @endif
        </div>
    </div>
    <div class="footer__bottom">
        <div class="container">
            <div class="footer__bottom--in">
                <p class="footer__copy">{{ date('Y') }} &copy; {{ $siteTitle }}</p>
                <a href="https://inweb.uz" class="footer__author" target="_blank">
                    <p>{{ __('main.developer') }}</p>
                    <span>-</span>
                    <img src="{{ asset('img/logo-inweb.svg') }}" alt="Inweb" />
                </a>
            </div>
        </div>
    </div>
</footer>

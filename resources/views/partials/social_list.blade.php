
@php
    $telegram = Helper::setting('contact.telegram');
    $facebook = Helper::setting('contact.facebook');
    $instagram = Helper::setting('contact.instagram');
@endphp
@if ($telegram)
    <li>
        <a href="{{ $telegram }}" title="Telegram" target="_blank" rel="nofollow">
            <svg width="18" height="18" fill="#fff">
                <use xlink:href="#telegram"></use>
            </svg>
        </a>
    </li>
@endif
@if ($facebook)
    <li>
        <a href="{{ $facebook }}" title="Facebook" target="_blank" rel="nofollow">
            <svg width="18" height="18" fill="#fff">
                <use xlink:href="#facebook"></use>
            </svg>
        </a>
    </li>
@endif
@if ($instagram)
    <li>
        <a href="{{ $instagram }}" title="Instagram" target="_blank" rel="nofollow">
            <svg width="18" height="18" fill="#fff">
                <use xlink:href="#instagram"></use>
            </svg>
        </a>
    </li>
@endif


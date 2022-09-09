<div class="item">
    <ul class="item__action">
        {{-- <li>
            <i class="bx bx-share-alt"></i>
        </li> --}}
        <li
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
        </li>
    </ul>
    <a href="{{ route('cars.show', [$car->id]) }}" class="item__photo">
        <img src="{{ asset('img/item.jpg') }}" alt="" />
    </a>
    <div class="item__content">
        <a href="{{ route('cars.show', [$car->id]) }}" class="item__name">{{ $car->full_name }}</a>
        <p class="item__price">
            <b>{{ Helper::formatPrice($car->price) }}</b>
            <i class="bx bxs-circle"></i>
            <span>{{ Helper::formatNumber($car->mileage) }} {{ __('miles') }}</span>
        </p>
    </div>
</div>

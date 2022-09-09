<div class="item">
    <ul class="item__action">
        <li>
            <i class="bx bx-share-alt"></i>
        </li>
        <li>
            <i class="bx bx-heart"></i>
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

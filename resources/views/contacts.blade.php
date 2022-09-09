@extends('layouts.app')

@section('seo_title', $page->getTranslatedAttribute('seo_title') ?: $page->getTranslatedAttribute('name'))
@section('meta_description', $page->getTranslatedAttribute('meta_description'))
@section('meta_keywords', $page->getTranslatedAttribute('meta_keywords'))

@php
    $phone = Helper::setting('contact.phone');
    $phone2 = Helper::setting('contact.phone2');
    $email = Helper::setting('contact.email');
@endphp

@section('content')

<div class="container">

    <!-- box -->
    <section class="section p0-w480">
        <div class="box__container box__container--content" style="background-image: url({{ asset('img/finance.jpg') }});">
            <div class="box__content">
                <h1>{{ $page->getTranslatedAttribute('name') }}</h1>
                {{-- <a href="#" class="btn btn--main">GET pre-approved</a> --}}
            </div>
        </div>
    </section>


    <div class="d-flex">
        <div class="col-50">

            <h3 class="contact-title mb-4">{{ __('main.our_contacts') }}</h3>
            <br>

            <p class="media contact-info mb-3">
                <i class="bx bxs-map"></i>
                <span>{{ $address }}</span>
            </p>
            <br>
            <p class="media contact-info mb-3">
                <i class="bx bxs-phone"></i>
                <a href="tel:{{ Helper::phoneFormat($phone) }}">{{ $phone }}</a>
            </p>
            <br>
            {{-- <div class="media contact-info mb-3">
                <div class="media-body">
                    <span><a href="mailto:{{ $email }}" class="black-link">{{ $email }}</a></span>
                </div>
            </div> --}}

            {{-- <div class="contact-map my-4">
                {!! Helper::setting('contact.map') !!}
            </div> --}}

        </div>
        <div class="col-50">

            <h3 class="contact-title">{{ __('main.write_us') }}</h3>
            <br>

            <form class="form contact-form" method="post"  action="{{ route('contacts.send') }}">

                @csrf

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
                    <button type="submit" class="btn btn--main">{{ __('main.form.send') }}</button>
                </div>
            </form>

            <br>
            <br>
            <br>
        </div>
    </div>

    @if ($page->getTranslatedAttribute('body'))
        <br>
        <br>
        <div class="text-block my-5">
            {!! $page->getTranslatedAttribute('body') !!}
        </div>
    @endif

</div>

@endsection

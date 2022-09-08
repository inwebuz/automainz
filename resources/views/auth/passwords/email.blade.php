@extends('layouts.app')
@section('seo_title', __('main.reset_password'))

@section('content')

@include('partials.alerts')

<section class="modal modal--auth bg-standard">
    <div class="modal__back"></div>
    <div class="modal__in">
        <a href="{{ route('home') }}" class="modal__logo">
            <img src="{{ Helper::logoLight() }}" alt="Automainz" />
        </a>
        <div class="modal__box">
            <h2 class="modal__title">{{ __('main.reset_password') }}</h2>
            <form class="form" action="{{ route('password.email') }}" method="POST">
                @csrf
                <div class="input__box input__box--100">
                    <input type="email" class="input @error('email') error @enderror" name="email" value="{{ old('email') }}" autofocus required />
                    <p class="input__placeholder">{{ __('E-mail') }}</p>
                    @error('email')
                        <span class="input__error">{{ $message }}</span>
                    @enderror
                </div>
                <button type="submit" class="btn btn--main btn--block" disabled>
                    {{ __('main.send_password_reset_link') }}
                </button>
            </form>
        </div>
    </div>
</section>

@endsection

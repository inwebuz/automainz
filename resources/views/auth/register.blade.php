@extends('layouts.guest')
@section('seo_title', __('main.nav.register'))

@section('content')

    <section class="modal modal--auth bg-standard">
        <div class="modal__back"></div>
        <div class="modal__in">
            <a href="{{ route('home') }}" class="modal__logo">
                <img src="{{ Helper::logoLight() }}" alt="Automainz" />
            </a>
            <div class="modal__box">
                <!-- <button type="button" class="modal__close">
                    <i class="bx bx-x"></i>
                </button> -->
                <h2 class="modal__title">{{ __('Registration') }}</h2>
                <form class="form" action="{{ route('register') }}" method="POST">
                    @csrf

                    <div class="input__box input__box--100">
                        <input type="text" name="first_name" class="input @error('first_name') error @enderror" value="{{ old('first_name') }}" required />
                        <p class="input__placeholder">{{ __('First name') }}</p>
                        @error('first_name')
                        <span class="input__error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="input__box input__box--100">
                        <input type="text" name="last_name" class="input @error('last_name') error @enderror" value="{{ old('last_name') }}" required />
                        <p class="input__placeholder">{{ __('Last name') }}</p>
                        @error('last_name')
                        <span class="input__error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="input__box input__box--100">
                        <input type="email" name="email" class="input @error('email') error @enderror" required />
                        <p class="input__placeholder">{{ __('E-mail') }}</p>
                        @error('email')
                        <span class="input__error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="input__box input__box--100">
                        <input type="password" name="password" class="input @error('password') error @enderror" required />
                        <p class="input__placeholder">{{ __('Password') }}</p>
                        @error('password')
                        <span class="input__error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="input__box input__box--100">
                        <input type="password" name="password_confirmation" class="input" required />
                        <p class="input__placeholder">{{ __('Confirm password') }}</p>
                    </div>

                    <button type="submit" class="btn btn--main btn--block" disabled>
                        {{ __('Register') }}
                    </button>
                    <p style="font-weight: 600;text-align: center;width: 100%;font-size: 18px;margin: 40px 0 25px;">
                        {{ __('Already have an account?') }}
                        <a href="{{ route('login') }}" class="modal__link">{{ __('Sign in') }}</a>
                    </p>
                    <p style="text-align: center;font-size: 12px;color: #828282;width: 100%;margin: 0 auto;max-width: 300px;font-weight: 400;">
                        {{ __('By clicking on the "Register" button you agree to') }}
                        <a href="{{ $page7->url }}" class="modal__link">{{ __('Privacy policy') }}</a>
                        {{ __('and') }}
                        <a href="{{ $page8->url }}" class="modal__link">{{ __('Terms of use') }}</a>
                    </p>
                </form>
            </div>
        </div>
    </section>

@endsection

@extends('layouts.guest')
@section('seo_title', __('main.nav.login'))

@section('content')
    @include('partials.alerts')
    <section class="modal modal--auth bg-standard">
        <div class="modal__back"></div>
        <div class="modal__in">
            <a href="{{ route('home') }}" class="modal__logo">
                <img src="{{ Helper::logoLight() }}" alt="Automainz" />
            </a>
            <div class="modal__box">
                <h2 class="modal__title">{{ __('Welcome back') }}!</h2>
                <form class="form" action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="input__box input__box--100">
                        <input type="email" class="input @error('email') error @enderror" name="email" value="{{ old('email') }}" autofocus required />
                        <p class="input__placeholder">{{ __('E-mail') }}</p>
                        @error('email')
                            <span class="input__error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="input__box input__box--100">
                        <input type="password" class="input @error('password') error @enderror" name="password" required />
                        <p class="input__placeholder">{{ __('Password') }}</p>
                        @error('password')
                            <span class="input__error">{{ $message }}</span>
                        @enderror
                    </div>
                    {{-- <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}> --}}
                    <button type="submit" class="btn btn--main btn--block" disabled>
                        {{ __('Sign in') }}
                    </button>
                    <p style="text-align: center;width: 100%;font-size: 14px;font-weight: 600;margin: 40px 0 30px;">
                        <a class="modal__link" href="{{ route('password.request') }}">{{ __('Forgot password?') }}</a>
                    </p>
                    <p style="text-align: center;font-size: 14px;width: 100%;font-weight: 600;">
                        <a href="{{ route('register') }}" class="modal__link">{{ __('Create Automainz account') }}</a>
                    </p>
                </form>
            </div>
        </div>
    </section>
@endsection

@extends('layouts.app')
@section('seo_title', __('main.reset_password'))

@section('content')

    <section class="modal modal--auth bg-standard">
        <div class="modal__back"></div>
        <div class="modal__in">
            <a href="{{ route('home') }}" class="modal__logo">
                <img src="{{ Helper::logoLight() }}" alt="Automainz" />
            </a>
            <div class="modal__box">
                <h2 class="modal__title">{{ __('main.reset_password') }}</h2>
                <form class="form" action="{{ route('password.update') }}" method="POST">
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">

                    <div class="input__box input__box--100">
                        <input type="email" class="input @error('email') error @enderror" name="email" value="{{ old('email') }}" autofocus required />
                        <p class="input__placeholder">{{ __('E-mail') }}</p>
                        @error('email')
                            <span class="input__error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="input__box input__box--100">
                        <input type="password" name="password" class="input @error('password') error @enderror" required />
                        <p class="input__placeholder">{{ __('New password') }}</p>
                        @error('password')
                            <span class="input__error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="input__box input__box--100">
                        <input type="password" name="password_confirmation" class="input" required />
                        <p class="input__placeholder">{{ __('Confirm password') }}</p>
                    </div>

                    <button type="submit" class="btn btn--main btn--block" disabled>
                        {{ __('main.form.send') }}
                    </button>
                </form>
            </div>
        </div>
    </section>


@endsection

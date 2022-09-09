@extends('layouts.app')
@section('seo_title', __('main.profile_edit'))

@section('content')

@include('partials.alerts')

<section class="profile">

    @include('partials.sidebar_profile')

    <main class="field">
        <h1 class="field__title">{{ __('Profile settings') }}</h1>
        <div class="bar__wrapper">
            <div class="bar active">
                <div class="bar__head">
                    <h2 class="bar__title">{{ __('Personal information') }}</h2>
                    {{-- <ul class="bar__actions">
                        <li class="bar__actions--open" data-open>{{ __('Update') }}</li>
                        <li class="bar__actions--close" data-close>{{ __('Close') }}</li>
                    </ul> --}}
                </div>
                <h3 class="bar__name">{{ $user->name }}</h3>
                <div class="bar__form">
                    <form class="form" action="{{ route('profile.update') }}" method="post" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="input__box input__box--50">
                            <input type="text" class="input" name="first_name" value="{{ $user->first_name }}" required />
                            <p class="input__placeholder">{{ __('First name') }} *</p>
                        </div>
                        <div class="input__box input__box--50">
                            <input type="text" class="input" name="last_name" value="{{ $user->last_name }}" required />
                            <p class="input__placeholder">{{ __('Last name') }} *</p>
                        </div>
                        <div class="input__box input__box--100">
                            <input type="text" class="input" name="address" value="{{ $user->address }}" />
                            <p class="input__placeholder">{{ __('Address') }}</p>
                        </div>
                        {{-- <div class="input__box input__box--100">
                            <input type="text" class="input" />
                            <p class="input__placeholder">Address Line (optional)</p>
                        </div>
                        <div class="input__box input__box--50">
                            <input type="text" class="input" />
                            <p class="input__placeholder">Zip (optional)</p>
                        </div>
                        <div class="input__box input__box--50">
                            <select type="text" class="input">
                                <option hidden></option>
                                <option value="Washingtion">Washingtion</option>
                                <option value="Texas">Texas</option>
                            </select>
                            <p class="input__placeholder">State (optional)</p>
                            <button class="input__btn">
                                <i class="bx bx-chevron-down"></i>
                            </button>
                        </div>
                        <div class="input__box input__box--100">
                            <input type="text" class="input" />
                            <p class="input__placeholder">City (optional)</p>
                        </div> --}}
                        <div class="bar__btns">
                            {{-- <a href="javascript:;" class="btn btn--outlined" data-close>{{ __('Cancel') }}</a> --}}
                            <button type="submit" class="btn btn--main">{{ __('Save') }}</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="bar active">
                <div class="bar__head">
                    <h2 class="bar__title">{{ __('Contact settings') }}</h2>
                    {{-- <ul class="bar__actions">
                        <li class="bar__actions--open" data-open>{{ __('Update') }}</li>
                        <li class="bar__actions--close" data-close>{{ __('Close') }}</li>
                    </ul> --}}
                </div>
                <p class="bar__text">{{ __('Let us know the best way to contact you') }}</p>
                <div class="bar__email">
                    <b>{{ __('E-mail') }}</b>
                    <span>{{ $user->email }}</span>
                </div>
                <div class="bar__form">
                    <form class="form" action="{{ route('profile.update') }}" method="post" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="input__box input__box--50">
                            <input type="email" name="email" class="input" value="{{ $user->email }}" required />
                            <p class="input__placeholder">{{ __('E-mail') }}</p>
                        </div>
                        <div class="input__box input__box--50">
                            <input type="text" class="input" name="phone_number" value="{{ $user->phone_number }}" required data-format-phone-number />
                            <p class="input__placeholder">{{ __('Phone number') }}</p>
                        </div>
                        <div class="bar__btns">
                            {{-- <a href="javascript:;" class="btn btn--outlined" data-close>{{ __('Cancel') }}</a> --}}
                            <button type="submit" class="btn btn--main">{{ __('Save') }}</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="bar active">
                <div class="bar__head">
                    <h2 class="bar__title">{{ __('Password and security') }}</h2>
                    {{-- <ul class="bar__actions">
                        <li class="bar__actions--open" data-open>{{ __('Update') }}</li>
                        <li class="bar__actions--close" data-close>{{ __('Close') }}</li>
                    </ul> --}}
                </div>
                <p class="bar__text">{{ __('Manage your signin and security settings') }}</p>
                <div class="bar__form">
                    <form class="form" action="{{ route('profile.password') }}" method="post">
                        @csrf
                        <div class="input__box input__box--100">
                            <input type="password" class="input @error('current_password') error @enderror" name="current_password" required />
                            <p class="input__placeholder">{{ __('Current password') }}</p>
                            @error('current_password')
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
                        <div class="input__box input__box--100">
                            <input type="password" class="input" name="password_confirmation" required />
                            <p class="input__placeholder">{{ __('Confirm Password') }}</p>
                        </div>
                        <div class="bar__btns">
                            {{-- <a href="javascript:;" class="btn btn--outlined" data-close>{{ __('Cancel') }}</a> --}}
                            <button type="submit" class="btn btn--main">{{ __('Save') }}</button>
                        </div>
                    </form>
                </div>
            </div>

            {{-- <div class="bar">
                <div class="bar__head">
                    <h2 class="bar__title">Delete my profile</h2>
                    <ul class="bar__actions">
                        <li class="bar__actions--open bar__actions--red" data-open>
                            Delete
                        </li>
                        <li class="bar__actions--close" data-close>Close</li>
                    </ul>
                </div>
                <p class="bar__text">Proceeding will delete your profile data.</p>
                <div class="bar__form">
                    <form action="#" class="form">
                        <div class="input__box input__box--100">
                            <input type="password" class="input" required />
                            <p class="input__placeholder">Confirm Password</p>
                        </div>
                        <div class="bar__btns">
                            <a href="javascript:;" class="btn btn--outlined" data-close> Cancel </a>
                            <button class="btn btn--red">Delete Profile</button>
                        </div>
                    </form>
                </div>
            </div> --}}

        </div>
    </main>
</section>


@endsection

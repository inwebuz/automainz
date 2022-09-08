@extends('layouts.app')
@section('seo_title', __('main.profile_edit'))

@section('content')

<section class="profile">

    @include('partials.sidebar_profile')

    <main class="field">
        <h1 class="field__title">{{ __('Profile settings') }}</h1>
        <div class="bar__wrapper">
            <div class="bar">
                <div class="bar__head">
                    <h2 class="bar__title">{{ __('Personal information') }}</h2>
                    <ul class="bar__actions">
                        <li class="bar__actions--open" data-open>{{ __('Update') }}</li>
                        <li class="bar__actions--close" data-close>{{ __('Close') }}</li>
                    </ul>
                </div>
                <h3 class="bar__name">{{ $user->name }}</h3>
                <div class="bar__form">
                    <form class="form" action="{{ route('profile.update') }}" method="post" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="input__box input__box--50">
                            <input type="text" class="input" value="Rick" required />
                            <p class="input__placeholder">First name</p>
                        </div>
                        <div class="input__box input__box--50">
                            <input type="text" class="input" value="Astley" required />
                            <p class="input__placeholder">Last name</p>
                        </div>
                        <div class="input__box input__box--100">
                            <input type="text" class="input" />
                            <p class="input__placeholder">Address (optional)</p>
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
                            <a class="btn btn--outlined" data-close> Cancel </a>
                            <button type="submit" class="btn btn--main">Save</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="bar">
                <div class="bar__head">
                    <h2 class="bar__title">Contact settings</h2>
                    <ul class="bar__actions">
                        <li class="bar__actions--open" data-open>Update</li>
                        <li class="bar__actions--close" data-close>Close</li>
                    </ul>
                </div>
                <p class="bar__text">Let us know the best way to contact you.</p>
                <div class="bar__email">
                    <b>{{ __('E-mail') }}</b>
                    <span>{{ $user->email }}</span>
                </div>
                <div class="bar__form">
                    <form class="form" action="{{ route('profile.update') }}" method="post" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="input__box input__box--50">
                            <input
                                type="email"
                                class="input"
                                value="rickroll@gmail.com"
                                required
                            />
                            <p class="input__placeholder">Email</p>
                        </div>
                        <div class="input__box input__box--50">
                            <input
                                type="text"
                                class="input"
                                value="9133846697"
                                required
                                data-format-phone-number
                            />
                            <p class="input__placeholder">Phone number</p>
                        </div>
                        <div class="bar__btns">
                            <a class="btn btn--outlined" data-close> Cancel </a>
                            <button type="submit" class="btn btn--main">Save</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="bar">
                <div class="bar__head">
                    <h2 class="bar__title">Password and security</h2>
                    <ul class="bar__actions">
                        <li class="bar__actions--open" data-open>Update</li>
                        <li class="bar__actions--close" data-close>Close</li>
                    </ul>
                </div>
                <p class="bar__text">Manage your signin and security settings</p>
                <div class="bar__form">
                    <form class="form" action="{{ route('profile.password') }}" method="post">
                        @csrf
                        <div class="input__box input__box--100">
                            <input type="password" class="input" name="current_password" required />
                            <p class="input__placeholder">Current password</p>
                        </div>
                        <div class="input__box input__box--100">
                            <input type="password" class="input" name="password" required />
                            <p class="input__placeholder">Password</p>
                        </div>
                        <div class="input__box input__box--100">
                            <input type="password" class="input" name="password_confirmation" required />
                            <p class="input__placeholder">Confirm Password</p>
                        </div>
                        <div class="bar__btns">
                            <a class="btn btn--outlined" data-close> Cancel </a>
                            <button type="submit" class="btn btn--main">Save</button>
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
                            <a class="btn btn--outlined" data-close> Cancel </a>
                            <button class="btn btn--red">Delete Profile</button>
                        </div>
                    </form>
                </div>
            </div> --}}

        </div>
    </main>
</section>


@endsection

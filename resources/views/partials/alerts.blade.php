<div class="alert-container">
    @if (session()->has('alert') && session()->has('alertType'))
        <div class="alert alert-{{ session()->get('alertType') }}">
            <i class="alert-close bx bx-x"></i>
            <h4 class="m-0">{{ session()->get('alert') }}</h4>
        </div>
    @endif

    @if (session()->has('message'))
        <div class="alert alert-success">
            <i class="alert-close bx bx-x"></i>
            <h4 class="m-0">{{ session()->get('message') }}</h4>
        </div>
    @endif

    @if (session()->has('success'))
        <div class="alert alert-success">
            <i class="alert-close bx bx-x"></i>
            <h4 class="m-0">{{ session()->get('success') }}</h4>
        </div>
    @endif

    @if (session()->has('status'))
        <div class="alert alert-success">
            <i class="alert-close bx bx-x"></i>
            <h4 class="m-0">{{ session()->get('status') }}</h4>
        </div>
    @endif

    @if (session()->has('error'))
        <div class="alert alert-danger">
            <i class="alert-close bx bx-x"></i>
            <h4 class="m-0">{{ session()->get('error') }}</h4>
        </div>
    @endif

    @if (session()->has('verified'))
        <div class="alert alert-success">
            <i class="alert-close bx bx-x"></i>
            <h4 class="m-0">{{ __('E-mail has been verified') }}</h4>
        </div>
    @endif

    @if(session()->has('pmessage'))
        <div class="alert alert-success">
            <i class="alert-close bx bx-x"></i>
            <h4 class="m-0">{{ session()->get('pmessage') }}</h4>
        </div>
    @endif
</div>

{{-- <section class="modal" data-modal="success">
    <div class="modal__back" data-close></div>
    <div class="modal__in">
        <div class="modal__box">
            <button type="button" class="modal__close" data-close>
                <i class="bx bx-x"></i>
            </button>
            <div class="modal__content modal__content--success">
                <img src="assets/img/success.gif" alt="" />
                <h2>Hooray! Thanks for trust</h2>
                <p>Please expect a call from our operators</p>
                <button class="btn btn--main" data-close>OK</button>
            </div>
        </div>
    </div>
</section> --}}

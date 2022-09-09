@extends('layouts.app')
@section('seo_title', __('main.page_not_found'))

@section('content')

<section>

    <div class="container">

        @php
            $page404Text = Helper::staticText('404_page', 30);
        @endphp

        <div class="my-5 py-5">
            <h1>{{ $page404Text->getTranslatedAttribute('name') }}</h1>
            <p>{{ $page404Text->getTranslatedAttribute('description') }}</p>

            <img src="{{ $page404Text->img }}" alt="404" class="img-fluid">
        </div>


    </div>

</section>

@endsection

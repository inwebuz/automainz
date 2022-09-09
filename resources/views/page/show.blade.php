@extends('layouts.app')

@section('seo_title', $page->getTranslatedAttribute('seo_title') ?: $page->getTranslatedAttribute('name'))
@section('meta_description', $page->getTranslatedAttribute('meta_description'))
@section('meta_keywords', $page->getTranslatedAttribute('meta_keywords'))

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

    <section class="section">
        <div class="text-block">
            {!! $page->getTranslatedAttribute('body') !!}
        </div>
    </section>

    {{-- <!-- zigzag -->
    <section class="zigzag section">
        <div class="zigzag__item">
            <div class="zigzag__half">
                <div class="zigzag__content">
                    <h3>Volutpat est velit egestas dui id ornare.</h3>
                    <p>
                        Consectetur adipiscing elit duis tristique. Vulputate mi sit amet
                        mauris commodo quis. Enim praesent elementum facilisis leo vel.
                        Feugiat in fermentum posuere urna nec tincidunt praesent semper.
                        Integer malesuada nunc vel risus commodo.
                    </p>
                </div>
            </div>
            <div class="zigzag__photo">
                <img src="./assets/img/zigzag.png" alt="" />
            </div>
        </div>
        <div class="zigzag__item">
            <div class="zigzag__half">
                <div class="zigzag__content">
                    <h3>Risus at ultrices mi tempus imperdiet nulla.</h3>
                    <p>
                        Id neque aliquam vestibulum morbi blandit cursus risus. Urna
                        condimentum mattis pellentesque id nibh. Cursus vitae congue mauris
                        rhoncus aenean vel elit scelerisque. Mi quis hendrerit dolor magna
                        eget est lorem.
                    </p>
                </div>
            </div>
            <div class="zigzag__photo">
                <img src="./assets/img/zigzag-1.png" alt="" />
            </div>
        </div>
    </section> --}}

    {{-- @can('edit', $page)
        <div class="my-4">
            <a href="{{ url('admin/pages/' . $page->id . '/edit') }}" class="btn btn-lg btn-primary"
                target="_blank">Редактировать (ID: {{ $page->id }})</a>
        </div>
    @endcan --}}
</div>

@endsection

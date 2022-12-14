@extends('layouts.app')

@section('seo_title', $publication->getTranslatedAttribute('seo_title') ?: $publication->getTranslatedAttribute('name'))
@section('meta_description', $publication->getTranslatedAttribute('meta_description'))
@section('meta_keywords', $publication->getTranslatedAttribute('meta_keywords'))
{{-- @section('body_class', 'no-sidebar-page') --}}

@section('content')


<div class="container">
    <!-- box -->
    <section class="section p0-w480">
        <div class="box__container box__container--content" style="background-image: url({{ asset('img/finance.jpg') }});">
            <div class="box__content">
                <h1>{{ $publication->getTranslatedAttribute('name') }}</h1>
                <p>{{ Helper::formatDate($publication->created_at, true) }}</p>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="text-block">
            {!! $publication->getTranslatedAttribute('body') !!}
        </div>
    </section>

    {{-- @can('edit', $publication)
        <div class="my-4">
            <a href="{{ url('admin/publications/' . $publication->id . '/edit') }}" class="btn btn-lg btn-primary"
                target="_blank">Редактировать (ID: {{ $publication->id }})</a>
        </div>
    @endcan --}}
</div>


{{-- <div class="container py-4 py-lg-5">

    <h1>{{ $publication->getTranslatedAttribute('name') }}</h1>

    <div class="my-3">
        <span class="publication-date d-inline-block text-dark">{{ Helper::formatDate($publication->created_at, true) }}</span>
        <span class="page-views"><i class="fa fa-eye"></i>&nbsp;{{ $publication->views }}</span>
    </div>

    @if($publication->video_code)
        <div class="fit-big-videos mb-4">
            {!! $publication->video_code !!}
        </div>
    @endif

    <div class="text-block pb-5">
        @if($publication->image)
            <img src="{{ $publication->img }}" class="img-fluid float-left mr-3 mb-3" alt="{{ $publication->name }}">
        @endif
        {!! $publication->getTranslatedAttribute('body') !!}
    </div>

    @if($publication->file)
        <div class="pb-4">
            <a href="{{ Helper::getFileUrl($publication->file) }}" class="text-dark" download="{{ Helper::getFileOriginalName($publication->file) }}">{{ __('main.to_download') }} {{ $publication->file_name }}</a>
        </div>
    @endif

</div> --}}

@endsection

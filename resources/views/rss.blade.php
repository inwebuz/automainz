{!! '<' . '?xml version="1.0" encoding="UTF-8"?' . '>' !!}
<rss version="2.0" xmlns:atom="http://www.w3.org/2005/Atom">
    <channel>
        <title>{{ Helper::setting('site.title') }} RSS</title>
        <link>{{ route('rss.index') }}</link>
        <description>{{ __('main.news') }} {{ setting('site.title') }}</description>
        <language>{{ app()->getLocale() }}</language>
        <pubDate>{{ now()->format(\DateTimeInterface::RFC1123) }}</pubDate>
        <atom:link href="{{ route('rss.index') }}" rel="self" type="application/rss+xml" />
        @foreach($cars as $car)
            <item>
                <title><![CDATA[{{ $car->full_name }}]]></title>
                <link>{{ $car->url }}</link>
                @if ($car->getTranslatedAttribute('description'))
                <description><![CDATA[{{ $car->getTranslatedAttribute('description') }}]]></description>
                @endif
                <author>{{ Helper::setting('contact.email') }} ({{ Helper::setting('site.title') }})</author>
                <guid>{{ $car->url }}</guid>
                <pubDate>{{ $car->created_at->format(\DateTimeInterface::RFC1123) }}</pubDate>
            </item>
        @endforeach
    </channel>
</rss>

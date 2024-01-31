@extends('layouts.layout')

@section('head')
    @parent

    <meta property="og:title" content="News | Bogen studio" />
    <meta name="twitter:title" content="News | Bogen studio" />
    <meta property="og:site_name" content="News | Bogen studio" />
    <title>News | Bogen studio</title>

    <meta property="og:image"
        content="https://bogenstudio.com/storage/products/x51Jsb43mmTeSYPxZukZrPfJ3CsjI8J0v6JVQp09.jpg" />
    <meta property="og:image:secure_url"
        content="https://bogenstudio.com/storage/products/x51Jsb43mmTeSYPxZukZrPfJ3CsjI8J0v6JVQp09.jpg" />
    <meta property="og:image:width" content="1821" />
    <meta property="og:image:height" content="1024" />
    @if ($pic != null)
        <meta name="twitter:image" content="{{ $pic }}" />
    @endif

    @if ($seo['article_tag'] != null && !empty($seo['article_tag']))
        <meta name="article:tag" content="{{ $seo['article_tag'] }}" />
    @endif

    @if ($seo['keyword'] != null && !empty($seo['keyword']))
        <meta name="keywords" content="{{ $seo['keyword'] }}" />
    @endif

    <?php
    $description = $seo['description'] != null && !empty($seo['description']) ? $seo['description'] : 'Find out about our capabilities, quality and innovation, delivered with collaboration and commitment, focused first and foremost on customer success.';
    ?>

    @if (!empty($description))
        <meta name="description" content="{{ $description }}" />
        <meta name="twitter:description" content="{{ $description }}" />
        <meta property="og:description" content="{{ $description }}" />
    @endif

    <script type="application/ld+json">
        {
          "@context": "https://schema.org",
          "@type": "LocalBusiness",
          "name": "news",
          "image": "https://bogenstudio.com/storage/products/x51Jsb43mmTeSYPxZukZrPfJ3CsjI8J0v6JVQp09.jpg ",
          "@id": "",
          "url": "{{URL::current()}}",
          "telephone": "",
          "address": {
            "@type": "PostalAddress",
            "streetAddress": "Lindengasse 56",
            "addressLocality": "Vienna",
            "postalCode": "1070 Wien",
            "addressCountry": "AU"
          },
          "geo": {
            "@type": "GeoCoordinates",
            "latitude": 48.19966068972558
            "longitude": 16.345892371143226
          },
          "openingHoursSpecification": {
            "@type": "OpeningHoursSpecification",
            "dayOfWeek": [
              "Monday",
              "Tuesday",
              "Wednesday",
              "Thursday",
              "Saturday",
              "Friday",
              "Sunday"
            ],
            "opens": "10:00",
            "closes": "18:00"
          },
          "sameAs": "https://bogenstudio.com/" 
        }
    </script>

    <link rel="stylesheet" href="{{ asset('assets/css/news/all-mobile.css?v=2.1') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/slider/slider.css?v=2.1') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/slider/slider-mobile.css?v=2.1') }}">

    @if (\Illuminate\Support\Facades\App::getLocale() == 'fa' || \Illuminate\Support\Facades\App::getLocale() == 'ar')
        <link rel="stylesheet"
            href="{{ \Illuminate\Support\Facades\URL::asset('/assets/css/slider/slider-mobile-rtl.css?v=2.1') }}">
    @endif

@stop

@section('content')

    <script>
        var locale = '{{ \Illuminate\Support\Facades\App::getLocale() }}';
        var fetchLimit = -1;
        var newsFetchLimit = -1;
    </script>

    @include('layouts.news')

    @include('layouts.videos')


    @include('layouts.footer')
    @include('layouts.footer-mobile')

@stop

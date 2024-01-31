@extends('layouts.layout')

@section('head')
    @parent

    <meta property="og:title" content="Products | Bogen studio" />
    <meta name="twitter:title" content="Products | Bogen studio" />
    <meta property="og:site_name" content="Products | Bogen studio" />
    <title>Products | Bogen studio</title>

    <meta property="og:image"
        content="https://bogenstudio.com/storage/products/psFGT5z1oCwEJzdZ1O8vOSiUi831C163pAWL8fVs.jpg" />
    <meta property="og:image:secure_url"
        content="https://bogenstudio.com/storage/products/psFGT5z1oCwEJzdZ1O8vOSiUi831C163pAWL8fVs.jpg" />
    <meta property="og:image:width" content="2040" />
    <meta property="og:image:height" content="1152" />
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
    $description = $seo['description'] != null && !empty($seo['description']) ? $seo['description'] : 'description :Bogen Studio Virtual reality (VR) and augmented reality (AR) firefighting and commander training software, virtual exhibitions, art galleries, and industrial simulations.';
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
          "name": "product",
          "image": "https://bogenstudio.com/storage/products/psFGT5z1oCwEJzdZ1O8vOSiUi831C163pAWL8fVs.jpg ",
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

    <link rel="stylesheet" href="{{ asset('assets/css/products.css?v=2.1') }}">

    @if (\Illuminate\Support\Facades\App::getLocale() == 'fa' || \Illuminate\Support\Facades\App::getLocale() == 'ar')
        <link rel="stylesheet"
            href="{{ \Illuminate\Support\Facades\URL::asset('/assets/css/product/list/products-rtl.css?v=2.1') }}">
    @endif

    <link rel="stylesheet" href="{{ asset('assets/css/products-mobile.css?v=2.1') }}">

    @if (\Illuminate\Support\Facades\App::getLocale() == 'fa' || \Illuminate\Support\Facades\App::getLocale() == 'ar')
        <link rel="stylesheet"
            href="{{ \Illuminate\Support\Facades\URL::asset('/assets/css/product/list/products-mobile-rtl.css?v=2.1') }}">
    @endif

@stop

@section('content')

    <script>
        var locale = '{{ \Illuminate\Support\Facades\App::getLocale() }}';
        var getProductsUrl = '{{ url('api/' . \Illuminate\Support\Facades\App::getLocale() . '/product/0') }}';
        var productUrl = '{{ url(\Illuminate\Support\Facades\App::getLocale() . '/product') }}';
    </script>

    <div id="products">

        <img class="bogen-loader" id="productLoader" src="{{ asset('assets/images/loading.gif') }}">

        <div id="all-tags"></div>
    </div>

    @include('layouts.footer')
    @include('layouts.footer-mobile')

    <script src="{{ asset('assets/scripts/products.js?v=2.2') }}"></script>
@stop

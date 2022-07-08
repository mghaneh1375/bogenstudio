@extends('layouts.layout')

@section('head')
    @parent

    <meta property="og:title" content="Solutions | Bogen studio" />
    <meta name="twitter:title" content="Solutions | Bogen studio" />
    <meta property="og:site_name" content="Solutions | Bogen studio" />
    <title>Solutions | Bogen studio</title>

    @if($pic != null)
        <meta property="og:image" content="{{$pic}}"/>
        <meta property="og:image:secure_url" content="{{$pic}}"/>
        <meta name="twitter:image" content="{{$pic}}"/>
    @endif

    @if($seo['article_tag'] != null && !empty($seo['article_tag']))
        <meta name="article:tag" content="{{$seo['article_tag']}}" />
    @endif
    
    @if($seo['keyword'] != null && !empty($seo['keyword']))
        <meta name="keywords" content="{{$seo['keyword']}}" />
    @endif

    <?php 
    $description = 
    ($seo['description'] != null && !empty($seo['description'])) ? 
    $seo['description'] :  '';
    ?>
    @if(!empty($description))
        <meta name="description" content="{{$description}}" />
        <meta name="twitter:description" content="{{$description}}" />
        <meta property="og:description" content="{{$description}}" />
    @endif
    
    <script type="application/ld+json">
        {
          "@context": "https://schema.org",
          "@type": "LocalBusiness",
          "name": "نام",
          "image": "عکس ",
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
        

@stop

@section('content')

    <script>
        var locale = '{{\Illuminate\Support\Facades\App::getLocale()}}';
    </script>

    @include('layouts.solutions')


    @include('layouts.footer')
    @include('layouts.footer-mobile')

@stop

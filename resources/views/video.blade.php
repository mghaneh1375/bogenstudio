@extends('layouts.showItem')

@section('seo')

    @if($pic != null)
        <meta property="og:image" content="{{$pic}}"/>
        <meta property="og:image:secure_url" content="{{$pic}}"/>
        <meta name="twitter:image" content="{{$pic}}"/>
    @endif

    <?php $description = ""; ?>

    @if($seo != null)

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
    @endif

    <meta property="og:title" content="{!! $name !!} | Bogen studio" />
    <meta name="twitter:title" content="{!! $name !!} | Bogen studio" />
    <meta property="og:site_name" content="{!! $name !!} | Bogen studio" />
    <title>{!! $name !!} | Bogen studio</title>

    @if(!empty($description))
        <meta name="description" content="{{$description}}" />
        <meta name="twitter:description" content="{{$description}}" />
        <meta property="og:description" content="{{$description}}" />
    @else
        <meta name="description" content="{!! ($digest) !!}" />
        <meta name="twitter:description" content="{!! ($digest) !!}" />
        <meta property="og:description" content="{!! ($digest) !!}" />
    @endif

    <script type="application/ld+json">
    {
    "@context": "https://schema.org",
    "@type": "NewsArticle",
    "headline": "{!! $digest !!}",
    "image": "{{$pic}}",  
    "author": {
        "@type": "Organization",
        "name": "Bogen Studio",
        "url": "https://www.Bogenstudio.com"
    },  
    "publisher": {
        "@type": "Organization",
        "name": "Bogen Studio",
        "logo": {
        "@type": "ImageObject",
        "url": "https://bogenstudio.com/assets/images/layer.png"
        }
    },
    "datePublished": "{{$createdAt}}"
    }
    </script>

@stop

@section('fetch')
    <script>
        var getProductUrl = '{{url('api/' . \Illuminate\Support\Facades\App::getLocale() . '/video/show/' . $videoId)}}';
    </script>
@stop

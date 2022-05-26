<link rel="stylesheet" href="{{\Illuminate\Support\Facades\URL::asset('assets/css/solution/solutions.css?v=2.1')}}">
<link rel="stylesheet" href="{{\Illuminate\Support\Facades\URL::asset('assets/css/card.css?v=2.1')}}">

@if(\Illuminate\Support\Facades\App::getLocale() == 'fa' ||
        \Illuminate\Support\Facades\App::getLocale() == 'ar' )
    <link rel="stylesheet" href="{{\Illuminate\Support\Facades\URL::asset('/assets/css/solution/solutions-rtl.css?v=2.1')}}">
@endif

<link rel="stylesheet" href="{{\Illuminate\Support\Facades\URL::asset('/assets/css/solution/solution-mobile.css?v=2.1')}}">

<div id="solutions">
    <div id="all">
        <div>
            <h1>{{__('solution.letus')}}</h1>
            <div id="categories"></div>
        </div>
    </div>
</div>

<script>
    var fetchNewsUrl = '{{url('api/' . \Illuminate\Support\Facades\App::getLocale() . '/solutions')}}';
</script>

<script src="{{\Illuminate\Support\Facades\URL::asset('assets/scripts/solutions.js?v=2.1')}}"></script>


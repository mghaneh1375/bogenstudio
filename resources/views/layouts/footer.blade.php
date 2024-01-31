<link rel="stylesheet" href="{{ \Illuminate\Support\Facades\URL::asset('/assets/css/footer.css?v=2.1') }}">
@if (\Illuminate\Support\Facades\App::getLocale() == 'fa' || \Illuminate\Support\Facades\App::getLocale() == 'ar')
    <link rel="stylesheet" href="{{ \Illuminate\Support\Facades\URL::asset('/assets/css/footer-rtl.css?v=2.1') }}">
@endif

<footer id="desktop-footer">

    <div class="col">
        <h1>{{ __('footer.monsterText') }}</h1>
        <img src="{{ \Illuminate\Support\Facades\URL::asset('assets/images/footer.png') }}">
        <p>{{ __('footer.located') }}</p>
    </div>

    <div class="col">
        <h1>{{ __('footer.findOutMore') }}</h1>
        <a
            href="{{ route('products', ['locale' => \Illuminate\Support\Facades\App::getLocale()]) }}">{{ __('footer.products') }}</a>
        <a
            href="{{ route('solutions', ['locale' => \Illuminate\Support\Facades\App::getLocale()]) }}">{{ __('footer.solutions') }}</a>
        <a
            href="{{ route('allNews', ['locale' => \Illuminate\Support\Facades\App::getLocale()]) }}">{{ __('footer.news') }}</a>
        <a
            href="{{ route('about', ['locale' => \Illuminate\Support\Facades\App::getLocale()]) }}">{{ __('footer.about') }}</a>

        <div class="address">
            <h1>{{ __('footer.address_header') }}</h1>
            <p>{{ __('footer.address_desc') }}</p>
        </div>

    </div>

    <div class="col">
        <h1>{{ __('footer.products') }}</h1>
        <a>Blink</a>
        <a>Fire Studio</a>
    </div>

    {{-- <div class="col">
        <h1>{{ __('footer.lang') }}</h1>
        <a href="{{ route('changeLang', ['lang' => 'en']) }}">English</a>
        <a href="{{ route('changeLang', ['lang' => 'gr']) }}">Deutsch</a>
        <a href="{{ route('changeLang', ['lang' => 'ar']) }}">العربیه</a>
        <a href="{{ route('changeLang', ['lang' => 'fa']) }}">فارسی</a>
    </div> --}}

    <div class="col">
        <h1>{{ __('footer.findUs') }}</h1>
        <a>{{ __('footer.youtube') }}</a>
        <a>{{ __('footer.linkedIn') }}</a>
        <a>{{ __('footer.emailUs') }}</a>
    </div>

</footer>

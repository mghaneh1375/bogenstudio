<link rel="stylesheet" href="{{ \Illuminate\Support\Facades\URL::asset('/assets/css/footer.css?v=2.1') }}">
@if (\Illuminate\Support\Facades\App::getLocale() == 'fa' || \Illuminate\Support\Facades\App::getLocale() == 'ar')
    <link rel="stylesheet" href="{{ \Illuminate\Support\Facades\URL::asset('/assets/css/footer-rtl.css?v=2.1') }}">
@endif

<link rel="stylesheet" href="{{ asset('/assets/css/footer-mobile.css?v=2.1') }}">

<footer id="phone-footer" class="hidden">

    <div class="col">
        <h1>{{ __('footer.lang') }}</h1>
        <a href="{{ route('changeLang', ['lang' => 'en']) }}">English</a>
        <a href="{{ route('changeLang', ['lang' => 'gr']) }}">Deutsch</a>
        <a href="{{ route('changeLang', ['lang' => 'ar']) }}">العربیه</a>
        <a href="{{ route('changeLang', ['lang' => 'fa']) }}">فارسی</a>
    </div>

    <div class="col">
        <h1>{{ __('footer.findUs') }}</h1>
        <a>{{ __('footer.youtube') }}</a>
        <a>{{ __('footer.linkedIn') }}</a>
        <a>{{ __('footer.emailUs') }}</a>
    </div>

    <div class="col">
        <h1>{{ __('footer.monsterText') }}</h1>
        <img src="{{ asset('assets/images/footer.png') }}">
        <p>{{ __('footer.located') }}</p>
    </div>

    <div class="col">
        <h1>{{ __('footer.address_header') }}</h1>
        <p>{{ __('footer.address_desc') }}</p>
    </div>

</footer>

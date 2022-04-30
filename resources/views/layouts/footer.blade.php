<link rel="stylesheet" href="{{\Illuminate\Support\Facades\URL::asset('/assets/css/footer.css')}}">
@if(\Illuminate\Support\Facades\App::getLocale() == 'fa' ||
    \Illuminate\Support\Facades\App::getLocale() == 'ar' )
    <link rel="stylesheet" href="{{\Illuminate\Support\Facades\URL::asset('/assets/css/footer-rtl.css')}}">
@endif

<footer>

    <div class="col">
        <h1>We are in Vienna, The heart of Beauty & Technology</h1>
        <img src="{{\Illuminate\Support\Facades\URL::asset('assets/images/footer.png')}}">
        <p>Located in Vienna Impact Hub</p>
    </div>

    <div class="col">
        <h1>{{__('footer.findOutMore')}}</h1>
        <a>{{__('footer.products')}}</a>
        <a>{{__('footer.solutions')}}</a>
        <a>{{__('footer.news')}}</a>
        <a>{{__('footer.about')}}</a>

        <div class="address">
            <h1>{{__('footer.address_header')}}</h1>
            <p>{{__('footer.address_desc')}}</p>
        </div>

    </div>

    <div class="col">
        <h1>products</h1>
        <a>Blink</a>
        <a>Fire Studio</a>
    </div>

    <div class="col">
        <h1>In your Language</h1>
        <a href="{{route('changeLang', ['lang' => 'en'])}}">English</a>
        <a>Deutsch</a>
        <a>العربیه</a>
        <a href="{{route('changeLang', ['lang' => 'fa'])}}">فارسی</a>
    </div>

    <div class="col">
        <h1>{{__('footer.findUs')}}</h1>
        <a>{{__('footer.instagram')}}</a>
        <a>{{__('footer.youtube')}}</a>
        <a>{{__('footer.linkedIn')}}</a>
        <a>{{__('footer.emailUs')}}</a>
        <a>{{__('footer.call')}}</a>
    </div>

</footer>

<link rel="stylesheet" href="{{\Illuminate\Support\Facades\URL::asset("assets/css/contact.css?v=2.1")}}"/>
@if(\Illuminate\Support\Facades\App::getLocale() == 'fa' ||
    \Illuminate\Support\Facades\App::getLocale() == 'ar' )
    <link rel="stylesheet" href="{{\Illuminate\Support\Facades\URL::asset('/assets/css/contact-rtl.css?v=2.1')}}">
@endif

<link rel="stylesheet" href="{{asset('/assets/css/contact-mobile.css?v=2.1')}}">

<div id="contact">
    <input id="name" placeholder="{{__('contact.name')}}">
    <input id="mail" placeholder="{{__('contact.mail')}}">
    <input id="phone" placeholder="{{__('contact.phone')}}">
    <button id="contactUs">{{__('contact.contact')}}</button>
</div>

<script>
    var contactUrl = '{{route('contactMe')}}';
</script>

<script src="{{\Illuminate\Support\Facades\URL::asset('assets/scripts/contact.js?v=2.1')}}"></script>

<link rel="stylesheet" href="{{\Illuminate\Support\Facades\URL::asset("assets/css/contact.css")}}"/>
@if(\Illuminate\Support\Facades\App::getLocale() == 'fa' ||
    \Illuminate\Support\Facades\App::getLocale() == 'ar' )
    <link rel="stylesheet" href="{{\Illuminate\Support\Facades\URL::asset('/assets/css/contact-rtl.css')}}">
@endif

<div id="contact">
    <input id="name" placeholder="{{__('contact.name')}}">
    <input id="mail" placeholder="{{__('contact.mail')}}">
    <input id="phone" placeholder="{{__('contact.phone')}}">
    <button id="contactUs">{{__('contact.contact')}}</button>
</div>

<script>
    var contactUrl = '{{route('contactMe')}}';
</script>

<script src="{{\Illuminate\Support\Facades\URL::asset('assets/scripts/contact.js')}}"></script>

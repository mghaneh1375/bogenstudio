
<link rel="stylesheet" href="{{\Illuminate\Support\Facades\URL::asset("assets/css/contact.css")}}"/>

<div id="contact">
    <input id="name" placeholder="Name">
    <input id="mail" placeholder="Email">
    <input id="phone" placeholder="Phone No.">
    <button id="contactUs">Let us contact you</button>
</div>

<script>
    var contactUrl = '{{route('contactMe')}}';
</script>

<script src="{{\Illuminate\Support\Facades\URL::asset('assets/scripts/contact.js')}}"></script>

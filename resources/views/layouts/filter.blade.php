<link rel="stylesheet" href="{{asset('assets/css/filter/filter.css?v=2.1')}}">
<link rel="stylesheet" href="{{asset('assets/css/filter/filter-mobile.css?v=2.1')}}">
<div id="filter-box">

<ul>
    <li id="selectedItem">Select Category</li>

    <div id="choices" class="close"></div>

    <img id="drop-down-arrow" src="{{asset('assets/images/chevron-down.svg')}}">
</ul>

    <div id="videoFilter">Only Videos</div>

    <div id="back">Back</div>

</div>

<script>var backUrl = '{{url()->previous()}}';</script>
<script src="{{asset('assets/scripts/filter.js?v=2.1')}}"></script>

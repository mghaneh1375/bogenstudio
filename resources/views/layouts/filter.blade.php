<link rel="stylesheet" href="{{asset('assets/css/filter/filter.css?v=1.1')}}">
<link rel="stylesheet" href="{{asset('assets/css/filter/filter-mobile.css?v=1.1')}}">
<div id="filter-box">

<ul>
    <li>Select Category</li>
    <img id="drop-down-arrow" src="{{asset('assets/images/chevron-down.svg')}}">
</ul>

    <div id="videoFilter">Only Videos</div>

    <div id="back">Back</div>

</div>

<script>

    var onlyVideo = false;

    $(document).ready(function () {

        $("#back").on('click', function () {
            document.location.href = '{{url()->previous()}}';
        });

        $("#videoFilter").on('click', function () {

            onlyVideo = !onlyVideo;

            if(onlyVideo)
                $(".item").addClass('hidden');
            else
                $(".item").removeClass('hidden');
        });

    });

</script>

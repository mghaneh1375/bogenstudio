<link rel="stylesheet" href="{{asset('assets/css/filter/filter.css?v=1.1')}}">
<link rel="stylesheet" href="{{asset('assets/css/filter/filter-mobile.css?v=1.1')}}">
<div id="filter-box">

<ul>
    <li id="selectedItem">Select Category</li>

    <div id="choices" class="close"></div>

    <img id="drop-down-arrow" src="{{asset('assets/images/chevron-down.svg')}}">
</ul>

    <div id="videoFilter">Only Videos</div>

    <div id="back">Back</div>

</div>

<script>

    var onlyVideo = false;

    function filter(cat) {

        $("#choices").toggleClass('close');

        if(onlyVideo)
            return;

        $("#selectedItem").empty().append(cat);

        cat = "_" + cat +"_";

        $("#all .item").addClass('hidden').each(function () {
            if($(this).attr('data-cats').includes(cat))
                $(this).removeClass('hidden');
        });
    }

    $(document).ready(function () {

        $("#back").on('click', function () {
            document.location.href = '{{url()->previous()}}';
        });

        $("#videoFilter").on('click', function () {

            onlyVideo = !onlyVideo;

            if(onlyVideo) {
                $("#all .item").addClass('hidden');
                $("#videoFilter").addClass('selected');
            }
            else {
                $("#all .item").removeClass('hidden');
                $("#videoFilter").removeClass('selected');
            }
        });

        $("#drop-down-arrow").on('click', function () {
            $("#choices").toggleClass('close');
        });

        $("#selectedItem").on('click', function () {
            $("#choices").toggleClass('close');
        });
    });

</script>

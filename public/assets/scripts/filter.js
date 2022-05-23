
var onlyVideo = false;

function filter(cat, toggleChoicesBox = true) {

    if(toggleChoicesBox)
        $("#choices").toggleClass('close');

    if(onlyVideo || cat === "Select Category")
        return;

    $(".paginator").remove();
    $("#selectedItem").empty().append(cat);

    cat = "_" + cat +"_";

    $("#all .item").addClass('hidden').each(function () {
        if($(this).attr('data-cats').includes(cat))
            $(this).removeClass('hidden');
    });
}

$(document).ready(function () {

    $("#back").on('click', function () {
        document.location.href = backUrl;
    });

    $("#videoFilter").on('click', function () {

        onlyVideo = !onlyVideo;

        if(onlyVideo) {
            $("#all .item").addClass('hidden');
            $("#videoFilter").addClass('selected');
            $(".paginator").addClass('hidden');
        }
        else {
            $("#all .item").removeClass('hidden');
            $("#videoFilter").removeClass('selected');
            $(".paginator").removeClass('hidden');
            filter($("#selectedItem").text(), false);
        }
    });

    $("#drop-down-arrow").on('click', function () {
        $("#choices").toggleClass('close');
    });

    $("#selectedItem").on('click', function () {
        $("#choices").toggleClass('close');
    });
});

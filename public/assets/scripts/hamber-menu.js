$(document).ready(function () {

    $("#hamber-menu").on('click', function () {
        $("body").addClass('no-scroll');
        $("#open-menu").removeClass('hidden');
    });

    $("#close-hamber-menu").on('click', function () {
        $("body").removeClass('no-scroll');
        $("#open-menu").addClass('hidden');
    });

});

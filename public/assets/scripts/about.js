var oldIdx = 1;
var changing = false;

var slider_time_out = 20000;
var slider_transition_time = 2000;
var currIdx = 1;
var totalSliders = 5;

var timer;

$(document).ready(function () {

    $("#slider .bubble").on('click', function () {

        if(changing)
            return;

        clearInterval(timer);
        setTimer();

        currIdx = $(this).attr('data-idx');
        nextSlider();

    });

    setTimer();
});

function setTimer() {

    timer = setInterval(function () {
        currIdx++;
        if(currIdx > totalSliders)
            currIdx = 1;

        nextSlider();
    }, slider_time_out);
}

function nextSlider() {

    changing = true;
    $("#slider .images img").removeClass('imp');
    $("#img-" + currIdx).addClass('active').addClass('imp');

    setTimeout(function () {
        $("#img-" + oldIdx).removeClass('active');
        oldIdx = currIdx;
        changing = false;
    }, slider_transition_time);

    $("#slider .bubble").removeClass('selected-bubble');
    $("#bubble-" + currIdx).addClass('selected-bubble');

}

var oldIdx = -1;
var changing = false;

var slider_time_out = 5000;
var slider_transition_time = 2000;
var currIdx = 1;

var timer;

function start() {

    $("#slider .bubble").on('click', function () {

        if(changing)
            return;

        clearInterval(timer);
        setTimer();

        currIdx = $(this).attr('data-idx');
        nextSlider();

    });

    currIdx = 1;
    nextSlider();
    setTimer();

}

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
    $("#slider-h").empty().append($("#img-" + currIdx).attr('data-title'));
    $("#slider-p").empty().append($("#img-" + currIdx).attr('data-text'));

    setTimeout(function () {
        $("#img-" + oldIdx).removeClass('active');
        oldIdx = currIdx;
        changing = false;
    }, slider_transition_time);

    $("#slider .bubble").removeClass('selected-bubble');
    $("#bubble-" + currIdx).addClass('selected-bubble');

}

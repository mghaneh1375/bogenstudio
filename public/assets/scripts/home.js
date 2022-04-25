$(document).ready(function () {
    $(".three-col > .three-col-item").on('mouseenter', function () {
        hover($(this), true);
    }).on('mouseleave', function () {
        hover($(this), false);
    });

});

function hover(node, on) {

    var nth = node.attr("data-nth");
    var newSrc = "";

    switch (nth) {
        case "1":
            if(on)
                newSrc = "./assets/images/blinkcolor.png";
            else
                newSrc = "./assets/images/blinkgray.png";
            break;
        default:
            if(on)
                newSrc = "./assets/images/fireblue.svg";
            else
                newSrc = "./assets/images/firegray.svg";
            break;
    }

    node.children("img").attr('src', newSrc);


}

function getArticles() {

    $.ajax({
        type: 'get',
        url: ''
    });

}

var productTags = [];
var selectedTag;

function selectProduct(idx) {
    $("#productsBubbles .bubble").removeClass('selected-bubble');
    $("#productBubble_" + idx).addClass('selected-bubble');
    $("#productTitle").text(selectedTag.products[idx].title);
    $("#productDigest").text(selectedTag.products[idx].digest);
}

function changeProductTag(idx) {

    selectedTag = productTags[idx];

    $("#productsTag .item").removeClass('selected');
    $('#tag_' + idx).addClass('selected');

    var bubbles = "";

    for(var i = 0; i < selectedTag.products.length; i++)
        bubbles += '<div id="productBubble_' + i + '" data-idx="' + i + '" class="bubble"></div>';

    $("#productsBubbles").empty().append(bubbles);

    if(selectedTag.products.length > 0)
        selectProduct(0);

    $("#productsBubbles .bubble").on('click', function () {
        selectProduct(parseInt($(this).attr('data-idx')));
    });
}

$(document).ready(function () {

    $(".three-col > .three-col-item").on('mouseenter', function () {
        hover($(this), true);
    }).on('mouseleave', function () {
        hover($(this), false);
    });

    getArticles();

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
        url: getProductsPath,
        headers: {
            'Accept': 'application/json'
        },
        success: function (res) {

            if(res.status !== "ok")
                return;

            res = res.data;
            productTags = res;

            var tags = '';

            for(var i = 0; i < res.length; i++) {
                tags += '<div id="tag_' + i + '" data-idx="' + i + '" class="item">' +
                    '<p>' + res[i].tag + '</p>' +
                    '</div>';
            }

            var productsTagNode = $("#productsTag");

            productsTagNode.append(tags);

            if(res.length > 0)
                changeProductTag(0);

            $('#productsTag .item').on('click', function () {
                changeProductTag(parseInt($(this).attr('data-idx')));
            });

            var productsTagLeft = productsTagNode.offset().left;
            var productsTagWidth = productsTagNode[0].scrollWidth;

            $("#productNextArrow").on('click', function () {

                var nextArrowLeft = $(this).offset().left;
                var scrollLeft = productsTagNode[0].scrollLeft;

                if(nextArrowLeft - productsTagLeft < productsTagWidth - scrollLeft) {
                    productsTagNode.animate({
                        scrollLeft: scrollLeft + 100
                    }, 700);
                }

            });

            $("#productBackArrow").on('click', function () {

                var scrollLeft = productsTagNode[0].scrollLeft;

                if(scrollLeft > 0) {
                    productsTagNode.animate({
                        scrollLeft: scrollLeft > 100 ? scrollLeft - 100 : 0
                    }, 700);
                }

            });


        }
    });

}

var productTags = [];
var selectedTag;
var element;
var allElements;

function selectProduct(idx) {
    $("#productsBubbles .bubble").removeClass("selected-bubble");
    $("#productBubble_" + idx).addClass("selected-bubble");
    $("#productTitle").text(selectedTag.products[idx].title);
    $("#productDigest").text(selectedTag.products[idx].digest);
    $("#productSlider").attr("src", selectedTag.products[idx].pic);
    element;
}

function changeProductTag(idx) {
    selectedTag = productTags[idx];

    allElements = 0;
    element = 0;
    $("#productsTag .item").removeClass("selected");
    $("#tag_" + idx).addClass("selected");

    var bubbles = "";

    for (var i = 0; i < selectedTag.products.length; i++) {
        bubbles +=
            '<div id="productBubble_' +
            i +
            '" data-idx="' +
            i +
            '" class="bubble"></div>';
    }

    $("#productsBubbles").empty().append(bubbles);

    if (selectedTag.products.length > 0) {
        allElements = selectedTag.products.length - 1;
        selectProduct(0);
        element = $("#productsBubbles")
            .find(".selected-bubble")
            .attr("data-idx");
        element = parseInt(element);
    }

    $("#productsBubbles .bubble").on("click", function () {
        selectProduct(parseInt($(this).attr("data-idx")));
    });
}
$("#bubbleBackArrow").on("click", function () {
    if (element > 0) {
        element = element - 1;
        selectProduct(element);
    }
});

$("#bubbleNextArrow").on("click", function () {
    if (element < allElements) {
        element = element + 1;
        selectProduct(element);
    }
});

$(document).ready(function () {
    $(".three-col > .three-col-item")
        .on("mouseenter", function () {
            hover($(this), true);
        })
        .on("mouseleave", function () {
            hover($(this), false);
        });

    // getArticles();
});

function hover(node, on) {
    var nth = node.attr("data-nth");
    var newSrc = "";

    switch (nth) {
        case "1":
            if (on) newSrc = assetPath + "images/blinkcolor.png";
            else newSrc = assetPath + "images/blinkgray.png";
            break;
        default:
            if (on) newSrc = assetPath + "images/fireblue.svg";
            else newSrc = assetPath + "images/firegray.svg";
            break;
    }

    node.children("img").attr("src", newSrc);
}

function getArticles() {
    $.ajax({
        type: "get",
        url: getProductsPath,
        headers: {
            Accept: "application/json",
        },
        success: function (res) {
            if (res.status !== "ok") return;

            res = res.data;
            productTags = res;

            var tags = "";

            for (var i = 0; i < res.length; i++) {
                tags +=
                    '<div id="tag_' +
                    i +
                    '" data-idx="' +
                    i +
                    '" class="item">' +
                    "<p>" +
                    res[i].tag +
                    "</p>" +
                    "</div>";
            }

            var productsTagNode = $("#productsTag");

            productsTagNode.append(tags);

            if (res.length > 0) changeProductTag(0);

            $("#productsTag .item").on("click", function () {
                changeProductTag(parseInt($(this).attr("data-idx")));
            });

            if (locale === "fa" || locale === "ar") scrollProductTagsRtl();
            else scrollProductTagsLtr();

            $("#productLoader").remove();
            $("#products .left").removeClass("hidden");
        },
    });
}

function scrollProductTagsLtr() {
    var productsTagNode = $("#productsTagParent");

    var productsTagLeft = productsTagNode.offset().left;
    var productsTagWidth = productsTagNode[0].scrollWidth;

    $("#productNextArrow").on("click", function () {
        var nextArrowLeft = $(this).offset().left;
        var scrollLeft = productsTagNode[0].scrollLeft;
        if (nextArrowLeft - productsTagLeft > productsTagWidth - scrollLeft) {
            productsTagNode.animate(
                {
                    scrollLeft: scrollLeft + 150,
                },
                700
            );
        }
    });

    $("#productBackArrow").on("click", function () {
        var scrollLeft = productsTagNode[0].scrollLeft;

        if (scrollLeft > 0) {
            productsTagNode.animate(
                {
                    scrollLeft: scrollLeft > 100 ? scrollLeft - 100 : 0,
                },
                700
            );
        }
    });
}

function scrollProductTagsRtl() {
    var productsTagNode = $("#productsTagParent");

    $("#productNextArrow").on("click", function () {
        var scrollRight = productsTagNode[0].scrollLeft;

        productsTagNode.animate(
            {
                scrollLeft: scrollRight - 100,
            },
            700
        );
    });

    $("#productBackArrow").on("click", function () {
        var scrollLeft = productsTagNode[0].scrollLeft;

        if (scrollLeft < 0) {
            productsTagNode.animate(
                {
                    scrollLeft: scrollLeft < -100 ? scrollLeft + 100 : 0,
                },
                700
            );
        }
    });
}
$(document).ready(function () {
    var currPage = 0;
    var totalPage = 0;

    $.ajax({
        type: "get",
        url: fetchNewsUrl + "/" + newsFetchLimit,
        headers: {
            Accept: "application/json",
        },
        success: function (res) {
            if (res.status !== "ok") return;

            res = res.data;
            var html = "";
            html += '<div id="all">';

            for (let i = 0; i < 4; i++) {
                html += '<div data-cats="" class="item">';
                html +=
                    '<div class="img"style="background-image: url(' +
                    res[i].image +
                    ')"></div>';
                html += "<h1>" + res[i].title + "</h1>";
                html += '<p class="desc">' + res[i].digest + "</p>";
                html += '<p data-id="17" class="more">';
                html += "</p>";
                html += "</div>";
            }
            html += "</div>";
            $("#news").append(html);
        },
    });
});

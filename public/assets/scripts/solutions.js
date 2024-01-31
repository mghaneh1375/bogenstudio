$(document).ready(function () {
    $.ajax({
        type: "get",
        url: fetchNewsUrl,
        headers: {
            Accept: "application/json",
        },
        success: function (res) {
            $("#categories-container").removeClass("hidden");
            $("#loader").remove();

            if (res.status !== "ok") return;

            var categories = res.categories;

            var html = "";
            html += "<div class='cats'>";
            html +=
                "<button style='padding: 10px 20px' data-filter='all' class='cat selected'>All</button>";
            html += "</div>";

            for (var i = 0; i < categories.length; i++) {
                var currTag = categories[i].tag;

                html += "<p>" + currTag + "</p>";
                html += "<div class='cats'>";

                for (var k = 0; k < categories[i].sub.length; k++) {
                    html +=
                        "<button data-filter='" +
                        categories[i].sub[k].split(" ").join("_") +
                        "' class='cat'>" +
                        categories[i].sub[k] +
                        "</button>";
                }

                html += "</div>";
            }

            $("#categories").append(html);

            res = res.data;

            html =
                "<div style='flex-direction: row; flex-wrap: wrap;margin-top: 25px;justify-content: space-between;margin-right:10px'>";
            for (i = 0; i < res.length; i++) {
                let t = "tag_" + res[i].tag.split(" ").join("_");

                // if (i === 0)
                //     html +=
                //         "<div class='items' id='tag_" +
                //         res[i].tag.split(" ").join("_") +
                //         "'>";
                // else
                //     html +=
                //         "<div class='hidden items' id='tag_" +
                //         res[i].tag.split(" ").join("_") +
                //         "'>";

                for (var j = 0; j < res[i].items.length; j++) {
                    html += '<div class="item ' + t + '">';
                    html +=
                        "<div class='img' style='background-image: url(" +
                        res[i].items[j].image +
                        ")'></div>";
                    html += "<h1>" + res[i].items[j].title + "</h1>";
                    html +=
                        "<p class='desc'>" + res[i].items[j].digest + "</p>";
                    html +=
                        '<p data-id="' +
                        res[i].items[j].id +
                        '" class="more">' +
                        JSTranslate["more"] +
                        "</p>";
                    html += "</div>";
                }

                // html += "</div>";
            }
            html += "</div>";

            $("#all").append(html);

            $(".cat").on("click", function () {
                doFilter($(this).attr("data-filter"));

                $(".cats .cat").removeClass("selected");
                $(this).addClass("selected");
            });

            $(".more").on("click", function () {
                document.location.href =
                    redirectUrl + "/" + $(this).attr("data-id");
            });

            doFilter("all");
        },
    });

    function doFilter(filter) {
        if (filter === "all") $("#all .item").removeClass("hidden");
        else {
            $("#all .item")
                .addClass("hidden")
                .each(function () {
                    if ($(this).hasClass("tag_" + filter))
                        $(this).removeClass("hidden");
                });
        }
    }
});
$("#categories-container").click(function () {
    if ($(".close").css("height") == "35px") {
        $(".close").css("height", "315px");
    } else {
        $(".close").css("height", "35px");
    }
});

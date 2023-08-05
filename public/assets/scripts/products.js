$(document).ready(function () {
    $.ajax({
        type: "get",
        url: getProductsUrl,
        headers: {
            accept: "application/json",
        },
        success: function (res) {
            if (res.status !== "ok") return;

            var tags = res.tags;
            var html = "";

            html +=
                "<button data-filter='all' id='tag_all' class='tag'>All</button>";

            for (var i = 0; i < tags.length; i++) {
                let t = tags[i].replaceAll(" ", "_");
                html +=
                    "<button data-filter='" +
                    t +
                    "' id='tag_" +
                    t +
                    "' class='tag'>" +
                    tags[i] +
                    "</button>";
            }

            $("#all-tags").append(html);

            res = res.data;
            html = "";

            for (i = 0; i < res.length; i++) {
                var classHtml = "";

                for (var j = 0; j < res[i].tags.length; j++) {
                    let t = res[i].tags[j].replaceAll(" ", "_");
                    classHtml += t + " ";
                }

                html += "<div class='card " + classHtml + "'>";
                html += "<div class='desc'>";
                html += "<div class='tags'>";

                for (j = 0; j < res[i].tags.length; j++) {
                    html +=
                        "<span>" +
                        res[i].tags[j] +
                        "</span><span>&nbsp;</span><span>&nbsp;</span><span>&nbsp;</span>";
                }

                html += "</div>";

                html += "<h1>" + res[i].title + "</h1>";
                html += "<p>" + res[i].digest + "</p>";
                html += "</div>";

                html +=
                    "<div data-id='" +
                    res[i].id +
                    "' style='cursor: pointer' class='img redirector'>";
                html +=
                    '<div style="background-image: url(' +
                    res[i].image +
                    ')"></div>';
                html +=
                    '<div data-id="' +
                    res[i].id +
                    '" class="more"><span>' +
                    JSTranslate["more"] +
                    "</span></div>";
                html += "</div>";

                html += "</div>";
            }

            $("#productLoader").remove();
            $("#products").append(html);

            $(document).ready(function () {
                $("#all-tags .tag").on("click", function () {
                    doFilter($(this).attr("data-filter"));
                });

                $(".more").on("click", function () {
                    document.location.href =
                        productUrl + "/" + $(this).attr("data-id");
                });

                $(".redirector").on("click", function () {
                    document.location.href =
                        productUrl + "/" + $(this).attr("data-id");
                });
            });

            doFilter("all");
        },
    });

    function doFilter(tag) {
        $("#all-tags .tag").removeClass("selected");
        $("#tag_" + tag).addClass("selected");
        if (tag === "all") $("#products .card").removeClass("hidden");
        else
            $("#products .card")
                .addClass("hidden")
                .each(function () {
                    if ($(this).hasClass(tag)) $(this).removeClass("hidden");
                });
    }
});

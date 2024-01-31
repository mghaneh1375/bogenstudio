$(document).ready(function () {
    $.ajax({
        type: "get",
        url: getProductUrl,
        headers: {
            accept: "application/json",
        },
        success: function (res) {
            if (res.status !== "ok") return;
            res = res.data;
            var html = "<div class='card'>";
            html +=
                '<span class="glyphicon glyphicon-arrow-left"style="position: absolute;left: 30px;top: -330px;cursor: pointer;font-size: 30px;" onclick="history.back();"></span>';

            if (res.image !== undefined)
                html +=
                    '<div class="img" style="background-position: center;background: url(' +
                    res.image +
                    ')"></div>';

            if (res.preview !== undefined)
                html +=
                    '<div class="img" style="background-position: center;background: url(' +
                    res.preview +
                    ')"></div>';

            // html += "<div class='date'>" + res.created_at + "</div>";
            html += "<h1>" + res.title + "</h1>";
            html += "<p>" + res.description + "</p>";
            html += "</div>";

            $("#loader").remove();
            $("#products").append(html);
            $("figcaption").attr("contenteditable", "false");
            $(".image").addClass("dispalyFlexProduct");
        },
    });
});

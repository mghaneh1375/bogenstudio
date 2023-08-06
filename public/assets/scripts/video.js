$(document).ready(function () {
    $.ajax({
        type: "get",
        url: getVideoUrl,
        headers: {
            accept: "application/json",
        },
        success: function (res) {
            if (res.status !== "ok") return;

            res = res.data;

            var html = '<div class="card">';

            if (res.iframe) {
                html +=
                    '<iframe frameborder="0" allowfullscreen src="' +
                    res.file +
                    '"></iframe>';
            } else {
                html += '<video id="video" class="video" controls>';
                html += '<source src="' + res.file + '" type="video/mp4">';
                html += "Your browser does not support the video tag.";
                html += "</video>";

                html +=
                    '<div id="img_preview" class="img" style="background-image: url(' +
                    res.preview +
                    ')"></div>';
                html += '<img data-idx="0" class="play" src="' + playPic + '">';
            }

            // html += "<div class='date'>" + res.created_at + "</div>";
            html += "<h1>" + res.title + "</h1>";
            html += "<p>" + res.description + "</p>";
            html += "</div>";

            $("#loader").remove();
            $("#products").append(html);
            $("figcaption").attr("contenteditable", "false");
            $(".image").addClass("dispalyFlexProduct");

            if (!res.iframe) {
                $(".play").on("click", function () {
                    $("#video").css("z-index", "4").trigger("play");
                    $("#img_preview").css("visibility", "hidden");
                    $(this).addClass("hidden");
                });
            }
        },
    });
});

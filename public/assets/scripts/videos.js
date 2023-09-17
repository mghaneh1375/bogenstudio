$(document).ready(function () {
    $.ajax({
        type: "get",
        url: fetchVideosUrl + "/" + fetchLimit,
        headers: {
            Accept: "application/json",
        },
        success: function (res) {
            if (res.status !== "ok" || res.data.length == 0) {
                $("#videos").remove();
                return;
            }

            res = res.data;

            var html = renderFirstRow(res[0]);

            for (var i = 1; i < res.length; i++) {
                if (i % 2 === 1) html += '<div class="second-row">';

                html += renderSecondRow(res[i], i);

                if (i % 2 === 0) html += "</div>";
            }

            if (res.length % 2 === 1) html += "</div>";

            $("#videoLoader").remove();
            $("#videos").append(html);

            $(".play").on("click", function () {
                var idx = $(this).attr("data-idx");
                $("#video_" + idx)
                    .css("z-index", "4")
                    .trigger("play");
                $("#img_preview_" + idx).css("visibility", "hidden");
                $("#div_img_preview_" + idx).addClass("hidden");
                $(this).addClass("hidden");
            });

            $("#videos .more").on("click", function () {
                document.location.href =
                    videoRedirectUrl + "/" + $(this).attr("data-id");
            });
        },
    });
});

function renderFirstRow(node) {
    if (node === undefined) return;
    var html = '<div class="first-row">';
    html += '<div class="first-row-img">';

    html += '<video id="video_0" class="video" controls>';
    html += '<source src="' + node.file + '" type="video/mp4">';
    html += "Your browser does not support the video tag.";
    html += "</video>";

    html +=
        '<div id="img_preview_0" class="div-image-preview" style="background-image: url(' +
        node.preview +
        ')"></div>';
    html += '<img data-idx="0" class="play" src="' + playPic + '">';
    html += "</div>";
    html += '<div class="first-row-decs">';
    html += '<h1 class="title">' + node.title + "</h1>";
    html += '<h1 class="desc">' + node.description + "</h1>";
    html +=
        '<p data-id="' +
        node["id"] +
        '" class="more">' +
        JSTranslate["more"] +
        "</p>";
    html += "</div>";
    html += "</div>";

    return html;
}

function renderSecondRow(node, idx) {
    var html = '<div class="second-row-img">';
    html += "<div class='video-container'>";
    // html += '<img data-idx="' + idx + '" class="play" src="' + playPic + '">';
    html += '<video id="video_' + idx + '" class="video" controls>';
    html += '<source src="' + node.file + '" type="video/mp4">';
    html += "Your browser does not support the video tag.";
    html += "</video>";
    html +=
        "<div id='div_img_preview_" +
        idx +
        "' style='background-image: url(" +
        node.preview +
        ")' class='img-preview'></div>";
    html += "</div>";
    html += '<div class="txt">';
    html += "<h1>" + node.title + "</h1>";
    html += "<p>" + node.description + "</p>";
    html +=
        '<span data-id="' +
        node.id +
        '" class="more">' +
        JSTranslate["more"] +
        "</span>";
    html += "</div>";
    html += "</div>";

    return html;
}

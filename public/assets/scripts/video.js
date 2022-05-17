$(document).ready(function () {

    $.ajax({
        type: 'get',
        url: fetchVideosUrl + '/' + fetchLimit,
        headers: {
            'Accept': 'application/json'
        },
        success: function (res) {

            if(res.status !== "ok")
                return;

            res = res.data;

            var html = renderFirstRow(res[0]);

            for(var i = 1; i < res.length; i++) {

                if(i % 2 === 1)
                    html += '<div class="second-row">';

                html += renderSecondRow(res[i], i);

                if(i % 2 === 0)
                    html += '</div>';
            }

            if(res.length % 2 === 1)
                html += '</div>';

            $("#videos").append(html);


            $(".play").on('click', function () {
                var idx = $(this).attr('data-idx');
                $("#video_" + idx).css('z-index', '4').trigger('play');
                $("#img_preview_" + idx).css('visibility', 'hidden');
                $("#div_img_preview_" + idx).addClass('hidden');
                $(this).addClass('hidden');
            });


        }
    });

});

function renderFirstRow(node) {
    var html = '<div class="first-row">';
    html += '<div class="first-row-img">';

    html += '<video id="video_0" class="video" controls>';
    html += '<source src="' + node.file + '" type="video/mp4">';
    html += 'Your browser does not support the video tag.';
    html += '</video>';

    html += '<div id="img_preview_0" class="div-image-preview" style="background-image: url(' + node.preview +')"></div>';
    html += '<img data-idx="0" class="play" src="' + playPic +'">';
    html += '</div>';
    html += '<div class="first-row-decs">';
    html += '<h1 class="title">' + node.title +'</h1>';
    html += '<h1 class="desc">' + node.desc + '</h1>';
    html += '</div>';
    html += '</div>';
    return html;
}

function renderSecondRow(node, idx) {

    var html = '<div class="second-row-img">';
    html += "<div class='video-container'>";
    html += '<img data-idx="' + idx + '" class="play" src="' + playPic + '">';
    html += '<video id="video_' + idx + '" class="video" controls>';
    html += '<source src="' + node.file + '" type="video/mp4">';
    html += 'Your browser does not support the video tag.';
    html += '</video>';
    // html += '<img id="img_preview_' + idx + '" src="' + node.preview + '">';
    // hidden-on-desktop
    html += "<div id='div_img_preview_" + idx + "' style='background-image: url(" + node.preview  + ")' class='img-preview'></div>";
    html += '</div>';
    html += '<div class="txt">';
    html += '<h1>' + node.title + '</h1>';
    html += '<p>' + node.desc + '</p>';
    html += '</div>';
    html += '</div>';

    return html;
}

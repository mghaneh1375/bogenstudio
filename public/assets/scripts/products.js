$(document).ready(function () {

    $.ajax({
        type: 'get',
        url: getProductsUrl,
        headers: {
            'accept': 'application/json'
        },
        success: function (res) {

            if(res.status !== "ok")
                return;

            var tags = res.tags;
            var html = "";
            for(var i = 0; i < tags.length; i++) {
                html += "<div data-filter='" + tags[i] + "' id='tag_" + tags[i] + "' class='tag'>" + tags[i] + "</div>";
            }

            $("#all-tags").append(html);

            res = res.data;
            html = "";

            for(i = 0; i < res.length; i++) {

                var classHtml = "";

                for(var j = 0; j < res[i].tags.length; j++)
                    classHtml += res[i].tags[j] + " ";

                html += "<div class='card " + classHtml + "'>";
                html += "<div class='desc'>";
                html += "<div class='tags'>";

                for(j = 0; j < res[i].tags.length; j++) {
                    html += "<span>" + res[i].tags[j] + "</span><span>&nbsp;</span><span>&nbsp;</span><span>&nbsp;</span>";
                }

                html += "</div>";

                html += "<h1>" + res[i].title + "</h1>";
                html += "<p>" + res[i].digest + "</p>";
                html += "</div>";

                html += "<div class='img'>";
                html += '<img src="' + res[i].image + '">';
                html += '<div data-id="' + res[i].id + '" class="more"><span>' + JSTranslate['more'] + '</span></div>';
                html += "</div>";

                html += "</div>";
            }

            $("#productLoader").remove();
            $("#products").append(html);

            $(document).ready(function () {

                $("#all-tags .tag").on('click', function () {
                    doFilter($(this).attr('data-filter'));
                });

                $('.more').on('click', function () {
                    document.location.href = productUrl + "/" + $(this).attr('data-id');
                });

            });

            doFilter(tags[0]);
        }
    });

    function doFilter(tag) {

        $("#all-tags .tag").removeClass('selected');
        $("#tag_" + tag).addClass('selected');

        $("#products .card").addClass('hidden').each(function () {
            if($(this).hasClass(tag))
                $(this).removeClass('hidden');
        });

    }

});

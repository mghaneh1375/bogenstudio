$(document).ready(function () {

    $.ajax({
        type: 'get',
        url: fetchNewsUrl,
        headers: {
            'Accept': 'application/json'
        },
        success: function (res) {

            $("#categories-container").removeClass('hidden');
            $("#loader").remove();

            if(res.status !== "ok")
                return;

            var categories = res.categories;

            var html = "";
            for (var i = 0; i < categories.length; i++) {

                var currTag = categories[i].tag;

                html += "<p>" + currTag + "</p>";
                html += "<div class='cats'>";

                for(var k = 0; k < categories[i].sub.length; k++) {

                    if(k === 0 && i === 0)
                        html += "<div data-filter='" + categories[i].sub[k].split(" ").join("_") + "' class='cat selected'>" + categories[i].sub[k] + "</div>";
                    else
                        html += "<div data-filter='" + categories[i].sub[k].split(" ").join("_") + "' class='cat'>" + categories[i].sub[k] + "</div>";
                }

                html += "</div>";
            }

            $("#categories").append(html);

            res = res.data;

            html = "";
            for(i = 0; i < res.length; i++) {

                if(i === 0)
                    html += "<div class='items' id='tag_" + res[i].tag.split(" ").join("_") +"'>";
                else
                    html += "<div class='hidden items' id='tag_" + res[i].tag.split(" ").join("_") +"'>";

                for(var j = 0; j < res[i].items.length; j++) {
                    html += '<div class="item">';
                    html += "<img src='" + res[i].items[j].image + "'>";
                    html += "<h1>" + res[i].items[j].title + "</h1>";
                    html += "<p>" + res[i].items[j].digest + "</p>";
                    html += "</div>";
                }

                html += "</div>";
            }

            $("#all").append(html);

            $(".cat").on('click', function () {

                var filter = $(this).attr('data-filter');

                $("#all .items").addClass('hidden');
                $("#tag_" + filter).removeClass('hidden');
                $(".cats .cat").removeClass('selected');
                $(this).addClass('selected');

            });

        }
    });
});

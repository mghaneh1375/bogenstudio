$(document).ready(function () {

    $.ajax({
        type: 'get',
        url: fetchNewsUrl + '/' + newsFetchLimit,
        headers: {
            'Accept': 'application/json'
        },
        success: function (res) {

            if(res.status !== "ok")
                return;

            res = res.data;

            var html = "";
            var limit = 4;
            if(res.length < 4)
                limit = res.length;

            for(var i = 0; i < limit; i++) {

                if(i === 0 || i === 2)
                    html += "<div class='row'>";

                html += '<div class="item" style="background: url(' + res[i].image + '); background-size: cover">';
                html += "<h1>" + res[i].title + "</h1>";
                html += "<p>" + res[i].digest + "</p>";
                html += "</div>";

                if(i === 1 || i === 3)
                    html += "</div>";
            }

            $("#topSection").append(html);

            if(res.length > 4) {

                html = "";

                for(i = 4; i < res.length; i++) {
                    html += '<div class="item">';
                    html += "<img src='" + res[i].image + "'>";
                    html += "<p class='date'>" + res[i].created_at + "</p>";
                    html += "<h1>" + res[i].title + "</h1>";
                    html += "<p>" + res[i].digest + "</p>";
                    html += "</div>";
                }

                $("#all").removeClass('hidden').append(html);
            }
        }

    });

});

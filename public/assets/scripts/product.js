$(document).ready(function () {

    $.ajax({
        type: 'get',
        url: getProductUrl,
        headers: {
            'accept': 'application/json'
        },
        success: function (res) {

            if(res.status !== 'ok')
                return;

            res = res.data;
            var html = "<div class='card'>";
            html += '<div class="img" style="background: url(' + res.image + ')"></div>';
            html += "<div class='date'>" + res.created_at + "</div>";
            html += "<h1>" + res.title + "</h1>";
            html += "<p>" + res.description + "</p>";
            html += "</div>";

            $("#products").append(html);
        }
    });

});

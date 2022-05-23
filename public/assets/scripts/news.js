$(document).ready(function () {

    var currPage = 0;
    var totalPage = 0;

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

            var cats = [];

            for(var i = 0; i < limit; i++) {

                if(i === 0 || i === 2)
                    html += "<div class='row'>";

                html += '<div data-id="' + res[i].id + '" class="item" style="background: url(' + res[i].image + '); background-size: cover">';
                html += "<h1>" + res[i].title + "</h1>";
                html += "<p>" + res[i].digest + "</p>";
                html += "</div>";

                if(i === 1 || i === 3)
                    html += "</div>";
            }

            if(newsFetchLimit == -1) {

                html += '<div id="slider" class="hidden-on-desktop">';
                html += '<div class="images">';

                for (i = 1; i <= limit; i++) {
                    if (i === 1)
                        html += '<img data-title="' + res[i - 1].title + '" data-text="' + res[i - 1].digest + '" id="img-1" class="active imp" src="' + res[i - 1].image + '">';
                    else
                        html += '<img data-title="' + res[i - 1].title + '" data-text="' + res[i - 1].digest + '" id="img-' + i + '" src="' + res[i - 1].image + '">';
                }

                html += '</div>';
                html += '<div class="texts">' +
                    '            <div>' +
                    '                <p id="slider-h"></p>' +
                    '                <p id="slider-p"></p>' +
                    '            </div>' +
                    '        </div>';

                html += '<div class="bubbles">';

                for (i = 1; i <= limit; i++)
                    html += '<div id="bubble-' + i + '" data-idx="' + i + '" class="bubble"></div>';

                html += '</div>';
                html += '</div>';

            }

            $("#newsLoader").remove();
            $("#topSection").append(html);

            if(res.length > 4) {

                html = "";

                for(i = 4; i < res.length; i++) {

                    var catsStr = "";

                    for(j = 0; j < res[i - 1].tags.length; j++) {

                        catsStr += "_" + res[i - 1].tags[j];

                        if(cats.indexOf(res[i - 1].tags[j]) === -1)
                            cats.push(res[i - 1].tags[j])

                    }

                    catsStr += "_";

                    html += '<div data-cats="' + catsStr + '" class="item page-' + parseInt((i - 4) / 2) + '">';
                    html += "<img src='" + res[i].image + "'>";
                    html += "<p class='date'>" + res[i].created_at + "</p>";
                    html += "<h1>" + res[i].title + "</h1>";
                    html += "<p>" + res[i].digest + "</p>";
                    html += "</div>";

                    if(i === res.length - 1)
                        totalPage = parseInt((i - 4) / 2);
                }

                html += '<div class="paginator hidden-on-desktop">';
                html += '<p id="nextPage">' + JSTranslate['next'] + '</p>';
                html += '<p id="prevPage">' + JSTranslate['previous'] + '</p>';
                html += '</div>';

                $("#all").removeClass('hidden').append(html);
            }

            if(window.mobileCheck) {
                start();
                paginate();
            }

            $("#nextPage").on('click', function () {

                if(currPage ===  totalPage)
                    return;

                currPage++;
                paginate();
            });

            $("#prevPage").on('click', function () {

                if(currPage ===  0)
                    return;

                currPage--;
                paginate();
            });

            $(".row .item").on('click', function () {
                document.location.href = redirectUrl + "/" + $(this).attr('data-id');
            });

            if(newsFetchLimit == -1) {
                html = "";
                for(i = 0; i < cats.length; i++) {
                    html += "<li data-cat='" + cats[i] + "' class='choice'>" + cats[i] + "</li>";
                }

                $("#choices").append(html);

                $(".choice").on('click', function () {
                    filter($(this).attr('data-cat'));
                });

            }

        }

    });

    function paginate() {
        $("#all .item").addClass('hidden');
        $(".page-" + currPage).removeClass('hidden');
    }

});

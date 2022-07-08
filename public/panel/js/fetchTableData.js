function fetchData(url, nodeId, showUrl, seoUrl, keys, canRemove = true) {
    var token = localStorage.getItem("token");
    if (token == null) return;

    $.ajax({
        type: "get",
        url: url,
        headers: {
            Authorization: "Bearer " + token,
            accept: "application/json",
        },
        success: function (res) {
            $("#tableItems").removeClass("hidden");
            $("#loader").remove();

            if (res.status !== "ok") return;

            res = res.data;
            var html = "";

            for (var i = 0; i < res.length; i++) {
                html += '<tr id="row_' + res[i].id + '">';

                for (var j = 0; j < keys.length; j++) {
                    if (
                        keys[j] === "image" ||
                        keys[j] === "texture" ||
                        keys[j] === "preview"
                    )
                        html += '<td><img src="' + res[i][keys[j]] + '"></td>';
                    else html += "<td>" + res[i][keys[j]] + "</td>";
                }

                html += "<td>";
                if (seoUrl !== undefined) {
                    if (
                        res[i].seo_id == null ||
                        res[i].seo_id === undefined ||
                        res[i].seo_id === ""
                    )
                        html +=
                            '<a href="' +
                            seoUrl +
                            "/add/" +
                            res[i].id +
                            '" class="btn btn-default">مدیریت تگ های سئو</a>';
                    else
                        html +=
                            '<a href="' +
                            seoUrl +
                            "/edit/" +
                            res[i].seo_id +
                            '" class="btn btn-default">مدیریت تگ های سئو</a>';
                }

                if (showUrl != null)
                    html +=
                        '<a href="' +
                        showUrl +
                        "/" +
                        res[i].id +
                        '" class="btn btn-info glyphicon glyphicon-eye-open"></a>';

                if (canRemove)
                    html +=
                        "<button onclick=\"removeSelectedItem('" +
                        url +
                        "', " +
                        res[i].id +
                        ')" class="btn btn-danger glyphicon glyphicon-trash"></button>';
                html += "</td>";
                html += "</tr>";
            }

            $("#" + nodeId)
                .empty()
                .append(html);
        },
    });
}

function removeSelectedItem(baseUrl, id) {
    var token = localStorage.getItem("token");
    if (token == null) return;

    $.ajax({
        type: "delete",
        url: baseUrl + "/" + id,
        headers: {
            Authorization: "Bearer " + token,
            accept: "application/json",
        },
        success: function (res) {
            if (res.status !== "ok") return;

            $("#row_" + id).remove();
        },
    });
}

function fetchFormData(url, callBack = undefined) {
    var token = localStorage.getItem("token");
    if (token == null) return;

    $.ajax({
        type: "get",
        url: url,
        headers: {
            Authorization: "Bearer " + token,
            accept: "application/json",
        },
        success: function (res) {
            if (res.status !== "ok") return;

            res = res.data;
            for (var key in res) {
                if (key === "pic" || key === "preview" || key === "texture") {
                    $("#" + key)
                        .removeClass("hidden")
                        .attr("src", res[key]);
                    continue;
                }

                if (key === "default_lang" || key === "visibility") {
                    $("#" + key)
                        .removeClass("hidden")
                        .val(res[key])
                        .change();
                    continue;
                }

                if (key === "model") {
                    $("#sliderCanvas").removeClass("hidden");
                    modelPath = res["model"];
                    texturePath = res["texture"];
                }

                if (key.indexOf("description") !== -1)
                    $("#" + key)
                        .empty()
                        .append(res[key]);
                else $("#" + key).val(res[key]);
            }

            if (callBack !== undefined) callBack();
        },
    });
}

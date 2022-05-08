function fetchData(url, nodeId, showUrl, deleteUrl) {

    var token = localStorage.getItem('token');
    if(token == null)
        return;

    $.ajax({
        type: 'get',
        url: url,
        headers: {
            'Authorization': "Bearer " + token,
            'accept': 'application/json'
        },
        success: function (res) {

            if(res.status !== "ok")
                return;

            res = res.data;
            var html = '';

            for(var i = 0; i < res.length; i++) {
                html += '<tr id="row_' + res[i].id + '">';
                html += '<td>' + res[i].title + '</td>';
                html += '<td><img src="' + res[i].image + '"></td>';
                html += '<td>' + res[i].default_lang + '</td>';
                html += '<td>' + res[i].priority + '</td>';
                html += '<td>' + res[i].visibility + '</td>';
                html += '<td>' + res[i].created_at + '</td>';
                html += '<td>' + res[i].updated_at + '</td>';
                html += '<td>';
                html += '<a href="' + showUrl + '/' + res[i].id +'" class="btn btn-info glyphicon glyphicon-eye-open"></a>';
                html += '<button onclick="removeSelectedItem(\'' + deleteUrl + '\', ' + res[i].id + ')" class="btn btn-danger glyphicon glyphicon-trash"></button>';
                html += '</td>';
                html += '</tr>';
            }

            $("#" + nodeId).empty().append(html);
        }
    });

}

function removeSelectedItem(baseUrl, id) {

    var token = localStorage.getItem('token');
    if(token == null)
        return;

    $.ajax({
        type: 'delete',
        url: baseUrl + '/' + id,
        headers: {
            'Authorization': "Bearer " + token,
            'accept': 'application/json'
        },
        success: function (res) {

            if (res.status !== "ok")
                return;

            $("#row_" + id).remove();
        }
    });
}

function fetchFormData(url) {

    var token = localStorage.getItem('token');
    if(token == null)
        return;

    $.ajax({
        type: 'get',
        url: url,
        headers: {
            'Authorization': "Bearer " + token,
            'accept': 'application/json'
        },
        success: function (res) {

            if(res.status !== "ok")
                return;

            res = res.data;
            for (var key in res) {

                if(key === "pic" || key === "default_lang")
                    continue;

                $("#" + key).val(res[key]);
            }

            $("#default_lang").val(res["default_lang"]).change();
            $("#pic").removeClass('hidden').attr('src', res['pic']);
        }
    });

}

$(document).ready(function () {
    $("form#form").submit(function (e) {
        e.preventDefault();

        var token = localStorage.getItem("token");
        if (token == null) return;

        var form = $("#form");

        var formData = new FormData(form[0]);
        if (initCK !== undefined) {
            formData.append("description_en", $("#description_en").html());
            formData.append("description_fa", $("#description_fa").html());
            formData.append("description_ar", $("#description_ar").html());
            formData.append("description_gr", $("#description_gr").html());
        }

        $.ajax({
            url: storeUrl,
            type: "POST",
            data: formData,
            success: function (data) {
                if (data.status === "ok") {
                    window.location.href = redirectUrl;
                    return;
                }

                alert(data.msg);
            },
            cache: false,
            contentType: false,
            processData: false,
            headers: {
                Authorization: "Bearer " + token,
                Accept: "application/json",
            },
        });
    });

    $("form#editForm").submit(function (e) {
        e.preventDefault();

        var token = localStorage.getItem("token");
        if (token == null) return;

        var form = $("#editForm");
        var formData = new FormData(form[0]);
        if (initCK !== undefined) {
            formData.append("description_en", $("#description_en").html());
            formData.append("description_fa", $("#description_fa").html());
            formData.append("description_ar", $("#description_ar").html());
            formData.append("description_gr", $("#description_gr").html());
        }

        $.ajax({
            url: editUrl,
            type: "POST",
            data: formData,
            success: function (data) {
                if (data.status === "ok") {
                    window.location.href = redirectUrl;
                    return;
                }

                alert(data.msg);
            },
            cache: false,
            contentType: false,
            processData: false,
            headers: {
                Authorization: "Bearer " + token,
                Accept: "application/json",
            },
        });
    });
});

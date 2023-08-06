$(document).ready(function () {

    $("#login-button").on('click', function () {

        $.ajax({
            url: loginPath,
            type: 'post',
            data: JSON.stringify({
                'username': $("#username").val(),
                'password': $("#password").val()
            }),
            headers: {
                'accept': 'application/json',
                'content-type': 'application/json'
            },
            success: function (res) {

                if(res.status === "ok") {
                    localStorage.setItem("token", res.token);
                    document.location.href = homePath;
                }
                else
                    alert(res.msg);
            }
        });

    });

});

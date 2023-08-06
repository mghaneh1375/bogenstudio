$(document).ready(function () {

    $("#contactUs").on('click', function () {

        var mail = $("#mail").val();
        var name = $("#name").val();
        var phone = $("#phone").val();

        if(mail.length === 0 || name.length === 0 || phone === 0)
            return;

        $.ajax({
            type: 'post',
            url: contactUrl,
            headers: {
                'accept': 'application/json'
            },
            data: {
                'mail': mail,
                'phone': phone,
                'name': name
            },
            success: function (res) {

                if(res.status === 'ok')
                    return;

            }
        });

    });

});

$(document).ready(function () {
    // $('.top-user').on('click', function() {
    //     $('.dropdown-user').css("display","block");
    // });
    $('#btn-refresh').on('click', function () {
        $.ajax({
            url: "/refresh_captcha",
            type: 'GET',
            success: function (response) {
                $(".img-captcha").html(response.captcha);
            }
        });
    });
    $('#formComment').on('submit', function (event) {
        event.preventDefault();
        $('#loader').css({"display": "block"});
        $('#body').css({"overflow": "hidden", "opacity": "0.7"});
        var name = $("#name").val();
        var phone = $("#phone").val();
        var comment = $("#comment").val();
        var blog_id = $("#blog_id").val();
        var blog_title = $("#blog_title").val();
        var captcha = $("#captcha").val();
        var _token = $("input[name='_token']").val();
        $.ajax({
            url: "/comment/store",
            type: 'POST',
            data: {
                name: name,
                phone: phone,
                comment: comment,
                blog_id: blog_id,
                blog_title: blog_title,
                captcha: captcha,
                _token: _token,
            },
            success: function (response) {
                if (response.success) {
                    $("#name").val("");
                    $('#phone').val("");
                    $('#comment').val("");
                    $('#captcha').val("");
                    $('#loader').css({"display": "none"});
                    $('#body').css({"overflow-y": "auto", "opacity": "1"});
                    Snackbar.show({
                        text: 'دیدگاه شما با موفقیت ارسال شد.',
                        actionTextColor: '#fff',
                        backgroundColor: '#8dbf42',
                        pos: 'bottom-left',
                        showAction: false,
                    });
                } else {
                    alert("Error")
                }
            },
            error: function (response) {
                $('#loader').css({"display": "none"});
                $('#body').css({"overflow-y": "auto", "opacity": "1"});
                Snackbar.show({
                    text: response.responseJSON.errors.name + '<br><br>'
                        + response.responseJSON.errors.comment + '<br><br>'
                        +response.responseJSON.errors.captcha ,
                    actionTextColor: '#fff',
                    backgroundColor: '#e7515a',
                    pos: 'bottom-left',
                    showAction: false,
                });ز
            },
        });
    });
    if ($('#login_form').length) {
        var togglePassword = document.getElementById("toggle-password");
        var formContent = document.getElementsByClassName('form-content')[0];
        var getFormContentHeight = formContent.clientHeight;

        var formImage = document.getElementsByClassName('form-image')[0];
        if (formImage) {
            var setFormImageHeight = formImage.style.height = getFormContentHeight + 'px';
        }
        if (togglePassword) {
            togglePassword.addEventListener('click', function () {
                var x = document.getElementById("password");
                if (x.type === "password") {
                    x.type = "text";
                } else {
                    x.type = "password";
                }
            });
        }
    }
});

$(document).ready(function() {
    // $('.top-user').on('click', function() {
    //     $('.dropdown-user').css("display","block");
    // });
    $('#btn-refresh').on('click', function() {
        $.ajax({
            url: "/refresh_captcha",
            type: 'GET',
            success: function(response) {
                $(".img-captcha").html(response.captcha);
            }
        });
    });
    $('#formComment').on('submit', function(event) {
        event.preventDefault();
        var name = $("#name").val();
        var last_name = $("#last_name").val();
        var comment = $("#comment").val();
        var blog_id = $("#blog_id").val();
        var captcha = $("#captcha").val();
        var _token = $("input[name='_token']").val();
        $.ajax({
            url: "/comment/store",
            type: 'POST',
            data: {
                name: name,
                last_name: last_name,
                comment: comment,
                blog_id: blog_id,
                captcha: captcha,
                _token: _token,
            },
            success: function(response) {
                if (response.success) {
                    alert('ok');
                    $('#nameError').text("");
                    $('#last_nameError').text("");
                    $('#commentError').text("");
                    $('#captchaError').text("");
                } else {
                    alert("Error")
                }
            },
            error: function(response) {
                $('#nameError').text(response.responseJSON.errors.name);
                $('#last_nameError').text(response.responseJSON.errors.last_name);
                $('#commentError').text(response.responseJSON.errors.comment);
                $('#captchaError').text(response.responseJSON.errors.captcha);

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
            togglePassword.addEventListener('click', function() {
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
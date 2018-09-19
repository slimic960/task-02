function validateRegistration() {
    $("#form_reg").validate(
            {
                rules: {
                    "reg_login": {
                        required: true,
                        minlength: 5,
                        maxlength: 15,
                        remote: {
                            type: "post",
                            url: "/registration/checkLogin"
                        }
                    },
                    "reg_pass": {
                        required: true,
                        minlength: 7,
                        maxlength: 15
                    },
                    "reg_surname": {
                        minlength: 3,
                        maxlength: 15
                    },
                    "reg_name": {
                        required: true,
                        minlength: 3,
                        maxlength: 15
                    },
                    "reg_email": {
                        required: true,
                        email: true
                    },
                    "reg_captcha": {
                        required: true,
                        remote: {
                            type: "post",
                            url: "/registration/checkCaptcha"
                        }

                    }
                },

                messages: {
                    "reg_login": {
                        required: "Укажите Логин!",
                        minlength: "От 5 до 15 символов!",
                        maxlength: "От 5 до 15 символов!",
                        remote: "Логин занят!"
                    },
                    "reg_pass": {
                        required: "Укажите Пароль!",
                        minlength: "От 7 до 15 символов!",
                        maxlength: "От 7 до 15 символов!"
                    },
                    "reg_surname": {
                        minlength: "От 3 до 20 символов!",
                        maxlength: "От 3 до 20 символов!"
                    },
                    "reg_name": {
                        required: "Укажите ваше Имя!",
                        minlength: "От 3 до 15 символов!",
                        maxlength: "От 3 до 15 символов!"
                    },
                    "reg_email": {
                        required: "Укажите свой E-mail",
                        email: "Не корректный E-mail"
                    },
                    "reg_captcha": {
                        required: "Введите код с картинки!",
                        remote: "Не верный код проверки!"
                    }
                },
                highlight: function (element) {
                    $(element).closest('.input-group').addClass('has-error');
                },
                unhighlight: function (element) {
                    $(element).closest('.input-group').removeClass('has-error');
                },

                submitHandler: function (form) {
                    $(form).ajaxSubmit({
                        success: function (data) {

                            if (data == 'true')
                            {
                                $("#block-form-registration").fadeOut(300, function () {
                                    $("#reg_message").addClass("reg_message_good").fadeIn(400).html("Вы успешно зарегистрированы!");
                                    $("#form_submit").hide();
                                    location.href = 'main';
                                });

                            } else
                            {
                                $("#reg_message").addClass("reg_message_error").fadeIn(400).html(data);
                            }
                        }
                    });
                }
            });
    $("#form_reg").valid();
}

$(document).ready(function () {
    var minHeight = $(window).height() - 96;
    $("#siteContent").css('min-height', minHeight + 'px');
    $('#reloadcaptcha').click(function () {
        $('#block-captcha').find('img').attr("src", "registration/regCaptcha");
    });
    $("#button-auth").click(function () {

        var auth_login = $("#auth_login").val();
        var auth_pass = $("#auth_pass").val();


        if (auth_login == "" || auth_login.length > 30)
        {
            $("#auth_login").css("borderColor", "#FDB6B6");
            send_login = 'no';
        } else {

            $("#auth_login").css("borderColor", "#DBDBDB");
            send_login = 'yes';
        }


        if (auth_pass == "" || auth_pass.length > 15)
        {
            $("#auth_pass").css("borderColor", "#FDB6B6");
            send_pass = 'no';
        } else {
            $("#auth_pass").css("borderColor", "#DBDBDB");
            send_pass = 'yes';
        }



        if ($("#rememberme").prop('checked'))
        {
            auth_rememberme = 'yes';

        } else {
            auth_rememberme = 'no';
        }


        if (send_login == 'yes' && send_pass == 'yes')
        {
            $("#button-auth").hide();
            $(".auth-loading").show();

            $.ajax({
                type: "POST",
                url: "/users/run",
                data: "login=" + auth_login + "&pass=" + auth_pass + "&rememberme=" + auth_rememberme,
                dataType: "html",
                cache: false,
                success: function (data) {

                    if (data == 'yes_auth')
                    {
                        location.href = 'main';
                    } else
                    {
                        $("#message-auth").slideDown(400);
                        $(".auth-loading").hide();
                        $("#button-auth").show();

                    }

                }
            });
        }
    });

    var clickUserInfo = false;
    $("#auth-user-info").on('click', function () {
        if (!clickUserInfo) {
            setTimeout(function () {
                $("#block-user li").show(100);
            }, 800);
            $("#block-user").fadeIn().animate({width: "180px"}, 350);
            clickUserInfo = true;
        } else {
            $("#block-user").animate({width: "0px"}, 350).fadeOut();
            $("#block-user li").hide();
            clickUserInfo = false;
        }
    });
    $('<button type="button" class="btn btn-primary btn-lg btn-block show-more">Показать ещё</button>').insertAfter(".blog-card:last");
    var clickPageCount = 2;
    $(".show-more").click(function () {
        $.ajax({
            type: "POST",
            url: "/main/nextNews",
            data: "page=" + clickPageCount,
            dataType: "html",
            success: function (data) {
                if (data != "") {
                    $(data).insertAfter(".blog-card:last");
                    clickPageCount++;
                } else {
                    $(".show-more").attr('disabled', 'disabled').html('Новостей больше нет');
                }
            }
        });
    });



    $("#remindpass").click(function () {

        $("#input-email-pass").fadeOut(200, function () {
            $("#block-remind").fadeIn(300);
        });
    });

    $("#prev-auth").click(function () {

        $("#block-remind").fadeOut(200, function () {
            $("#input-email-pass").fadeIn(300);
        });
    });

    $("#button-remind").click(function () {

        var recall_email = $("#remind-email").val();

        if (recall_email == "" || recall_email.length > 25)
        {
            $("#remind-email").css("borderColor", "#FDB6B6");

        } else
        {
            $("#remind-email").css("borderColor", "#DBDBDB");

            $("#button-remind").hide();
            $(".auth-loading").show();

            $.ajax({
                type: "POST",
                url: "users/remindPass",
                data: "email=" + recall_email,
                dataType: "html",
                cache: false,
                success: function (data) {

                    if (data)
                    {
                        $(".auth-loading").hide();
                        $("#button-remind").show();
                        $("#message-remind").attr("class", "message-remind-success").html("e-mail.").slideDown(400);
                        setTimeout("$('#message-remind').html('').hide(),$('#block-remind').hide(),$('#input-email-pass').show()", 3000);
                        alert(data);
                    } else
                    {
                        $(".auth-loading").hide();
                        $("#button-remind").show();
                        $('#message-remind').attr("class", "message-remind-error").html(data).slideDown(400);

                    }
                }
            });
        }
    });


    var clickTopAuth = false;
    $(".top-auth").on('click', function () {
        if (!clickTopAuth) {
            $(".top-auth").attr("id", "active-button");
            setTimeout(function () {
                $("#block-top-auth .container").show(100);
            }, 450);
            $("#block-top-auth").fadeIn().animate({width: "225px"}, 350);
            clickTopAuth = true;
        } else {
            $(".top-auth").attr("id", "");
            $("#block-top-auth .container").hide();
            $("#block-top-auth").animate({width: "0px"}, 350).fadeOut();
            clickTopAuth = false;
        }
    });

    $("#siteContent").on('click', function () {
        if (clickUserInfo) {
            $("#block-user").animate({width: "0px"}, 350).fadeOut();
            $("#block-user li").hide();
            clickUserInfo = false;
        }
        if (clickTopAuth) {
            $(".top-auth").attr("id", "");
            $("#block-top-auth .container").hide();
            $("#block-top-auth").animate({width: "0px"}, 350).fadeOut();
            clickTopAuth = false;
        }
    });

    $('#button-pass-show-hide').click(function () {
        var statuspass = $('#button-pass-show-hide').attr("class");

        if (statuspass == "pass-show")
        {
            $('#button-pass-show-hide').attr("class", "pass-hide");

            var $input = $("#auth_pass");
            var change = "text";
            var rep = $("<input placeholder='Пароль' type='" + change + "' />")
                    .attr("id", $input.attr("id"))
                    .attr("name", $input.attr("name"))
                    .attr('class', $input.attr('class'))
                    .val($input.val())
                    .insertBefore($input);
            $input.remove();
            $input = rep;

        } else
        {
            $('#button-pass-show-hide').attr("class", "pass-show");

            var $input = $("#auth_pass");
            var change = "password";
            var rep = $("<input placeholder='Пароль' type='" + change + "' />")
                    .attr("id", $input.attr("id"))
                    .attr("name", $input.attr("name"))
                    .attr('class', $input.attr('class'))
                    .val($input.val())
                    .insertBefore($input);
            $input.remove();
            $input = rep;

        }

    });


});
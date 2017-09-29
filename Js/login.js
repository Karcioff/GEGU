/* 
 * funzioni utili per pagina login
 */

$().ready(function () {
    $(".button-collapse").sideNav();
    $("#log_form").validate({
        rules: {
            log_username: {
                required: true,
                minlength: 2
            },
            log_password: {
                required: true,
                minlength: 5
            }
        },
        messages: {
            log_username: {
                required: "Per favore, inserisci Username"
            },
            log_password: {
                required: "Inserisci una password, è per la tua sicurezza"
            }
        },
        errorElement: 'div',
        errorPlacement: function (error, element) {
            var placement = $(element).data('error');
            if (placement) {
                $(placement).append(error);

            } else {
                error.insertAfter(element);
            }
            ;
        }
//        highlight: function (element, errorClass, validClass) {
//            $(element).addClass("invalid").removeClass(validClass);
//            $(element.form).find("label[for=" + element.id + "]")
//                    .addClass(errorClass);
//        },
//        unhighlight: function (element, errorClass, validClass) {
//            $(element).removeClass("invalid").addClass(validClass);
//            $(element.form).find("label[for=" + element.id + "]")
//                    .removeClass(errorClass);
//        }
    });
});

function autenticate() {
    var username = $("#log_username").val();
    var password = $("#log_password").val();
    var validator = $("#log_form").validate();
    validator.form();
    if (validator.numberOfInvalids() !== 0) {
        return;
    }
    $.post("functions/autentication.php",
            {
                log_username: username,
                log_password: password
            },
            function (data) {
                var result = data;
                if (result.username !== "ok") {
                    validator.showErrors({
                        "log_username": "Username inesistente"
                    });
                }
                if (result.password !== "ok") {
                    validator.showErrors({
                        "log_password": "Password errata"
                    });
                }
                if (result.username === "ok" && result.password === "ok") {
                    window.location = "index.php";
                }

            }, "json");

}


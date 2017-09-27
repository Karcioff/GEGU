/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$().ready(function () {
    $("#reg_form").validate({
        rules: {
            reg_username: {
                required: true,
                minlength: 2,
                remote: "functions/validations/validate_username.php",
            },
            reg_password: {
                required: true,
                minlength: 5
            },
            reg_check_password: {
                required: true,
                minlength: 5,
                equalTo: "#reg_password"
            },
            reg_email: {
                required: true,
                email: true
            }
        },
        messages: {
            reg_username: {
                required: "Per favore, inserisci Username",
                minlength: "Un piccolo sforzo: deve essere di almeno 2 caratteri",
                remote: "Username già esistente"
            },
            reg_password: {
                required: "Inserisci una password, è per la tua sicurezza",
                minlength: "Deve essere lunga almeno 5 caratteri, altrimenti serve a poco"
            },
            reg_check_password: {
                required: "Reinserisci password per il controllo",
                minlength: "Forse è troppo corta",
                equalTo: "O qui o sopra hai sbagliato qualcosa"
            },
            reg_email: {
                required: "Inserisci un indirizzo email",
                email: "Inserisci un indirizzo valido"
            }
        },
        errorElement: 'div',
        errorPlacement: function (error, element) {
            var placement = $(element).data('error');
            if (placement) {
                $(placement).append(error);
                console.log("caso 1");

            } else {
                error.insertAfter(element);
                console.log("caso 2");
            }
            ;
        },
        highlight: function (element, errorClass, validClass) {
            $(element).addClass("invalid").removeClass(validClass);
            $(element.form).find("label[for=" + element.id + "]")
                    .addClass(errorClass);
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).removeClass("invalid").addClass(validClass);
            $(element.form).find("label[for=" + element.id + "]")
                    .removeClass(errorClass);
        }
    });
});

//inizializza i SELECT
  $(document).ready(function() {
    $('select').material_select();
  });

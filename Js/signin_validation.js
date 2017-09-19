/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$().ready(function () {
    $("#formValidate").validate({
        rules: {
            username: {
                required: true,
                minlength: 2
            },
            password: {
                required: true,
                minlength: 5
            },
            check_password: {
                required: true,
                minlength: 5,
                equalTo: "#password"
            },
            email: {
                required: true,
                email: true
            }
        },
        messages: {
            username: {
                required: "Per favore, inserisci Username",
                minlength: "Un piccolo sforzo: deve essere di almeno 2 caratteri"
            },
            password: {
                required: "Inserisci una password, è per la tua sicurezza",
                minlength: "Deve essere lunga almeno 5 caratteri, altrimenti serve a poco"
            },
            check_password: {
                required: "Reinserisci password per il controllo",
                minlength: "Forse è troppo corta",
                equalTo: "O qui o sopra hai sbagliato qualcosa"
            },
            email: {
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

//className = "invalid";
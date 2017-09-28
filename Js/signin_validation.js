/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//modal di successo registrazione
function modal(title, text) {
    document.getElementById("modal_title").textContent = title;
    document.getElementById("modal_text").textContent = text;
    $('.modal').modal({
        complete: function () {
            window.location = "index.php";
        }
    });
    $('#modal').modal('open');
}

$().ready(function () {
    $("#reg_form").validate({
        rules: {
            reg_username: {
                required: true,
                minlength: 2,
                remote: "functions/validations/validate_username.php"
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
                email: true,
                remote: "functions/validations/validate_email.php"
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
                email: "Inserisci un indirizzo valido",
                remote: "Indirizzo email già presente"
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

function submit() {
    var validator = $("#reg_form").validate();
    validator.form();
    if (validator.numberOfInvalids() === 0) {
        document.getElementById('reg_form').submit();
    }
}

function resetForm() {
    var validator = $("#reg_form").validate();
    validator.resetForm();
    window.location = "index.php";
}

function register() {
    var username = $("#reg_username").val();
    var password = $("#reg_password").val();
    var email = $("#reg_email").val();
    var nome = $("#reg_nome").val();
    var cognome = $("#reg_cognome").val();
    var ruolo = document.querySelector('input[name="reg_ruolo"]:checked').value;
    var branca = $("#reg_branca").val();

    var validator = $("#reg_form").validate();
    validator.form();
    if (validator.numberOfInvalids() !== 0) {
        return;
    }
    $.post("functions/registration.php",
            {
                reg_username: username,
                reg_password: password,
                reg_email: email,
                reg_nome: nome,
                reg_cognome: cognome,
                reg_ruolo: ruolo,
                reg_branca: branca
            },
            function (data) {
                if (data.result !== "success") {
                    modal("Errore", "c'è stato un errore con la tua registrazione. Ci scusiamo per il disagio e la preghiamo di contattare la HS che accorrerà prontamente in suo aiuto");
                } else {
                    modal("Registrato", "La registrazione è avvenuta con successo: gioisci! Ora potrai usare le funzionalità di GEGU");
                }
            }, "json");

}

//inizializza i SELECT
$(document).ready(function () {
    $('select').material_select();
});

$(document).ready(function () {
    // the "href" attribute of the modal trigger must specify the modal ID that wants to be triggered
    $('.modal').modal();
});

<!DOCTYPE html>
<?php
session_start();
require_once 'functions/functions.php';
$logged = is_logged();
if (isset($_GET['branca']) && $_GET['branca'] != "") {
    $branca = $_GET['branca'];
} else {
    $branca = "all";
}
?>
<html lang="it">

    <head>
        <?php
        printDefaultMetadata("GESTIONE UTENTI");
        ?>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
        <link rel="stylesheet" href="css/GEGU.css">
    </head>
    <body>
        <?php
        if(isset($_SESSION["admin"])) draw_navbar($logged,$_SESSION["admin"]);
        else draw_navbar($logged);
        ?>
        <main>
            <!--Inserimento articoli -->
            <div class="container">
                <div style="color : #0d47a1 ">
                    <h4>GESTIONE UTENTI</h4>
                    <h5>Cambia i valori desiderati e premi conferma per salvare.</h5>
                    <br>
                </div>
                <?php
                if ($logged) {
                    if (isset($_SESSION["admin"]) && $_SESSION["admin"]===true) {
                        echo '<ul class="collapsible popout" data-collapsible="accordion">';
                        echo getListUsers();
                        echo '</ul>';
                    } else {
                        echo printDenied();
                    }
                }
                ?>
            </div>
        </main>
        <?php
        draw_btn_new("http://localhost:8081/GEGU/signin.php");
        draw_modal_message(); 
        draw_footer();
        ?>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
        <script src="Js/index.js"></script>
        <script>
            $(document).ready(function () {
                $('.collapsible').collapsible();
                $('.modal').modal();
            });
            $(".blue_check").click(function (event) {
                if ($("#" + event.target.id).attr("checked") === "checked") {
                    $("#" + event.target.id).removeAttr("checked");
                } else {
                    $("#" + event.target.id).attr("checked", "checked");
                }
            });

            function del(var_ida) {
                $.ajax({
                    method: "POST",
                    url: "functions/validations/editRows.php",
                    data: {idf: 3, idr: var_ida},
                    success: function (result) {
                        $("#li_" + var_ida).fadeOut();
                        $("#li_" + var_ida).remove();
                        Materialize.toast('Utente rimosso', 3000);
                    },
                    error: function (result) {
                        Materialize.toast('Errore nella cancellazione!', 3000);
                    }
                });
            }
            ;
//(x == 2 ? "yes" : "no")
            function edit(var_ida) {
                var user = $("#username_" + var_ida).val();
                var em = $("#email_" + var_ida).val();
                var ad = "" + ($("#admin_" + var_ida).attr("checked") ? "admin" : "") + "," + ($("#capo_" + var_ida).attr("checked") ? "capo" : "") + "," + ($("#redattore_" + var_ida).attr("checked") ? "redattore" : "") + "," + ($("#cassiere_" + var_ida).attr("checked") ? "cassiere" : "");
                var br = "" + ($("#coca_" + var_ida).attr("checked") ? "coca" : "") + "," + ($("#lc_" + var_ida).attr("checked") ? "lc" : "") + "," + ($("#eg_" + var_ida).attr("checked") ? "eg" : "") + "," + ($("#rs_" + var_ida).attr("checked") ? "rs" : "");
                $.ajax({
                    method: "POST",
                    url: "functions/validations/editRows.php",
                    data: {idf: 4, idr: var_ida, username: user, email: em, admin: ad, branca: br},
                    success: function (result) {
                        Materialize.toast('Utente modificato', 3000);
                    },
                    error: function (result) {
                        Materialize.toast('Errore nella modifica!', 3000);
                    }
                });
            }
            ;
        </script>
    </body>
</html>
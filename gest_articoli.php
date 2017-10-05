<!DOCTYPE html>
<?php
session_start();
require_once 'connection/connect.php';
require_once 'functions/functions.php';
$logged = is_logged();
?>
<html lang="it">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0" />
        <meta name="theme-color" content="#0d47a1">
        <title>GESTION ARTICOLI</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
        <link rel="stylesheet" href="css/GEGU.css">
    </head>
    <body>
        <?php
        draw_navbar_gest($logged);
        ?>
        <main>
            <!--Inserimento articoli -->
            <div class="container">
                <?php
                if ($logged) {
                    $res = '';
                    $result = $conn->query("SELECT * FROM articoli");
                    while ($row = $result->fetch_assoc()) {
                        $art_cod = $row["ART_ID"];
                        $aut = $row["ART_AUTORE"];
                        $tit = $row["ART_TITOLO"];
                        $art = $row["ART_TESTO"];
                        echo <<<HTML
                 <div class = "col s12 ">
                        <div class = "card white z-depth-3">
                            <div class = "card-content black-text">
                                <span class = "card-title blue-text text-darken-4"><b>$tit</b></span>
                                <div class="row">
                                        <div class="input-field col s12 m11">                                                
                                            <textarea id="body_$art_cod" name="body_$art_cod" class="materialize-textarea" rows ="8" cols ="50">$art</textarea>
                                        </div>
                                    </div>
                                <small>By : $aut</small>
                            </div>
                            <div class = "card-action blue lighten-5 right-align">
                            <a href = "#" class = "blue-text text-darken-4" onclick="edit($art_cod)">Modifica</a>
                            <a href = "#" class = "blue-text text-darken-4" onclick="del($art_cod)">Elimina</a>
                            </div>
                        </div>
                    </div >
HTML;
                    }
                }
                ?>
            </div>
        </main>
        <?php
        draw_btn_new("http://localhost:8081/GEGU/index.php");
        draw_modal_message();
        draw_footer();
        ?>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
        <script src="Js/index.js"></script>
        <script>
            function del(var_ida) {
                $.ajax({
                    method: "POST",
                    url: "functions/validations/editRows.php",
                    data: {idf: 2, idr: var_ida, value: $("#body_" + var_ida).val()},
                    success: function (result) {
                        $("#div_" + var_ida).fadeOut();
                        $("#div_" + var_ida).remove();
                        Materialize.toast('Articolo rimosso!', 4000);
                    },
                    error: function (result) {
                        Materialize.toast('Errore nella cancellazione!', 4000);
                    }
                });
            }
            ;

            function edit(var_ida) {
                var val = $("#body_" + var_ida).val();
                $.ajax({
                    method: "POST",
                    url: "functions/validations/editRows.php",
                    data: {idf: 1, idr: var_ida, value: val},
                    success: function (result) {
                        $("#body_" + var_ida).val(val);
                    },
                    error: function (result) {
                        Materialize.toast('Errore nella modifica!', 4000);
                    }
                });
            }
            ;
        </script>
    </body>
</html>
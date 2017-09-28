
<!DOCTYPE html>
<?php
session_start();
require_once 'connection/connect.php';
require_once 'functions/functions.php';
$logged = false;
if (isset($_SESSION['logged']) && $_SESSION['logged'] == TRUE && isset($_SESSION['log_username']) && $_SESSION['log_username'] != "") {
    $logged = true;
}
?>
<html lang="it">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0" />
        <meta name="theme-color" content="#eff7fc"/>
        <title>index</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
        <link rel="stylesheet" href="css/GEGU.css">
    </head>
    <body>
        <?php
        draw_navbar($logged);
        ?>


        <!--Inserimento articoli -->
        <div class="container">
            <?php
            $result = $conn->query("SELECT * FROM articoli");
            while ($row = $result->fetch_assoc()) {
                $aut = $row["ART_AUTORE"];
                $tit = $row["ART_TITOLO"];
                $art = $row["ART_TESTO"];
                draw_art($tit, $art, $aut);
            }
            ?>
        </div>
        <?php
        modal_message();
        draw_footer();
        ?>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
        <script>$(".button-collapse").sideNav();</script>
        <?php
        if ($logged) {
            echo '<script> $().ready(function () {
                var username = "Buongiorno "+"' . $_SESSION['log_username'] . '";               
                    Materialize.toast(username, 4000);                
            }); </script>';
        }

        if (isset($_SESSION['art_inserted']) && $_SESSION['art_inserted'] == true) {
            echo ' <script> $().ready(function () {              
                    Materialize.toast( "Articolo pubblicato con successo", 2000);                
 }); </script>';
            unset($_SESSION['art_inserted']);
        }
        ?>
    </body>
</html>
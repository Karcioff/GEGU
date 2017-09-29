
<!DOCTYPE html>
<?php
session_start();
require_once 'functions/functions.php';
$logged = is_logged();
?>
<html lang="it">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0" />
        <meta name="theme-color" content="#0d47a1">
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
        <main>
            <!--Inserimento articoli -->
            <div class="container" id="art_container">               
            </div>
        </main>
        <?php
        modal_message();
        draw_footer();
        ?>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
        <script src="Js/index.js"></script>
        <?php
        if ($logged) {
            echo '<script> $().ready(toast_welcome("' . $_SESSION['log_username'] . '",' . $logged . ');               
             </script>';
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
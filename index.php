
<!DOCTYPE html>
<?php
session_start();
require_once 'functions/functions.php';
$logged = is_logged();
if (isset($_GET['branca']) && $_GET['branca'] != "") {
    $branca = $_GET['branca'];
}else{
    $branca = "all";
}
?>
<html lang="it">

    <head>
        <?php
        printDefaultMetadata("Index");
        ?>
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
        draw_modal_message();
        draw_footer();
        ?>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
        <script src="Js/index.js"></script>
        <?php
        //carico articoli
        $is_capo_string = "";
        if (is_capo($logged)) {
            $is_capo_string = "true";
        } else {
            $is_capo_string = "false";
        }
        echo '<script>';
        echo '$().ready( draw_art("' . $branca . '",' . $is_capo_string . '));';
        echo '</script>';
        //messaggio benvenuto
        if ($logged && isset($_SESSION["just_logged"]) && $_SESSION["just_logged"]) {
            echo '<script> $().ready(toast_welcome("' . $_SESSION['log_username'] . '"));               
             </script>';
            unset($_SESSION["just_logged"]);
        }
        //messaggio articolo con successo
        if (isset($_SESSION['art_inserted'])) {
            echo ' <script> $().ready(function () {              
                    Materialize.toast( "'.$_SESSION['art_inserted'].'", 8000);                
                    }); </script>';            
            unset($_SESSION['art_inserted']);
        }
        ?>
    </body>
</html>
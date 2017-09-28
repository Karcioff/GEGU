
<!DOCTYPE html>
<?php
session_start();
require_once 'connection/connect.php';
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
        <style>
            body {
                display: flex;
                flex-direction: column;
                font-family: 'Open Sans', sans-serif;
                background-color: rgb(239, 247, 252);
            }

            main {
                flex: 1 0 auto;
            }

            .parallax-container {
                height: 600px;
                background-repeat: no-repeat;
                background-size: contain;
            }
        </style>
    </head>
    <body>
        <?php
        if ($logged) {
            echo '<nav class="light-blue lighten-1 z-depth-1" role="navigation">
            <a href="#" data-activates="slide-out" class="button-collapse show-on-large"><i class="material-icons">menu</i></a>
            <div class="nav-wrapper container"><a id="logo-container" href="#" class="brand-logo side">GE.GU ' . $_SESSION["log_username"] . '</a>
                <ul class="right hide-on-med-and-down">
                    <li><a href="gest.html">Esci</a></li>
                </ul>
                <ul id="nav-mobile" class="side-nav">
                    <li><a href="#">Navbar Link</a></li>
                </ul>
                <a href="gest.html" data-activates="nav-mobile" class="button-collapse "><i class="large large material-icons">exit</i></a>
            </div>
            <ul id="slide-out" class="side-nav blue-grey lighten-5">
                <li>
                    <div class="user-view black-text indigo darken-2">
                        <a href="#!user"><img class="circle" src="images/agesci.png"></a>
                        <a href="#!name"><span class="white-text name">' . $_SESSION['log_username'] . '</span></a>
                        <a href="#!email"><span class="white-text email">' . $_SESSION['log_email'] . '</span></a>
                    </div>
                </li>
                <li><a class="subheader">Attività</a></li>
                <li><a href="login.php" class="waves-effect"><i class="material-icons">person</i>Login</a></li>
                <li><a href="#!" class="waves-effect"><i class="material-icons">assignment</i>Eventi</a></li>
                <li><a href="#!" class="waves-effect"><i class="material-icons">assignment_ind</i>Censiti</a></li>
                <li><a href="#!" class="waves-effect"><i class="material-icons">euro_symbol</i>Finanza</a></li>
                <li><a href="#!" class="waves-effect"><i class="material-icons">group</i>Co.Ca<span class="new badge" style="margin-left:15px;">1</span></a></li>
                <li><a href="#!" class="waves-effect"><i class="material-icons">child_care</i>L/C</a></li>
                <li><a href="#!" class="waves-effect"><i class="material-icons">explore</i>E/G</a></li>
                <li><a href="#!" class="waves-effect"><i class="material-icons">directions_walk</i>R/S<span class="new badge" style="margin-left:15px;">4</span></a></li>
                <li><a href="#!" class="waves-effect"><i class="material-icons">terrain</i>Campi estivi</a></li>
                <li><a href="insertart.php" class="waves-effect"><i class="material-icons">comment</i>Aggiungi articolo</a></li>
            </ul>
        </nav>';
        }
        // utente OSPITE
        else {
            echo '        <nav class="light-blue lighten-1 z-depth-1" role="navigation">
            <a href="#" data-activates="slide-out" class="button-collapse show-on-large"><i class="material-icons">menu</i></a>
            <div class="nav-wrapper container"><a id="logo-container" href="#" class="brand-logo side">GE.GU utente ospite</a>
                <ul class="right hide-on-med-and-down">
                    <li><a href="gest.html">Esci</a></li>
                </ul>
                <ul id="nav-mobile" class="side-nav">
                    <li><a href="#">Navbar Link</a></li>
                </ul>
                <a href="gest.html" data-activates="nav-mobile" class="button-collapse "><i class="large large material-icons">exit</i></a>
            </div>
            <ul id="slide-out" class="side-nav blue-grey lighten-5">
                <li>
                    <div class="user-view black-text indigo darken-2">
                        <a href="#!user"><img class="circle" src="images/agesci.png"></a>
                        <a href="#!name"><span class="white-text name">Mandriano Doria</span></a>
                        <a href="#!email"><span class="white-text email">mandriano@bue.com</span></a>
                    </div>
                </li>
                <li><a class="subheader">Attività</a></li>
                <li><a href="login.php" class="waves-effect"><i class="material-icons">person</i>Login</a></li>
                <li><a href="#!" class="waves-effect"><i class="material-icons">assignment</i>Eventi</a></li>
                <li><a href="#!" class="waves-effect"><i class="material-icons">assignment_ind</i>Censiti</a></li>
                <li><a href="#!" class="waves-effect"><i class="material-icons">euro_symbol</i>Finanza</a></li>
                <li><a href="#!" class="waves-effect"><i class="material-icons">group</i>Co.Ca<span class="new badge" style="margin-left:15px;">1</span></a></li>
                <li><a href="#!" class="waves-effect"><i class="material-icons">child_care</i>L/C</a></li>
                <li><a href="#!" class="waves-effect"><i class="material-icons">explore</i>E/G</a></li>
                <li><a href="#!" class="waves-effect"><i class="material-icons">directions_walk</i>R/S<span class="new badge" style="margin-left:15px;">4</span></a></li>
                <li><a href="#!" class="waves-effect"><i class="material-icons">terrain</i>Campi estivi</a></li>
            </ul>
        </nav>';
        }
        ?>

        <!--Inserimento articoli -->
        <div class="container">
            <?php
            if ($logged) {
                $res = '';
                $result = $conn->query("SELECT * FROM articoli");
                while ($row = $result->fetch_assoc()) {
                    $aut = $row["ART_AUTORE"];
                    $tit = $row["ART_TITOLO"];
                    $art = $row["ART_TESTO"];
                    echo <<<HTML
                '<div class = "col s12 m12">
                        <div class = "card white z-depth-1">
                            <div class = "card-content blue-text">
                                <span class = "card-title black-text"><b>$tit</b></span>
                                <p>$art</p>
                                <small>By : $aut</small>
                            </div>
                            <div class = "card-action grey lighten-5">
                                <a href = "#" class = "blue-text">Accetta</a>
                                <a href = "#" class = "blue-text">Rifiuta</a>
                            </div>
                        </div>
                </div >
HTML;
                }
            }
            ?>
        </div>

        <footer class="page-footer blue">
            <div class="container row">
                Software developed by: HEROES SOFTWARE ©2017
            </div>
        </footer>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
        <script>$(".button-collapse").sideNav();</script>
        <?php
            require './functions/functions.php';
            modal_message();
        if ($logged) {
            echo '<script> $().ready(function () {
                var username = "' . $_SESSION['log_username'] . '";               
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
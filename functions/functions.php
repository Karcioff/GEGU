<?php

/*
 * -Dis-
 * Elenco funzioni per la stampa delle pagine
 * in genere si differenziano in due funzioni
 * per elemento: default e personalizzata
 */

function is_logged() {
    if (isset($_SESSION['logged']) && $_SESSION['logged'] == TRUE && isset($_SESSION['log_username']) && $_SESSION['log_username'] != "") {
        return TRUE;
    } else {
        return FALSE;
    }
}

function is_capo($logged) {
    if (!$logged) {
        return FALSE;
    }
    if ($_SESSION["log_ruolo"] === "capo") {
        return TRUE;
    } else {
        return FALSE;
    }
}

function draw_art($tit, $art, $aut) {
    echo '<div class = "col s12 ">
                        <div class = "card white z-depth-3">
                            <div class = "card-content black-text">
                                <span class = "card-title blue-text text-darken-4"><b>' . $tit . '</b></span>
                                <p>' . $art . '</p>
                                <br>
                                <small>Autore :' . $aut . '</small>
                            </div>
                            <div class = "card-action blue lighten-5 right-align">
                                <a href = "#" class = "blue-text text-darken-4">Accetta</a>
                                <a href = "#" class = "blue-text text-darken-4">Rifiuta</a>
                            </div>
                        </div>
                </div >';
}

function draw_navbar($login) {
    if (!$login) {
        echo " <header>
            <div class='navbar-fixed'>    
            <nav class='blue darken-1 z-depth-1' role='navigation'>
            <a href='#' data-activates='slide-out' class='button-collapse show-on-large'><i class='material-icons'>menu</i></a>
            <div class='nav-wrapper container'><a id='logo-container' href='index.php' class='brand-logo side'>GE.GU</a>
                <ul id='nav-mobile' class='side-nav'>
                    <li><a href='#'>Navbar Link</a></li>
                </ul>
            </div>          
        </nav> 
        </div>
        </header>       
        <ul id='slide-out' class='side-nav white'>
                <li>
                    <div class='user-view black-text blue darken-4'>
                        <a href='#!user'><img class='circle' src='images/agesci.png'></a>
                        <a href='#!name'><span class='white-text name'>Utente ospite</span></a>
                        <a href='#!name'><span class='white-text email'>Accedi per ulteriori funzionalità</span></a>
                    </div>
                </li>
                <li><a class='subheader'>Attività</a></li>
                <li><a href='login.php' class='waves-effect'><i class='material-icons'>person</i>Login</a></li>
                <li><a href='#!' class='waves-effect'><i class='material-icons'>assignment</i>Eventi</a></li>
                <li><a href='#!' class='waves-effect'><i class='material-icons'>assignment_ind</i>Censiti</a></li>
                <li><a href='#!' class='waves-effect'><i class='material-icons'>euro_symbol</i>Finanza</a></li>
                <li><a href='login.php' class='waves-effect'><i class='material-icons'>group</i>Co.Ca<span class='new badge' style='margin-left:15px;'>1</span></a></li>
                <li><a href='index.php?branca=lc' class='waves-effect'><i class='material-icons'>child_care</i>L/C</a></li>
                <li><a href='index.php?branca=eg' class='waves-effect'><i class='material-icons'>explore</i>E/G</a></li>
                <li><a href='index.php?branca=rs' class='waves-effect'><i class='material-icons'>directions_walk</i>R/S<span class='new badge' style='margin-left:15px;'>4</span></a></li>
                <li><a href='#!' class='waves-effect'><i class='material-icons'>terrain</i>Campi estivi</a></li>
            </ul>
    ";
    } else {
        echo "<header>
            <div class='navbar-fixed'> 
            <nav class='blue darken-1 z-depth-1' role='navigation'>
            <a href='#' data-activates='slide-out' class='button-collapse show-on-large'><i class='material-icons'>menu</i></a>
            <div class='nav-wrapper container'><a id='logo-container' href='index.php' class='brand-logo side'>GE.GU " . $_SESSION['log_username'] . "</a>
                <ul class='right hide-on-down'>
                    <li><a href='functions/logout.php'>Esci</a></li>
                </ul>
                <ul id='nav-mobile' class='side-nav'>
                    <li><a href='#'>Navbar Link</a></li>
                </ul>
                <a href='functions/logout.php' data-activates='nav-mobile' class='button-collapse'><i class='large large material-icons'>exit</i></a>
            </div>
            </nav>
            </div>
            </header>
            <ul id='slide-out' class='side-nav white'>
                <li>
                    <div class='user-view black-text blue darken-4'>
                        <a href='#!user'><img class='circle' src='images/agesci.png'></a>
                        <a href='#!name'><span class='white-text name'>" . $_SESSION['log_username'] . "</span></a>
                        <a href='#!email'><span class='white-text email'>" . $_SESSION['log_email'] . "</span></a>
                    </div>
                </li>
                <li><a class='subheader'>Attività</a></li>
                <li><a href='#!' class='waves-effect'><i class='material-icons'>assignment</i>Eventi</a></li>
                <li><a href='#!' class='waves-effect'><i class='material-icons'>assignment_ind</i>Censiti</a></li>
                <li><a href='#!' class='waves-effect'><i class='material-icons'>euro_symbol</i>Finanza</a></li>
                <li><a href='index.php?branca=coca' class='waves-effect'><i class='material-icons'>group</i>Co.Ca<span class='new badge' style='margin-left:15px;'>1</span></a></li>
                <li><a href='index.php?branca=lc' class='waves-effect'><i class='material-icons'>child_care</i>L/C</a></li>
                <li><a href='index.php?branca=eg' class='waves-effect'><i class='material-icons'>explore</i>E/G</a></li>
                <li><a href='index.php?branca=rs' class='waves-effect'><i class='material-icons'>directions_walk</i>R/S<span class='new badge' style='margin-left:15px;'>4</span></a></li>
                <li><a href='#!' class='waves-effect'><i class='material-icons'>terrain</i>Campi estivi</a></li>
                <li><a href='insertart.php' class='waves-effect'><i class='material-icons'>comment</i>Aggiungi articolo</a></li>
            </ul>
        ";
    }
}

function draw_footer() {
    echo '        <footer class="page-footer blue">
            <div class="container row">
                Software developed by: HEROES SOFTWARE ©2017
            </div>
        </footer>';
}

function printLoginForm() {
    $login = <<<HTML
        <div class="container login"><div class="row ">
            <div class="col s12 m12 l12"><div class="card blue darken-2 z-depth-3">
                <div class="card-content white-text">
                    <span class="card-title">Login</span>
                            <p>Accedi con le tue credenziali.</p>
                            <hr>
                            <div class="row">
                                <form class="col s12">
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <i class="material-icons prefix">email</i>
                                            <input id="email" type="email" class="validate">
                                            <label for="email">Email</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <i class="material-icons prefix">security</i>
                                            <input id="password" type="password" class="validate">
                                            <label for="password">Password</label>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="card-action blue darken-3">
                            <a href="gest.html" class="white-text">Accedi</a>
                            <a href="#" class="white-text">Recupera password</a>
                            <a href="signin.php" class="white-text">registrati</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
HTML;
    return $login;
}

function printNews($title, $body) {
    $news = <<<HTML
            <div class="col s12 m12">
                <div class="card white z-depth-1">
                    <div class="card-content blue-text">
                        <span class="card-title black-text"><b>$title</b></span>
                        $body
                    </div>
                    <div class="card-action grey lighten-5">
                        <a href="#" class="blue-text">Accetta</a>
                        <a href="#" class="blue-text">Rifiuta</a>
                    </div>
                </div>
            </div>
HTML;
    return $news;
}

function printDefaultMetadata($title) {
    echo '  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
            <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0" />
            <meta name="theme-color" content="#0d47a1">
            <title>' . $title . '</title>';
}

function printMetadata($title, $meta) {
    $metadata = <<<HTML
            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
            <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0" />
HTML;
    foreach ($meta as $val) {
        $metadata .= $meta;
    }
    $metadata .= "<title>$title</title>";
    return $metadata;
}

function printDefaultHead() {
    $head = <<<HTML
         <head>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
            <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
            <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
        </head>   
HTML;
    return $head;
}

function printHead($heads) {
    $head = <<<HTML
         <head>
HTML;
    foreach ($heads as $val) {
        $head .= $val;
    }
    $head .= "</head>";
    return $head;
}

function printDefaultHeader() {
    $header = <<<HTML
            <!DOCTYPE html>
                <html lang="it">
HTML;
    return $header;
}

function printDefaultEndPage() {
    $end = <<<HTML
                </html>
HTML;
    return $end;
}

function modal_message() {
    echo '<div id="modal" class="modal">
    <div class="modal-content">
      <h4 id="modal_title">Modal Header</h4>
      <p id= "modal_text">A bunch of text</p>
    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Ok</a>
    </div>
  </div>';
}

?>
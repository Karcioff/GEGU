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

//oggetto per gestire articoli
class Articolo {

    public $titolo;
    public $testo;
    public $autore;
    public $data;
    public $foto;

    public function __construct($titolo, $testo, $autore, $data, $foto) {
        $this->titolo = $titolo;
        $this->testo = $testo;
        $this->data = $data;
        $this->autore = $autore;
        $this->foto = $foto;
    }

//    public function display_images() {
//        if (count($this->foto) == 0) {
//            return "";
//        }
//        $result = '<div class="slider">
//                    <ul class="slides">';
//        foreach ($this->foto as $foto_url) {
//            $item = '<li>
//        <img src="' . $foto_url . '">
//      </li>';
//            $result = $result . $item;
//        }
//        $result = $result . '</ul></div>';
//        return $result;
//    }
    
        public function display_images() {
        if (count($this->foto) == 0) {
            return "";
        }
        $result = '<div class="carousel carousel-slider">';
        foreach ($this->foto as $foto_url) {
            $item = ' <a class="carousel-item " href="#one!"><img src="'.$foto_url.'"></a>';
            $result = $result . $item;
        }
        $result = $result . '</div>';
        return $result;
    }

    public function draw_art() {
        echo '<div class = "col s12 ">
                        <div class = "card white z-depth-3">
                            <div class = "card-content black-text">
                                <span class = "card-title blue-text text-darken-4"><b>' . $this->titolo . '</b></span>
                                <p>' . $this->testo . '</p>
                                <br>
                                <small>Autore :' . $this->autore . '</small>
                            </div>' .
        $this->display_images() .
        '<div class = "card-action blue lighten-5 right-align">
                                <a href = "#" class = "blue-text text-darken-4">Accetta</a>
                                <a href = "#" class = "blue-text text-darken-4">Rifiuta</a>
                            </div>
                        </div>
                </div >';
    }

}

//per comparare date
function art_date_sort($a, $b) {
    $ad = $a->data;
    $bd = $b->data;
    if ($ad == $bd) {
        return 0;
    }
    return $ad < $bd ? -1 : 1;
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

function draw_modal_message() {
    echo '<div id="modal_message" class="modal">
    <div class="modal-content">
      <h4 id="modal_title">Modal Header</h4>
      <p id= "modal_text">A bunch of text</p>
    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Ok</a>
    </div>
  </div>';
}

function draw_uploader() {
    echo ' <script type="text/template" id="qq-template">
            <div class="qq-uploader-selector qq-uploader" qq-drop-area-text="Trascina qui i file">
            <div class="qq-total-progress-bar-container-selector qq-total-progress-bar-container">
            <div role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" class="qq-total-progress-bar-selector qq-progress-bar qq-total-progress-bar"></div>
            </div>
            <div class="qq-upload-drop-area-selector qq-upload-drop-area" qq-hide-dropzone>
            <span class="qq-upload-drop-area-text-selector"></span>
            </div>
            <div class="qq-upload-button-selector waves-effect waves-light btn blue darken-4">
            <div>Upload file</div>
            </div>
            <span class="qq-drop-processing-selector qq-drop-processing">
            <span>Processing dropped files...</span>
            <span class="qq-drop-processing-spinner-selector qq-drop-processing-spinner"></span>
            </span>
            <ul class="qq-upload-list-selector qq-upload-list" aria-live="polite" aria-relevant="additions removals">
            <li>
            <div class="qq-progress-bar-container-selector">
            <div role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" class="qq-progress-bar-selector qq-progress-bar"></div>
            </div>
            <span class="qq-upload-spinner-selector qq-upload-spinner"></span>
            <img class="qq-thumbnail-selector" qq-max-size="100" qq-server-scale>
            <span class="qq-upload-file-selector qq-upload-file"></span>     
            <span class="qq-upload-size-selector qq-upload-size"></span>
            
            <button type="button" class="qq-upload-cancel-selector btn-floating blue darken-4"><i class="material-icons">delete</i></button>
            <button type="button" class="qq-upload-retry-selector btn-floating blue darken-4"><i class="material-icons">sync</i></button>
            <button type="button" class="qq-upload-delete-selector btn-floating blue darken-4"><i class="material-icons">delete</i></button>
            <span role="status" class="qq-upload-status-text-selector qq-upload-status-text"></span>
            </li>
            </ul>

            <dialog class="qq-alert-dialog-selector">
            <div class="qq-dialog-message-selector"></div>
            <div class="qq-dialog-buttons">
            <button type="button" class="qq-cancel-button-selector">Close</button>
            </div>
            </dialog>

            <dialog class="qq-confirm-dialog-selector">
            <div class="qq-dialog-message-selector"></div>
            <div class="qq-dialog-buttons">
            <button type="button" class="qq-cancel-button-selector">No</button>
            <button type="button" class="qq-ok-button-selector">Yes</button>
            </div>
            </dialog>

            <dialog class="qq-prompt-dialog-selector">
            <div class="qq-dialog-message-selector"></div>
            <input type="text">
            <div class="qq-dialog-buttons">
            <button type="button" class="qq-cancel-button-selector">Cancel</button>
            <button type="button" class="qq-ok-button-selector">Ok</button>
            </div>
            </dialog>
            </div>
        </script>';
}

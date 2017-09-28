<?php

/*
 * -Dis-
 * Elenco funzioni per la stampa delle pagine
 * in genere si differenziano in due funzioni
 * per elemento: default e personalizzata
 */

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
    $metadata = <<<HTML
            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
            <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0" />
            <title>$title</title>
HTML;
    return $metadata;
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

function printDefaultHeader(){
    $header=<<<HTML
            <!DOCTYPE html>
                <html lang="it">
HTML;
    return $header;
}
function printDefaultEndPage(){
    $end=<<<HTML
                </html>
HTML;
    return $end;
}

function modal_message(){
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
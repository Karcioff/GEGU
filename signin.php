<!DOCTYPE html>
<html lang="it">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0" />
        <title>GEGU - SIGN IN</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
        <link rel="stylesheet" href="css/signin.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">

        <style>
            body {
                display: flex;
                flex-direction: column;
                font-family: 'Open Sans', sans-serif;
                background-color: #64b5f6;
            }
        </style>
    </head>

    <body>
        <div class="container signin">
            <div class="row ">
                <div class="col s12 m12 l12">

                    <!CARD>
                    <div class="card blue lighten-5 z-depth-3">
                        <div class="card-content blue-text">
                            <span class="card-title">Registrati</span>
                            <p>Inserisci le tue credenziali per usufruire del potenziale di GEGU.</p>
                            <hr>
                            <!FORM>
                            <div class="row">
                                <form class="col s12">
                                    <!COLONNA 1>
                                    <div class="col s12 m12 l6">
                                        <div class="row">
                                            <div class="input-field col s12">
                                                <i class="material-icons prefix">account_circle</i>
                                                <input id="username" type="text" class="validate">
                                                <label for="username">Username</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="input-field col s12">
                                                <i class="material-icons prefix">lock_open</i>
                                                <input id="password" type="password" class="validate">
                                                <label for="password">Password</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="input-field col s12">
                                                <i class="material-icons prefix">lock_open</i>
                                                <input id="check_password" type="password" class="validate">
                                                <label for="check_password">Reinserisci password</label>
                                            </div>
                                        </div>
                                    </div>

                                    <!COLONNA 2>
                                    <div class="col s12 m12 l6">
                                        <div class="row">
                                            <div class="input-field col s12">
                                                <i class="material-icons prefix">email</i>
                                                <input id="email" type="email" class="validate" >
                                                <label for="email">Indirizzo email</label>
                                            </div>
                                        </div>
                                        <!radio buttons>                                        
                                        <p>Che tipo di utente sei?</p>                            
                                        <hr>
                                        <br>
                                        <div class="container">
                                            <div class="row">
                                                <p>
                                                    <input class="with-gap" name="group1" type="radio" id="capoRadioBt"  />
                                                    <label for="capoRadioBt" class="blue-text">Capo</label>
                                                </p>
                                                <p>
                                                    <input class="with-gap" name="group1" type="radio" id="ragazzo"  />
                                                    <label for="ragazzo" class="blue-text">Adepto</label>
                                                </p>
                                                <p>
                                                    <input class="with-gap" name="group1" type="radio" id="genitore"  />
                                                    <label for="genitore" class="blue-text">Genitore</label>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="card-action blue darken-1">
                            <a href="gest.html" class="white-text">Conferma</a>
                            <a href="index.html" class="white-text">Annulla</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
</html>


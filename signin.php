<!DOCTYPE html>
<html lang="it">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0" />
        <title>SIGN IN</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
        <link rel="stylesheet" href="css/GEGU.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    </head>

    <body>
        <div class="container signin">
            <div class="row ">
                <div class="col s12 m12 l12">

                    <!CARD>
                    <div class="card white z-depth-3">
                        <div class="card-content blue-text">
                            <span class="card-title">Registrati</span>
                            <p>Inserisci le tue credenziali per usufruire del potenziale di GEGU.</p>
                            <hr>
                            <!FORM>
                            <div class="row">
                                <form class="col s12" id="formValidate">
                                    <!COLONNA 1>
                                    <div class="col s12 m12 l6">
                                        <div class="row">
                                            <div class="input-field col s12">                                                
                                                <i class="material-icons prefix">account_circle</i>
                                                <input id="username" name="username" type="text">
                                                <label for="username">Username</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="input-field col s12">
                                                <i class="material-icons prefix">lock_open</i>
                                                <input id="password" name="password" type="password">
                                                <label for="password">Password</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="input-field col s12">
                                                <i class="material-icons prefix">lock_open</i>
                                                <input id="check_password" name="check_password" type="password">
                                                <label for="check_password">Reinserisci password</label>
                                            </div>
                                        </div>
                                    </div>

                                    <!COLONNA 2>
                                    <div class="col s12 m12 l6">
                                        <div class="row">
                                            <div class="input-field col s12">
                                                <i class="material-icons prefix">email</i>
                                                <input id="email" name="email" type="email">
                                                <label for="email">Indirizzo email</label>
                                            </div>
                                        </div>
                                        <!radio buttons>                                        
                                        <p>Che tipo di utente sei?</p>                            
                                        <hr>
                                        <br>
                                        <div class="row">
                                            <div class="col s12 m4 offset-m1">
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
                                            <div class="col s12 m7">
                                                <div class="input-field col s12">
                                                    <select>
                                                        <option value="" disabled selected>Seleziona la branca</option>
                                                        <option value="1">Lupetti L/C</option>
                                                        <option value="2">Reparto E/G</option>
                                                        <option value="3">Noviziato e Clan R/S</option>
                                                        <option value="4">Capogruppo</option> 
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="card-action blue darken-4">
                            <a href="index.html" class="white-text">Conferma</a>
                            <a href="gest.html" class="white-text">Annulla</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>     
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
        <script src="Js/signin_validation.js"></script>
    </body>
</html>


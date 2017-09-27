<!DOCTYPE html>
<html lang="it">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0" />
        <title>REGISTRATI</title>
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
                        <div class="card-content blue-text text-darken-4">
                            <span class="card-title">Registrati</span>
                            <p>Inserisci le tue credenziali per usufruire del potenziale di GEGU.</p>
                            <hr>
                            <!FORM>
                            <div class="row">
                                <form class="col s12" id="reg_form" name="reg_form" method="post" action="functions/registration.php" >
                                    <!COLONNA 1>
                                    <div class="col s12 m12 l6">
                                        <div class="row">
                                            <div class="input-field col s12">                                                
                                                <i class="material-icons prefix">account_circle</i>
                                                <input id="reg_username" name="reg_username" type="text">
                                                <label for="reg_username">Username</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="input-field col s12">
                                                <i class="material-icons prefix">lock_open</i>
                                                <input id="reg_password" name="reg_password" type="password">
                                                <label for="reg_password">Password</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="input-field col s12">
                                                <i class="material-icons prefix">lock_open</i>
                                                <input id="reg_check_password" name="reg_check_password" type="password">
                                                <label for="reg_check_password">Reinserisci password</label>
                                            </div>
                                        </div>
                                    </div>

                                    <!COLONNA 2>
                                    <div class="col s12 m12 l6">
                                        <div class="row">
                                            <div class="input-field col s12">
                                                <i class="material-icons prefix">email</i>
                                                <input id="reg_email" name="reg_email" type="email">
                                                <label for="reg_email">Indirizzo email</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="input-field col s12">
                                                <i class="material-icons prefix">email</i>
                                                <input id="reg_nome" name="reg_nome" type="text">
                                                <label for="reg_nome">Nome</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="input-field col s12">
                                                <i class="material-icons prefix">email</i>
                                                <input id="reg_cognome" name="reg_cognome" type="text">
                                                <label for="reg_cognome">Cognome</label>
                                            </div>
                                        </div>
                                        <!radio buttons>                                        
                                        <p>Che tipo di utente sei?</p>                    
                                        <br>
                                        <div class="row">
                                            <div class="col s12 m4 offset-m1">
                                                <p>
                                                    <input class="with-gap" name="reg_ruolo" type="radio" id="reg_capoRadioBt"  />
                                                    <label for="reg_capoRadioBt" class="blue-text text-darken-4">Capo</label>
                                                </p>
                                                <p>
                                                    <input class="with-gap" name="reg_ruolo" type="radio" id="reg_ragazzo"  />
                                                    <label for="reg_ragazzo" class="blue-text text-darken-4">Adepto</label>
                                                </p>
                                                <p>
                                                    <input class="with-gap" name="reg_ruolo" type="radio" id="reg_genitore"  />
                                                    <label for="reg_genitore" class="blue-text text-darken-4">Genitore</label>
                                                </p>
                                            </div>
                                            <div class="col s12 m7">
                                                <div class="input-field col s12">
                                                    <select id="reg_branca" name="reg_branca">
                                                        <option value="" disabled selected>Seleziona la branca</option>
                                                        <option value="lc">Lupetti L/C</option>
                                                        <option value="eg">Reparto E/G</option>
                                                        <option value="rs">Noviziato e Clan R/S</option>
                                                        <option value="capogruppo">Capogruppo</option> 
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="card-action blue darken-4">
                            <a href="#" onclick= "submit()"
                               class="white-text">Conferma</a>
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


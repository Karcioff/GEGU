<html lang="it">

    <head>
        <?php
        require_once './functions/functions.php';
        printDefaultMetadata("Login");
        ?>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
        <link rel="stylesheet" href="css/GEGU.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    </head>


    <body>
        <?php
        draw_navbar(false);
        ?>
        <main>
            <div class="container login">
                <div class="row ">
                    <div class="col s12 m12 l12">
                        <div class="card white z-depth-3">
                            <div class="card-content blue-text text-darken-4">
                                <span class="card-title">Login</span>
                                <p>Accedi con le tue credenziali.</p>
                                <hr>
                                <div class="row">
                                    <form id="log_form" name="log_form" class="col s12" method="post" action="./functions/autentication.php">
                                        <div class="row">
                                            <div class="input-field col s12">
                                                <i class="material-icons prefix">account_circle</i>
                                                <input id="log_username" name="log_username" type="text" class="validate">
                                                <label for="log_username">Username</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="input-field col s12">
                                                <i class="material-icons prefix">lock_open</i>
                                                <input id="log_password" name="log_password" type="password" class="validate">
                                                <label for="log_password">Password</label>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="card-action blue darken-3 right-align">
                                <a href="#" class="white-text" onclick="autenticate();">Accedi</a>
                                <a href="signin.php" class="white-text">registrati</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
        </main>
        <?php
        draw_footer();
        ?>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
        <script src="Js/login.js"></script>
    </body>

</html>

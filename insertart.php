<html lang="it">

    <head>
        <?php
        session_start();
        require_once './functions/functions.php';
        printDefaultMetadata("Inserisci articolo");
        ?>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
        <link rel="stylesheet" href="css/GEGU.css">
        <link rel="stylesheet" href="css/fine-uploader-new.min.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">

    </head>

    <body>
        <?php
        draw_navbar(true);
        ?>
        <main>
            <div class="container signin"> 
                <div class="card white z-depth-3">
                    <div class="card-content blue-text text-darken-4">
                        <form id="art_form" name="art_form" method="post" enctype="multipart/form-data">                  
                            <span class="card-title blue-text text-darken-4">Inserisci l'articolo</span>
                            <p>Scrivi qui le informazioni che vuoi condividere con il resto del gruppo</p>
                            <hr>
                            <div class="container small">
                                <div class="row">

                                    <!--titolo e articolo-->
                                    <div class="row">
                                        <div class="input-field col s12 m6 l6">                                                
                                            <input id="art_titolo" name="art_titolo" type="text">
                                            <label for="art_titolo">Titolo articolo</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12 m11">                                                
                                            <textarea id="art_testo" name="art_testo" class="materialize-textarea"></textarea>
                                            <label for="art_testo">Testo articolo</label>
                                        </div>
                                    </div>

                                    <!--inserimento file-->
                                    <div class="small container">
                                    <div id="my-uploader"></div>
                                    </div>                               

                                    <!-- autore e data-->
                                    <div class="row">
                                        <div class="input-field col s12 m6 l6">                                                
                                            <input id="art_autore" name="art_autore" type="text">
                                            <label for="art_autore">Autore articolo</label>
                                        </div>                           

                                        <div class="input-field col s12 m5 offset-m1 l4 offset-l1">                                                
                                            <input id="art_data" name="art_data" type="text" class="datepicker">
                                            <label for="art_data">Data</label>
                                        </div>
                                    </div>
                                    <!--pubblicazione-->
                                    <p>Seleziona dove pubblicare l'articolo:</p>
                                    <div class="input-field col s12 m6 l5">
                                        <select id="art_branca" name="art_branca">                                            
                                            <option value="all" selected>Homepage</option>
                                            <option value="lc">Lupetti L/C</option>
                                            <option value="eg">Reparto E/G</option>
                                            <option value="rs">Noviziato e Clan R/S</option>
                                            <option value="coca">Co.Ca</option>                                     
                                        </select>
                                    </div>
                                </div>
                            </div>                         

                            <!-- ANTEPRIMA ARTICOLO -->
                            <div id="ant_modal" class="modal">
                                <div class="modal-content">
                                    <span class = "card-title blue-text text-darken-4" id="ant_title"><b>titolo</b></span>
                                    <p id="ant_text">testo articolo</p>
                                    <br>
                                    <p id="ant_author">Autore : </p>
                                    <p id="ant_date">Data</p>
                                    <p id="ant_branca">Branca</p>
                                </div>
                                <div class="modal-footer">
                                    <a href="#" onclick="submit();" class="modal-action modal-close waves-effect waves-green btn-flat">Conferma</a>
                                </div>
                            </div>


                        </form>
                        <div id="fine-uploader-validation"></div>
                    </div>
                    <div class="card-action blue darken-4">
                        <a href="#" onclick="open_ant($('#art_titolo').val(), $('#art_testo').val(), $('#art_autore').val(), $('#art_data').val(), $('#art_branca').val());" class="white-text">Conferma</a>
                        <a href="#" class="white-text">Annulla</a>
                    </div>
                </div>
            </div>
        </main>
        <?php
        draw_footer();
        draw_modal_message();
        draw_uploader();
        ?>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
        <script src="Js/fine-uploader.min.js"></script>
        <script src="Js/insertart.js"></script>
    </body>
</html>
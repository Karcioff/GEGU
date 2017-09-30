<html lang="it">

    <head>
        <?php
        session_start();
        require_once './functions/functions.php';
        printDefaultMetadata("Inserisci articolo");
        ?>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
        <link rel="stylesheet" href="css/GEGU.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    </head>

    <body>
        <?php
        draw_navbar(true);
        ?>
        <main>
            <div class="container signin"> <!--        da sistemare lo stile-->
                <div class="card white z-depth-3">
                    <div class="card-content blue-text text-darken-4">
                        <form id="art_form" name="art_form" method="post" enctype="multipart/form-data" action="art_insert.php">                  
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
                                    <div class="file-field input-field col s12 m10 s8">
                                        <div class="btn blue darken-4">
                                            <span>File</span>
                                            <input type="file" name="fileToUpload" id="fileToUpload" multiple>
                                        </div>
                                        <div class="file-path-wrapper">
                                            <input class="file-path validate" type="text" placeholder="Selezione file o immagini che vuoi inserire">
                                        </div>
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
                                    <div class="input-field col s12 m6 l5">
                                        <select name="art_branca">
                                            <option value="" disabled selected>Seleziona dove pubblicare l'articolo</option>
                                            <option value="all">Homepage</option>
                                            <option value="lc">Lupetti L/C</option>
                                            <option value="eg">Reparto E/G</option>
                                            <option value="rs">Noviziato e Clan R/S</option>
                                            <option value="coca">Co.Ca</option>                                     
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </form>  
                    </div>
                    <div class="card-action blue darken-4">
                        <a href="#" onclick="document.getElementById('art_form').submit();" class="white-text">Conferma</a>
                        <a href="#" class="white-text">Annulla</a>
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
        <script>
                        $(document).ready(function () {
                            $('select').material_select();
                            $('.datepicker').pickadate({
                                selectMonths: true, // Creates a dropdown to control month
                                selectYears: 15, // Creates a dropdown of 15 years to control year,
                                monthsFull: ['Gennaio', 'Febbraio', 'Marzo', 'Aprile', 'Maggio', 'Giugno', 'Luglio', 'Agosto', 'Settembre', 'Ottobre', 'Novembre', 'Dicembre'],
                                monthsShort: ['Gen', 'Feb', 'Mar', 'Apr', 'Mag', 'Giu', 'Lug', 'Ago', 'Sett', 'Ott', 'Nov', 'Dic'],
                                weekdaysFull: ['Domenica', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', ],
                                weekdaysShort: ['Dom', 'Lun', 'Mar', 'Mer', 'Gio', 'Ven', 'Sab'],
                                weekdaysLetter: ['Dom', 'Lun', 'Mar', 'Mer', 'Gio', 'Ven', 'Sab'],
                                today: 'Oggi',
                                clear: 'Cancella',
                                close: 'Ok',
                                closeOnSelect: false, // Close upon selecting a date,
                                format: 'dd-mm-yyyy',
                            });
                            var $input = $('.datepicker').pickadate();
                            var picker = $input.pickadate('picker');
                            picker.set('select', new Date());
                        });
        </script>
    </body>
</html>
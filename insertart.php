<html lang="it">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0" />
        <title>INSERICI ARTICOLO</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
        <link rel="stylesheet" href="css/GEGU.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    </head>

    <body>
        <div class="container signin"> <!--        da sistemare lo stile-->
            <div class="card white z-depth-3">
                <div class="card-content blue-text text-darken-4">                    
                    <span class="card-title blue-text text-darken-4">Inserisci l'articolo</span>
                    <p>Scrivi qui le informazioni che vuoi condividere con il resto del gruppo</p>
                    <hr>
                    <div class="container small">
                        <div class="row">

                            <!--titolo e articolo-->
                            <div class="row">
                                <div class="input-field col s12 m6 l6">                                                
                                    <input id="titolo" name="titolo" type="text">
                                    <label for="titolo">Titolo articolo</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12 m11">                                                
                                    <textarea id="textarea1" class="materialize-textarea"></textarea>
                                    <label for="textarea1">Textarea</label>
                                </div>
                            </div>

                            <!--inserimento file-->
                            <div class="file-field input-field col s12 m10 s8">
                                <div class="btn blue darken-4">
                                    <span>File</span>
                                    <input type="file" multiple>
                                </div>
                                <div class="file-path-wrapper">
                                    <input class="file-path validate" type="text" placeholder="Selezione file o immagini che vuoi inserire">
                                </div>
                            </div> 

                            <!-- autore e data-->
                            <div class="row">
                                <div class="input-field col s12 m6 l6">                                                
                                    <input id="autore" name="autore" type="text">
                                    <label for="autore">Autore articolo</label>
                                </div>                           

                                <div class="input-field col s12 m5 offset-m1 l4 offset-l1">                                                
                                    <input id="data" name="data" type="text" class="datepicker">
                                    <label for="data">Data</label>
                                </div>
                            </div>
                            <!--pubblicazione-->
                            <div class="input-field col s12 m6 l5">
                                <select>
                                    <option value="" disabled selected>Seleziona dove pubblicare l'articolo</option>
                                    <option value="1">Homepage</option>
                                    <option value="2">Lupetti L/C</option>
                                    <option value="3">Reparto E/G</option>
                                    <option value="4">Noviziato e Clan R/S</option>
                                    <option value="5">Co.Ca</option>                                     
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-action blue darken-4">
                    <a href="" class="white-text">Conferma</a>
                    <a href="" class="white-text">Annulla</a>
                </div>
            </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
        <script>
            $(document).ready(function () {
                $('select').material_select();
                $('.datepicker').pickadate({
                    selectMonths: true, // Creates a dropdown to control month
                    selectYears: 15, // Creates a dropdown of 15 years to control year,
                    today: 'Oggi',
                    clear: 'Cancella',
                    close: 'Ok',
                    closeOnSelect: false // Close upon selecting a date,
                });
            });
        </script>
    </body>
</html>
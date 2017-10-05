/* 
 * JS della pagina inserimanto articoli
 */

//contiene se ci sono gli url delle foto o di documenti salvati
var foto_urls = [];
var docs_urls = [];


//funzione per aprire l'anteprima dell'articolo da pubblicare
function open_ant(title, text, author, date, branca) {
    document.getElementById('ant_title').textContent = title;
    document.getElementById('ant_text').textContent = text;
    document.getElementById('ant_author').textContent = "Autore: " + author;
    document.getElementById('ant_date').textContent = date;
    document.getElementById('ant_branca').textContent = "pubblicato in branca: " + branca;
    //document.getElementById('ant_immagini').textContent = "Upload delle seguenti immagini: " + images;
    $('#ant_modal').modal('open');
}


//salva i dati dell'articolo nel database e rimanda all'index
function save_art() {
    var titolo = $('#art_titolo').val();
    var testo = $('#art_testo').val();
    var autore = $('#art_autore').val();
    var data = $('#art_data').val();
    var branca = $('#art_branca').val();
    var url_foto;
    var url_docs;

    if (foto_urls.length === 0) {
        url_foto = "";
    } else {
        url_foto = foto_urls.join(",5,5,");
    }
    if (docs_urls.length === 0) {
        url_docs = "";
    } else {
        url_docs = docs_urls.join(",5,5,");
    }


    $.post("functions/art_insert.php", {
        art_titolo: titolo,
        art_testo: testo,
        art_autore: autore,
        art_data: data,
        art_branca: branca,
        art_foto: url_foto,
        art_docs: url_docs
    },
            function (data, status) {
                if (status === "success") {
                    window.location = "index.php";
                } else {
                    console.log(data);
                    document.getElementById("modal_title").textContent = "Errore";
                    document.getElementById("modal_text").textContent = "Si è verificato un errore nel caricare l'articolo:" + data + "     Ci scusiamo per il disagio.";
                    $('#modal_message').modal('open');
                }
            }
    , "text");
}


//funzione da chiamare nella pagina per eventuale upload e salvataggio database
function submit() {
    if (uploader.getUploads({status: qq.status.SUBMITTED}).length !== 0) {
        uploader.uploadStoredFiles();
    } else {
        save_art();
    }
}

//variabile che gestisce l'elemento upload
var uploader = new qq.FineUploader({
    element: document.getElementById('my-uploader'),
    request: {
        endpoint: "upload/upload_images.php"
    },
    validation: {
        allowedExtensions: ["jpeg", "jpg", "gif", "png", "pdf", "docx", "doc", "xlsx", "xls", "ppt", "pptx"],
        sizeLimit: 1000000 * 8, // 8 MiB,                                    
        itemLimit: 10
    },
    form: {
        element: "art_form",
        autoUpload: false,
        interceptSubmit: false
    },
    callbacks: {
        onComplete: function (id, name, response, ff) {
            var name = response.uploadName.toLowerCase();
            if (name.includes("jpeg") || name.includes("jpg") || name.includes("gif") || name.includes("png")) {
                var url_fotos = "upload/files/" + response.uuid + "/" + name;
            } else {
                var url_docs = "upload/files/" + response.uuid + "/" + response.uploadName;
            }
            docs_urls.push(url_docs);
            foto_urls.push(url_fotos);
        },
        onAllComplete: function () {
            save_art();
            foto_urls = [];
            docs_urls = [];
        }
    }
});


//operazioni da fare quando il documento è pronto
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
        format: 'dd-mm-yyyy'
    });

    var $input = $('.datepicker').pickadate();
    var picker = $input.pickadate('picker');
    picker.set('select', new Date());

    $('.modal').modal();
    $(".button-collapse").sideNav();

});



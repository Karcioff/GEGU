/* 
 * JS della pagina inserimanto articoli
 */

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
   
});

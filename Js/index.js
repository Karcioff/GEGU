/* 
 * funzioni JS nella pagina index
 */

$().ready(function () {
    //setting up sidenav
    $(".button-collapse").sideNav();

    //refresh degli articoli
    $.post("functions/art_display.php", function (data) {
        $("#art_container").html(data);
    });


});


function toast_welcome(username) {
    var message = "Buongiorno " + username;
    Materialize.toast(message, 4000);
}

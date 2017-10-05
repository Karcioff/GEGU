/* 
 * funzioni JS nella pagina index
 */
function draw_art(branca, is_capo) {
    $.post("functions/art_display.php", {
        branca: branca,
        is_capo: is_capo
    }, function (data) {
        $("#art_container").html(data);
        $('.carousel').carousel({
        indicators: true,
        fullWidth: true
    });
    });
}

$().ready(function () {
    //setting up sidenav
    $(".button-collapse").sideNav();

    $('.slider').slider();
});


function toast_welcome(username) {
    var message = "Buongiorno " + username;
    Materialize.toast(message, 4000);
}

function show_allegati(){
        var x = document.getElementById("docs_div");
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
}

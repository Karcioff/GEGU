<?php

/*
 * file da chiamare via Ajax per la ricerca degli articoli
 */

require_once './functions.php';

function art_find($branca, $is_capo) {
   require_once '../connection/connect.php'; 
    $sql = "";
    if ($branca == "all") {
        $sql = "SELECT * FROM articoli";
    } else {
        $sql = "SELECT * FROM articoli WHERE ART_BRANCA = '" . $branca . "'";
    }
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
        if (!$is_capo && $row["ART_BRANCA"] === "coca") {            
        } else {
            $aut = $row["ART_AUTORE"];
            $tit = $row["ART_TITOLO"];
            $art = $row["ART_TESTO"];
            draw_art($tit, $art, $aut);
        }
    }
    $conn->close();
}

art_find($_POST["branca"], $_POST["is_capo"]);

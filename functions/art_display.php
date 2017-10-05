<?php

/*
 * file da chiamare via Ajax per la ricerca degli articoli
 */

require_once './functions.php';

//seleziona gli articoli dal database in base alla branca e al ruolo richiesti
function art_find($branca, $is_capo) {
    require_once '../connection/connect.php';
    $sql = "";
    if ($branca == "all") {
        $sql = "SELECT * FROM articoli";
    } else {
        $sql = "SELECT * FROM articoli WHERE ART_BRANCA = '" . $branca . "'";
    }
    $result = $conn->query($sql);
    $articoli = array();
    while ($row = $result->fetch_assoc()) {
        if (!$is_capo && $row["ART_BRANCA"] === "coca") {
            
        } else {
            $aut = $row["ART_AUTORE"];
            $tit = $row["ART_TITOLO"];
            $test = $row["ART_TESTO"];
            $id = $row["ART_ID"];
            $data = date_create_from_format("d-m-Y", $row["ART_DATA"]);
            if ($row["ART_FOTO"] === "") {
                $foto = array();
            } else {
                $foto = explode(",5,5,", $row["ART_FOTO"]);
            }
             if ($row["ART_ALLEGATO"] === "") {
                $docs = array();
            } else {
                $docs = explode(",5,5,", $row["ART_ALLEGATO"]);
            }
            $art = new Articolo($tit, $test, $aut, $data,$docs, $foto, $id);
            array_push($articoli, $art);
        }
    }
    $conn->close();
    return $articoli;
}

//stampa il codice html per visualizzare gli articoli
function art_draw($articoli) {
    usort($articoli, "art_date_sort");
    foreach ($articoli as $art) {
        $art->draw_art();
    }
}

$articoli = art_find($_POST["branca"], $_POST["is_capo"]);
art_draw($articoli);

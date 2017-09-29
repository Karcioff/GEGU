<?php

/*
 * file da chiamare via Ajax per la ricerca degli articoli
 */
require_once '../connection/connect.php';
require_once './functions.php';
$result = $conn->query("SELECT * FROM articoli");
while ($row = $result->fetch_assoc()) {
    $aut = $row["ART_AUTORE"];
    $tit = $row["ART_TITOLO"];
    $art = $row["ART_TESTO"];
    draw_art($tit, $art, $aut);
}

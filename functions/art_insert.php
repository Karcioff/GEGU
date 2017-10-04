<?php
session_start();
include("../connection/connect.php");
$titolo = filter_var($_POST['art_titolo'], FILTER_SANITIZE_STRING);
$testo = filter_var($_POST['art_testo'], FILTER_SANITIZE_STRING);
$autore = filter_var($_POST['art_autore'], FILTER_SANITIZE_STRING);
$data = filter_var($_POST['art_data'], FILTER_SANITIZE_STRING);
$branca = filter_var($_POST['art_branca'], FILTER_SANITIZE_STRING);
$foto = filter_var($_POST['art_foto'], FILTER_SANITIZE_STRING);

$sql = "INSERT INTO articoli (ART_AUTORE, ART_TITOLO, ART_TESTO, ART_DATA, ART_BRANCA, ART_FOTO) "
        . "VALUES ('$autore','$titolo','$testo','$data','$branca','$foto')";

if ($conn->query($sql) === TRUE) {
    echo 'successo';
    $_SESSION['art_inserted'] = "Articolo caricato con successo";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

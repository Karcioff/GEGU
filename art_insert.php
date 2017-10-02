<?php

session_start();
include("connection/connect.php");
$titolo = filter_var($_POST['art_titolo'], FILTER_SANITIZE_STRING);
$testo = filter_var($_POST['art_testo'], FILTER_SANITIZE_STRING);
$autore = filter_var($_POST['art_autore'], FILTER_SANITIZE_STRING);
$data = filter_var($_POST['art_data'], FILTER_SANITIZE_STRING);
$branca = filter_var($_POST['art_branca'], FILTER_SANITIZE_STRING);
$foto_url = array();


$errors = array();
$uploadedFiles = array();
$extension = array("jpeg", "jpg", "png", "gif");
$bytes = 1024;
$KB = 1024 * 12;
$totalBytes = $bytes * $KB;
$UploadFolder = "uploads";

$counter = 0;

foreach ($_FILES["files"]["tmp_name"] as $key => $tmp_name) {
    $temp = $_FILES["files"]["tmp_name"][$key];
    $name = $_FILES["files"]["name"][$key];

    if (empty($temp)) {
        break;
    }

    $counter++;
    $UploadOk = true;

    if ($_FILES["files"]["size"][$key] > $totalBytes) {
        $UploadOk = false;
        array_push($errors, $name . " file size is larger than the 12 MB.");
    }

    $ext = pathinfo($name, PATHINFO_EXTENSION);
    if (in_array($ext, $extension) == false) {
        $UploadOk = false;
        array_push($errors, $name . " is invalid file type.");
    }
    // Check if file already exists
    if (file_exists($UploadFolder . "/" . $name)) {
        $temp_name = explode(".", $name);
        $newfilename = $temp_name[0] . round(microtime(true)) . '.' . end($temp_name);
        $name = $newfilename;
    }

    if ($UploadOk == true) {
        $path = $UploadFolder . "/" . $name;
        move_uploaded_file($temp, $path);
        array_push($uploadedFiles, $name);
        array_push($foto_url, $path);
    }
}

$message = "";
if ($counter > 0) {
    if (count($errors) > 0) {
        $message = $message .
                "<b>Errors:</b>" . "<br/><ul>";
        foreach ($errors as $error) {
            $message = $message . "<li>" . $error . "</li>";
        }
        $message = $message . "</ul><br/>";
    }

    if (count($uploadedFiles) > 0) {
        $message = $message . "<b>Uploaded Files:</b>" . "<br/><ul>";
        foreach ($uploadedFiles as $fileName) {
            $message = $message . "<li>" . $fileName . "</li>";
        }
        $message = $message . "</ul><br/>";

        $message = $message . " file(s) are successfully uploaded.";
    }
} else {
    $message = "Nessuna immagine caricata";
}

$foto_url_str = implode(",", $foto_url);
$sql = "INSERT INTO articoli (ART_AUTORE, ART_TITOLO, ART_TESTO, ART_DATA, ART_BRANCA, ART_FOTO) "
        . "VALUES ('$autore','$titolo','$testo','$data','$branca','$foto_url_str')";

if ($conn->query($sql) === TRUE) {
    $message = $message . "Articolo caricato con successo";
    $_SESSION['art_inserted'] = $message;
    header("location: /GEGU/index.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

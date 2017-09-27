<?php

session_start();
include("../connection/connect.php");
$username= filter_var($_POST["log_username"], FILTER_SANITIZE_STRING);
$password = $_POST["log_password"];                                             //da sistemare

$sql = "SELECT * FROM login WHERE LOG_USERNAME='" . $username . "' AND LOG_PASSWORD ='" . $password . "'";
$result = $conn->query($sql);  //per selezionare nel db l'utente e pw che abbiamo appena scritto nel log
$conn->close();

if ($result->num_rows != 0) {        //se c'è una persona con quel nome nel db allora loggati
    $row = $result->fetch_assoc();
    $_SESSION["logged"] = true;  // Nella variabile SESSION associo TRUE al valore logged
    $_SESSION["log_username"] = $username; // con questo associo il parametro username che mi è stato passato dal form alla variabile SESSION username
    $_SESSION["log_password"] = $password; // con questo associo il parametro username che mi è stato passato dal form alla variabile SESSION password
    $_SESSION["log_email"] = $row["LOG_EMAIL"];
    header("location: /GEGU/index.php");
    exit();
} else {
    echo "non ti sei registrato con successo"; // altrimenti esce scritta a video questa stringa di errore
}


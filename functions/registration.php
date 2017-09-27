<?php
session_start();
include '../connection/connect.php';

//AJAX VERIFICA


//sanitize inputs
$username = $conn->real_escape_string(filter_var($_POST['reg_username'], FILTER_SANITIZE_EMAIL));
$password = password_hash($_POST['reg_password'], PASSWORD_DEFAULT);
$email =  $conn->real_escape_string(filter_var($_POST['reg_email'], FILTER_SANITIZE_EMAIL));
$nome= $conn->real_escape_string(filter_var($_POST['reg_nome'], FILTER_SANITIZE_STRING));
$cognome=  $conn->real_escape_string(filter_var($_POST['reg_cognome'], FILTER_SANITIZE_STRING));
$ruolo = $conn->real_escape_string(filter_var($_POST['reg_ruolo'], FILTER_SANITIZE_STRING));
$branca = $conn->real_escape_string(filter_var($_POST['reg_branca'], FILTER_SANITIZE_STRING));

$sql = "INSERT INTO login (LOG_USERNAME, LOG_EMAIL, LOG_PASSWORD, LOG_RUOLO, LOG_BRANCA, LOG_NOME, LOG_COGNOME) VALUES (?,?,?,?,?,?,?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssssss",$username,$email,$password,$ruolo,$branca,$nome,$cognome);

$stmt->execute();

$stmt->close();
$conn->close();

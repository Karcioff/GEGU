<?php

session_start();
include '../connection/connect.php';

//sanitize inputs
$username = $conn->real_escape_string(filter_var($_POST['reg_username'], FILTER_SANITIZE_EMAIL));
$password = password_hash($_POST['reg_password'], PASSWORD_DEFAULT);
$email = $conn->real_escape_string(filter_var($_POST['reg_email'], FILTER_SANITIZE_EMAIL));
$nome = $conn->real_escape_string(filter_var($_POST['reg_nome'], FILTER_SANITIZE_STRING));
$cognome = $conn->real_escape_string(filter_var($_POST['reg_cognome'], FILTER_SANITIZE_STRING));
$ruolo = $conn->real_escape_string(filter_var($_POST['reg_ruolo'], FILTER_SANITIZE_STRING));
$branca = $conn->real_escape_string(filter_var($_POST['reg_branca'], FILTER_SANITIZE_STRING));

$sql = "INSERT INTO login (LOG_USERNAME, LOG_EMAIL, LOG_PASSWORD, LOG_RUOLO, LOG_BRANCA, LOG_NOME, LOG_COGNOME) VALUES (?,?,?,?,?,?,?)";
$stmt1 = $conn->prepare($sql);
$stmt1->bind_param("sssssss", $username, $email, $password, $ruolo, $branca, $nome, $cognome);

if ($stmt1->execute()) {

    $sql2 = "SELECT * FROM login WHERE LOG_USERNAME= ?";
    if ($stmt2 = $conn->prepare($sql2)) {

        /* bind parameters for markers */
        $stmt2->bind_param("s", $username);

        /* execute query */
        $stmt2->execute();

        $stmt2->bind_result($log_username, $log_email, $log_password, $log_ruolo, $log_branca, $log_nome, $log_cognome, $log_id);

        if ($stmt2->fetch()) {
            $_SESSION["logged"] = true;  // Nella variabile SESSION associo TRUE al valore logged
            $_SESSION["log_username"] = $username; // con questo associo il parametro username che mi è stato passato dal form alla variabile SESSION username
            $_SESSION["log_password"] = $log_password; // con questo associo il parametro username che mi è stato passato dal form alla variabile SESSION password
            $_SESSION["log_email"] = $log_email;
            $_SESSION["log_ruolo"] = $log_ruolo;
            $_SESSION["log_branca"] = $log_branca;
            $_SESSION["log_nome"] = $log_nome;
            $_SESSION["log_cognome"] = $log_cognome;
            $_SESSION["log_id"] = $log_id;
        }
        $stmt2->close();
    }
    $result = json_encode(array("result" => "success"));
    echo $result;
    return $result;
} else {
    $result = json_encode(array("result" => "error"));
    echo $result;
    return $result;
}

$stmt1->close();
$conn->close();

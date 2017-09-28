<?php

session_start();
include("../connection/connect.php");
$username = filter_var($_POST["log_username"], FILTER_SANITIZE_STRING);
$password = filter_var($_POST["log_password"], FILTER_SANITIZE_STRING);


$sql = "SELECT * FROM login WHERE LOG_USERNAME= ?";
if ($stmt = $conn->prepare($sql)) {

    /* bind parameters for markers */
    $stmt->bind_param("s", $username);

    /* execute query */
    $stmt->execute();

    $stmt->bind_result($log_username, $log_email, $log_password, $log_ruolo, $log_branca, $log_nome, $log_cognome, $log_id);

    if ($stmt->fetch()) {
        $result = json_encode(array("username" => "ok", "password" => "Password errata"));
        $hash = $log_password;
        if (!password_verify($password, $hash)) {
            $result = json_encode(array("username" => "ok", "password" => "Password errata"));
            $stmt->close();
            $conn->close();
            echo $result;
            return $result;
        }
        $result = json_encode(array("username" => "ok", "password" => "ok"));
        $_SESSION["logged"] = true;  // Nella variabile SESSION associo TRUE al valore logged
        $_SESSION["log_username"] = $username; // con questo associo il parametro username che mi è stato passato dal form alla variabile SESSION username
        $_SESSION["log_password"] = $log_password; // con questo associo il parametro username che mi è stato passato dal form alla variabile SESSION password
        $_SESSION["log_email"] = $log_email;
        $_SESSION["log_ruolo"] = $log_ruolo;
        $_SESSION["log_branca"] = $log_branca;
        $_SESSION["log_nome"] = $log_nome;
        $_SESSION["log_cognome"] = $log_cognome;
        $_SESSION["log_id"] = $log_id;

        $stmt->close();
        $conn->close();
        echo $result;
        return $result;
    } else {
        $result = json_encode(array("username" => "Username inesistente", "password" => "ok"));
        $stmt->close();
        $conn->close();
        echo $result;
        return $result;
    }
}


<?php

/*
 * file per controllo ajax se l'email è già in uso
 */
session_start();
error_reporting(0);
if (!isset($_GET['reg_email'])) {
    exit;
}
include '../../connection/connect.php';

$email = $conn->real_escape_string(filter_var($_GET['reg_email'], FILTER_SANITIZE_EMAIL));

$sql = "SELECT * FROM login WHERE log_email = ? ";

/* create a prepared statement */
if ($stmt = $conn->prepare($sql)) {

    /* bind parameters for markers */
    $stmt->bind_param("s", $email);

    /* execute query */
    $stmt->execute();

   $result = $stmt->get_result();
    /* close statement */
    $stmt->close();
}

if ($result->num_rows > 0) {
    echo 'false';
} else {
    echo 'true';
}
exit;


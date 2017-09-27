<?php

/*
 * file per controllo ajax se l'username è già in uso
 */
session_start();
error_reporting(0);
if (!isset($_GET['reg_username'])) {
    exit;
}
include '../../connection/connect.php';

$username = $conn->real_escape_string(filter_var($_GET['reg_username'], FILTER_SANITIZE_EMAIL));

$sql = "SELECT * FROM login WHERE log_username = ? ";

/* create a prepared statement */
if ($stmt = $conn->prepare("SELECT * FROM login WHERE log_username = ?")) {

    /* bind parameters for markers */
    $stmt->bind_param("s", $username);

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
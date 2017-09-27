<?php

/*
 * file per controllo ajax se l'username è già in uso
 */
session_start();
if (!isset($_POST['reg_username'])) {
    exit;
}
include '../connection/connect.php';

$username = $conn->real_escape_string(filter_var($_POST['reg_username'], FILTER_SANITIZE_EMAIL));

$sql = "SELECT * FROM login WHERE log_username= ? ";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username);
$result = $stmt->execute();


if ($result->num_row > 0) {
    echo 'false';
} else {
    echo 'true';
}
exit;
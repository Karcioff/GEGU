<?php
include '../../connection/connect.php';
//file chiamato in AJAX per modifica ed eliminazione di righe
$idf = $_POST['idf'];
$idr = $_POST['idr'];
if (isset($idf) && is_numeric($idf) && isset($idr) && is_numeric($idr)) {
    switch ($idf) {
//______________________GESTIONE ARTICOLI______________________________________________
        case 1:
            //modifica articolo
            $value = $_POST['value'];
            if ($value === '') {
                echo 'false no value';
                break;
            } else {
                $result = $conn->query("UPDATE articoli SET ART_TESTO = '$value' WHERE ART_ID = $idr");
                if ($result) {
                    echo 'true';
                } else {
                    echo "false error query = UPDATE articoli SET ART_TESTO = $value WHERE ART_ID = $idr";
                }
                break;
            }
        case 2:
            //elimina articolo
            $result = $conn->query("DELETE FROM articoli WHERE ART_ID = $idr");
                if ($result) {
                    echo 'true';
                } else {
                    echo 'false';
                }
            break;
//______________________GESTIONE UTENTI______________________________________________
		case 3:
            //elimina utente
            $result = $conn->query("DELETE FROM login WHERE LOG_ID = $idr");
                if ($result) {
                    echo 'true';
                } else {
                    echo 'false';
                }
            break;
			
            case 4:
            //modifica utente
		$username = $_POST['username'];
		$email = $_POST['email'];
		$admin = $_POST['admin'];
		$branca = $_POST['branca'];
                $result = $conn->query("UPDATE login SET LOG_USERNAME = '$username', LOG_EMAIL = '$email', LOG_RUOLO = '$admin', LOG_BRANCA = '$branca' WHERE LOG_ID = $idr");
                if ($result) {
                    echo 'true';
                } else {
                    echo 'false';
                }
            break;
        // ... nuovi case per nuove funzioni

        default :
            echo 'false';
            break;
    }
}
?>
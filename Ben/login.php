<?php

session_start();
include 'database.php';
header('Content-Type: application/json');
$_SESSION['valid'] = check_pass($_POST['log-group-name'], $_POST['log-password']);
if ($_SESSION['valid']) {
    echo json_encode(array("acknowledged" => true));
} else {
    echo json_encode(array("acknowledged" => false));
}
?>

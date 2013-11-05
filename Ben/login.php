<?php

session_start();
include 'database.php';
header('Content-Type: application/json');
//insert_group(); //args should be pulled from post data
if ($_SESSION['user'] != NULL) {
    echo json_encode(array("acknowledged" => true));
} else {
    echo json_encode(array("acknowledged" => false));
}
?>

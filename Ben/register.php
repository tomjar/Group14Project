<?php

include 'database.php';
include 'common.php';

header("Content-Type: application/json");
$_SESSION['user'] = insert_group($_POST['group-name'], $_POST['group-description'], $_POST['group-email'], $_POST['group-password']);
echo json_encode(array("registered" => true));
?>

<?php

include 'database.php';
include 'common.php';

header("Content-Type: application/json");
$_SESSION['user_id'] = insert_group($_POST['reg-group-name'], $_POST['reg-group-description'], $_POST['reg-group-email'], $_POST['reg-password']);
error_log(($_POST['reg-group-name']." ". $_POST['reg-group-description']." ". $_POST['reg-group-email']." ". $_POST['reg-password']));
if ($_SESSION['user_id'] != NULL && $_SESSION['user_id'] > 0) {
    $_SESSION['valid'] = true;
    echo json_encode(array("acknowledged" => true));
} else {
    $_SESSION['valid'] = false;
    echo json_encode(array("acknowledged" => false));
}
?>

<?php

include 'database.php';
include 'common.php';

header("Content-Type: application/json");
//echo $_POST['event-name'];
$insert = insert_event($_POST['e-group-id'],$_POST['event-name'], $_POST['event-details'], $_POST['event-date']);

echo "success";
echo json_encode(array("acknowledged" => true));

?>


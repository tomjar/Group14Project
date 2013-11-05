<?php

$dbstr = "";

//tremendously hacky temporary solution to no database
function insert_group($name = "", $description = "", $email = "", $password = "") {
//    $dbconn = pg_connect($dbstr);
//    $result = pg_prepare($dbconn, 'insert_group', "");
//    $salt = mcrypt_create_iv();
//    $hash = crypt($password, $salt);
//    $result = pg_exec($dbconn, "insert_group", array());
//    //get affected rows
//    //then insert other stuff
//    $dbconn = pg_close($dbconn);
    $_SESSION['user'] = "ben";
}

?>

<?php

function insert_group($name, $description, $email, $password) {
    $dbconn = pg_connect("host=dbhost-pgsql.cs.missouri.edu dbname=cs3380f13grp14 user=cs3380f13grp14 password=IuaciWb3");
    $result = pg_prepare($dbconn, 'insert_g', "INSERT INTO project.groups (name,description,date_joined) VALUES ($1,$2,$3) RETURNING group_id");
    $date = new DateTime('NOW');
    $date = $date->format('c');
    $result = pg_execute($dbconn, 'insert_g', array($name, $description, $date));
    $userid = pg_fetch_result($result, 0, 0);
    $result = pg_prepare($dbconn, 'insert_s', "INSERT INTO project.salts (Salt,Group_ID) VALUES ($1,$2)");
    $salt = md5(uniqid('', true)); //not the best but more than enough for our purposes even if this were a business
    $result = pg_execute($dbconn, 'insert_s', array($salt, $userid));
    $hash = crypt($password, $salt);
    $result = pg_prepare($dbconn, 'insert_p', "INSERT INTO project.passwords (Password_Hash,Group_ID) VALUES ($1,$2)");
    $result = pg_execute($dbconn, 'insert_p', array($hash, $userid));
    $dbconn = pg_close($dbconn);
    return $userid;
}

function check_pass($name, $password) {
    $dbconn = pg_connect("host=dbhost-pgsql.cs.missouri.edu dbname=cs3380f13grp14 user=cs3380f13grp14 password=IuaciWb3");
}

?>

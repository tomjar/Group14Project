<?php

//begin session
session_start();

//regardless of connection requested, if not https then redirect it to https
if (!isset($_SERVER['HTTPS']) || $_SERVER['HTTPS'] == "") {
    $redirect = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    header("Location: $redirect");
}
//keeping track of how many pages visited by user, not like its hard
if (!isset($_SESSION['count'])) {
    $_SESSION['count'] = 0;
} else {
    $_SESSION['count']++;
}
?>

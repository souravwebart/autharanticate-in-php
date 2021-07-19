<?php
session_start();
$dbhost = 'localhost';
$dbname = '';
$dbusername = 'root';
$dbpassword = '';
$dbc = mysqli_connect($dbhost, $dbusername, $dbpassword, $dbname);
?>
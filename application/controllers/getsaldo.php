<?php
// Koneksi ke database
$db['host'] = "localhost"; //host
$db['user'] = "root"; //username database
$db['pass'] = ""; //password database
$db['name'] = "db_anggaran"; //nama database
$config = mysqli_connect($db['host'], $db['user'], $db['pass'], $db['name']); 
?>
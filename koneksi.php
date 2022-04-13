<?php
$host     = 'localhost';
$user     = 'root';
$password = '';
$db       = 'rs_kdcw';
$link = mysqli_connect($host, $user, $password, $db);

if (!$link) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
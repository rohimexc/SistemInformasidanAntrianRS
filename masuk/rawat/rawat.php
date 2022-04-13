<?php
require '../../koneksi.php';

  session_start();
  if($_SESSION['login'] != true){
    header('location:../../index.php');
  }
?>

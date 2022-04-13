<?php
require '../../koneksi.php';

  $id = $_GET["no_reg"];

  $hapus = mysqli_query($link, "DELETE FROM rawat WHERE no_reg=$id");

  if($hapus){
    echo "<script> alert('Berhasil menghapus data !'); document.location.href='tampil.php'; </script>";
  }else{
    "<script> alert('Gagal nebghapus data !'); document.location.href='tampil.php'; </script>";
  }
?>

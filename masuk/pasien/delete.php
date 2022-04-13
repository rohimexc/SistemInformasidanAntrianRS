<?php
require '../../koneksi.php';

  $id = $_GET["No_RM"];

  $hapus = mysqli_query($link, "DELETE FROM data_pasien WHERE No_RM='".$id."'");

  if($hapus){
    echo "<script> alert('Berhasil menghapus data !'); document.location.href='tampilpasien.php'; </script>";
  } else{
    echo "<script> alert('Gagal menghapus data !'); document.location.href='tampilpasien.php'; </script>";
  }
?>

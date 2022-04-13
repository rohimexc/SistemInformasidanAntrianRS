<?php
require '../../koneksi.php';

  $id = $_GET["kode_ruangan"];

  $hapus = mysqli_query($link, "DELETE FROM ruangan WHERE kode_ruangan='".$id."'");

  if($hapus){
    echo "<script> alert('Berhasil menghapus data !'); document.location.href='tampil.php'; </script>";
  }else{
    "<script> alert('Gagal nebghapus data !'); document.location.href='tampil.php'; </script>";
  }
?>

<?php
require '../../koneksi.php';

  $id = $_GET["kode_dokter"];

  $hapus = mysqli_query($link, "DELETE FROM data_dokter WHERE kode_dokter=$id");

  if($hapus){
    echo "<script> alert('Berhasil menghapus data !'); document.location.href='tampil.php'; </script>";
  }else{
    "<script> alert('Gagal nebghapus data !'); document.location.href='tampil.php'; </script>";
  }
?>

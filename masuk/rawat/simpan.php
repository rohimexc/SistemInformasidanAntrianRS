<?php
require '../../koneksi.php';

  // Menyimpan data ke dalam variabel
  if (isset($_POST['kirim'])) {
    $no_reg         = $_POST['no_reg'];
    $no_rm          = $_POST['pasien'];
    $kode_dokter    = $_POST['dokter'];
    $kode_ruangan   = $_POST['ruangan'];
    $penyakit       = $_POST['penyakit'];
    $tgl_rawat      = $_POST['tgl_rawat'];
    $tgl_keluar     = $_POST['tgl_keluar'];

    $q = mysqli_query($link, "INSERT INTO rawat VALUES('". $no_reg ."', '". $no_rm ."', '". $kode_dokter ."', '". $kode_ruangan ."','". $penyakit ."', '". $tgl_rawat ."', '". $tgl_keluar ."')") or die(mysqli_error($link));


    if ($q) {
      echo '<script> alert("Berhasil menginput data"); window.location.href = "tampil.php";</script>';

    } else {
      echo '<script> alert("Data pasien telah terdaftar"); </script>';
  } else {
    echo '<script> alert("Data pasien telah terdaftar"); </script>';
  }
?>

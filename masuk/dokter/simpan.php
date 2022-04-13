<?php
require '../../koneksi.php';

  // Menyimpan data ke dalam variabel
  if (isset($_POST['kirim'])) {
    $kode_dokter = $_POST['kode_dokter'];
    $nama_dokter = $_POST['nama_dokter'];
    $spesialis   = $_POST['spesialis'];
    $alamat      = $_POST['alamat'];
    $no_hp       = $_POST['no_hp'];
    $umur        = $_POST['umur'];
    $alumni      = $_POST['alumni'];

    $q = mysqli_query($link, "INSERT INTO data_dokter VALUES('". $kode_dokter ."', '". $nama_dokter ."', '". $spesialis ."', '". $alamat ."', '". $no_hp ."', '". $umur ."', '". $alumni ."')") or die(mysqli_error());

    if ($q) {
      // header('location:input_dokter.php');
      echo '<script> alert("Berhasil menginput data"); window.location.href = "tampil.php";</script>';

    } else {
      echo '<script> alert("FUCK YOU"); </script>';
    }
  } else {
    echo "FUCK OFF";
  }
?>

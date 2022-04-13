<?php
  require '../../koneksi.php';

  // Menyimpan data ke dalam variabel
  if (isset($_POST['kirim'])) {
    $kode_ruangan        = $_POST['kode_ruangan'];
    $nama_ruangan        = $_POST['nama_ruangan'];

    $q = mysqli_query($link, "INSERT INTO ruangan VALUES('". $kode_ruangan ."', '". $nama_ruangan ."', 'kosong')") or die(mysqli_error());

    if ($q) {
      echo '<script> alert("Berhasil menginput data"); window.location.href = "tampil.php";</script>';

    } else {
      echo '<script> alert("FUCK YOU"); </script>';
    }
  } else {
    echo "FUCK OFF";
  }
?>

<?php
require '../../koneksi.php';

  // Menyimpan data ke dalam variabel
  if (isset($_POST['kirim'])) {
    $nama           = $_POST['nama'];
    $umur           = $_POST['umur'];
    $alamat         = $_POST['alamat'];
    $gol_darah      = $_POST['gol_darah'];
    $kode_dokter    = $_POST['dokter'];
    $kode_ruangan   = $_POST['ruangan'];
    $penyakit       = $_POST['penyakit'];
    $tgl_keluar     = $_POST['tgl_keluar'];

    $q = mysqli_query($link, "INSERT INTO data_pasien VALUES(concat(curdate(),rand()), '". $nama ."', '". $umur ."', '". $alamat ."', '". $gol_darah ."', now(), '". $kode_dokter ."', '". $kode_ruangan ."', '". $penyakit ."', '". $tgl_keluar ."') ") or die(mysqli_error($link));

    $qq = mysqli_query($link, "Update ruangan set status='terisi' where kode_ruangan='$kode_ruangan'");

    if ($q) {
      echo '<script> alert("Berhasil menginput data"); window.location.href = "tampilpasien.php";</script>';

    } else {
      echo '<script> alert("FUCK YOU"); </script>';
    }
  } else {
    echo "FUCK OFF";
  }
?>

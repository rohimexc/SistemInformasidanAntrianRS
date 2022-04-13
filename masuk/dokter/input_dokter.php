<?php
require '../../koneksi.php';
  session_start();
  if($_SESSION['login'] != true){
    header('location:../../index.php');
  }
?>

<html>
  <head>
    <title>RSU UNDATA</title> <link rel="icon" href="../../aa.png">
    <link href="dokter.css" rel="stylesheet">
  </head>

  <body>
    <div class="wrap">
      <div class="header">
        <h1>RSU UNDATA</h1>
        <p>Admin <?php echo $_COOKIE['ambil'];?></p>
        <a onclick="logout()">Logout</a>
      </div>

      <div class="headerkecil">
        <span class="menubawah">
          <a href="../../admin.php" class="aa">Profil Rumah Sakit</a>
          <a href="../panggilan-antrian/index.php" class="bb">Panggil Antrian</a>
          <a href="../ruangan/tampil.php" class="cc">Data Ruangan</a>
          <a href="tampil.php" class="dd">Data Dokter</a>
          <a href="../pasien/tampilpasien.php" class="ee">Data Pasien</a>
        </span>
      </div><br>
      <script type="text/javascript">
        function logout(){
        var result = confirm("Yakin");

        if(result){
          window.location.href="../../logout.php";
        }
          else return false;
        }
      </script>
      <div class="content">
        <h2>Input Data Dokter</h2><br>
        <span class="contentkecil">
          <form method="POST" action="simpan.php">
            <p>
              Masukkan kode dokter<input type="text" name="kode_dokter" class="inputan1" required>
            </p><br>
            <p>
              Masukkan nama dokter<input type="text" name="nama_dokter" class="inputan2" required>
            </p><br>
            <p>
              Dokter spesialis<input type="text" name="spesialis" class="inputan3" required>
            </p><br>
            <p>
              Alamat dokter<input type="text" name="alamat" class="inputan4" required>
            </p><br>
            <p>
              Nomor HP<input type="text" name="no_hp" class="inputan5" required>
            </p><br>
            <p>
              Umur<input type="number" name="umur" class="inputan6" required>
            </p><br>
            <p>
              Alumni/Lulusan<input type="text" name="alumni" class="inputan8" required>
            </p><br>

            <div id="tombol">
              <input type="submit" name="kirim" value="Simpan" class="tombol">
            </div>
          </form>
        </span>
      </div>

      <div class="clear"></div><br>
      <div class="titik" style="border-bottom: 1px dashed #262626"></div>
      <div class="footer">
        <center><p>ABDUL ROHIM G20118043</p></center>
      </div>
    </div>
  </body>
</html>

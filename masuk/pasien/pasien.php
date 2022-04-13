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
    <link href="pasien.css" rel="stylesheet">
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
          <a href="../rawat/laporan.php" class="bb">Laporan Rawat</a>
          <a href="../ruangan/tampil.php" class="cc">Data Ruangan</a>
          <a href="../dokter/tampil.php" class="dd">Data Dokter</a>
          <a href="tampilpasien.php" class="ee">Data Pasien</a>
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
        <h2>Input Data Pasien</h2><br>
        <span class="contentkecil">
          <form method="POST" action="simpan.php">
            <p>
              Nama Pasien<input type="text" name="nama" class="inputan2" required>
            </p><br>
            <p>
              Umur<input type="number" name="umur" class="inputan3" required>
            </p><br>
            <p>
              Alamat<input type="text" name="alamat" class="inputan4" required>
            </p><br>
            <p>
              Gol Darah
              <select name="gol_darah" class="inputan5">
                  <option value="A">A</option>
                  <option value="B">B</option>
                  <option value="AB">AB</option>
                  <option value="O">O</option>
              </select>
            </p><br>
            Nama Dokter
            <select name="dokter" class="inputan6">
              <?php $query = "SELECT * from data_dokter";
                $hasil = mysqli_query($link,$query);
                while($data=mysqli_fetch_array($hasil)){
                  echo "<option value=$data[kode_dokter]>$data[nama_dokter]</option>";
              } ?>
            </select>
          </p><br>
          <p>
            Kode Ruangan
            <select name="ruangan" class="inputan7">
              <?php $query = "SELECT * from ruangan where status='Kosong'";
                $hasil = mysqli_query($link,$query);
                while($data=mysqli_fetch_array($hasil)){
                  echo "<option value=$data[kode_ruangan]>$data[nama_ruangan]</option>";
              } ?>
            </select>
          </p><br>
          <p>
            Penyakit<input type="text" name="penyakit" class="inputan8" required>
          </p><br>
          <p>
            Tanggal Keluar<input type="date" name="tgl_keluar" class="inputan9">
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
  </body>
</html>

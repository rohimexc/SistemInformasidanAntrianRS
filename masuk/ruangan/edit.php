<?php
require '../../koneksi.php';
  session_start();
  if($_SESSION['login'] != true){
    header('location:../../index.php');
  }

  $id = $_GET["kode_ruangan"];

  $tampil = mysqli_query($link, "SELECT *from ruangan where kode_ruangan ='".$id."'");

  $result = mysqli_fetch_assoc($tampil);
    if (isset($_POST['kirim'])) {
      $kode_ruangan  = $_POST['kode_ruangan'];
      $nama_ruangan  = $_POST['nama_ruangan'];
      $status        = $_POST['status'];
      $query = "UPDATE ruangan SET nama_ruangan='$nama_ruangan', status='$status' WHERE kode_ruangan = '".$id."'";

    if(mysqli_query($link,$query)){
      echo "<script> alert('Data berhasil di ubah !!'); document.location.href='tampil.php'; </script>";
    }  }
?>

<html>
  <head>
    <title>RSU UNDATA</title> <link rel="icon" href="../../aa.png">
    <link href="ruangan.css" rel="stylesheet">
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
          <a href="tampil.php" class="cc">Data Ruangan</a>
          <a href="../dokter/tampil.php" class="dd">Data Dokter</a>
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
        <h2>Input Data Ruangan</h2><br>
        <span class="contentkecil">
          <form method="POST" action="">
            <p>
              Masukkan kode ruangan<input type="text" name="kode_ruangan" class="inputan1" value="<?php echo $result["kode_ruangan"]; ?>" required readonly>
            </p><br>
            <p>
              Masukkan nama ruangan<input type="text" name="nama_ruangan" class="inputan2" value="<?php echo $result["nama_ruangan"]; ?>" required>
            </p><br>
            <p>
              Status
              <select name="status" class="inputan3" value="<?php echo $result["status"]; ?>" readonly>
                  <option value="terisi" readonly>Terisi</option>
                  <option value="kosong" readonly>Kosong</option>
              </select>
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

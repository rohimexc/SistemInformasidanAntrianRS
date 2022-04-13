<?php
require '../../koneksi.php';
  session_start();
  if($_SESSION['login'] != true){
    header('location:../../login.php');
  }

  $id = $_GET["No_RM"];

  $tampil = mysqli_query($link, "SELECT *from data_pasien where No_RM ='".$id."' ");

  $result = mysqli_fetch_assoc($tampil);
  if (isset($_POST['kirim'])) {
    $nama           = $_POST['nama'];
    $umur           = $_POST['umur'];
    $alamat         = $_POST['alamat'];
    $gol_darah      = $_POST['gol_darah'];
    $kode_dokter    = $_POST['kode_dokter'];
    $kode_ruangan   = $_POST['kode_ruangan'];
    $penyakit       = $_POST['penyakit'];
    $tgl_keluar     = $_POST['tgl_keluar'];
    $query = "UPDATE data_pasien SET nama='$nama', umur='$umur', alamat='$alamat', gol_darah='$gol_darah', kode_dokter='$kode_dokter', kode_ruangan='$kode_ruangan', penyakit='$penyakit', tgl_keluar='$tgl_keluar' WHERE No_RM = '".$id."'";

    if ($tgl_keluar != '0000-00-00'){
      $qq = mysqli_query($link, "UPDATE ruangan set status='kosong' where kode_ruangan='$kode_ruangan'");
    }

    if(mysqli_query($link,$query)){
      echo "<script> alert('Data berhasil di ubah !!'); document.location.href='tampilpasien.php'; </script>";
    }  }
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
        <h2>Data Pasien</h2><br>
        <span class="contentkecil">
          <form method="POST" action="">
            <p>
              Masukkan No RM<input type="text" name="No_RM" class="inputan1" value="<?php echo $result["No_RM"]; ?>" required readonly>
            </p><br>
            <p>
              Nama Pasien<input type="text" name="nama" class="inputan2" value="<?php echo $result["nama"]; ?>" required>
            </p><br>
            <p>
              Umur<input type="text" name="umur" class="inputan3" value="<?php echo $result["umur"]; ?>" required>
            </p><br>
            <p>
              Alamat<input type="text" name="alamat" class="inputan4" value="<?php echo $result["alamat"]; ?>" required>
            </p><br>
              <p>
                Gol Darah
                <select name="gol_darah" class="inputan5" value="<?php echo $result["gol_darah"]; ?>" required>
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="AB">AB</option>
                    <option value="O">O</option>
                </select>
              </p><br>
              Nama Dokter
              <select name="kode_dokter" class="inputan6">
                <?php $query = "SELECT * from data_dokter";
                  $hasil = mysqli_query($link,$query);
                  while($data=mysqli_fetch_array($hasil)){
                    echo "<option value=$data[kode_dokter]>$data[nama_dokter]</option>";
                } ?>
              </select>
            </p><br>
              Kode ruangan <input type="text" name="kode_ruangan" class="inputan7" value="<?php echo $result['kode_ruangan']; ?>">
            <p><br>
              Penyakit<input type="text" name="penyakit" class="inputan8" value="<?php echo $result["penyakit"]; ?>" required>
            </p><br>
            <p>
              Tanggal Keluar<input type="date" name="tgl_keluar" class="inputan9" value="<?php echo $result["tgl_keluar"]; ?>">
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

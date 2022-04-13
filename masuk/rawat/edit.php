<?php
require '../../koneksi.php';
  session_start();
  if($_SESSION['login'] != true){
    header('location:../../index.php');
  }
  $id = $_GET["no_reg"];

  $tampil = mysqli_query($link, "SELECT *from rawat where no_reg = $id");

  $result = mysqli_fetch_assoc($tampil);
    if (isset($_POST['kirim'])) {
      $no_reg         = $_POST['no_reg'];
      $no_rm          = $_POST['no_rm'];
      $kode_dokter    = $_POST['kode_dokter'];
      $kode_ruangan   = $_POST['kode_ruangan'];
      $penyakit       = $_POST['penyakit'];
      $tgl_rawat      = $_POST['tgl_rawat'];
      $tgl_keluar     = $_POST['tgl_keluar'];
      $query = "UPDATE rawat SET tgl_keluar='$tgl_keluar', kode_dokter='$kode_dokter', kode_ruangan='$kode_ruangan', penyakit='$penyakit' WHERE no_reg = $id";

      if(strtotime($tgl_keluar)!='0000-00-00'){
        $qq = mysqli_query($link, "Update ruangan set status='kosong' where kode_ruangan='$kode_ruangan'");
      }

      if(mysqli_query($link,$query)){
        echo "<script> alert('Data berhasil di ubah !!'); document.location.href='tampil.php'; </script>";
      }  }
  ?>
  <html>
    <head>
      <title>RSU UNDATA</title>
      <link href="rawat.css" rel="stylesheet">
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
              <a class="aa" href="tampil.php">Laporan Rawat</a>
      				<a class="bb" href="../ruangan/tampil.php">Data Ruangan</a>
      				<a class="cc" href="../dokter/tampil.php">Data Dokter</a>
              <a class="dd" href="../pasien/tampilpasien.php">Data Pasien</a>
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
          <h2>Input Data Rawat Pasien</h2><br>
          <span class="contentkecil">
            <form method="POST" action="">
              <p>
                Masukkan No Reg Pasien<input type="text" name="no_reg" class="inputan1" value="<?php echo $result["no_reg"]; ?>" required readonly>
              </p><br>
              <p>
                Masukkan No RM Pasien<input type="text" name="no_rm" class="inputan2" value="<?php echo $result["no_rm"]; ?>" required readonly>
              </p><br>
              <p>
                Kode Dokter<input type="text" name="kode_dokter" class="inputan3" value="<?php echo $result["kode_dokter"]; ?>" required>
              </p><br>
              <p>
                Kode Ruangan<input type="text" name="kode_ruangan" class="inputan4" value="<?php echo $result["kode_ruangan"]; ?>" required>
              </p><br>
              <p>
                Penyakit<input type="text" name="penyakit" class="inputan5" value="<?php echo $result["penyakit"]; ?>" required>
              </p><br>
              <p>
                Tanggal Rawat<input type="date" name="tgl_rawat" class="inputan6" value="<?php echo $result["tgl_rawat"]; ?>" required>
              </p><br>
              <p>
                Tanggal Keluar<input type="date" name="tgl_keluar" class="inputan7" value="<?php echo $result["tgl_keluar"]; ?>">
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

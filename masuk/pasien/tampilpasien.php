<?php
error_reporting(0);
require '../../koneksi.php';
session_start();
if ($_SESSION['login'] != true) {
  header('location:../../login.php');
}
?>
<html>

<head>
  <title>RSU UNDATA</title>
  <link rel="icon" href="../../aa.png">
  <link rel="stylesheet" href="tampil.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  <script type="text/javascript" src="js/jquery.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script>
</head>

<body>

  <div class="wrap">
    <div class="header">
      <h1>RSU UNDATA</h1>
      <p>Admin <?php echo $_COOKIE['ambil']; ?></p>
      <a onclick="logout()">Logout</a>
    </div>
    <div class="headerkecil">
      <span class="menubawah">
        <a href="../../admin.php" class="aa">Profil Rumah Sakit</a>
        <a href="../panggilan-antrian/index.php" class="bb">Panggil Antrian</a>
        <a href="../ruangan/tampil.php" class="cc">Data Ruangan</a>
        <a href="../dokter/tampil.php" class="dd">Data Dokter</a>
        <a href="tampilpasien.php" class="ee">Data Pasien</a>
      </span>
    </div><br>
    <script type="text/javascript">
      function logout() {
        var result = confirm("Yakin");

        if (result) {
          window.location.href = "../../logout.php";
        } else return false;
      }
    </script>
    <div class="link">
      <a href="pasien.php">tambah data</a>
      <form method="POST" action="" class="cari">
        <input type="text" name="search" class="aaa" placeholder="cari data" />
        <input type="submit" name="cari" value="cari" class="bbb" />
        <?php
        $query = $_POST['search'];
        ?>
      </form>
    </div>
    <div class="content">
      <h2>Data Pasien</h2><br>
      <span class="contentkecil">
        <table class="table table-bordered table-striped table-hover" cellspacing='0'>
          <thead>
            <tr>
              <th>No RM</th>
              <th>Nama Pasien</th>
              <th>Umur</th>
              <th>Alamat</th>
              <th>Golongan darah</th>
              <th>Tanggal daftar</th>
              <th>Nama Dokter</th>
              <th>Kode ruangan</th>
              <th>Penyakit</th>
              <th>Tgl Keluar</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $batas = 10;
            $queryjum = mysqli_query($link, "SELECT data_pasien.No_RM, data_pasien.nama, data_pasien.umur, data_pasien.alamat, data_pasien.gol_darah, data_pasien.tgl_daftar, data_dokter.nama_dokter, data_pasien.kode_ruangan, data_pasien.penyakit, data_pasien.tgl_keluar from data_pasien inner join data_dokter on data_pasien.kode_dokter = data_dokter.kode_dokter");
            $jum = mysqli_num_rows($queryjum);
            $halaman = ceil($jum / $batas);
            $page = (isset($_GET['page'])) ? $_GET['page'] : 1;
            $posisi = ($page - 1) * $batas;
            if ($query != '') {
              $sah = mysqli_query($link, "SELECT data_pasien.No_RM, data_pasien.nama, data_pasien.umur, data_pasien.alamat, data_pasien.gol_darah, data_pasien.tgl_daftar, data_dokter.nama_dokter, data_pasien.kode_ruangan, data_pasien.penyakit, data_pasien.tgl_keluar from data_pasien inner join data_dokter on data_pasien.kode_dokter = data_dokter.kode_dokter WHERE data_pasien.No_RM LIKE '%$query%' or data_pasien.nama LIKE '%$query%' ");
            } else {
              $sah = mysqli_query($link, "SELECT data_pasien.No_RM, data_pasien.nama, data_pasien.umur, data_pasien.alamat, data_pasien.gol_darah, data_pasien.tgl_daftar, data_dokter.nama_dokter, data_pasien.kode_ruangan, data_pasien.penyakit, data_pasien.tgl_keluar from data_pasien inner join data_dokter on data_pasien.kode_dokter = data_dokter.kode_dokter limit $posisi,$batas");
            }
            while ($row = mysqli_fetch_array($sah)) {
            ?>
              <tr>
                <td><?php echo $row['No_RM'] ?></td>
                <td><?php echo $row['nama'] ?></td>
                <td><?php echo $row['umur'] ?></td>
                <td><?php echo $row['alamat'] ?></td>
                <td><?php echo $row['gol_darah'] ?></td>
                <td><?php echo $row['tgl_daftar'] ?></td>
                <td><?php echo $row['nama_dokter'] ?></td>
                <td><?php echo $row['kode_ruangan'] ?></td>
                <td><?php echo $row['penyakit'] ?></td>
                <td><?php echo $row['tgl_keluar'] ?></td>
                <td><a href="edit.php?No_RM=<?php echo $row['No_RM'] ?>" onclick="return confirm('Yakin?');" class="action">edit</a><br>
                  <a href="delete.php?No_RM=<?php echo $row['No_RM'] ?>" onclick="return confirm('Yakin?');" class="action">delete</a>
                </td>
              </tr>

            <?php } ?>
          </tbody>
    </div>
    </table>
    <?php
    for ($x = 1; $x <= $halaman; $x++) {
    ?>
      <a href="?page=<?php echo $x; ?>" class="page">
        <?php echo $x; ?>
      </a>
    <?php } ?>

  </div>
  <div class="clear"></div><br>
  <div class="titik" style="border-bottom: 1px dashed #262626"></div>
  <div class="footer">
    <center>
      <p>ABDUL ROHIM G20118043</p>
    </center>
  </div>

</body>

</html>
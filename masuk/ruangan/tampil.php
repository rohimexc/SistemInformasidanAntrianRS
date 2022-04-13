<?php
error_reporting(0);
require '../../koneksi.php';
session_start();
if ($_SESSION['login'] != true) {
  header('location:../../index.php');
}

?>
<html>

<head>
  <title>RSU UNDATA</title>
  <link rel="icon" href="../../aa.png">
  <link rel="stylesheet" href="tampil.css">
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
        <a href="tampil.php" class="cc">Data Ruangan</a>
        <a href="../dokter/tampil.php" class="dd">Data Dokter</a>
        <a href="../pasien/tampilpasien.php" class="ee">Data Pasien</a>
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
      <a href="ruangan.php">tambah data</a>
      <form method="POST" action="" class="cari">
        <input type="text" name="search" class="aaa" placeholder="cari data" />
        <input type="submit" name="cari" value="cari" class="bbb" />
        <?php
        $query = $_POST['search'];
        ?>
      </form>
    </div>
    <div class="content">
      <h2>Data Ruangan</h2><br>
      <span class="contentkecil">
        <br><br><br>
        <table class="table table-bordered table-striped table-hover" cellspacing='0'>
          <thead>
            <tr>
              <th>Kode Ruangan</th>
              <th>Nama Ruangan</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $batas = 8;
            $queryjum = mysqli_query($link, "SELECT * FROM `ruangan` ");
            $jum = mysqli_num_rows($queryjum);
            $halaman = ceil($jum / $batas);
            $page = (isset($_GET['page'])) ? $_GET['page'] : 1;
            $posisi = ($page - 1) * $batas;
            if ($query != '') {
              $sah = mysqli_query($link, "SELECT *FROM ruangan where kode_ruangan like '%" . $query . "%' or nama_ruangan like '%" . $query . "%' ");
            } else {
              $sah = mysqli_query($link, "SELECT * FROM `ruangan` limit $posisi,$batas");
            }
            while ($row = mysqli_fetch_array($sah)) {
            ?>
              <tr>
                <td><?php echo $row['kode_ruangan'] ?></td>
                <td><?php echo $row['nama_ruangan'] ?></td>
                <td><?php echo $row['status'] ?></td>
                <td><a href="edit.php?kode_ruangan=<?php echo $row['kode_ruangan'] ?>" onclick="return confirm('Yakin?');" class="action">edit</a><br>
                  <a href="delete.php?kode_ruangan=<?php echo $row['kode_ruangan'] ?>" onclick="return confirm('Yakin?');" class="action">delete</a>
                </td>
              </tr>
            <?php } ?>
          </tbody>
    </div>
    </table>
    <?php

    for ($x = 1; $x <= $halaman; $x++) {
      if ($page == $x)
        echo "<a class='pages' disable> $x </a>";
      else
        echo "<a href='?page=$x' class='page'> $x </a>";
    }
    ?>
    <?php if ($page > 1) { ?>

      <a href="?page=<?php echo $page - 1; ?>" aria-label="Sebelumnya">
        <span aria-hidden="true" class="page1">Sebelumnya</span>
      </a>

    <?php } else { ?>
      <div class="disabled">
        <span aria-hidden="true" class="page1">Sebelumnya</span>
      </div>
    <?php } ?>
    <?php if ($page < $halaman) { ?>

      <a href="?page=<?php echo $page + 1; ?>" aria-label="Selanjutnya">
        <span aria-hidden="true" class="page2">Selanjutnya</span>
      </a>

    <?php } else { ?>
      <div class="disabled">
        <span aria-hidden="true" class="page2">Selanjutnya</span>
      </div>
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
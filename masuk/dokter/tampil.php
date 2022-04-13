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
        <a href="tampil.php" class="dd">Data Dokter</a>
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
      <a href="input_dokter.php">tambah data</a>
      <form method="POST" action="" class="cari">
        <input type="text" name="search" class="aaa" placeholder="cari data" />
        <input type="submit" name="cari" value="cari" class="bbb" />
        <?php
        $query = $_POST['search'];
        ?>
      </form>
    </div>
    <div class="content">
      <h2>Data Dokter</h2><br>
      <span class="contentkecil">
        <br><br><br>
        <table class="table table-bordered table-striped table-hover" cellspacing='0'>
          <thead>
            <tr>
              <th>Kode Dokter</th>
              <th>Nama Dokter</th>
              <th>Spesialis</th>
              <th>Alamat</th>
              <th>No Hp</th>
              <th>Umur</th>
              <th>Alumni</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $batas = 8;
            $queryjum = mysqli_query($link, "SELECT *from data_dokter where kode_dokter");
            $jum = mysqli_num_rows($queryjum);
            $halaman = ceil($jum / $batas);
            $page = (isset($_GET['page'])) ? $_GET['page'] : 1;
            $posisi = ($page - 1) * $batas;
            if ($query != '') {
              $sah = mysqli_query($link, "SELECT *FROM data_dokter where kode_dokter like '%" . $query . "%' or nama_dokter like '%" . $query . "%' or spesialis like '%" . $query . "%' ");
            } else {
              $sah = mysqli_query($link, 'SELECT *from data_dokter where kode_dokter');
            }
            while ($row = mysqli_fetch_array($sah)) {
            ?>
              <tr>
                <td><?php echo $row['kode_dokter'] ?></td>
                <td><?php echo $row['nama_dokter'] ?></td>
                <td><?php echo $row['spesialis'] ?></td>
                <td><?php echo $row['alamat'] ?></td>
                <td><?php echo $row['no_hp'] ?></td>
                <td><?php echo $row['umur'] ?></td>
                <td><?php echo $row['alumni'] ?></td>
                <td><a href="edit.php?kode_dokter=<?php echo $row['kode_dokter'] ?>" onclick="return confirm('Yakin?');" class="action">edit</a><br>
                  <a href="delete.php?kode_dokter=<?php echo $row['kode_dokter'] ?>" onclick="return confirm('Yakin?');" class="action">delete</a>
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
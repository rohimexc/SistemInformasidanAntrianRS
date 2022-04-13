<?php
error_reporting(0);
require 'koneksi.php';
  session_start();
  if($_SESSION['login'] != true){
    header('location: index.php');
  }

?>
<html>
<head>
  <title>RSU UNDATA</title>
  <link rel="stylesheet" href="tampil.css">
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
        <a class="aa" href="../panggilan-antrian/index.php">Panggil Antrian</a>
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
  <div class="link">
    <a href="rawat.php">tambah data</a>
      <form method="POST" action="" class="cari">
        <input type="text" name="search" class="aaa" placeholder="cari data"/>
        <input type="submit"  name="cari" value="cari" class="bbb"/>
        <?php
          $query = $_POST['search'];
        ?>
      </form>
  </div>
  <div class="content">
    <h2>Laporan Rawat</h2><br>
    <span class="contentkecil">
      <br><br><br>
  <table cellspacing='0'>
      <thead>
        <tr>
          <th>No RM</th>
          <th>Nama Pasien</th>
          <th>No Reg Pasien</th>
          <th>Nama Dokter</th>
          <th>Kode ruangan</th>
          <th>Penyakit</th>
          <th>Tgl Rawat</th>
          <th>Tgl Keluar</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
        if ($query != ''){
          //$sah = mysqli_query($link, "SELECT *FROM rawat where no_reg like '%".$query."%' or nama like '%".$query."%' or No_RM like '%".$query."%' ");
          $sah = mysqli_query($link, "SELECT data_pasien.No_RM, data_pasien.nama, rawat.no_reg, rawat.no_rm, data_dokter.nama_dokter, rawat.kode_ruangan, rawat.penyakit, rawat.tgl_rawat, rawat.tgl_keluar from data_pasien inner join rawat on data_pasien.No_RM = rawat.no_rm inner join data_dokter on rawat.kode_dokter = data_dokter.kode_dokter WHERE data_pasien.No_RM LIKE '%$query%' or data_pasien.nama LIKE '%$query%' ");
        }else{
            $sah = mysqli_query($link, 'SELECT data_pasien.No_RM, data_pasien.nama, rawat.no_reg, rawat.no_rm, data_dokter.nama_dokter, rawat.kode_ruangan, rawat.penyakit, rawat.tgl_rawat, rawat.tgl_keluar from data_pasien inner join rawat on data_pasien.No_RM = rawat.no_rm inner join data_dokter on rawat.kode_dokter = data_dokter.kode_dokter;');
          }
          while ($row = mysqli_fetch_array($sah)) {
          ?>
              <tr>
                <td><?php echo $row['No_RM'] ?></td>
                <td><?php echo $row['nama'] ?></td>
                <td><?php echo $row['no_reg'] ?></td>
                <td><?php echo $row['nama_dokter'] ?></td>
                <td><?php echo $row['kode_ruangan'] ?></td>
                <td><?php echo $row['penyakit'] ?></td>
                <td><?php echo $row['tgl_rawat'] ?></td>
                <td><?php echo $row['tgl_keluar'] ?></td>
                <td><a href="edit.php?no_reg=<?php echo $row['no_reg'] ?>" onclick="return confirm('Yakin?');"  class="action">edit</a><br>
                <a href="delete.php?no_reg=<?php echo $row['no_reg'] ?>" onclick="return confirm('Yakin?');" class="action">delete</a></td>
              </tr>
        <?php } ?>
      </tbody>
    </div>
  </table>
</div>
<div class="clear"></div><br>
<div class="titik" style="border-bottom: 1px dashed #262626"></div>
<div class="footer">
  <center><p>ABDUL ROHIM G20118043</p></center>
</div>

</body>
</html>

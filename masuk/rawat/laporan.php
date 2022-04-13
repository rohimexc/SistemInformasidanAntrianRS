<?php
  error_reporting(0);
require '../../koneksi.php';
  session_start();
  if($_SESSION['login'] != true){
    header('location:../../index.php');
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
      <h1>RSU UNDATA</h1> <link rel="icon" href="../../aa.png">
      <p>Admin <?php echo $_COOKIE['ambil'];?></p>
      <a onclick="logout()">Logout</a>
  </div>
  <div class="headerkecil">
    <span class="menubawah">
        <a class="aa" href="../rawat/laporan.php">Laporan Rawat</a>
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
    <a href="laporan.php" >Print</a>
  </div>
  <div class="content">
    <h2>Laporan Rawat</h2><br>
    <span class="contentkecil">
      <br><br><br>
</div>
<div class="clear"></div><br>
<div class="titik" style="border-bottom: 1px dashed #262626"></div>
<div class="footer">
  <center><p>ABDUL ROHIM G20118043</p></center>
</div>

</body>
</html>

<?php

require '../../koneksi.php';
  session_start();
  if($_SESSION['login'] != true){
    header('location:../../index.php');
  }

  $id = $_GET["kode_dokter"];

  $tampil = mysqli_query($link, "SELECT *from data_dokter where kode_dokter = $id");

  $result = mysqli_fetch_assoc($tampil);
  if (isset($_POST['edit'])) {
    $kode_dokter = $_POST['kode_dokter'];
    $nama_dokter = $_POST['nama_dokter'];
    $spesialis   = $_POST['spesialis'];
    $alamat      = $_POST['alamat'];
    $no_hp       = $_POST['no_hp'];
    $umur        = $_POST['umur'];
    $alumni      = $_POST['alumni'];
    $query = "UPDATE data_dokter SET nama_dokter='$nama_dokter', spesialis='$spesialis', alamat='$alamat', no_hp='$no_hp', umur='$umur', alumni='$alumni' WHERE kode_dokter = $id";

  if(mysqli_query($link,$query)){
    echo "<script> alert('Data berhasil di ubah !!'); document.location.href='tampil.php'; </script>";
  }  }
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
          <a href="../rawat/laporan.php" class="bb">Laporan Rawat</a>
          <a href="../ruangan/tampil.php" class="cc">Data Ruangan</a>
          <a href="tampil.php" class="dd">Data Dokter</a>
          <a href="../pasien/tampilpasien.php" class="ee">Data Pasien</a>
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
           <form method="POST" enctype="multipart/form-data">
             <p class="kd">
               Masukkan kode dokter<input type="text" name="kode_dokter" class="inputan1" value="<?php echo $result["kode_dokter"]; ?>" required readonly>
             </p><br>
             <p class="nd">
               Masukkan nama dokter<input type="text" name="nama_dokter" class="inputan2" value="<?php echo $result["nama_dokter"]; ?>" required>
             </p><br>
             <p class="sd">
               Spesialis dokter<input type="text" name="spesialis" class="inputan3" value="<?php echo $result["spesialis"]; ?>" required>
             </p><br>
             <p class="ad">
               Alamat dokter<input type="text" name="alamat" class="inputan4" value="<?php echo $result["alamat"]; ?>" required>
             </p><br>
             <p class="no">
               Nomor HP<input type="text" name="no_hp" class="inputan5" value="<?php echo $result["no_hp"]; ?>" required>
             </p><br>
             <p class="um">
               Umur<input type="number" name="umur" class="inputan6" value="<?php echo $result["umur"]; ?>" required>
             </p><br>
             <p class="al">
               Alumni/Lulusan<input type="text" name="alumni" class="inputan8" value="<?php echo $result["alumni"]; ?>" required>
             </p><br>

             <div id="tombol">
               <input type="submit" name="edit" value="Simpan" class="tombol">
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

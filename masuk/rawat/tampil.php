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
    <title>RSU UNDATA</title> <link rel="icon" href="../../aa.png">
  </head>
  <body>
  <script>
    window.print();
</script>
    <h2>Laporan Rawat Inap Rumah Sakit</h2>
    <table cellspacing='0' border='1'>
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
          </tr>
        </thead>
        <tbody>
          <?php
          if ($query != ''){
            $sah = mysqli_query($link, "SELECT *FROM data_pasien where No_RM like '%".$query."%' or nama like '%".$query."%' ");
          }else{
              $sah = mysqli_query($link, 'SELECT *FROM data_pasien where No_RM');
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
                  <td><?php echo $row['kode_dokter'] ?></td>
                  <td><?php echo $row['kode_ruangan'] ?></td>
                  <td><?php echo $row['penyakit'] ?></td>
                  <td><?php echo $row['tgl_keluar'] ?></td>
                </tr>
          <?php } ?>
        </tbody>
      </div>
    </table>
    <script>

    document.location.href='../pasien/tampilpasien.php';
    </script>
  </body>
</html>

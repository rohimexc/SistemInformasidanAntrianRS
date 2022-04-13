<?php
error_reporting(0);
require 'koneksi.php';

session_start();

?>


<html>
  <head>
    <title>RS_KDCW</title> <link rel="icon" href="aa.png">
    <link href="login.css" rel="stylesheet">
  </head>
  <body>
    <div class="content">
      <h1>RS MARIO BROS</h1><br>
          <h4>Form Register Admin</h4>

          <form method="POST" action="simpan.php">
            <input placeholder="masukkan nama" type="text" name="nama" class="inputan" required><br>
            <input placeholder="masukkan username" type="text" name="username" class="inputan" required><br>
            <input placeholder="masukkan password" type="password" name="pass" pattern="^\S{6,}$" onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Minimal 6 Karakter' : ''); if(this.checkValidity()) form.pass2.pattern = this.value;" class="inputan" required><br>
            <input placeholder="masukkan ulang password" type="password" name="pass2" pattern="^\S{6,}$" onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Masukkan Password Yang Sama' : '');" class="inputan" id="inputan" required><br>
            <input placeholder="masukkan nomor telepon" type="number" name="no_tlp" class="inputan" required><br>
              <div id="tombol">
                <input type="submit" name="submit" value="Simpan" class="tombol" id="tombol">
              </div>
          </form>
    </div>
    <script type="js/jquery.min.js"></script>
  </body>

</html>

<?php session_start(); ?>
<?php require 'koneksi.php' ?>
<html>


<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Login</title>
   <link rel="stylesheet" href="journeyadmin/stylelogin.css">
   <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
   <link rel="stylesheet" href="fontawesome/css/fontawesome.min.css">
   <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>

</head>
<style>
   .no-decoration {
      text-decoration: none;
   }
</style>

<body>
   <?php

   if (isset($_POST['submit'])) {
      $email = mysqli_real_escape_string($mysqli, $_POST['whatsapp_pelanggan']);
      $pass = mysqli_real_escape_string($mysqli, $_POST['password']);

      if ($email == "" || $pass == "") {
   ?>
         <div class="alert alert-danger text-center" role="alert">
            Either username or password field is empty
         </div>
         <meta http-equiv="refresh" content="2; url=login.php" />

         <?php
         // echo "Either username or password field is empty.";
         // echo "<br/>";
         // echo "<a href='login.php'>Go back</a>";
      } else {
         $result = mysqli_query($mysqli, "SELECT * FROM pelanggan WHERE whatsapp_pelanggan='$email' AND password=md5('$pass')")
            or die("Could not execute the select query.");

         $row = mysqli_fetch_assoc($result);

         if (is_array($row) && !empty($row)) {
            $validuser = $row['email_pelanggan'];
            $_SESSION['valid'] = $validuser;
            $_SESSION['nama_pelanggan'] = $row['nama_pelanggan'];
            $_SESSION['id_pelanggan'] = $row['id_pelanggan'];
         } else {
         ?>
            <div class="alert alert-danger text-center" role="alert">
               Either username or password field is empty
            </div>
            <meta http-equiv="refresh" content="2; url=login.php" />

         <?php
            // echo "<script>alert('Invalid username or password');</script>";
            // echo "<br/>";
            // echo "<script>location='login.php';</script>";
         }

         if (isset($_SESSION['valid'])) {
         ?>
            <div class="alert alert-info mt-3" role="alert">
               Anda Sukses Login,
               SELAMAT BERBELANJA...
            </div>
            <meta http-equiv="refresh" content="2; url=account.php" />

      <?php
            // header('Location: index.php');
         }
      }
   } else {
      ?>
      <div class="main-login">
         <div class="left-login">
            <h1>Login<br>Member Area</h1>
            <img src="./image/loginmember.svg" alt="freepik_stories-process">
         </div>
         <form name="form1" action="" method="post">
            <div class="right-login">
               <div class="card-login">
                  <h1>LOGIN</h1>
                  <div class="textfield">
                     <label for="whatsapp_pelanggan">WhatsApp</label>
                     <input type="number" class="form-control" name="whatsapp_pelanggan" min="0"  placeholder="Nomor WhatsApp"  required >
                  </div>
                  <div class="textfield">
                     <label for="password">Password</label>
                     <input type="password" class="form-control" name="password"  placeholder="password">
                  </div>
                  <button class="btn-login" type="submit" name="submit" value="submit">Login</button>
                  <a href="cs.php" class="no-decoration">
                     <h5> lupa akun/password <i class='bx bx-support'></i></h5>
                  </a>
                  <p class="text-white">Belum Punya Akun?</p>
                  <a href="register.php" class="no-decoration">
                        <h1>DISINI</h1>
                  </a>
               </div>
            </div>
         </form>
      </div>
   <?php
   }
   ?>
   <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
   <script src="../fontawesome/js/all.min.js"></script>
</body>

</html>
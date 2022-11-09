<?php

require 'koneksi.php';
session_start();
$id = $_SESSION['id_pelanggan'];




$query = mysqli_query($mysqli, "SELECT * FROM pelanggan WHERE id_pelanggan='$id'");
$data = mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
   <title>Journey Store</title>
   <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
   <link rel="stylesheet" href="fontawesome/css/fontawesome.min.css">
   <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
   <!-- custom css file link  -->
   <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
   <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

</head>
<style>
   .no-decoration {
      text-decoration: none;
   }

   form div {
      width: 200px;
   }
</style>

<body>

   <div class="main m-auto">
      <div class="d-flex justify-content-between align-items-center">
         <div class="d-flex justify-content-between align-items-center">
            <img src="image/headerjo.png" width="47px" height="50px" padding="0" alt="">

         </div>
         <h2 class="text-brand">
            Journey <span>Store</span>
         </h2>
      </div>
      <?php
      include("koneksi.php");

      if (isset($_POST['submit'])) {
         $email_pelanggan = $_POST['email_pelanggan'];
         $password = $_POST['password'];
         $nama_pelanggan = $_POST['nama_pelanggan'];
         $whatsapp_pelanggan = $_POST['whatsapp_pelanggan'];
         $alamat_pelanggan = $_POST['alamat_pelanggan'];

         if ($email_pelanggan == ""  || $password == "" || $nama_pelanggan == "" || $whatsapp_pelanggan == "" || $alamat_pelanggan == "") {
            echo "All fields should be filled. Either one or many fields are empty.";
            echo "<br/>";
            echo "<a href='register.php'>Go back</a>";
         } else {
            mysqli_query($mysqli, "INSERT INTO pelanggan(email_pelanggan, password, nama_pelanggan, whatsapp_pelanggan, alamat_pelanggan) VALUES( '$email_pelanggan', md5('$password'), '$nama_pelanggan', '$whatsapp_pelanggan', '$alamat_pelanggan')")
               or die("Could not execute the insert query.");

            echo "register success";
            echo "<br/>";
            echo "<a href='login.php'>Login</a>";
         }
      } else {
      ?>

         <p>
         <h2>Register</h2>
         </p>
         <form name="form1" method="post" action="">
            <table width="75%">
               <tr>
                  <td>Email</td>
                  <td><input type="text" name="email_pelanggan" required></td>
               </tr>
               <tr>
                  <td>Password</td>
                  <td><input type="password" name="password"></td>
               </tr>
               <tr>
                  <td width="10%">Full Name</td>
                  <td><input type="text" name="nama_pelanggan" required></td>
               </tr>
               <tr>
                  <td>Whatsapp</td>
                  <td><input type="number" name="whatsapp_pelanggan" min="0" required></td>
               </tr>
               <tr>
                  <td>Address</td>
                  <td><input type="text" name="alamat_pelanggan" required></td>
               </tr>
               <tr>
                  <td></td>
                  <td>
                     <br><input class="btn btn-info center" type="submit" name="submit" value="Submit">
                  </td>
               </tr>
            </table>
         </form>
      <?php
      }
      ?>


      <br>
      <?php require "navbarbotom.php"; ?>
   </div>






   <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
   <script src="https://unpkg.com/boxicons@2.1.2/dist/boxicons.js"></script>
   <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
   <script src="fontawesome/js/all.min.js"></script>

</body>

</html>